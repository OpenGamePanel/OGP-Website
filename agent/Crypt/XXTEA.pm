#/**********************************************************\
#|                                                          |
#| The implementation of PHPRPC Protocol 3.0                |
#|                                                          |
#| xxtea.pm                                                 |
#|                                                          |
#| Release 3.0.0 beta                                       |
#| Copyright (c) 2005-2007 by Team-PHPRPC                   |
#|                                                          |
#| WebSite:  http://www.phprpc.org/                         |
#|           http://www.phprpc.net/                         |
#|           http://www.phprpc.com/                         |
#|           http://sourceforge.net/projects/php-rpc/       |
#|                                                          |
#| Author:   Ma Bingyao <andot@ujn.edu.cn>                  |
#|                                                          |
#| This file may be distributed and/or modified under the   |
#| terms of the GNU Lesser General Public License (LGPL)    |
#| version 3.0 as published by the Free Software Foundation |
#| and appearing in the included file LICENSE.              |
#|                                                          |
#\**********************************************************/
#
# XXTEA encryption arithmetic module.
#
# Copyright (C) 2006-2007 Ma Bingyao <andot@ujn.edu.cn>
# Version:      1.00
# LastModified: Nov 7, 2007
# This library is free.  You can redistribute it and/or modify it.
#

package Crypt::XXTEA;

use bytes;
use integer;
use strict;

use Exporter;
use vars qw($VERSION @ISA @EXPORT);

$VERSION     = 1.00;
@ISA         = qw(Exporter);
@EXPORT      = qw(xxtea_encrypt xxtea_decrypt);

*encrypt = \&xxtea_encrypt;
*decrypt = \&xxtea_decrypt;

sub _long2str {
    my ($v, $w) = @_;
    my $len = @{$v};
    my $n = ($len - 1) << 2;
    if ($w) {
        my $m = $v->[$len - 1];
        if (($m < $n - 3) || ($m > $n)) {
            return 0;
        }
        $n = $m;
    }
    my @s = ();
    for (my $i = 0; $i < $len; $i++) {
        $s[$i] = pack("V", $v->[$i]);
    }
    if ($w) {
        return substr(join('', @s), 0, $n);
    }
    else {
        return join('', @s);
    }
}

sub _str2long {
    my ($s, $w) = @_;
    my @v = unpack("V*", $s. "\0"x((4 - length($s) % 4) & 3));
    if ($w) {
        $v[@v] = length($s);
    }
    return @v;
}

sub xxtea_encrypt {
    my ($s, $k) = @_;
    if ($s eq "") {
        return "";
    }
    my @v = _str2long($s, 1);
    my @k = _str2long($k, 0);
    if (@k < 4) {
        for (my $i = @k; $i < 4; $i++) {
            $k[$i] = 0;
        }
    }
    my $n = $#v;
    my $z = $v[$n];
    my $y = $v[0];
    my $delta = 0x9E3779B9;
    my $q = 6 + 52 / ($n + 1);
    my $sum = 0;
    my $e;
    my $p;
    my $mx;
    while (0 < $q--) {
        $sum = ($sum + $delta) & 0xffffffff;
        $e = $sum >> 2 & 3;
        for ($p = 0; $p < $n; $p++) {
            $y = $v[$p + 1];
            $mx = ((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ (($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z)) & 0xffffffff;
            $z = $v[$p] = ($v[$p] + $mx) & 0xffffffff;
        }
        $y = $v[0];
        $mx = ((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ (($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z)) & 0xffffffff;
        $z = $v[$n] = ($v[$n] + $mx) & 0xffffffff;
    }
    return _long2str(\@v, 0);
}

sub xxtea_decrypt {
    my ($s, $k) = @_;
    if ($s eq "") {
        return "";
    }
    my @v = _str2long($s, 0);
    my @k = _str2long($k, 0);
    if (@k < 4) {
        for (my $i = @k; $i < 4; $i++) {
                $k[$i] = 0;
        }
    }
    my $n = $#v;
    my $z = $v[$n];
    my $y = $v[0];
    my $delta = 0x9E3779B9;
    my $q = 6 + 52 / ($n + 1);
    my $sum = ($q * $delta) & 0xffffffff;
    my $e;
    my $p;
    my $mx;
    while ($sum != 0) {
        $e = $sum >> 2 & 3;
        for ($p = $n; $p > 0; $p--) {
            $z = $v[$p - 1];
            $mx = ((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ (($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z)) & 0xffffffff;
            $y = $v[$p] = ($v[$p] - $mx) & 0xffffffff;
        }
        $z = $v[$n];
        $mx = ((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ (($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z)) & 0xffffffff;
        $y = $v[0] = ($v[0] - $mx) & 0xffffffff;
        $sum = ($sum - $delta) & 0xffffffff;
    }
    return _long2str(\@v, 1);
}

1;

__END__

=head1 NAME

Crypt::XXTEA - XXTEA encryption arithmetic module.

=head1 SYNOPSIS

    use Crypt::XXTEA;

=head1 DESCRIPTION

XXTEA is a secure and fast encryption algorithm. It's suitable for web development. This module allows you to encrypt or decrypt a string using the algorithm. 

=head1 FUNCTIONS

=over 4

=item xxtea_encrypt

    my $ciphertext = xxtea_encrypt($plaintext, $key);

This function encrypts $plaintext using $key and returns the $ciphertext.

=item encrypt

    my $ciphertext = Crypt::XXTEA::encrypt($plaintext, $key);
   
This function is the same as xxtea_encrypt.

=item xxtea_decrypt

    my $plaintext = xxtea_decrypt($ciphertext, $key);

This function decrypts $ciphertext using $key and returns the $plaintext.

=item decrypt

    my $plaintext = Crypt::XXTEA::decrypt($ciphertext, $key);

This function is the same as xxtea_decrypt.

=back

=head1 EXAMPLE

    use Crypt::XXTEA;
    my $ciphertext = xxtea_encrypt("Hello XXTEA.", "1234567890abcdef");
    my $plaintext = xxtea_decrypt($ciphertext, "1234567890abcdef");
    print $plaintext;

    $ciphertext = Crypt::XXTEA::encrypt("Hi XXTEA.", "1234567890abcdef");
    $plaintext = Crypt::XXTEA::decrypt($ciphertext, "1234567890abcdef");
    print $plaintext;

=head1 NOTES

If $plaintext is equal to "", it returns "".

It returns 0 when fails to decrypt.

Only the first 16 bytes of $key is used. if $key is shorter than 16 bytes, it will be padding \0.

The XXTEA algorithm is stronger and faster than Crypt::DES, Crypt::Blowfish & Crypt::IDEA.

=head1 SEE ALSO

Crypt::DES
Crypt::Blowfish
Crypt::IDEA

=head1 COPYRIGHT

The implementation of the XXTEA algorithm was developed by,
and is copyright of, Ma Bingyao (andot@ujn.edu.cn).

=cut
