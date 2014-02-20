package Frontier::Daemon::Forking;
# $Id: Forking.pm,v 1.6 2004/01/23 19:48:33 tcaine Exp $

use strict;
use vars qw{@ISA $VERSION};

$VERSION = '0.02';

use Frontier::RPC2;
use HTTP::Daemon;
use HTTP::Status;

@ISA = qw{HTTP::Daemon};

#  most of this routine comes directly from Frontier::Daemon
sub new {
    my $class    = shift; 
    my %args     = @_;
    my $encoding = delete $args{encoding};
    my $self     = $class->SUPER::new( %args );
    return undef unless $self;

    my @options;
    push @options, encoding => $encoding
        if $encoding;

    ${*$self}{methods}  = $args{methods};
    ${*$self}{decode}   = new Frontier::RPC2(@options);
    ${*$self}{response} = new HTTP::Response 200;
    ${*$self}{response}->header( 'Content-Type' => 'text/xml' );

    local $SIG{CHLD} = 'IGNORE';

ACCEPT:
    while ( my $conn = $self->accept ) {
        my $pid = fork;
        next ACCEPT if $pid;

        if ( not defined $pid ) {
            warn "fork() failed: $!";
            $conn = undef;
        } 
        else {
            my $request = $conn->get_request;
            if ($request) {
                if ($request->method eq 'POST' && $request->url->path eq '/RPC2') {
                    ${*$self}{'response'}->content(
                        ${*$self}{'decode'}->serve(
                            $request->content, 
                            ${*$self}{'methods'},
                        )
                    );
                    $conn->send_response(${*$self}{'response'});
                } else {
                    $conn->send_error(RC_FORBIDDEN);
                }
            }
        }
        exit;
    }
}

1;
__END__

=head1 NAME

Frontier::Daemon::Forking - receive Frontier XML RPC requests

=head1 SYNOPSIS

  use Frontier::Daemon::Forking;

  Frontier::Daemon::Forking->new(
      methods => {
          rpcName => \&rpcHandler,
      },
      encoding => 'ISO-8859-1',
  );

  sub rpcHandler { return 'OK' }

=head1 DESCRIPTION

L<Frontier::Daemon::Forking> is a drop in replacement for L<Frontier::Daemon> when a forking HTTP/1.1 server is needed that listens on a socket for incoming requests containing Frontier XML RPC2 method calls.  Most of the code was borrowed from L<Frontier::Daemon>.

=head1 AUTHOR

Todd Caine, tcaine@pobox.com

=head1 SEE ALSO

L<Frontier::RPC2>, L<Frontier::Daemon>, L<HTTP::Daemon>

=cut
