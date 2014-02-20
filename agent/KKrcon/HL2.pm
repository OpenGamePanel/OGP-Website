# HL2 - Perl extension Half-Life 2 (Source) engine Rcon interface
#
# $Id:$
#

package HL2;

use strict;
use warnings;
use IO::Socket;
use IO::Select;

# release version
our $VERSION = "0.05";

# constants for command type
sub CMD  { 2 }
sub AUTH { 3 }

# create class
sub new {
	my $class = shift;

	# create object with defaults
	my $self = {
		hostname	=> undef,
		port		=> 27015,
		password	=> undef,
		timeout		=> 5,
		connected	=> 0,
		authenticated	=> 0,
		socket		=> undef,
		sequence	=> 0,
	};

	# create object
	bless($self, $class);

	# initialize class instances
	$self->init();

	# parse constructor args
	while (my ($key, $val) = splice(@_, 0, 2)) {
		$key = lc($key);
		if    ($key eq "hostname") { $self->hostname($val) }
		elsif ($key eq "port")     { $self->port($val)     }
		elsif ($key eq "password") { $self->password($val) }
		elsif ($key eq "timeout")  { $self->timeout($val)  }
		else { print STDERR "uknown attribute: $key\n" }
	}

	return $self;
}

# initialize class instances
sub init {
	my $self = shift;
	my $class = ref($self);

	# manipulate symbol table.. gotta love perl
	no strict "refs";
	no warnings;
	foreach my $instance (keys %$self) {
		*{"${class}::${instance}"} = sub {
			my $self = shift;
			my $value = shift;
			my $ref = \$self->{$instance};
			if (defined $value) {
				$$ref = $value;
				return $self;
			} else {
				return $$ref;
			}
		};
	}
}

# run a command and return its response
sub run {
	my $self = shift;
	my $command = shift;

	if (!$self->connected()) {
		$self->connect();
	}

	if (!$self->authenticated()) {
		$self->authenticate();
	}

	my $socket = $self->socket();
	print $socket $self->packet(CMD, $command);

	return $self->response();
}

# create tcp socket
sub connect {
	my $self = shift;

	my $socket = IO::Socket::INET->new(
		PeerAddr        => $self->hostname(),
		PeerPort        => $self->port(),
		Timeout		=> $self->timeout(),
		Proto           => "tcp",
		Type            => SOCK_STREAM,
	) || die "failed to connect: $!\n";

	$self->socket($socket);
	$self->connected(1);
}

# authenticate rcon session
sub authenticate {
	my $self = shift;

	# send authentication packet to server
	my $socket = $self->socket();
	print $socket $self->packet(AUTH, $self->password());

	# auth response sends back an empty packet first
	$self->response();
	$self->response();

	$self->authenticated(1);
}

######################
# PROTOCOL FUNCTIONS #
######################

# rcon command protocol:
# (V)[size] (V)[requestID] (V)[command]    (0)[string1] (0)[string2]
#
# rcon response protocol:
# (V)[size] (V)[requestID] (V)[responseID] (0)[string1] (0)[string2]
#
# V = a 32-bit unsigned long int, little-endian (VAX/Intel)
# 0 = null-terminated string
#
# NOTE: string2 appears unused, so our functions ignore it

# create a packet of type (AUTH or CMD)
sub packet {
	my $self     = shift;
	my $type     = shift;
	my $payload  = shift;

	# sequence increments, but auth
	# packet is 2.. no idea why that is,
	# but tcpdump does not lie
	my $sequence;
	if ($type == AUTH) {
		$sequence = 2;
	} else {
		$sequence = $self->sequence();

		# increment for next use
		$self->sequence($sequence + 1);
	}

	my $packet = pack("VV", $sequence, $type) . "$payload\x00\x00";
	$packet    = pack("V", length($packet)) . $packet;

	return $packet;
}

# receive packet
sub response {
	my $self = shift;

	my $size = unpack("V", $self->read(4));

	if ($size) {
		my $payload = $self->read($size);

		# remove protocol cruft and null terminators
		$payload =~ s/^.{8}//;
		$payload =~ s/\x00{2}$//;

		return $payload;
	}
}

# read length of bytes from socket with timeout
sub read {
	my $self = shift;
	my $length = shift;

	my $socket = $self->socket();
	my $timeout = $self->timeout();
	my $select = IO::Select->new($socket);

	if ($select->can_read($timeout)) {
		$socket->sysread(my $read, $length, 0);
		return $read;
	}
}

1;

__END__

=head1 NAME

HL2 - Perl extension Half-Life 2 (Source) engine Rcon interface

=head1 SYNOPSIS

  use HL2;
  my $rcon = HL2->new(
  	hostname => "insub.org",
	password => "yourpass",
	timeout  => 3,
  );

  print $rcon->run("status");
  $rcon->run("changelevel de_dust");

=head1 DESCRIPTION

Use this module to send "rcon" (remote control) commands to a
Source server, such as Counter-Strike Source.

=head1 METHODS

=over 4

=item $rcon = HL2->new()

Create a new rcon object.  You can specify the hostname,
password and/or timeout in the constructor, or use the class
methods to change them (see SYNOPSIS).

=item $rcon->authenticated()

Returns true if session has succesfully authenticated.

=item $rcon->password()

Returns current password, or sets it.  Note that setting
this after authentication will not have any effect unless
you reconnect with $rcon->authenticated(0).

=item $rcon->hostname()

Returns current hostname, or sets it.

=item $rcon->port()

Returns current port, or sets it.  Defaults to 27015.

=item $rcon->sequence()

Returns the current command sequence.  This starts
at 0 and increases with each call.

=item $rcon->socket()

Returns the IO::Socket object for the session or
creates a new one if none exists.

=item $rcon->timeout()

Returns the TCP response timeout, or sets it.  Defaults
to 5.

=item $rcon->connect()

Connects to remote server.

=item $packet = $rcon->packet($type, $payload)

Creats a packet to send to the remote server.
Type should be either CMD or AUTH, e.g.:

  print $socket $rcon->packet(AUTH, $rcon->password())

=item $rcon->authenticate()

Authenticates with the rcon server.  This is done automatically
when you try to run a command.

=item $response = $rcon->run($command)

Runs a command on the remote server and returns its response

=item $response = $rcon->response()

Reads a response packet from the server.  This is called
authomatically when you use run() so you shouldn't need to
use this.

=back

=head1 CAVEATS

This module DOES NOT DO ANY COMMAND VALIDATION.  You are responsible for
sending sane commands to the server.  If you use this with CGI that allows
internet users to submit console commands, you MUST taint-check this.  Users
with RCON access can send anything to the console.  I highly recommend that you
restrict what console commands a user can send.

=head1 BUGS

As of this writing, there are some bugs with the rcon server itself.
One such bug is that some output goes to the console instead of to
the rcon client.  For example, the command "listid" causes the list
of banned users to spew to the physical console instead of back to
the rcon client, making it effectively useless.  If you are not getting
back a response you expected, please verify that it's not going to
the console (run srcds in screen so you can access it) before submitting
a bug report to me about it.  Or better yet, submit a bug report to Valve.

Authentication validation is currently unsupported.

=head1 SEE ALSO

 http://gruntle.org/projects/
 http://insub.org/cs/

=head1 AUTHOR

Chris Jones, E<lt>cjones@gruntle.orgE<gt>

=head1 COPYRIGHT AND LICENSE

 Copyright (C) 2004 by Chris Jones

 This library is free software; you can redistribute it and/or modify
 it under the same terms as Perl itself, either Perl version 5.8.5 or,
 at your option, any later version of Perl 5 you may have available.

=cut
