package KKrcon;
#
# KKrcon Perl Module - execute commands on a remote Half-Life server using Rcon.
# http://kkrcon.sourceforge.net
#
# Synopsis:
#
#   use KKrcon;
#   $rcon = new KKrcon(Password=>PASSWORD, [Host=>HOST], [Port=>PORT], [Type=>"new"|"old"]);
#   $result  = $rcon->execute(COMMAND);
#   %players = $rcon->getPlayers();
#   $player  = $rcon->getPlayer(USERID);
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

use Socket;
use Sys::Hostname;

# Release version number
$VERSION = "2.11";


##
## Main
##

#
# Constructor
#

sub new
{
	my $class_name = shift;
	my %params = @_;
	
	my $self = {};
	bless($self, $class_name);
	
	my %server_types = (new=>1, old=>2);
	
	# Check parameters
	$params{"Host"} = "127.0.0.1"  unless($params{"Host"});
	$params{"Port"} = 27015        unless($params{"Port"});
	$params{"Type"} = "new"        unless($params{"Type"});
	
	# Initialise properties
	$self->{"rcon_password"} = $params{"Password"}
		or die("KKrcon: a Password is required\n");
	$self->{"server_host"} = $params{"Host"};
	$self->{"server_port"} = int($params{"Port"})
		or die("KKrcon: invalid Port \"" . $params{"Port"} . "\"\n");
	$self->{"server_type"} = ($server_types{$params{"Type"}} || 1);
	
	$self->{"error"} = "";
	
	# Set up socket parameters
	$self->{"_proto"}  = getprotobyname('udp');
	$self->{"_ipaddr"} = gethostbyname($self->{"server_host"})
		or die("KKrcon: could not resolve Host \"" . $self->{"server_host"} . "\"\n");
	
	return $self;
}



#
# Execute an Rcon command and return the response
#

sub execute
{
	my ($self, $command) = @_;
	
	my $msg;
	my $ans;

	if ($self->{"server_type"} == 1)
	{
		# version x.1.0.6+ HL server
		$msg = "\xFF\xFF\xFF\xFFchallenge rcon\n\0";
		$ans = $self->_sendrecv($msg);
		
		if ($ans =~ /challenge +rcon +(\d+)/)
		{
			$msg = "\xFF\xFF\xFF\xFFrcon $1 \"" . $self->{"rcon_password"} . "\" $command\0";
			$ans = $self->_sendrecv($msg);
		}
		elsif (!$self->error())
		{
			$ans = "";
			$self->{"error"} = "No challenge response";
		}
	}
	else
	{
		# QW/Q2/Q3 or old HL server
		$msg = "\xFF\xFF\xFF\xFFrcon " . $self->{"rcon_password"} . " $command\n\0";
		$ans = $self->_sendrecv($msg);
	}
	
	if ($ans =~ /bad rcon_password/i)
	{
		$self->{"error"} = "Bad Password";
	}
	
	return $ans;
}

sub _sendrecv
{
	my ($self, $msg) = @_;
	
	my $host = $self->{"server_host"};
	my $port = $self->{"server_port"};
	my $ipaddr = $self->{"_ipaddr"};
	my $proto  = $self->{"_proto"};
	
	# Open socket
	socket(RCON, PF_INET, SOCK_DGRAM, $proto)
		or die("KKrcon: socket: $!\n");
	
	# bind causes problems if hostname() gets wrong interface...
	# and it doesn't seem to be necessary
	#
	#my $iaddr = gethostbyname(hostname());
	#my $paddr = sockaddr_in(0, $iaddr);
	#bind(RCON, $paddr)
	#	or die("KKrcon: bind: $!\n");
	
	my $hispaddr = sockaddr_in($port, $ipaddr);
	
	unless(defined(send(RCON, $msg, 0, $hispaddr)))
	{
		die("KKrcon: send $ip:$port : $!");
	}

	my $rin = "";
	vec($rin, fileno(RCON), 1) = 1;
	
	my $ans = "TIMEOUT";
	if (select($rin, undef, undef, 10.0))
	{
		$ans = "";
		$hispaddr = recv(RCON, $ans, 8192, 0);
		$ans =~ s/\x00+$//;			# trailing crap
		$ans =~ s/^\xFF\xFF\xFF\xFFl//;		# HL response
		$ans =~ s/^\xFF\xFF\xFF\xFFn//;		# QW response
		$ans =~ s/^\xFF\xFF\xFF\xFF//;		# Q2/Q3 response
		$ans =~ s/^\xFE\xFF\xFF\xFF.....//;	# old HL bug/feature
	}
	
	# Close socket
	close(RCON);
	
	if ($ans eq "TIMEOUT")
	{
		$ans = "";
		$self->{"error"} = "Rcon timeout";
	}
	
	return $ans;
}


#
# Get error message
#

sub error
{
	my ($self) = @_;
	
	return $self->{"error"};
}



#
# Parse "status" command output into player information
#

sub getPlayers
{
	my ($self) = @_;
	
	my $status = $self->execute("status");
	my @lines = split(/[\r\n]+/, $status);
	
	my %players;
	
	foreach $line (@lines)
	{
		if ($line =~ /^\#[\s\d]\d\s+
			(.+)\s+			# name
			(\d+)\s+		# userid
			(\d+)\s+		# wonid
			([\d-]+)\s+		# frags
			([\d:]+)\s+		# time
			(\d+)\s+		# ping
			(\d+)\s+		# loss
			(\S+)			# addr
		   $/x)
		{
			my $name   = $1;
			my $userid = $2;
			my $wonid  = $3;
			my $frags  = $4;
			my $time   = $5;
			my $ping   = $6;
			my $loss   = $7;
			my $address = $8;
			
			$players{$userid} = {
				"Name"   => $name,
				"UserID" => $userid,
				"WONID"  => $wonid,
				"Frags"  => $frags,
				"Time"   => $time,
				"Ping"   => $ping,
				"Loss"   => $loss,
				"Address" => $address
			};
		}
	}
	
	return %players;
}


#
# Get information about a player by userID
#

sub getPlayer
{
	my ($self, $userid) = @_;
	
	my %players = $self->getPlayers();
	
	if (defined($players{$userid}))
	{
		return $players{$userid};
	}
	else
	{
		$self->{"error"} = "No such player # $userid";
		return 0;
	}
}


1;
# end
