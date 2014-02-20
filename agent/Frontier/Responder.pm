# File:      Repsonder.pm
#            based heavily on Ken MacLeod's Frontier::Daemon
# Author:    Joe Johnston 7/2000
# Revisions: 
#            11/2000 - Cleaned/Add POD. Took out 'use CGI'. 
#  
# Meant to be called from a CGI process to answer client 
# requests and emit the appropriate reponses. See POD for details.
#
# LICENSE: This code is released under the same licensing 
#          as Perl itself.
#
# Use the code where ever you want, but due credit is appreciated. 

package Frontier::Responder;

use strict;
use vars qw/@ISA/;

use Frontier::RPC2;

my $snappy_answer = "Hey, I need to return true, don't I?";

# Class constructor. 
# Input:  (expects parameters to be passed in as a hash)
#         methods => hashref, keys are API procedure names, values are
#                    subroutine references
#
# Output: blessed reference
sub new {
    my $class = shift; 
    my %args  = @_;
    my $self  = bless {}, (ref $class ? ref $class : $class);

    # Store the dispatch table away for future use.
    $self->{methods}  = $args{methods};
    $self->{_decode}  = Frontier::RPC2->new();

    return $self;
}

# Grabs input from CGI "stream", makes request 
# if possible, packs up the response in purddy
# XML
# Input:  None
# Output: A XML string suitable for printing from a CGI process
sub answer{
    my $self = shift;

    # fetch the xml message sent
    my $request = get_cgi_request();
    
    unless( defined $request ){
	print 
	    "Content-Type: text/txt\n\n";
	exit;
    }

    # Let's figure out the method to execute
    # along with its arguments
    my $response = $self->{_decode}->serve( $request, 
					    $self->{methods} );
    # Ship it!
    return 
	"Content-Type: text/xml \n\n" . $response;

}

# private function. No need to advertise this.
# Remember, this is just XML. 
# CGI.pm doesn't grok this.
sub get_cgi_request{
    my $in;
    if( $ENV{REQUEST_METHOD} eq 'POST' ){
        my $len = $ENV{CONTENT_LENGTH};
	unless ( read( STDIN, $in, $len ) == $len ){
	    return;
        }
    }else{
	$in = $ENV{QUERY_STRING};
    }
    
    return $in;
}

=pod

=head1 NAME

Frontier::Responder - Create XML-RPC listeners for normal CGI processes 

=head1 SYNOPSIS

 use Frontier::Responder; 
 my $res = Frontier::Responder->new( methods => {
                                                 add => sub{ $_[0] + $_[1] },
						 cat => sub{ $_[0] . $_[1] },
					        },
				    );
 print $res->answer;

=head1 DESCRIPTION

Use I<Frontier::Responder> whenever you need to create an XML-RPC listener
using a standard CGI interface. To be effective, a script using this class
will often have to be put a directory from which a web server is authorized 
to execute CGI programs. An XML-RPC listener using this library will be 
implementing the API of a particular XML-RPC application. Each remote 
procedure listed in the API of the user defined application will correspond
to a hash key that is defined in the C<new> method of a I<Frontier::Responder>
object. This is exactly the way I<Frontier::Daemon> works as well. 
In order to process the request and get the response, the C<answer> method
is needed. Its return value is XML ready for printing. 

For those new to XML-RPC, here is a brief description of this protocol. 
XML-RPC is a way to execute functions on a different 
machine. Both the client's request and listeners response are wrapped 
up in XML and sent over HTTP. Because the XML-RPC conversation is in 
XML, the implementation languages of the server (here called a I<listener>), 
and the client can be different. This can be a powerful and simple way
to have very different platforms work together without acrimony. Implicit 
in the use of XML-RPC is a contract or API that an XML-RPC listener 
implements and an XML-RPC client calls. The API needs to list not only 
the various procedures that can be called, but also the XML-RPC datatypes
expected for input and output. Remember that although Perl is permissive
about datatyping, other languages are not. Unforuntately, the XML-RPC spec
doesn't say how to document the API. It is recomended that the author
of a Perl XML-RPC listener should at least use POD to explain the API.
This allows for the programmatic generation of a clean web page.  

=head1 METHODS

=over 4

=item new( I<OPTIONS> )

This is the class constructor. As is traditional, it returns 
a blessed reference to a I<Frontier::Responder> object. It expects 
arguments to be given like a hash (Perl's named parameter mechanism). 
To be effective, populate the C<methods> parameter with a hashref 
that has API procedure names as keys and subroutine references as 
values. See the SYNOPSIS for a sample usage.


=item answer()

In order to parse the request and execute the procedure, this method
must be called. It returns a XML string that contains the procedure's 
response. In a typical CGI program, this string will simply be printed
to STDOUT. 


=back

=head1 SEE ALSO

perl(1), Frontier::RPC2(3)

<http://www.scripting.com/frontier5/xml/code/rpc.html>

=head1 AUTHOR

Ken MacLeod <ken@bitsko.slc.ut.us> wrote the underlying
RPC library. 

Joe Johnston <jjohn@cs.umb.edu> wrote an adaptation
of the Frontier::Daemon class to create this CGI XML-RPC 
listener class.

=cut
