#!/usr/bin/perl -w
#
# KKrcon - Text-mode Rcon client for Half-Life and Quake 1/2/3 game servers.
# http://kkrcon.sourceforge.net
#
# Copyright (C) 2000, 2001  Rod May
# 
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
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

##
## Settings
## - Here you can set default values for the options. All of these values can
##   be overridden on the command line.
##

# $address - Set to the hostname or IP address of the game server.
# $port    - Set to the port number of the game server.
$address = "127.0.0.1";
$port    = 27015;

# $password - If you want to set a default password you can here. Otherwise
#             kkrcon will die if no password is given on the command line.
$password = "";

# $type - Game server type. Either "new" (Half-Life v1106+) or "old" (Quake1/2/3
#         and old Half-Life).
$type = "new";


#
# ---- NO NEED TO EDIT BELOW THIS LINE ----
#

use Getopt::Long;
use KKrcon;

# If the above line fails try commenting it out and giving an explicit path
# to the module file using the line below:
#require "./KKrcon.pm"

$| = 1; # disable output buffering
Getopt::Long::Configure ("bundling");



##
## Functions
##

sub execute
{
	my ($command) = @_;
	
	print $rcon->execute($command);
	
	if (my $error = $rcon->error())
	{
		print "Error: $error\n";
		return 1;
	}
	else
	{
		return 0;
	}
}


##
## Main
##

# Initialisation

$VERSION = "2.11";

# Options

$opt_help = 0;
$opt_version = 0;

# Usage message

$usage = <<EOT
Usage: kkrcon.pl [OPTION]... password [rcon_command [arg]...]
Text-mode Rcon client for Half-Life and Quake 1/2/3 game servers.

  -h, --help                      display this help and exit
  -v, --version                   output version information and exit
  -a, --address                   IP address or hostname of game server [$address]
  -p, --port                      Port of game server [$port]
  -t, --type                      Game server type:
                                     "new" - Half-Life version 1.1.0.6 or newer
                                     "old" - Quake 1/2/3 or old Half-Life
      password                    Game server rcon_password [$password]
      rcon_command                Command to execute on the game server. If no
                                     rcon_command is given, the user will be
                                     prompted interactively.

Long options can be abbreviated, where such abbreviation is not ambiguous.
Default values for options are indicated in square brackets [...].

KKrcon: http://kkrcon.sourceforge.net
EOT
;

# Read Command Line Arguments

GetOptions(
	"help|h"			=> \$opt_help,
	"version|v"			=> \$opt_version,
	"address|a=s"		=> \$address,
	"port|p=i"			=> \$port,
	"type|t=s"			=> \$type
) or die($usage);

if ($opt_help)
{
	print $usage;
	exit(0);
}

if ($opt_version)
{
	print "kkrcon.pl (KKrcon) $VERSION using KKrcon module $KKrcon::VERSION\n\n"
		. "Text-mode Rcon client for Half-Life and Quake 1/2/3 game servers.\n\n"
		. "Copyright (C) 2000, 2001  Rod May\n"
		. "This is free software; see the source for copying conditions.  There is NO\n"
		. "warranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.\n";
	exit(0);
}

$type = lc($type);
if ($type ne "new" && $type ne "old")
{
	print "Unrecognised game server type \"$type\": using \"new\" instead\n";
	$type = "new";
}

my ($password) = shift;
unless ($password)
{
	print "You need to specify a password!\n";
	die($usage);
}

$command = join(" ", @ARGV);


#
# Start
#

$rcon = new KKrcon(
	Host => $address,
	Port => $port,
	Password => $password,
	Type => $type
);

$result = 0;
$interactive = 1 unless ($command);

if ($interactive)
{
	print "KKrcon version $VERSION running in interactive mode\n\n"
		. "Server: $address\n"
		. "Port:   $port\n\n"
		. "Type 'q' to quit.\n\n";
}

while (1)
{
	if ($interactive)
	{
		print "kkrcon> ";
		
		$command = <STDIN>;
		
		if (!defined($command))
		{
			# catch Ctrl+D
			print "\n";
			exit(0);
		}
		
		chomp($command);
		
		if ( $command =~ /^\s*$/ ){ next; }
	    if ( $command eq "q" )    { exit(0); }
	    if ( $command eq "quit" ) { print "Type 'DIE' for server quit, or 'q' to quit kkrcon\n"; next; }
	    if ( $command eq "DIE" )  { print "\nquit sent\n"; $command = "quit"; }
	}
	
	$result = &execute($command);
	
	exit($result) unless ($interactive);
}

# end
