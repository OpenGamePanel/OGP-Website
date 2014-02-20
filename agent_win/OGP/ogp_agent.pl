#!/usr/bin/perl
#
# OGP - Open Game Panel
# Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
#
# http://www.opengamepanel.org/
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#

use warnings;
use strict;

use Frontier::Daemon::Forking;	# Forking XML-RPC server
use File::Copy;				   # Simple file copy functions
use File::Copy::Recursive
  qw(fcopy rcopy dircopy fmove rmove dirmove pathempty pathrmdir)
  ;							   # Used to copy whole directories
use Crypt::XXTEA;	# Encryption between webpages and agent.
use Cfg::Config;	 # Config file
use Cfg::Preferences;   # Preferences file
use Fcntl ':flock';  # Import LOCK_* constants for file locking
use Cwd;			 # Fast way to get the current directory
use LWP::Simple;	 # Used for fetching URLs
use MIME::Base64;	# Used to ensure data travelling right through the network.
use Getopt::Long;	# Used for command line params.
use Path::Class::File;	# Used to handle files and directories.
use File::Path qw(mkpath);
use Archive::Extract;	 # Used to handle archived files.
use File::Find;

# Current location of the agent.
use constant AGENT_RUN_DIR => getcwd();

# Load our config file values
use constant AGENT_KEY	  => $Cfg::Config{key};
use constant AGENT_IP	   => $Cfg::Config{listen_ip};
use constant AGENT_LOG_FILE => $Cfg::Config{logfile};
use constant AGENT_PORT	 => $Cfg::Config{listen_port};
use constant AGENT_VERSION  => $Cfg::Config{version};
use constant SCREEN_LOG_LOCAL  => $Cfg::Preferences{screen_log_local};
use constant DELETE_LOGS_AFTER  => $Cfg::Preferences{delete_logs_after};
use constant AGENT_PID_FILE =>
  Path::Class::File->new(AGENT_RUN_DIR, 'ogp_agent.pid');

use constant GAME_AGENT_STARTUP_PID => 'ogp_game_agent_startup.pid';

use constant STEAM_LICENSE_OK => "Accept";
use constant STEAM_LICENSE	=> $Cfg::Config{steam_license};
use constant MANUAL_TMP_DIR   => Path::Class::Dir->new(AGENT_RUN_DIR, 'tmp');
use constant STEAM_CLIENT_DIR => Path::Class::Dir->new(AGENT_RUN_DIR, 'steamc');
use constant STEAM_CLIENT_BIN =>
  Path::Class::File->new(STEAM_CLIENT_DIR, 'HldsUpdateTool.exe');
use constant STEAMCMD_CLIENT_DIR => Path::Class::Dir->new(AGENT_RUN_DIR, 'steamcmd');
use constant STEAMCMD_CLIENT_BIN =>
  Path::Class::File->new(STEAMCMD_CLIENT_DIR, 'steamcmd.exe');
use constant SCREEN_LOGS_DIR =>
  Path::Class::Dir->new(AGENT_RUN_DIR, 'screenlogs');
use constant GAME_STARTUP_DIR =>
  Path::Class::Dir->new(AGENT_RUN_DIR, 'startups');

use constant SCREENRC_FILE =>
  Path::Class::File->new(AGENT_RUN_DIR, 'ogp_screenrc');

use constant SCREEN_TYPE_HOME   => "HOME";
use constant SCREEN_TYPE_UPDATE => "UPDATE";

my $no_startups	= 0;
my $clear_startups = 0;
our $log_std_out = 0;

GetOptions(
		   'no-startups'	=> \$no_startups,
		   'clear-startups' => \$clear_startups,
		   'log-stdout'	 => \$log_std_out
		  );

# Starting the agent as root user is not supported anymore.
if ($< == 0)
{
	print "ERROR: You are trying to start the agent as root user.";
	print "This is not currently supported. If you wish to start the";
	print "you need to create a normal user account for it.";
	exit 1;
}

### Logger function.
### @param line the line that is put to the log file.
sub logger
{
	my $logcmd	 = $_[0];
	my $also_print = 0;

	if (@_ == 2)
	{
		($also_print) = $_[1];
	}

	$logcmd = localtime() . " $logcmd\n";

	if ($log_std_out == 1)
	{
		print "$logcmd";
		return;
	}
	if ($also_print == 1)
	{
		print "$logcmd";
	}

	open(LOGFILE, '>>', AGENT_LOG_FILE)
	  or die("Can't open " . AGENT_LOG_FILE . " - $!");
	flock(LOGFILE, LOCK_EX) or die("Failed to lock log file.");
	seek(LOGFILE, 0, 2) or die("Failed to seek to end of file.");
	print LOGFILE "$logcmd" or die("Failed to write to log file.");
	flock(LOGFILE, LOCK_UN) or die("Failed to unlock log file.");
	close(LOGFILE) or die("Failed to close log file.");
}

# Check the screen logs folder
if (!-d SCREEN_LOGS_DIR && !mkdir SCREEN_LOGS_DIR)
{
	logger "Could not create " . SCREEN_LOGS_DIR . " directory $!.", 1;
	exit -1;
}

# Rotate the log file
if (-e AGENT_LOG_FILE)
{
	if (-e AGENT_LOG_FILE . ".bak")
	{
		unlink(AGENT_LOG_FILE . ".bak");
	}
	logger "Rotating log file";
	move(AGENT_LOG_FILE, AGENT_LOG_FILE . ".bak");
	logger "New log file created";
}

sub backup_home_log
{
	my ($home_id, $log_file) = @_;
	
	my $home_backup_dir = SCREEN_LOGS_DIR . "/home_id_" . $home_id;
		
	if( ! -e $home_backup_dir )
	{
		if( ! mkdir $home_backup_dir )
		{
			logger "Can not create a backup directory at $home_backup_dir.";
			return 1;
		}
	}
	
	my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
	
	my $backup_file_name =  $mday . $mon . $year . '_' . $hour . 'h' . $min . 'm' . $sec . "s.log";
	
	my $output_path = $home_backup_dir . "/" . $backup_file_name;
	
	# Used for deleting log files older than DELETE_LOGS_AFTER
	my @file_list;
	my @find_dirs; # directories to search
	my $now = time(); # get current time
	my $days;
	if((DELETE_LOGS_AFTER =~ /^[+-]?\d+$/) && (DELETE_LOGS_AFTER > 0)){
		$days = DELETE_LOGS_AFTER; # how many days old
	}else{
		$days = 30; # how many days old
	}
	my $seconds_per_day = 60*60*24; # seconds in a day
	my $AGE = $days*$seconds_per_day; # age in seconds
	push (@find_dirs, $home_backup_dir);
	
	# Create local copy of log file backup in the log_backups folder and current user home directory if SCREEN_LOG_LOCAL = 1 
	if(SCREEN_LOG_LOCAL == 1)
	{
		# Create local backups folder
		my $local_log_folder = Path::Class::Dir->new("logs_backup");
		
		if(!-e $local_log_folder){
			mkdir($local_log_folder);
		}
		
		# Add full path to @find_dirs so that log files older than DELETE_LOGS_AFTER are deleted
		my $fullpath_to_local_logs = Path::Class::Dir->new(getcwd(), "logs_backup");
		push (@find_dirs, $fullpath_to_local_logs);
		
		my $log_local = $local_log_folder . "/" . $backup_file_name;
		
		# Delete the local log file if it already exists
		if(-e $log_local){
			unlink $log_local;
		}
		
		# If the log file contains UPDATE in the filename, do not allow users to see it since it will contain steam credentials
		# Will return -1 for not existing
		my $isUpdate = index($log_file,SCREEN_TYPE_UPDATE);
		
		if($isUpdate == -1){
			copy($log_file,$log_local);
		}
	}
	
	# Delete all files in @find_dirs older than DELETE_LOGS_AFTER days
	find ( sub {
		my $file = $File::Find::name;
		if ( -f $file ) {
			push (@file_list, $file);
		}
	}, @find_dirs);
 
	for my $file (@file_list) {
		my @stats = stat($file);
		if ($now-$stats[9] > $AGE) {
			unlink $file;
		}
	}
	
	move($log_file,$output_path);
	
	return 0;
}

sub create_screen_id
{
	my ($screen_type, $home_id) = @_;
	return sprintf("OGP_%s_%09d", $screen_type, $home_id);
}

sub create_screen_cmd
{
	my ($screen_id, $exec_cmd) = @_;
	$exec_cmd = replace_OGP_Vars($screen_id, $exec_cmd);
	return
	  sprintf('screen -d -m -t "%1$s" -c ' . SCREENRC_FILE . ' -S %1$s %2$s',
			  $screen_id, $exec_cmd);

}

sub create_screen_cmd_loop
{
	my ($screen_id, $exec_cmd, $priority, $affinity) = @_;
	my $server_start_batfile = $screen_id . "_startup_scr.bat";
	
	$exec_cmd = replace_OGP_Vars($screen_id, $exec_cmd);
	
	# Create batch file that will launch the process and store PID which will be used for killing later
	open (SERV_START_BAT_SCRIPT, '>', $server_start_batfile);
	
	my $batch_server_command = ":TOP" . "\r\n"
	. "set starttime=%time%" . "\r\n"
	. "start " . $priority . " " . $affinity . " /wait " . $exec_cmd . "\r\n"
	. "set endtime=%time%" . "\r\n" 
	. "set /a secs=%endtime:~6,2%" . "\r\n" 
	. "set /a secs=%secs%-%starttime:~6,2%" . "\r\n"
	. "if exist SERVER_STOPPED exit" . "\r\n"
	. "if %secs% lss 15 exit" . "\r\n"
	. "goto TOP" . "\r\n";
	
	print SERV_START_BAT_SCRIPT $batch_server_command;
	close (SERV_START_BAT_SCRIPT);
	
	my $screen_exec_script = "cmd /Q /C " . $server_start_batfile;
	
	return
	  sprintf('screen -d -m -t "%1$s" -c ' . SCREENRC_FILE . ' -S %1$s %2$s',
			  $screen_id, $screen_exec_script);

}

sub replace_OGP_Vars{
	# This function replaces constants from game server XML Configs with OGP paths for Steam Auto Updates for example
	my ($screen_id, $exec_cmd) = @_;
	my $screen_id_for_txt_update = substr ($screen_id, rindex($screen_id, '_') + 1);
	my $steamInsFile = $screen_id_for_txt_update . "_install.txt";
	my $steamCMDPath = STEAMCMD_CLIENT_DIR;
	my $fullPath = Path::Class::File->new($steamCMDPath, $steamInsFile);
	
	my $windows_steamCMDPath= `cygpath -wa $steamCMDPath`;
	chop $windows_steamCMDPath;
	$windows_steamCMDPath =~ s#/#\\#g;
	
	# If the install file exists, the game can be auto updated, else it will be ignored by the game for improper syntax
	# To generate the install file, the "Install/Update via Steam" button must be clicked on at least once!
	if(-e $fullPath){
		$exec_cmd =~ s/{OGP_STEAM_CMD_DIR}/$windows_steamCMDPath/g;
		$exec_cmd =~ s/{STEAMCMD_INSTALL_FILE}/$steamInsFile/g;
	}
	
	return $exec_cmd;
}


sub is_screen_running_without_decrypt
{
	my ($screen_type, $home_id) = @_;

	my $screen_id = create_screen_id($screen_type, $home_id);

	my $is_running = `screen -list | grep $screen_id`;

	if ($is_running =~ /^\s*$/)
	{
		logger "Home with id $screen_id is not running.";
		return 0;
	}
	else
	{
		logger "Home with id $screen_id is running.";
		return 1;
	}
}

sub encode_list
{
	my $encoded_content = '';
	foreach (@_)
	{
		$encoded_content .= encode_base64($_, '\n');
	}
	return $encoded_content;
}

sub decrypt_param
{
	my ($param) = @_;
	$param = decode_base64($param);
	$param = Crypt::XXTEA::decrypt($param, AGENT_KEY);
	$param = decode_base64($param);
	return $param;
}

sub decrypt_params
{
	my @params;
	foreach my $param (@_)
	{
		$param = &decrypt_param($param);
		push(@params, $param);
	}
	return @params;
}

sub check_steam_cmd_client
{
	if (STEAM_LICENSE ne STEAM_LICENSE_OK)
	{
		logger "Steam license not accepted, stopping steam client check.";
		return 0;
	}

	# TODO: This does not work on windows because the binary is not extracted as in Linux.

	if (-f STEAMCMD_CLIENT_BIN)
	{
		logger "steamcmd client ok.";
		my $update = system(STEAMCMD_CLIENT_BIN." +exit");
		return 1;
	}
	
	logger "steamcmd client does not exist, installing...";

	if (!-d STEAMCMD_CLIENT_DIR && !mkdir STEAMCMD_CLIENT_DIR)
	{
		logger "Could not create " . STEAMCMD_CLIENT_DIR . " directory $!.", 1;
		exit -1;
	}
	if (!-w STEAMCMD_CLIENT_DIR)
	{
		logger "Steam client dir '"
		  . STEAMCMD_CLIENT_DIR
		  . "' not writable. Unable to get steam client.";
		return -1;
	}

	chdir STEAMCMD_CLIENT_DIR;

	# These two commands needs to be variables changed depending the platform.
	my $steam_client_file		  = 'steamcmd.zip';
	my $steam_installation_command = 'unzip ' . $steam_client_file;

	if (!-f Path::Class::File->new(STEAMCMD_CLIENT_DIR, $steam_client_file))
	{
		my $steam_client_url =
		  "http://media.steampowered.com/installer/" . $steam_client_file;
		logger "Downloading the steam client from $steam_client_url to '"
		  . getcwd() . "'.";
		my $steam_client_val = getstore($steam_client_url, $steam_client_file);
		if ($steam_client_val != 200)
		{
			logger "Failed to download steam binary from "
			  . $steam_client_url
			  . ". Error code: "
			  . $steam_client_val
			  . "", 1;
			return -1;
		}
	}
	
	my $steam_installation = system($steam_installation_command);
	if ($steam_installation == -1)
	{
		logger "Failed to execute '"
		  . $steam_installation_command
		  . "' in dir "
		  . STEAMCMD_CLIENT_DIR . ".";
		return -1;
	}
	chmod 0755, STEAMCMD_CLIENT_BIN;
	my $update = system(STEAMCMD_CLIENT_BIN." +exit");
	
	unlink($steam_client_file);
	chdir AGENT_RUN_DIR;
	return 1;
}

if (check_steam_cmd_client() == -1)
{
	print "ERROR: You must download and uncompress the new steamcmd package.";
	print "ENSURE TO INSTALL IT IN /OGP/steamcmd directory,";
	print "so it can be managed by the agent to install servers.";
	exit 1;
}
sleep 5;
logger "Open Game Panel - Agent started - "
  . AGENT_VERSION
  . " - port "
  . AGENT_PORT
  . " - PID $$", 1;
# create the directory for startup flags
if (!-e GAME_STARTUP_DIR)
{
	logger "Creating the startups directory " . GAME_STARTUP_DIR . "";
	if (!mkdir GAME_STARTUP_DIR)
	{
		my $message =
			"Failed to create the "
		  . GAME_STARTUP_DIR
		  . " directory - check permissions. Errno: $!";
		logger $message, 1;
		exit 1;
	}
}

elsif ($clear_startups)
{
	opendir(STARTUPDIR, GAME_STARTUP_DIR);
	while (my $startup_file = readdir(STARTUPDIR))
	{

		# Skip . and ..
		next if $startup_file =~ /^\./;
		$startup_file = Path::Class::File->new(GAME_STARTUP_DIR, $startup_file);
		logger "Removing " . $startup_file . ".";
		unlink($startup_file);
	}
	closedir(STARTUPDIR);
}

# If the directory already existed check if we need to start some games.
elsif ($no_startups != 1)
{
	my $screenwipe = `/usr/bin/screen -wipe > /dev/null`;
	# Loop through all the startup flags, and call universal startup
	opendir(STARTUPDIR, GAME_STARTUP_DIR);
	logger "Reading startup flags from " . GAME_STARTUP_DIR . "";
	while (my $dirlist = readdir(STARTUPDIR))
	{

		# Skip . and ..
		next if $dirlist =~ /^\./;
		logger "Found $dirlist";
		open(STARTFILE, '<', Path::Class::Dir->new(GAME_STARTUP_DIR, $dirlist))
		  || logger "Error opening start flag $!";
		while (<STARTFILE>)
		{
			my (
				$home_id,   $home_path,   $server_exe,
				$run_dir,   $startup_cmd, $server_port,
				$server_ip, $cpu,		 $nice
			   ) = split(',', $_);
			
			if (is_screen_running_without_decrypt(SCREEN_TYPE_HOME, $home_id) ==
				1)
			{
				logger
				  "This server ($server_exe on $server_ip : $server_port) is already running (ID: $home_id).";
				next;
			}

			logger "Starting server_exe $server_exe from home $home_path.";
			universal_start_without_decrypt(
										 $home_id,   $home_path,   $server_exe,
										 $run_dir,   $startup_cmd, $server_port,
										 $server_ip, $cpu,		 $nice
										   );
		}
		close(STARTFILE);
	}
	closedir(STARTUPDIR);
}

# Create the pid file
open(PID, '>', AGENT_PID_FILE)
  or die("Can't write to pid file - " . AGENT_PID_FILE . "\n");
print PID "$$\n";
close(PID);

my $d = Frontier::Daemon::Forking->new(
			 methods => {
				 is_screen_running				=> \&is_screen_running,
				 universal_start				=> \&universal_start, 
				 cpu_count						=> \&cpu_count,
				 rfile_exists					=> \&rfile_exists,
				 quick_chk						=> \&quick_chk,
				 steam							=> \&steam,
				 steam_cmd						=> \&steam_cmd,
				 get_log						=> \&get_log,
				 stop_server					=> \&stop_server,
				 send_rcon_command				=> \&send_rcon_command,
				 dirlist						=> \&dirlist,
				 dirlistfm						=> \&dirlistfm,
				 readfile						=> \&readfile,
				 writefile						=> \&writefile,
				 what_os						=> \&what_os,
				 start_file_download			=> \&start_file_download,
				 is_file_download_in_progress	=> \&is_file_download_in_progress,
				 uncompress_file				=> \&uncompress_file,
				 discover_ips					=> \&discover_ips,
				 mon_stats						=> \&mon_stats,
				 exec							=> \&exec,
				 clone_home						=> \&clone_home,
				 remove_home					=> \&remove_home,
				 start_rsync_install			=> \&start_rsync_install,
				 rsync_progress					=> \&rsync_progress,
				 restart_server					=> \&restart_server,
				 sudo_exec						=> \&sudo_exec,
				 master_server_update			=> \&master_server_update,
				 secure_path					=> \&secure_path,
				 get_chattr						=> \&get_chattr,
				 ftp_mgr						=> \&ftp_mgr,
			 },
			 debug	 => 4,
			 LocalPort => AGENT_PORT,
			 LocalAddr => AGENT_IP,
			 ReuseAddr => '1'
) or die "Couldn't start OGP Agent: $!";

sub is_screen_running
{
	my ($screen_type, $home_id) = decrypt_params(@_);
	return is_screen_running_without_decrypt($screen_type, $home_id);
}

# Delete Server Stopped Status File:

sub deleteStoppedStatFile{
	my $server_stop_status_file = "SERVER_STOPPED";
		
	if(-e $server_stop_status_file){
		unlink $server_stop_status_file;
	}
}

# Universal startup function
sub universal_start
{
	chomp(@_);
	return universal_start_without_decrypt(decrypt_params(@_));
}

# Split to two parts because of internal calls.
sub universal_start_without_decrypt
{
	my (
		$home_id,	 $home_path, $server_exe, $run_dir, $startup_cmd,
		$server_port, $server_ip, $cpu,		$nice
	   ) = @_;
	   
	if (is_screen_running_without_decrypt(SCREEN_TYPE_HOME, $home_id) == 1)
	{
		logger "This server is already running (ID: $home_id).";
		return -14;
	}

	if (!-e $home_path)
	{
		logger "Can't find server's install path [ $home_path ].";
		return -10;
	}

	# Some game require that we are in the directory where the binary is.
	my $game_binary_dir = Path::Class::Dir->new($home_path, $run_dir);
	if (!chdir $game_binary_dir)
	{
		logger "Could not change to server binary directory $game_binary_dir.";
		return -12;
	}

	if (!-x $server_exe)
	{
		my $chmod_exe = chmod 0755, $server_exe;
		if (!$chmod_exe)
		{
			logger "The $server_exe file is not executable.";
			return -13;
		}
	}

	my $screen_id = create_screen_id(SCREEN_TYPE_HOME, $home_id);

	# Create affinity and priority strings
	my $priority;
	my $affinity;
	
	if($nice ne "NA")
	{
		if( $nice <= 19 and $nice >= 11 )
		{
			$priority = "/low";
		}		
		elsif( $nice <= 10 and $nice >= 1 )
		{
			$priority = "/belownormal";
		}
		elsif( $nice == 0 )
		{
			$priority = "/normal";
		}
		elsif( $nice <= -1 and $nice >= -8  )
		{
			$priority = "/abovenormal";
		}
		elsif( $nice <= -9 and $nice >= -18 )
		{
			$priority = "/high";
		}
		elsif( $nice == -19 )
		{
			$priority = "/realtime";
		}
	}
	else
	{
		$priority = "";
	}
	
	if($cpu ne "NA" and $cpu ne "" )
	{
		
		$affinity = "/affinity $cpu";
	}
	else
	{
		$affinity = "";
	}
	
	
	my $cygwin_path = `cygpath -wa /`;
	chomp $cygwin_path;
	
	$home_path =~ s/\//\\/g;
	
	if ( $run_dir ne "" )
	{
		$run_dir = $run_dir."\\";
	}
	
	my $windows_path = $cygwin_path.$home_path."\\".$run_dir;
	
	$windows_path =~ s/\\/\\\\/g;
	
	# Create the startup string.
	my ($file_extension) = $server_exe =~ /(\.[^.]+)$/;
		
	my $cli_bin;
	
	# Create bash file to respawn process if it crashes or exits without user interaction
	# If a user stops the server, the process will not respawn
	
	if($file_extension eq ".jar")
	{
		if(defined($Cfg::Preferences{ogp_autorestart_server}) &&  $Cfg::Preferences{ogp_autorestart_server} eq "1"){
			deleteStoppedStatFile();
			$cli_bin = create_screen_cmd_loop($screen_id, "$startup_cmd", $priority, $affinity);
		}else{
			# $startup_cmd =~ s/java //g;
			# $cli_bin = create_screen_cmd($screen_id, "cmd /Q /C start $priority $affinity /WAIT wscript.exe \"$invisible\" \"java\" \"$startup_cmd\"");
			$cli_bin = create_screen_cmd($screen_id, "cmd /Q /C start $priority $affinity /WAIT $startup_cmd");
		}
	}
	elsif(($file_extension eq ".sh")||($file_extension eq ".bash"))
	{
		# There is no software made for windows that uses bash by default,
		# but it can be a good way to improve the server startup. To be able to use
		# sh/bash scripts as server executable I added this piece to the agent:	
		if(defined($Cfg::Preferences{ogp_autorestart_server}) &&  $Cfg::Preferences{ogp_autorestart_server} eq "1"){
			deleteStoppedStatFile();
			$cli_bin = create_screen_cmd_loop($screen_id, "bash $server_exe $startup_cmd", $priority, $affinity);
		}else{
			$cli_bin = create_screen_cmd($screen_id, "cmd /Q /C start $priority $affinity /WAIT bash $server_exe $startup_cmd");
		}
	}
	else
	{
		if(defined($Cfg::Preferences{ogp_autorestart_server}) &&  $Cfg::Preferences{ogp_autorestart_server} eq "1"){
			deleteStoppedStatFile();
			
			$cli_bin = create_screen_cmd_loop($screen_id, "$windows_path$server_exe $startup_cmd", $priority, $affinity);
		}else{
			# $cli_bin = create_screen_cmd($screen_id, "cmd /Q /C start $priority $affinity /WAIT wscript.exe \"$invisible\" \"$server_exe\" \"$startup_cmd\"");
			$cli_bin = create_screen_cmd($screen_id, "cmd /Q /C start $priority $affinity /WAIT $windows_path$server_exe $startup_cmd");
		}
	}
	
	$home_path =~ s/\\/\//g;
	
	my $log_file = Path::Class::File->new(SCREEN_LOGS_DIR, "screenlog.$screen_id");
	backup_home_log( $home_id, $log_file );
	
	my $clean_cli_bin = $cli_bin;
	$clean_cli_bin =~ s/\\\\/\\/g;
	logger
	  "Startup command [ $clean_cli_bin ] will be executed in dir $game_binary_dir.";

	system($cli_bin);

	# Create startup file for the server.
	my $startup_file =
	  Path::Class::File->new(GAME_STARTUP_DIR, "$server_ip-$server_port");

	if (open(STARTUP, '>', $startup_file))
	{
		print STARTUP
		  "$home_id,$home_path,$server_exe,$run_dir,$startup_cmd,$server_port,$server_ip,$cpu,$nice";
		logger "Created startup flag for $server_ip-$server_port";
		close(STARTUP);
	}
	else
	{
		logger "Cannot create file in " . $startup_file . " : $!";
	}
	return 1;
}

# Returns the number of CPUs available.
sub cpu_count
{
	if (!-e "/proc/cpuinfo")
	{
		return "ERROR - Missing /proc/cpuinfo";
	}

	open(CPUINFO, '<', "/proc/cpuinfo")
	  or return "ERROR - Cannot open /proc/cpuinfo";

	my $cpu_count = 0;

	while (<CPUINFO>)
	{
		chomp;
		next if $_ !~ /^processor/;
		$cpu_count++;
	}
	close(CPUINFO);
	return "$cpu_count";
}

### File exists check ####
# Simple a way to check if a file exists using the remote agent
#
# @return 0 when file exists.
# @return 1 when file does not exist.
sub rfile_exists
{
	chdir AGENT_RUN_DIR;
	my $checkFile = decrypt_param(@_);

	if (-e $checkFile)
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

##### Quick check to verify agent is up and running
# Used to quickly see if the agent is online, and if the keys match.
# The message that is sent to the agent must be hello, if not then
# it is intrepret as encryption key missmatch.
#
# @return 1 when encrypted message is not 'hello'
# @return 0 when check is ok.
sub quick_chk
{
	my $dec_check = &decrypt_param(@_);
	if ($dec_check ne 'hello')
	{
		logger "ERROR - Encryption key mismatch! Returning 1 to asker.";
		return 1;
	}
	return 0;
}

sub rcon_quit_postback_handler
{
	my ($type, $ip, $port, $command, $identifier, $response) = @_;
	logger "Rcon command of $command to a $type server";
	logger " at $ip:$port";
	logger " had a identifier of $identifier" if defined $identifier;
	logger " returned from the server with:\n$response\n";
}

### Return -10 If home path is not found.
### Return -9  If log type was invalid.
### Return -8  If log file was not found.
### 0 reserved for connection problems.
### Return 1;content If log found and screen running.
### Return 2;content If log found but screen is not running.
sub get_log
{
	my ($screen_type, $home_id, $home_path, $nb_of_lines) = decrypt_params(@_);

	if (!chdir $home_path)
	{
		logger "Can't change to server's install path [ $home_path ].";
		return -10;
	}

	if (   ($screen_type eq SCREEN_TYPE_UPDATE)
		&& ($screen_type eq SCREEN_TYPE_HOME))
	{
		logger "Invalid screen type '$screen_type'.";
		return -9;
	}

	my $screen_id = create_screen_id($screen_type, $home_id);
		
	my $log_file = Path::Class::File->new(SCREEN_LOGS_DIR, "screenlog.$screen_id");
	
	chmod 0644, $log_file;	
	
	# Create local copy of current log file if SCREEN_LOG_LOCAL = 1
	if(SCREEN_LOG_LOCAL == 1)
	{
		my $log_local = Path::Class::File->new($home_path, "LOG_$screen_type.txt");
		if ( -e $log_local )
		{
			unlink $log_local;
		}
		
		# Copy log file only if it's not an UPDATE type as it may contain steam credentials
		if($screen_type eq SCREEN_TYPE_HOME){
			copy($log_file, $log_local);
		}
	}
	
	# Regenerate the log file if it doesn't exist
	unless ( -e $log_file )
	{
		if (open(NEWLOG, '>', $log_file))
		{
			logger "Log file missing, regenerating: " . $log_file;
			print NEWLOG "Log file missing, started new log\n";
			close(NEWLOG);
		}
		else
		{
			logger "Cannot regenerate log file in " . $log_file . " : $!";
			return -8;
		}
	}
	
	# Return a few lines of output to the web browser
	my(@modedlines) = `tail -n $nb_of_lines $log_file`;
	
	my $linecount = 0;
	
	foreach my $line (@modedlines) {
		#Text replacements to remove the Steam user login from steamcmd logs for security reasons.
		$line =~ s/login .*//g;
		$line =~ s/Logging .*//g;
		$line =~ s/set_steam_guard_code.*//g;
		$line =~ s/force_install_dir.*//g;
		#Text replacements to remove empty lines.
		$line =~ s/^ +//g;
		$line =~ s/^\t+//g;
		$line =~ s/^\e+//g;
		#Remove � from console output when master server update is running.
		$line =~ s/�//g;
		$modedlines[$linecount]=$line;
		$linecount++;
	} 
	
	my $encoded_content = encode_list(@modedlines);
	chdir AGENT_RUN_DIR;
	if(is_screen_running_without_decrypt($screen_type, $home_id) == 1)
	{
		return "1;" . $encoded_content;
	}
	else
	{
		return "2;" . $encoded_content;
	}
}

# stop server function
sub stop_server
{
	chomp(@_);
	my ($home_id, $server_ip, $server_port, $control_protocol,
		$control_password, $control_type, $home_path) = decrypt_params(@_);
		
	my $startup_file =
	Path::Class::File->new(GAME_STARTUP_DIR, "$server_ip-$server_port");
	
	if (-e $startup_file)
	{
		logger "Removing startup flag " . $startup_file . "";
		unlink($startup_file)
		  or logger "Cannot remove the startup flag file $startup_file $!";
	}
	
	# Create file indicator that the game server has been stopped if defined
	if(defined($Cfg::Preferences{ogp_autorestart_server}) &&  $Cfg::Preferences{ogp_autorestart_server} eq "1"){
		
		# Get current directory and chdir into the game's home dir
		my $curDir = getcwd();
		chdir $home_path;

		# Create stopped indicator file used by autorestart of OGP if server crashes
		open(STOPFILE, '>', "SERVER_STOPPED");
		close(STOPFILE);
		
		# Return to original directory
		chdir $curDir;
	}
	
	return stop_server_without_decrypt($home_id, $server_ip,
									   $server_port, $control_protocol,
									   $control_password, $control_type);
}
##### Stop server without decrypt
### Return 1 when error occurred on decryption.
### Return 0 on success
sub stop_server_without_decrypt
{
	my ($home_id, $server_ip, $server_port, $control_protocol,
		$control_password, $control_type) = @_;
	
	my $screen_id = create_screen_id(SCREEN_TYPE_HOME, $home_id);
	my $get_screen_pid = "screen -list | grep $screen_id | cut -f1 -d'.' | sed '".'s/\W//g'."'";
	my $screen_pid = `$get_screen_pid`; 
	chomp $screen_pid;
	# Some validation checks for the variables.
	if ($server_ip =~ /^\s*$/ || $server_port < 0 || $server_port > 65535)
	{
		logger("Invalid IP:Port given $server_ip:$server_port.");
		return 1;
	}

	if ($control_password !~ /^\s*$/ and $control_protocol ne "")
	{
		if ($control_protocol eq "rcon")
		{
			use KKrcon::KKrcon;
			my $rcon = new KKrcon(
								  Password => $control_password,
								  Host	 => $server_ip,
								  Port	 => $server_port,
								  Type	 => $control_type
								 );

			my $rconCommand = "quit";
			$rcon->execute($rconCommand);
		}
		elsif ($control_protocol eq "rcon2")
		{
			use KKrcon::HL2;
			my $rcon2 = new HL2(
								  hostname => $server_ip,
								  port	 => $server_port,
								  password => $control_password,
								  timeout  => 2
								 );

			my $rconCommand = "quit";
			$rcon2->run($rconCommand);
		}
		system("screen -wipe");	
	}
	else
	{
		logger "Control protocol not supported. Using kill signal to stop the server.";
		my $screen_id = create_screen_id(SCREEN_TYPE_HOME, $home_id);
		system("cmd /C taskkill /f /fi 'PID eq $screen_pid' /T");
		system("screen -wipe");
	}
	
	if (is_screen_running_without_decrypt(SCREEN_TYPE_HOME, $home_id) == 1)
	{
		logger "Control protocol not responding. Using kill signal.";
		system("cmd /C taskkill /f /fi 'PID eq $screen_pid' /T");
		system("screen -wipe");
		logger "Server ID $home_id:Stopped server running on $server_ip:$server_port.";
		return 0;
	}
	else
	{
		logger "Server ID $home_id:Stopped server running on $server_ip:$server_port.";
		return 0;
	}
}

##### Send RCON command 
### Return 0 when error occurred on decryption.
### Return 1 on success
sub send_rcon_command
{
	my ($home_id, $server_ip, $server_port, $control_protocol,
		$control_password, $control_type, $rconCommand) = decrypt_params(@_);
	
	# legacy console
	if ($control_protocol eq "lcon")
	{
		my $screen_id = create_screen_id(SCREEN_TYPE_HOME, $home_id);
		system('screen -S '.$screen_id.' -p 0 -X stuff "'.$rconCommand.'$(printf \\\\r)"');
		logger "Sending legacy console command to ".$screen_id.": \n$rconCommand \n .";
		if ($? == 0)
		{
			my(@modedlines) = "$rconCommand";
			my $encoded_content = encode_list(@modedlines);
			return "1;" . $encoded_content;
		}
		return 0;
	}
	
	# Some validation checks for the variables.
	if ($server_ip =~ /^\s*$/ || $server_port < 0 || $server_port > 65535)
	{
		logger("Invalid IP:Port given $server_ip:$server_port.");
		return 0;
	}
	
	if ($control_password !~ /^\s*$/)
	{
		if ($control_protocol eq "rcon")
		{
			use KKrcon::KKrcon;
			my $rcon = new KKrcon(
								  Password => $control_password,
								  Host	 => $server_ip,
								  Port	 => $server_port,
								  Type	 => $control_type
								 );

			logger "Sending RCON command to $server_ip:$server_port: \n$rconCommand \n  .";
						
			my(@modedlines) = $rcon->execute($rconCommand);
			my $encoded_content = encode_list(@modedlines);
			return "1;" . $encoded_content;
		}
		else
		{		
			if ($control_protocol eq "rcon2")
			{
				use KKrcon::HL2;
				my $rcon2 = new HL2(
									  hostname => $server_ip,
									  port	 => $server_port,
									  password => $control_password,
									  timeout  => 2
									 );
				
				logger "Sending RCON command to $server_ip:$server_port: \n $rconCommand \n  .";
						
				my(@modedlines) = $rcon2->run($rconCommand);
				my $encoded_content = encode_list(@modedlines);
				return "1;" . $encoded_content;
			}
		}
	}
	else
	{
		logger "Control protocol PASSWORD NOT SET.";
		return -10;
	}
}

##### Returns a directory listing
### @return List of directories if everything OK.
### @return 0 If the directory is not found.
### @return -1 If cannot open the directory.
sub dirlist
{
	my ($datadir) = &decrypt_param(@_);
	logger "Asked for dirlist of $datadir directory.";
	if (!-d $datadir)
	{
		logger "ERROR - Directory [ $datadir ] not found!";
		return -1;
	}
	if (!opendir(DIR, $datadir))
	{
		logger "ERROR - Can't open $datadir: $!";
		return -2;
	}
	my @dirlist = readdir(DIR);
	closedir(DIR);
	return join(";", @dirlist);
}

##### Returns a directory listing with extra info the filemanager
### @return List of directories if everything OK.
### @return 0 If the directory is empty.
### @return -1 If the directory is not found.
### @return -2 If cannot open the directory.
sub dirlistfm
{
	my $datadir = &decrypt_param(@_);
	logger "Asked for dirlist of $datadir directory.";
	if (!-d $datadir)
	{
		logger "ERROR - Directory [ $datadir ] not found!";
		return -1;
	}
	if (!opendir(DIR, $datadir))
	{
		logger "ERROR - Can't open $datadir: $!";
		return -2;
	}
	chdir($datadir);
	my @dirlist = readdir(DIR);

	if (@dirlist eq 0)
	{
		logger "Empty directory $datadir.";
		return 0;
	}

	@dirlist = sort @dirlist;

	my $dirlist;
	my @dl;
	my (
		$dev,  $ino,   $mode,  $nlink, $uid,	 $gid, $rdev,
		$size, $atime, $mtime, $ctime, $blksize, $blocks
	   );
	foreach $dirlist (@dirlist)
	{

		#skip the . and .. special dirs
		next if $dirlist eq '.';
		next if $dirlist eq '..';

		#print "Dir list is" . $dirlist."\n";
		#Stat the file to get ownership and size
		(
		 $dev,  $ino,   $mode,  $nlink, $uid,	 $gid, $rdev,
		 $size, $atime, $mtime, $ctime, $blksize, $blocks
		) = stat($dirlist);
		$uid = getpwuid($uid);
		$gid = getgrgid($gid);

		#This if else logic determines what it is, File, Directory, other
		#We modify the @dl array by adding file info to each element
		if (-T $dirlist)
		{

			# print "File\n";
			push(@dl,
				 $dirlist . "|" . "$size" . "|" . "$uid" . "|" . "$gid" . "|"
				   . "F");
		}
		elsif (-d $dirlist)
		{

			# print "Dir\n";
			push(@dl,
				 $dirlist . "|" . "$size" . "|" . "$uid" . "|" . "$gid" . "|"
				   . "D");
		}
		elsif (-B $dirlist)
		{

			#print "File\n";
			push(@dl,
				 $dirlist . "|" . "$size" . "|" . "$uid" . "|" . "$gid" . "|"
				   . "B");
		}
		else
		{

			#print "Unknown\n";
			push(@dl,
				 $dirlist . "|" . "$size" . "|" . "$uid" . "|" . "$gid" . "|"
				   . "U");
		}

	}
	closedir(DIR);

	#Now we return it to the webpage, which then can parse it further
	return join(";", @dl);
}

###### Returns the contents of a text file
sub readfile
{
	chdir AGENT_RUN_DIR;
	my $userfile = &decrypt_param(@_);

	unless ( -e $userfile )
	{
		if (open(BLANK, '>', $userfile))
		{
			close(BLANK);
		}
	}
	
	if (!open(USERFILE, '<', $userfile))
	{
		logger "ERROR - Can't open file $userfile for reading.";
		return -1;
	}

	my ($wholefile, $buf);

	while (read(USERFILE, $buf, 60 * 57))
	{
		$wholefile .= encode_base64($buf);
	}
	close(USERFILE);
	
	if(!defined $wholefile)
	{
		return "1; ";
	}
	
	return "1;" . $wholefile;
}

###### Backs up file, then writes data to new file
### @return 1 On success
### @return 0 In case of a failure
sub writefile
{
	chdir AGENT_RUN_DIR;
	# $writefile = file we're editing, $filedata = the contents were writing to it
	my ($writefile, $filedata) = &decrypt_params(@_);
	if (!-e $writefile)
	{
		open FILE, ">", $writefile;
	}
	else
	{
		# backup the existing file
		logger
		  "Backing up file $writefile to $writefile.bak before writing new data.";
		if (!copy("$writefile", "$writefile.bak"))
		{
			logger
			  "ERROR - Failed to backup $writefile to $writefile.bak. Error: $!";
			return 0;
		}
	}
	if (!-w $writefile)
	{
		logger "ERROR - File [ $writefile ] is not writeable!";
		return 0;
	}
	if (!open(WRITER, '>', $writefile))
	{
		logger "ERROR - Failed to open $writefile for writing.";
		return 0;
	}
	$filedata = decode_base64($filedata);
	$filedata =~ s/\r//g;
	print WRITER "$filedata";
	close(WRITER);
	logger "Wrote $writefile successfully!";
	return 1;
}

# Determine the os of the agent machine.
sub what_os
{
	my $os;
	logger "Asking for OS type";
	if (-e "/usr/bin/uname")
	{
		$os = `/usr/bin/uname`;
		chomp $os;
		logger "OS is $os";
		return "$os";
	}
	elsif (-e "/bin/uname")
	{
		$os = `/bin/uname`;
		chomp $os;
		logger "OS is $os";
		return "$os";
	}
	elsif (-e 'c:\\')
	{
		logger "OS is Windows";
		return "Windows";
	}
	else
	{
		logger "Cannot determine OS..that is odd";
		return "Unknown";
	}
}

### @return PID of the download process if started succesfully.
### @return -1 If could not create temporary download directory.
### @return -2 If could not create destination directory.
### @return -3 If resources unavailable.
sub start_file_download
{
	my ($url, $destination, $filename, $action, $post_script) = &decrypt_params(@_);
	logger
	  "Starting to download URL $url. Destination: $destination - Filename: $filename";

	if (!-e $destination)
	{
		logger "Creating destination directory.";
		if (!mkpath $destination )
		{
			logger "Could not create destination '$destination' directory : $!";
			return -2;
		}
	}
	
	my $download_file_path = Path::Class::File->new($destination, "$filename");

	my $pid = fork();
	if (not defined $pid)
	{
		logger "Could not allocate resources for download.";
		return -3;
	}

	# Only the forked child goes here.
	elsif ($pid == 0)
	{
		my $get_retval = getstore($url, "$download_file_path");

		if (!is_success($get_retval))
		{
			logger
			  "Unable to fetch $url, or save to $download_file_path. Retval: $get_retval";
			exit(0);
		}

		logger
		  "Successfully fetched $url and stored it to $download_file_path. Retval: $get_retval.";

		if (!-e $download_file_path)
		{
			logger "File $download_file_path does not exist.";
			exit(0);
		}

		if ($action eq "uncompress")
		{
			logger "Starting file uncompress as ordered.";
			uncompress_file_without_decrypt($download_file_path,
											$destination);
		}

		# Child process must exit.
		exit(0);
	}
	else
	{
		if ($post_script ne "")
		{
			logger "Running postscript commands.";
			my @postcmdlines = split /[\r\n]+/, $post_script;
			my $postcmdfile = $destination."/".'postinstall.sh';
			open  FILE, '>', $postcmdfile;
			print FILE "cd $destination\n";
			print FILE "while kill -0 $pid >/dev/null 2>&1\n";
			print FILE "do\n";
			print FILE "	sleep 1\n";
			print FILE "done\n";
			foreach my $line (@postcmdlines) {
				print FILE "$line\n";
			}
			print FILE "rm -f $destination/postinstall.sh\n";
			close FILE;
			chmod 0755, $postcmdfile;
			my $screen_id = create_screen_id("post_script", $pid);
			my $cli_bin = create_screen_cmd($screen_id, "bash $postcmdfile");
			system($cli_bin);
		}
		logger "Download process for $download_file_path has pid number $pid.";
		return "$pid";
	}
}

sub check_b4_chdir
{
	my ( $path ) = @_;
		
	if (!-e $path)
	{
		logger "$path does not exist yet. Trying to create it...";

		if (!mkpath($path))
		{
			logger "Error creating $path . Errno: $!";
			return -1;
		}
	}
	
	if (!chdir $path)
	{
		logger "Unable to change dir to '$path'.";
		return -1;
	}
	
	return 0;
}

sub create_bash_scripts
{
	my ( $home_path, $bash_scripts_path, $precmd, $postcmd, @installcmds ) = @_;
	
	my @precmdlines = split /[\r\n]+/, $precmd;
	my $precmdfile = 'preinstall.sh';
	open  FILE, '>', $precmdfile;
	print FILE "cd $home_path\n";
	foreach my $line (@precmdlines) {
		print FILE "$line\n";
	}
	close FILE;
	chmod 0755, $precmdfile;
	
	my @postcmdlines = split /[\r\n]+/, $postcmd;
	my $postcmdfile = 'postinstall.sh';
	open  FILE, '>', $postcmdfile;
	print FILE "cd $home_path\n";
	foreach my $line (@postcmdlines) {
		print FILE "$line\n";
	}
	print FILE "cd $bash_scripts_path\n";
	print FILE "rm -f preinstall.sh\n";
	print FILE "rm -f postinstall.sh\n";
	print FILE "rm -f runinstall.sh\n";
	close FILE;
	chmod 0755, $postcmdfile;
	
	my $installfile = 'runinstall.sh';
	open  FILE, '>', $installfile;
	print FILE "#!/bin/bash\n";
	print FILE "cd $bash_scripts_path\n";
	print FILE "./$precmdfile\n";
	foreach my $installcmd (@installcmds)
	{
		print FILE "$installcmd\n";
	}
	print FILE "wait ".'${!}'."\n";
	print FILE "cd $bash_scripts_path\n";
	print FILE "./$postcmdfile\n";
	close FILE;
	chmod 0755, $installfile;
	
	return $installfile;
}

#### Run the rsync update ####
### @return 1 If update started
### @return 0 In error case.
sub start_rsync_install
{
	my ($home_id, $home_path, $url, $exec_folder_path, $exec_path, $precmd, $postcmd) = decrypt_params(@_);

	if ( check_b4_chdir($home_path) != 0)
	{
		return 0;
	}

	my $bash_scripts_path = MANUAL_TMP_DIR . "/home_id_" . $home_id;
	
	if ( check_b4_chdir($bash_scripts_path) != 0)
	{
		return 0;
	}
	
	# Rsync install require the rsync binary to exist in the system
	# to enable this functionality.
	my $rsync_binary = Path::Class::File->new("/usr/bin", "rsync");
	
	if (!-f $rsync_binary)
	{
		logger "Failed to start rsync update from "
		  . $url
		  . " to $home_path. Error: Rsync client not installed.";
		return 0;
	}

	my $screen_id = create_screen_id(SCREEN_TYPE_UPDATE, $home_id);
	
	my $log_file = Path::Class::File->new(SCREEN_LOGS_DIR, "screenlog.$screen_id");
	
	backup_home_log( $home_id, $log_file );
	
	my @installcmds = ("/usr/bin/rsync --archive --compress --copy-links --update --verbose rsync://$url $home_path", 
					   "cd $home_path",
					   "chmod -Rf 755 $home_path",
					   "find -iname \\\*.exe -exec chmod -f +x {} \\\;", 
					   "find -iname \\\*.bat -exec chmod -f +x {} \\\;");
	my $installfile = create_bash_scripts( $home_path, $bash_scripts_path, $precmd, $postcmd, @installcmds );

	my $screen_cmd = create_screen_cmd($screen_id, "./$installfile");
	logger "Running rsync update: /usr/bin/rsync --archive --compress --copy-links --update --verbose rsync://$url $home_path";
	system($screen_cmd);
	
	chdir AGENT_RUN_DIR;
	return 1;
}

### @return PID of the download process if started succesfully.
### @return -1 If could not create temporary download directory.
### @return -2 If could not create destination directory.
### @return -3 If resources unavailable.
sub master_server_update
{
	my ($home_id,$home_path,$ms_home_id,$ms_home_path,$exec_folder_path,$exec_path,$precmd,$postcmd) = decrypt_params(@_);
	
	if ( check_b4_chdir($home_path) != 0)
	{
		return 0;
	}
			
	my $bash_scripts_path = MANUAL_TMP_DIR . "/home_id_" . $home_id;
	
	if ( check_b4_chdir($bash_scripts_path) != 0)
	{
		return 0;
	}

	my $screen_id = create_screen_id(SCREEN_TYPE_UPDATE, $home_id);
	
	my $log_file = Path::Class::File->new(SCREEN_LOGS_DIR, "screenlog.$screen_id");
	
	backup_home_log( $home_id, $log_file );
	
	my @installcmds = ("cp -vuRf  $ms_home_path/* $home_path");
	my $installfile = create_bash_scripts( $home_path, $bash_scripts_path, $precmd, $postcmd, @installcmds );

	my $screen_cmd = create_screen_cmd($screen_id, "./$installfile");
	logger "Running master server update: cp -vuRf  $ms_home_path/* $home_path";
	system($screen_cmd);
	
	chdir AGENT_RUN_DIR;
	return 1;
}

#### Run the steam client ####
### @return 1 If update started
### @return 0 In error case.
sub steam_cmd
{
	my ($home_id, $home_path, $mod, $modname, $betaname, $betapwd, $user, $pass, $guard, $exec_folder_path, $exec_path, $precmd, $postcmd) = decrypt_params(@_);
	
	# Creates home path if it doesn't exist
	if ( check_b4_chdir($home_path) != 0)
	{
		return 0;
	}
  
    # Changes into root steamcmd OGP directory
	if ( check_b4_chdir(STEAMCMD_CLIENT_DIR) != 0)
	{
		return 0;
	}
	
	my $screen_id = create_screen_id(SCREEN_TYPE_UPDATE, $home_id);
	my $screen_id_for_txt_update = substr ($screen_id, rindex($screen_id, '_') + 1);
	my $steam_binary = Path::Class::File->new(STEAMCMD_CLIENT_DIR, "steamcmd.exe");
	my $installSteamFile = $screen_id_for_txt_update . "_install.txt";
	
	my $windows_home_path = `cygpath -wa $home_path`;
	chop $windows_home_path;
	
	my $installtxt = Path::Class::File->new($installSteamFile);
	
	open  FILE, '>', $installtxt;
	print FILE "\@ShutdownOnFailedCommand 1\n";
	print FILE "\@NoPromptForPassword 1\n";
	if($guard ne '')
	{	
		print FILE "set_steam_guard_code $guard\n";
	}
	if($user ne '' && $user ne 'anonymous')
	{
		print FILE "login $user $pass\n";
	}
	else
	{
		print FILE "login anonymous\n";
	}
	
	print FILE "force_install_dir $windows_home_path\n";
	
	if($modname ne "")
	{
		print FILE "app_set_config $mod mod $modname\n"
	}

	if($betaname ne "" && $betapwd ne "")
	{
		print FILE "app_update $mod -beta $betaname -betapassword $betapwd validate\n";
	}
	elsif($betaname ne "" && $betapwd eq "")
	{
		print FILE "app_update $mod -beta $betaname validate\n";
	}
	else
	{
		print FILE "app_update $mod validate\n";
	}
	
	print FILE "exit\n";
	close FILE;
  
    my $bash_scripts_path = MANUAL_TMP_DIR . "/home_id_" . $home_id;
	
	if ( check_b4_chdir($bash_scripts_path) != 0)
	{
		return 0;
	}
	
	my $log_file = Path::Class::File->new(SCREEN_LOGS_DIR, "screenlog.$screen_id");
	backup_home_log( $home_id, $log_file );
	
	my $postcmd_mod = $postcmd;
	my @installcmds = ("$steam_binary +runscript $installtxt +exit");
	my $installfile = create_bash_scripts( $home_path, $bash_scripts_path, $precmd, $postcmd_mod, @installcmds );
	
	my $screen_cmd = create_screen_cmd($screen_id, "./$installfile");
	logger "Running steam update: $steam_binary +runscript $installtxt +exit";
	system($screen_cmd);

	return 1;
}

sub rsync_progress
{
	my ($running_home) = &decrypt_param(@_);
	logger "User requested progress on rsync job on home $running_home.";
	if (-r $running_home)
	{
		$running_home =~ s/\s/\\ /g;
		my $progress = `du -sk $running_home`;
		chomp($progress);
		my ($bytes, $junk) = split(/\s+/, $progress);
		logger("Found $bytes and $junk");
		return $bytes;
	}
	return "0";
}

sub is_file_download_in_progress
{
	my ($pid) = &decrypt_param(@_);
	logger "User requested if download is in progress with pid $pid.";
	my @pids = `ps -ef`;
	@pids = grep(/$pid/, @pids);
	logger "Number of pids for file download: @pids";
	if (@pids > '0')
	{
		return 1;
	}
	return 0;
}

### \return 1 If file is uncompressed succesfully.
### \return 0 If file does not exist.
### \return -1 If file could not be uncompressed.
sub uncompress_file
{
	return uncompress_file_without_decrypt(decrypt_params(@_));
}

sub uncompress_file_without_decrypt
{

	# File must include full path.
	my ($file, $destination) = @_;

	logger "Uncompression called for file $file to dir $destination.";

	if (!-e $file)
	{
		logger "File $file could not be found for uncompression.";
		return 0;
	}

	if (!-e $destination)
	{
		mkpath($destination, {error => \my $err});
		if (@$err)
		{
			logger "Failed to create destination dir $destination.";
			return 0;
		}
	}

	my $ae = Archive::Extract->new(archive => $file);

	if (!$ae)
	{
		logger "Could not create archive instance for file $file.";
		return -1;
	}

	my $ok = $ae->extract(to => $destination);

	if (!$ok)
	{
		logger "File $file could not be uncompressed.";
		return -1;
	}

	system("chmod -Rf 755 $destination");
	system("cd $destination && find -iname \\\*.exe -exec chmod -f +x {} \\\;");
	system("cd $destination && find -iname \\\*.bat -exec chmod -f +x {} \\\;");

	logger "File uncompressed/extracted successfully.";
	return 1;

	# TODO: This is still WIP. Remove lines above to continue.

	my $common_path = '';

	# TODO: These might not work on all systems if dir separator isn't /
	if ($ae->files->[0] =~ /^.*\/$/)
	{
		$common_path = $ae->files->[0];
	}
	else
	{
		my @file_path_tmp = split('/', $ae->files->[0]);

		if (@file_path_tmp > 1)
		{
			$common_path = $file_path_tmp[0] . '/';
		}
	}

	if ($common_path ne '')
	{
		my $match = 1;

		my $file_list = $ae->files;

		# Check that every file contains the common path.
		foreach (@$file_list)
		{
			next if (s!$common_path!$_!);

			logger "File mismatch: $_ to $common_path";
			$match = 0;
			last;
		}

		# If all files did not include the common path we should extract
		# the file to the home. Reset path.
		if ($match != 1)
		{
			$common_path = '';
		}

		logger "Common path is: $common_path";
	}

	#local $File::Copy::Recursive::SkipFlop = 1;
	#my ($num_of_f_and_d,$nb_of_d,$depth_traversed) = dircopy("teamspeak3-server_linux-x86/", "copy/");
	#logger "$num_of_f_and_d,$nb_of_d,$depth_traversed";

	logger "File uncompressed/extracted successfully.";
	return 1;
}

sub discover_ips
{
	my ($check) = decrypt_params(@_);

	if ($check ne "chk")
	{
		logger "Invalid parameter '$check' given for discover_ips function.";
		return "";
	}
	
	my $iplist = "";
	
	my @data = `ipconfig /all`;

	foreach my $temp (@data)
	{
		if ($temp =~ /ip.+: (\d+\.\d+\.\d+\.\d+)/si)
		{
			chomp $1;
			logger "Found an IP $1";
			$iplist .= "$1,";
		}
	}
	logger "IPlist is $iplist";
	chop $iplist;
	return "$iplist";
}

### Return -1 In case of invalid param
### Return 1;content in case of success
sub mon_stats
{
	my ($mon_stats) = decrypt_params(@_);
	if ($mon_stats ne "mon_stats")
	{
		logger "Invalid parameter '$mon_stats' given for $mon_stats function.";
		return -1;
	}

	my @disk			= `df -hP -x tmpfs`;
	my $encoded_content = encode_list(@disk);
	my @uptime		  = `net stats srv`;
	$encoded_content .= encode_list(@uptime);
	return "1;$encoded_content";
}

sub exec
{
	my ($command) = decrypt_params(@_);
	my @cmdret		   = `$command`;
	my $encoded_content = encode_list(@cmdret);
	logger "$command sent.";
	return "1;$encoded_content";
}

# used in conjunction with the clone_home feature in the web panel
# this actually does the file copies
sub clone_home
{
	my ($source_home, $dest_home, $owner) = decrypt_params(@_);
	my ($time_start, $time_stop, $time_diff);
	logger "Copying from $source_home to $dest_home...";

	# check size of source_home, make sure we have space to copy
	if (!-e $source_home)
	{
		logger "ERROR - $source_home does not exist";
		return 0;
	}
	logger "Game home $source_home exists...copy will proceed";

	# start the copy, and a timer
	$time_start = time();
	if (!dircopy("$source_home", "$dest_home"))
	{
		$time_stop = time();
		$time_diff = $time_stop - $time_start;
		logger
		  "Error occured after $time_diff seconds during copy of $source_home to $dest_home - $!";
		return 0;
	}
	else
	{
		$time_stop = time();
		$time_diff = $time_stop - $time_start;
		logger
		  "Home clone completed successfully to $dest_home in $time_diff seconds";
		logger "Using chown -R $owner $dest_home to set home ownership";
		`chown -R $owner $dest_home`;
		return 1;
	}

	# caputre copy return code, stop timer

	# return to success/fail
}

# used to delete the game home from the file system when it's removed from the panel
sub remove_home
{
	my ($home_path_del) = decrypt_params(@_);

	if (!-e $home_path_del)
	{
		logger "ERROR - $home_path_del does not exist...nothing to do";
		return 0;
	}

	sleep 1 while ( !pathrmdir("$home_path_del") );

	logger "Deletetion of $home_path_del successful!";
	return 1;
}

### Restart the server
## return -2 CANT STOP
## return -1  CANT START (no startup file found that mach the home_id, port and ip)
## return 1 Restart OK
sub restart_server
{
	my ($home_id, $server_ip, $server_port, $control_protocol,
		$control_password, $control_type, $home_path, $server_exe, $run_dir,
		$cmd, $cpu, $nice) = decrypt_params(@_);

	if (stop_server_without_decrypt($home_id, $server_ip, 
									$server_port, $control_protocol,
									$control_password, $control_type) == 0)
	{
		if (universal_start_without_decrypt($home_id, $home_path, $server_exe, $run_dir,
											$cmd, $server_port, $server_ip, $cpu, $nice) == 1)
		{
			return 1;
		}
		else
		{
			return -1;
		}
	}
	else
	{
		return -2;
	}
}

sub sudo_exec
{
	my $sudo_exec = &decrypt_param(@_);
	return sudo_exec_without_decrypt($sudo_exec);
}

sub sudo_exec_without_decrypt
{
	my ($command) = @_;
	my @cmdret = `$command`;
	logger "Executed: $command";
	my $encoded_content = encode_list(@cmdret);
	if ($? == 0)
	{
		return "1;$encoded_content";
	}
	return 0;
}

sub secure_path
{   
	my ($action, $file_path) = decrypt_params(@_);

	if($action eq "chattr+i")
	{
		return "1;";
	}
	elsif($action eq "chattr-i")
	{
		return "1;";
	}
}

sub get_chattr
{   
	my ($file_path) = decrypt_params(@_);
	return "1;";
}

sub ftp_mgr
{
	my ($action, $login, $password, $home_path) = decrypt_params(@_);
	my $ogp_user = `echo \$USERNAME`;
	chomp $ogp_user;
	
	if(!defined($Cfg::Preferences{ogp_manages_ftp}) || (defined($Cfg::Preferences{ogp_manages_ftp}) &&  $Cfg::Preferences{ogp_manages_ftp} eq "1")){
	
		if($action eq "list")
		{
			return sudo_exec_without_decrypt("pure-pw list");
		}
		elsif($action eq "userdel")
		{
			return sudo_exec_without_decrypt("pure-pw userdel ".$login." && pure-pw mkdb");
		}
		elsif($action eq "useradd")
		{
			return sudo_exec_without_decrypt("(echo ".$password."; echo ".$password.") | pure-pw useradd ".$login." -u ".$ogp_user." -d ".$home_path." && pure-pw mkdb");
		}
		elsif($action eq "passwd")
		{
			return sudo_exec_without_decrypt("(echo ".$password."; echo ".$password.") | pure-pw passwd ".$login." && pure-pw mkdb");
		}
		elsif($action eq "show")
		{
			return sudo_exec_without_decrypt("pure-pw show ".$login);
		}
		elsif($action eq "usermod")
		{
			my $update_account = "pure-pw usermod " . $login . " -u " . $ogp_user;
			
			my @account_settings = split /[\n]+/, $password;
			
			foreach my $setting (@account_settings) {
				my ($key, $value) = split /[\t]+/, $setting;
				
				if( $key eq 'Directory' )
				{
					$update_account .= " -d " . $value;
				}
					
				if( $key eq 'Full_name' )
				{
					if(  $value ne "" )
					{
						$update_account .= " -c " . $value;
					}
					else
					{
						$update_account .= ' -c ""';
					}
				}
				
				if( $key eq 'Download_bandwidth' && $value ne ""  )
				{
					my $Download_bandwidth;
					if($value eq 0)
					{
						$Download_bandwidth = "\"\"";
					}
					else
					{
						$Download_bandwidth = $value;
					}
					$update_account .= " -t " . $Download_bandwidth;
				}
				
				if( $key eq 'Upload___bandwidth' && $value ne "" )
				{
					my $Upload___bandwidth;
					if($value eq 0)
					{
						$Upload___bandwidth = "\"\"";
					}
					else
					{
						$Upload___bandwidth = $value;
					}
					$update_account .= " -T " . $Upload___bandwidth;
				}
				
				if( $key eq 'Max_files' )
				{
					if( $value eq "0" )
					{
						$update_account .= ' -n ""';
					}
					elsif( $value ne "" )
					{
						$update_account .= " -n " . $value;
					}
					else
					{
						$update_account .= ' -n ""';
					}
				}
									
				if( $key eq 'Max_size' )
				{
					if( $value ne "" )
					{
						$update_account .= " -N " . $value;
					}
					else
					{
						$update_account .= ' -N ""';
					}
				}
									
				if( $key eq 'Ratio' && $value ne ""  )
				{
					my($upload_ratio,$download_ratio) = split/:/,$value;
					
					if($upload_ratio eq "0")
					{
						$upload_ratio = "\"\"";
					}
					$update_account .= " -q " . $upload_ratio;
					
					if($download_ratio eq "0")
					{
						$download_ratio = "\"\"";
					}
					$update_account .= " -Q " . $download_ratio;
				}
				
				if( $key eq 'Allowed_client_IPs' )
				{
					if( $value ne "" )
					{
						$update_account .= " -r " . $value;
					}
					else
					{
						$update_account .= ' -r ""';
					}
				}
									
				if( $key eq 'Denied__client_IPs' )
				{
					if( $value ne "" )
					{
						$update_account .= " -R " . $value;
					}
					else
					{
						$update_account .= ' -R ""';
					}
				}
				
				if( $key eq 'Allowed_local__IPs' )
				{
					if( $value ne "" )
					{
						$update_account .= " -i " . $value;
					}
					else
					{
						$update_account .= ' -i ""';
					}
				}
									
				if( $key eq 'Denied__local__IPs' )
				{
					if( $value ne "" )
					{
						$update_account .= " -I " . $value;
					}
					else
					{
						$update_account .= ' -I ""';
					}
				}
				
					
				if( $key eq 'Max_sim_sessions' && $value ne "" )
				{
					$update_account .= " -y " . $value;
				}
				
				if ( $key eq 'Time_restrictions'  )
				{
					if( $value eq "0000-0000")
					{
						$update_account .= ' -z ""';
					}
					elsif( $value ne "" )
					{
						$update_account .= " -z " . $value;
					}
					else
					{
						$update_account .= ' -z ""';
					}
				}
			}
			$update_account .=" && pure-pw mkdb";
			# print $update_account;
			return sudo_exec_without_decrypt($update_account);
		}
	}
	return 0;
}
