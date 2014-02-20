#
# Copyright (C) 1998, 1999 Ken MacLeod
# Frontier::RPC is free software; you can redistribute it
# and/or modify it under the same terms as Perl itself.
#
# $Id: RPC2.pm,v 1.18 2002/08/02 18:35:21 ivan420 Exp $
#

# NOTE: see Storable for marshalling.

use strict;

package Frontier::RPC2;
use XML::Parser;

use vars qw{%scalars %char_entities};

%char_entities = (
    '&' => '&amp;',
    '<' => '&lt;',
    '>' => '&gt;',
    '"' => '&quot;',
);

# FIXME I need a list of these
%scalars = (
    'base64' => 1,
    'boolean' => 1,
    'dateTime.iso8601' => 1,
    'double' => 1,
    'int' => 1,
    'i4' => 1,
    'string' => 1,
);

sub new {
    my $class = shift;
    my $self = ($#_ == 0) ? { %{ (shift) } } : { @_ };

    bless $self, $class;

    if (defined $self->{'encoding'}) {
	$self->{'encoding_'} = " encoding=\"$self->{'encoding'}\"";
    } else {
	$self->{'encoding_'} = "";
    }

    return $self;
}

sub encode_call {
    my $self = shift; my $proc = shift;

    my @text;
    push @text, <<EOF;
<?xml version="1.0"$self->{'encoding_'}?>
<methodCall>
<methodName>$proc</methodName>
<params>
EOF

    push @text, $self->_params([@_]);

    push @text, <<EOF;
</params>
</methodCall>
EOF

    return join('', @text);
}

sub encode_response {
    my $self = shift;

    my @text;
    push @text, <<EOF;
<?xml version="1.0"$self->{'encoding_'}?>
<methodResponse>
<params>
EOF

    push @text, $self->_params([@_]);

    push @text, <<EOF;
</params>
</methodResponse>
EOF

    return join('', @text);
}

sub encode_fault {
    my $self = shift; my $code = shift; my $message = shift;

    my @text;
    push @text, <<EOF;
<?xml version="1.0"$self->{'encoding_'}?>
<methodResponse>
<fault>
EOF

    push @text, $self->_item({faultCode => $code, faultString => $message});

    push @text, <<EOF;
</fault>
</methodResponse>
EOF

    return join('', @text);
}

sub serve {
    my $self = shift; my $xml = shift; my $methods = shift;

    my $call;
    # FIXME bug in Frontier's XML
    $xml =~ s/(<\?XML\s+VERSION)/\L$1\E/;
    eval { $call = $self->decode($xml) };

    if ($@) {
	return $self->encode_fault(1, "error decoding RPC.\n" . $@);
    }

    if ($call->{'type'} ne 'call') {
	return $self->encode_fault(2,"expected RPC \`methodCall', got \`$call->{'type'}'\n");
    }

    my $method = $call->{'method_name'};
    if (!defined $methods->{$method}) {
        return $self->encode_fault(3, "no such method \`$method'\n");
    }

    my $result;
    my $eval = eval { $result = &{ $methods->{$method} }(@{ $call->{'value'} }) };
    if ($@) {
	return $self->encode_fault(4, "error executing RPC \`$method'.\n" . $@);
    }

    my $response_xml = $self->encode_response($result);
    return $response_xml;
}

sub _params {
    my $self = shift; my $array = shift;

    my @text;

    my $item;
    foreach $item (@$array) {
	push (@text, "<param>",
	      $self->_item($item),
	      "</param>\n");
    }

    return @text;
}

sub _item {
    my $self = shift; my $item = shift;

    my @text;

    my $ref = ref($item);
    if (!$ref) {
	push (@text, $self->_scalar ($item));
    } elsif ($ref eq 'ARRAY') {
	push (@text, $self->_array($item));
    } elsif ($ref eq 'HASH') {
	push (@text, $self->_hash($item));
    } elsif ($ref eq 'Frontier::RPC2::Boolean') {
	push @text, "<value><boolean>", $item->repr, "</boolean></value>\n";
    } elsif ($ref eq 'Frontier::RPC2::String') {
      push @text, "<value><string>", $item->repr, "</string></value>\n";
    } elsif ($ref eq 'Frontier::RPC2::Integer') {
      push @text, "<value><int>", $item->repr, "</int></value>\n";
    } elsif ($ref eq 'Frontier::RPC2::Double') {
      push @text, "<value><double>", $item->repr, "</double></value>\n";
    } elsif ($ref eq 'Frontier::RPC2::DateTime::ISO8601') {
	push @text, "<value><dateTime.iso8601>", $item->repr, "</dateTime.iso8601></value>\n";
    } elsif ($ref eq 'Frontier::RPC2::Base64') {
	push @text, "<value><base64>", $item->repr, "</base64></value>\n";
    } elsif ($ref =~ /=HASH\(/) {
	push @text, $self->_hash($item);
    } elsif ($ref =~ /=ARRAY\(/) {
	push @text, $self->_array($item);
    } else {
	die "can't convert \`$item' to XML\n";
    }

    return @text;
}

sub _hash {
    my $self = shift; my $hash = shift;

    my @text = "<value><struct>\n";

    my ($key, $value);
    while (($key, $value) = each %$hash) {
	push (@text,
	      "<member><name>$key</name>",
	      $self->_item($value),
	      "</member>\n");
    }

    push @text, "</struct></value>\n";

    return @text;
}


sub _array {
    my $self = shift; my $array = shift;

    my @text = "<value><array><data>\n";

    my $item;
    foreach $item (@$array) {
	push @text, $self->_item($item);
    }

    push @text, "</data></array></value>\n";

    return @text;
}

sub _scalar {
    my $self = shift; my $value = shift;

    # these are from `perldata(1)'
    if ($value =~ /^[+-]?\d+$/) {
	return ("<value><i4>$value</i4></value>");
    } elsif ($value =~ /^(-?(?:\d+(?:\.\d*)?|\.\d+)|([+-]?)(?=\d|\.\d)\d*(\.\d*)?([Ee]([+-]?\d+))?)$/) {
	return ("<value><double>$value</double></value>");
    } else {
	$value =~ s/([&<>\"])/$char_entities{$1}/ge;
	return ("<value><string>$value</string></value>");
    }
}

sub decode {
    my $self = shift; my $string = shift;

    $self->{'parser'} = XML::Parser->new( Style => ref($self),
					  'use_objects' => $self->{'use_objects'} );
    return $self->{'parser'}->parsestring($string);
}

# shortcuts
sub base64 {
    my $self = shift;

    return Frontier::RPC2::Base64->new(@_);
}

sub boolean {
    my $self = shift;
    my $elem = shift;
    if($elem == 0 or $elem == 1) {
        return Frontier::RPC2::Boolean->new($elem);
    } else {
        die "error in rendering RPC type \`$elem\' not a boolean\n";
    }
}

sub double {
    my $self = shift;
    my $elem = shift;
    # this is from `perldata(1)'
    if($elem =~ /^([+-]?)(?=\d|\.\d)\d*(\.\d*)?([Ee]([+-]?\d+))?$/) {
        return Frontier::RPC2::Double->new($elem);
    } else {
        die "error in rendering RPC type \`$elem\' not a double\n";
    } 
}

sub int {
    my $self = shift;
    my $elem = shift; 
    # this is from `perldata(1)'
    if($elem =~ /^[+-]?\d+$/) {
        return Frontier::RPC2::Integer->new($elem);
    } else {
        die "error in rendering RPC type \`$elem\' not an int\n";
    }
}

sub string {
    my $self = shift;

    return Frontier::RPC2::String->new(@_);
}

sub date_time {
    my $self = shift;

    return Frontier::RPC2::DateTime::ISO8601->new(@_);
}

######################################################################
###
### XML::Parser callbacks
###

sub die {
    my $expat = shift; my $message = shift;

    die $message
	. "at line " . $expat->current_line
        . " column " . $expat->current_column . "\n";
}

sub init {
    my $expat = shift;

    $expat->{'rpc_state'} = [];
    $expat->{'rpc_container'} = [ [] ];
    $expat->{'rpc_member_name'} = [];
    $expat->{'rpc_type'} = undef;
    $expat->{'rpc_args'} = undef;
}

# FIXME this state machine wouldn't be necessary if we had a DTD.
sub start {
    my $expat = shift; my $tag = shift;

    my $state = $expat->{'rpc_state'}[-1];

    if (!defined $state) {
	if ($tag eq 'methodCall') {
	    $expat->{'rpc_type'} = 'call';
	    push @{ $expat->{'rpc_state'} }, 'want_method_name';
	} elsif ($tag eq 'methodResponse') {
	    push @{ $expat->{'rpc_state'} }, 'method_response';
	} else {
	    Frontier::RPC2::die($expat, "unknown RPC type \`$tag'\n");
	}
    } elsif ($state eq 'want_method_name') {
	Frontier::RPC2::die($expat, "wanted \`methodName' tag, got \`$tag'\n")
	    if ($tag ne 'methodName');
	push @{ $expat->{'rpc_state'} }, 'method_name';
	$expat->{'rpc_text'} = "";
    } elsif ($state eq 'method_response') {
	if ($tag eq 'params') {
	    $expat->{'rpc_type'} = 'response';
	    push @{ $expat->{'rpc_state'} }, 'params';
	} elsif ($tag eq 'fault') {
	    $expat->{'rpc_type'} = 'fault';
	    push @{ $expat->{'rpc_state'} }, 'want_value';
	}
    } elsif ($state eq 'want_params') {
	Frontier::RPC2::die($expat, "wanted \`params' tag, got \`$tag'\n")
	    if ($tag ne 'params');
	push @{ $expat->{'rpc_state'} }, 'params';
    } elsif ($state eq 'params') {
	Frontier::RPC2::die($expat, "wanted \`param' tag, got \`$tag'\n")
	    if ($tag ne 'param');
	push @{ $expat->{'rpc_state'} }, 'want_param_name_or_value';
    } elsif ($state eq 'want_param_name_or_value') {
	if ($tag eq 'value') {
	    $expat->{'may_get_cdata'} = 1;
	    $expat->{'rpc_text'} = "";
	    push @{ $expat->{'rpc_state'} }, 'value';
	} elsif ($tag eq 'name') {
	    push @{ $expat->{'rpc_state'} }, 'param_name';
	} else {	    
	    Frontier::RPC2::die($expat, "wanted \`value' or \`name' tag, got \`$tag'\n");
	}
    } elsif ($state eq 'param_name') {
	Frontier::RPC2::die($expat, "wanted parameter name data, got tag \`$tag'\n");
    } elsif ($state eq 'want_value') {
	Frontier::RPC2::die($expat, "wanted \`value' tag, got \`$tag'\n")
	    if ($tag ne 'value');
	$expat->{'rpc_text'} = "";
	$expat->{'may_get_cdata'} = 1;
	push @{ $expat->{'rpc_state'} }, 'value';
    } elsif ($state eq 'value') {
	$expat->{'may_get_cdata'} = 0;
	if ($tag eq 'array') {
	    push @{ $expat->{'rpc_container'} }, [];
	    push @{ $expat->{'rpc_state'} }, 'want_data';
	} elsif ($tag eq 'struct') {
	    push @{ $expat->{'rpc_container'} }, {};
	    push @{ $expat->{'rpc_member_name'} }, undef;
	    push @{ $expat->{'rpc_state'} }, 'struct';
	} elsif ($scalars{$tag}) {
	    $expat->{'rpc_text'} = "";
	    push @{ $expat->{'rpc_state'} }, 'cdata';
	} else {
	    Frontier::RPC2::die($expat, "wanted a data type, got \`$tag'\n");
	}
    } elsif ($state eq 'want_data') {
	Frontier::RPC2::die($expat, "wanted \`data', got \`$tag'\n")
	    if ($tag ne 'data');
	push @{ $expat->{'rpc_state'} }, 'array';
    } elsif ($state eq 'array') {
	Frontier::RPC2::die($expat, "wanted \`value' tag, got \`$tag'\n")
	    if ($tag ne 'value');
	$expat->{'rpc_text'} = "";
	$expat->{'may_get_cdata'} = 1;
	push @{ $expat->{'rpc_state'} }, 'value';
    } elsif ($state eq 'struct') {
	Frontier::RPC2::die($expat, "wanted \`member' tag, got \`$tag'\n")
	    if ($tag ne 'member');
	push @{ $expat->{'rpc_state'} }, 'want_member_name';
    } elsif ($state eq 'want_member_name') {
	Frontier::RPC2::die($expat, "wanted \`name' tag, got \`$tag'\n")
	    if ($tag ne 'name');
	push @{ $expat->{'rpc_state'} }, 'member_name';
	$expat->{'rpc_text'} = "";
    } elsif ($state eq 'member_name') {
	Frontier::RPC2::die($expat, "wanted data, got tag \`$tag'\n");
    } elsif ($state eq 'cdata') {
	Frontier::RPC2::die($expat, "wanted data, got tag \`$tag'\n");
    } else {
	Frontier::RPC2::die($expat, "internal error, unknown state \`$state'\n");
    }
}

sub end {
    my $expat = shift; my $tag = shift;

    my $state = pop @{ $expat->{'rpc_state'} };

    if ($state eq 'cdata') {
	my $value = $expat->{'rpc_text'};
	if ($tag eq 'base64') {
	    $value = Frontier::RPC2::Base64->new($value);
	} elsif ($tag eq 'boolean') {
	    $value = Frontier::RPC2::Boolean->new($value);
	} elsif ($tag eq 'dateTime.iso8601') {
	    $value = Frontier::RPC2::DateTime::ISO8601->new($value);
	} elsif ($expat->{'use_objects'}) {
	    if ($tag eq 'i4' or $tag eq 'int') {
		$value = Frontier::RPC2::Integer->new($value);
	    } elsif ($tag eq 'float') {
		$value = Frontier::RPC2::Float->new($value);
	    } elsif ($tag eq 'string') {
		$value = Frontier::RPC2::String->new($value);
	    }
	}
	$expat->{'rpc_value'} = $value;
    } elsif ($state eq 'member_name') {
	$expat->{'rpc_member_name'}[-1] = $expat->{'rpc_text'};
	$expat->{'rpc_state'}[-1] = 'want_value';
    } elsif ($state eq 'method_name') {
	$expat->{'rpc_method_name'} = $expat->{'rpc_text'};
	$expat->{'rpc_state'}[-1] = 'want_params';
    } elsif ($state eq 'struct') {
	$expat->{'rpc_value'} = pop @{ $expat->{'rpc_container'} };
	pop @{ $expat->{'rpc_member_name'} };
    } elsif ($state eq 'array') {
	$expat->{'rpc_value'} = pop @{ $expat->{'rpc_container'} };
    } elsif ($state eq 'value') {
	# the rpc_text is a string if no type tags were given
	if ($expat->{'may_get_cdata'}) {
	    $expat->{'may_get_cdata'} = 0;
	    if ($expat->{'use_objects'}) {
		$expat->{'rpc_value'}
		= Frontier::RPC2::String->new($expat->{'rpc_text'});
	    } else {
		$expat->{'rpc_value'} = $expat->{'rpc_text'};
	    }
	}
	my $container = $expat->{'rpc_container'}[-1];
	if (ref($container) eq 'ARRAY') {
	    push @$container, $expat->{'rpc_value'};
	} elsif (ref($container) eq 'HASH') {
	    $container->{ $expat->{'rpc_member_name'}[-1] } = $expat->{'rpc_value'};
	}
    }
}

sub char {
    my $expat = shift; my $text = shift;

    $expat->{'rpc_text'} .= $text;
}

sub proc {
}

sub final {
    my $expat = shift;

    $expat->{'rpc_value'} = pop @{ $expat->{'rpc_container'} };
    
    return {
	value => $expat->{'rpc_value'},
	type => $expat->{'rpc_type'},
	method_name => $expat->{'rpc_method_name'},
    };
}

package Frontier::RPC2::DataType;

sub new {
    my $type = shift; my $value = shift;

    return bless \$value, $type;
}

# `repr' returns the XML representation of this data, which may be
# different [in the future] from what is returned from `value'
sub repr {
    my $self = shift;

    return $$self;
}

# sets or returns the usable value of this data
sub value {
    my $self = shift;
    @_ ? ($$self = shift) : $$self;
}

package Frontier::RPC2::Base64;

use vars qw{@ISA};
@ISA = qw{Frontier::RPC2::DataType};

package Frontier::RPC2::Boolean;

use vars qw{@ISA};
@ISA = qw{Frontier::RPC2::DataType};

package Frontier::RPC2::Integer;

use vars qw{@ISA};
@ISA = qw{Frontier::RPC2::DataType};

package Frontier::RPC2::String;

use vars qw{@ISA};
@ISA = qw{Frontier::RPC2::DataType};

sub repr {
    my $self = shift;
    my $value = $$self;
    $value =~ s/([&<>\"])/$Frontier::RPC2::char_entities{$1}/ge;
    $value;
}

package Frontier::RPC2::Double;

use vars qw{@ISA};
@ISA = qw{Frontier::RPC2::DataType};

package Frontier::RPC2::DateTime::ISO8601;

use vars qw{@ISA};
@ISA = qw{Frontier::RPC2::DataType};

=head1 NAME

Frontier::RPC2 - encode/decode RPC2 format XML

=head1 SYNOPSIS

 use Frontier::RPC2;

 $coder = Frontier::RPC2->new;

 $xml_string = $coder->encode_call($method, @args);
 $xml_string = $coder->encode_response($result);
 $xml_string = $coder->encode_fault($code, $message);

 $call = $coder->decode($xml_string);

 $response_xml = $coder->serve($request_xml, $methods);

 $boolean_object = $coder->boolean($boolean);
 $date_time_object = $coder->date_time($date_time);
 $base64_object = $coder->base64($base64);
 $int_object = $coder->int(42);
 $float_object = $coder->float(3.14159);
 $string_object = $coder->string("Foo");

=head1 DESCRIPTION

I<Frontier::RPC2> encodes and decodes XML RPC calls.

=over 4

=item $coder = Frontier::RPC2->new( I<OPTIONS> )

Create a new encoder/decoder.  The following option is supported:

=over 4

=item encoding

The XML encoding to be specified in the XML declaration of encoded RPC
requests or responses.  Decoded results may have a different encoding
specified; XML::Parser will convert decoded data to UTF-8.  The
default encoding is none, which uses XML 1.0's default of UTF-8.  For
example:

 $server = Frontier::RPC2->new( 'encoding' => 'ISO-8859-1' );

=item use_objects

If set to a non-zero value will convert incoming E<lt>i4E<gt>,
E<lt>floatE<gt>, and E<lt>stringE<gt> values to objects instead of
scalars.  See int(), float(), and string() below for more details.

=back

=item $xml_string = $coder->encode_call($method, @args)

`C<encode_call>' converts a method name and it's arguments into an
RPC2 `C<methodCall>' element, returning the XML fragment.

=item $xml_string = $coder->encode_response($result)

`C<encode_response>' converts the return value of a procedure into an
RPC2 `C<methodResponse>' element containing the result, returning the
XML fragment.

=item $xml_string = $coder->encode_fault($code, $message)

`C<encode_fault>' converts a fault code and message into an RPC2
`C<methodResponse>' element containing a `C<fault>' element, returning
the XML fragment.

=item $call = $coder->decode($xml_string)

`C<decode>' converts an XML string containing an RPC2 `C<methodCall>'
or `C<methodResponse>' element into a hash containing three members,
`C<type>', `C<value>', and `C<method_name>'.  `C<type>' is one of
`C<call>', `C<response>', or `C<fault>'.  `C<value>' is array
containing the parameters or result of the RPC.  For a `C<call>' type,
`C<value>' contains call's parameters and `C<method_name>' contains
the method being called.  For a `C<response>' type, the `C<value>'
array contains call's result.  For a `C<fault>' type, the `C<value>'
array contains a hash with the two members `C<faultCode>' and
`C<faultMessage>'.

=item $response_xml = $coder->serve($request_xml, $methods)

`C<serve>' decodes `C<$request_xml>', looks up the called method name
in the `C<$methods>' hash and calls it, and then encodes and returns
the response as XML.

=item $boolean_object = $coder->boolean($boolean);

=item $date_time_object = $coder->date_time($date_time);

=item $base64_object = $coder->base64($base64);

These methods create and return XML-RPC-specific datatypes that can be
passed to the encoder.  The decoder may also return these datatypes.
The corresponding package names (for use with `C<ref()>', for example)
are `C<Frontier::RPC2::Boolean>',
`C<Frontier::RPC2::DateTime::ISO8601>', and
`C<Frontier::RPC2::Base64>'.

You can change and retrieve the value of boolean, date/time, and
base64 data using the `C<value>' method of those objects, i.e.:

  $boolean = $boolean_object->value;

  $boolean_object->value(1);

Note: `C<base64()>' does I<not> encode or decode base64 data for you,
you must use MIME::Base64 or similar module for that.

=item $int_object = $coder->int(42);

=item $float_object = $coder->float(3.14159);

=item $string_object = $coder->string("Foo");

By default, you may pass ordinary Perl values (scalars) to be encoded.
RPC2 automatically converts them to XML-RPC types if they look like an
integer, float, or as a string.  This assumption causes problems when
you want to pass a string that looks like "0096", RPC2 will convert
that to an E<lt>i4E<gt> because it looks like an integer.  With these
methods, you could now create a string object like this:

  $part_num = $coder->string("0096");

and be confident that it will be passed as an XML-RPC string.  You can
change and retrieve values from objects using value() as described
above.

=back

=head1 SEE ALSO

perl(1), Frontier::Daemon(3), Frontier::Client(3)

<http://www.scripting.com/frontier5/xml/code/rpc.html>

=head1 AUTHOR

Ken MacLeod <ken@bitsko.slc.ut.us>

=cut

1;
