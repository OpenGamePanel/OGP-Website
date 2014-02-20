#
# Copyright (C) 1998 Ken MacLeod
# Frontier::Client is free software; you can redistribute it
# and/or modify it under the same terms as Perl itself.
#
# $Id: Client.pm,v 1.8 2001/10/03 01:30:54 kmacleod Exp $
#

# NOTE: see Net::pRPC for a Perl RPC implementation

use strict;

package Frontier::Client;
use Frontier::RPC2;
use LWP::UserAgent;
use HTTP::Request;

use vars qw{$AUTOLOAD};

sub new {
    my $class = shift;
    my $self = ($#_ == 0) ? { %{ (shift) } } : { @_ };

    bless $self, $class;

    die "Frontier::RPC::new: no url defined\n"
	if !defined $self->{'url'};

    $self->{'ua'} = LWP::UserAgent->new;
    $self->{'ua'}->proxy('http', $self->{'proxy'})
	if(defined $self->{'proxy'});
    $self->{'rq'} = HTTP::Request->new (POST => $self->{'url'});
    $self->{'rq'}->header('Content-Type' => 'text/xml');

    my @options;

    if(defined $self->{'encoding'}) {
	push @options, 'encoding' => $self->{'encoding'};
    }

    if (defined $self->{'use_objects'} && $self->{'use_objects'}) {
	push @options, 'use_objects' => $self->{'use_objects'};
    }

    $self->{'enc'} = Frontier::RPC2->new(@options);

    return $self;
}

sub call {
    my $self = shift;

    my $text = $self->{'enc'}->encode_call(@_);

    if ($self->{'debug'}) {
	print "---- request ----\n";
	print $text;
    }

    $self->{'rq'}->content($text);

    my $response = $self->{'ua'}->request($self->{'rq'});

    if (!$response->is_success) {
	die $response->status_line . "\n";
    }

    my $content = $response->content;

    if ($self->{'debug'}) {
	print "---- response ----\n";
	print $content;
    }

    my $result = $self->{'enc'}->decode($content);

    if ($result->{'type'} eq 'fault') {
	die "Fault returned from XML RPC Server, fault code " . $result->{'value'}[0]{'faultCode'} . ": "
	    . $result->{'value'}[0]{'faultString'} . "\n";
    }

    return $result->{'value'}[0];
}

# shortcuts
sub base64 {
    my $self = shift;

    return Frontier::RPC2::Base64->new(@_);
}

sub boolean {
    my $self = shift;

    return Frontier::RPC2::Boolean->new(@_);
}

sub double {
    my $self = shift;

    return Frontier::RPC2::Double->new(@_);
}

sub int {
    my $self = shift;

    return Frontier::RPC2::Integer->new(@_);
}

sub string {
    my $self = shift;

    return Frontier::RPC2::String->new(@_);
}

sub date_time {
    my $self = shift;

    return Frontier::RPC2::DateTime::ISO8601->new(@_);
}

# something like this could be used to get an effect of
#
#     $server->examples_getStateName(41)
#
# instead of
#
#     $server->call('examples.getStateName', 41)
#
# for Frontier's
#
#     [server].examples.getStateName 41
#
# sub AUTOLOAD {
#     my ($pkg, $method) = ($AUTOLOAD =~ m/^(.*::)(.*)$/);
#     return if $method eq 'DESTROY';
# 
#     $method =~ s/__/=/g;
#     $method =~ tr/_=/._/;
# 
#     splice(@_, 1, 0, $method);
# 
#     goto &call;
# }

=head1 NAME

Frontier::Client - issue Frontier XML RPC requests to a server

=head1 SYNOPSIS

 use Frontier::Client;

 $server = Frontier::Client->new( I<OPTIONS> );

 $result = $server->call($method, @args);

 $boolean = $server->boolean($value);
 $date_time = $server->date_time($value);
 $base64 = $server->base64($value);

 $value = $boolean->value;
 $value = $date_time->value;
 $value = $base64->value;

=head1 DESCRIPTION

I<Frontier::Client> is an XML-RPC client over HTTP.
I<Frontier::Client> instances are used to make calls to XML-RPC
servers and as shortcuts for creating XML-RPC special data types.

=head1 METHODS

=over 4

=item new( I<OPTIONS> )

Returns a new instance of I<Frontier::Client> and associates it with
an XML-RPC server at a URL.  I<OPTIONS> may be a list of key, value
pairs or a hash containing the following parameters:

=over 4

=item url

The URL of the server.  This parameter is required.  For example:

 $server = Frontier::Client->new( 'url' => 'http://betty.userland.com/RPC2' );

=item proxy

A URL of a proxy to forward XML-RPC calls through.

=item encoding

The XML encoding to be specified in the XML declaration of outgoing
RPC requests.  Incoming results may have a different encoding
specified; XML::Parser will convert incoming data to UTF-8.  The
default outgoing encoding is none, which uses XML 1.0's default of
UTF-8.  For example:

 $server = Frontier::Client->new( 'url' => 'http://betty.userland.com/RPC2',
                                  'encoding' => 'ISO-8859-1' );

=item use_objects

If set to a non-zero value will convert incoming E<lt>i4E<gt>,
E<lt>floatE<gt>, and E<lt>stringE<gt> values to objects instead of
scalars.  See int(), float(), and string() below for more details.

=item debug

If set to a non-zero value will print the encoded XML request and the
XML response received.

=back

=item call($method, @args)

Forward a procedure call to the server, either returning the value
returned by the procedure or failing with exception.  `C<$method>' is
the name of the server method, and `C<@args>' is a list of arguments
to pass.  Arguments may be Perl hashes, arrays, scalar values, or the
XML-RPC special data types below.

=item boolean( $value )

=item date_time( $value )

=item base64( $base64 )

The methods `C<boolean()>', `C<date_time()>', and `C<base64()>' create
and return XML-RPC-specific datatypes that can be passed to
`C<call()>'.  Results from servers may also contain these datatypes.
The corresponding package names (for use with `C<ref()>', for example)
are `C<Frontier::RPC2::Boolean>',
`C<Frontier::RPC2::DateTime::ISO8601>', and
`C<Frontier::RPC2::Base64>'.

The value of boolean, date/time, and base64 data can be set or
returned using the `C<value()>' method.  For example:

  # To set a value:
  $a_boolean->value(1);

  # To retrieve a value
  $base64 = $base64_xml_rpc_data->value();

Note: `C<base64()>' does I<not> encode or decode base64 data for you,
you must use MIME::Base64 or similar module for that.

=item int( 42 );

=item float( 3.14159 );

=item string( "Foo" );

By default, you may pass ordinary Perl values (scalars) to be encoded.
RPC2 automatically converts them to XML-RPC types if they look like an
integer, float, or as a string.  This assumption causes problems when
you want to pass a string that looks like "0096", RPC2 will convert
that to an E<lt>i4E<gt> because it looks like an integer.  With these
methods, you could now create a string object like this:

  $part_num = $server->string("0096");

and be confident that it will be passed as an XML-RPC string.  You can
change and retrieve values from objects using value() as described
above.

=back

=head1 SEE ALSO

perl(1), Frontier::RPC2(3)

<http://www.scripting.com/frontier5/xml/code/rpc.html>

=head1 AUTHOR

Ken MacLeod <ken@bitsko.slc.ut.us>

=cut

1;
