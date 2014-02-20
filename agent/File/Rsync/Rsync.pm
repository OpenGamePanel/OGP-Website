# -*- perl -*-
# vim:ft=perl foldlevel=1
#      __
#     /\ \ From the mind of
#    /  \ \
#   / /\ \ \_____ Lee Eakin  ( Leakin at dfw dot Nostrum dot com )
#  /  \ \ \______\       or  ( Leakin at cpan dot org )
# / /\ \ \/____  /       or  ( Leakin at japh dot net )
# \ \ \ \____\/ /        or  ( Lee at Eakin dot Org )
#  \ \ \/____  /  Wrapper module for the rsync program
#   \ \____\/ /   rsync can be found at http://rsync.samba.org/rsync/
#    \/______/

package File::Rsync;
require 5.004; # it might work with older versions of 5 but not tested

use FileHandle;
use IPC::Open3 qw(open3);
use IO::Select;
use POSIX ":sys_wait_h";
use Carp 'carp';
use File::Rsync::Config;
use Scalar::Util qw(blessed);

use strict;
use vars qw($VERSION);

$VERSION = '0.43';

=head1 NAME

File::Rsync - perl module interface to rsync(1) F<http://rsync.samba.org/rsync/>

=head1 SYNOPSIS

use File::Rsync;

$obj = File::Rsync->new( { archive => 1, compress => 1,
         rsh => '/usr/local/bin/ssh',
         'rsync-path' => '/usr/local/bin/rsync' } );

$obj->exec( { src => 'localdir', dest => 'rhost:remdir' } )
         or warn "rsync failed\n";

=head1 DESCRIPTION

Perl Convenience wrapper for the rsync(1) program.  Written for I<rsync-2.3.2>
and updated for I<rsync-2.6.0> but should perform properly with most recent
versions.

=over 4

=item File::Rsync::new

$obj = I<new> File::Rsync;

   or

$obj = File::Rsync->I<new>;

   or

$obj = File::Rsync->new(@options);

   or

$obj = File::Rsync->new(\%options);

Create a I<File::Rsync> object.  Any options passed at creation are stored
in the object as defaults for all future I<exec> calls on that object.
Options may be passed in the form of a hash and are the same as the long
options in I<rsync(1)> with the leading double-dash removed.  An additional
option of B<path-to-rsync> also exists which can be used to override the
hardcoded path to the rsync binary that is defined when the module is
installed, and B<debug> which causes the module methods to print some
debugging information to STDERR.  There are also 2 options to wrap the
source and/or destination paths in double-quotes.  They are B<quote-src>
and B<quote-dst>, and may be useful in protecting the paths from shell
expansion (particularly useful for paths containing spaces).  The
B<outfun> and B<errfun> options take a function reference.  The function
is called once for each line of output from the I<rsync> program with the
output line passed in as the first argument, the second arg is either
'out' or 'err' depending on the source.  This makes it possible to use the
same function for both and still determine where the output came from.
Options may also be passed as a reference to a hash.  The B<exclude>
option needs an array reference as its value, since there cannot be
duplicate keys in a hash.  There is an equivalent B<include> option.  Only
an B<exclude> or B<include> option should be used, not both.  Use the '+ '
or '- ' prefix trick to put includes in an B<exclude> array, or to put
excludes in an B<include> array (see I<rsync(1)> for details).
Include/exclude options form an ordered list.  The order must be retained
for proper execution.  There are also B<source> and B<dest> keys.  The key
B<src> is also accepted as an equivalent to B<source>, and B<dst> or
B<destination> may be used as equivalents to B<dest>.  The B<source>
option may take a scalar or an array reference.  If the source is the
local system then multiple B<source> paths are allowed.  In this case an
array reference should be used.  There is also a method for passing
multiple source paths to a remote system.  This method may be triggered in
this module by passing the remote hostname to the B<srchost> key and
passing an array reference to the B<source> key.  If the source host is
being accessed via an Rsync server, the remote hostname should have a
single trailing colon on the name.  When rsync is called, the B<srchost>
value and the values in the B<source> array will be joined with a colon
resulting in the double-colon required for server access.  The B<dest> key
only takes a scalar since I<rsync> only accepts a single destination path.

Version 2.6.0 of I<rsync(1)> provides a new B<files-from> option along with
a few other supporting options (B<from0>, B<no-relative>, and
B<no-implied-dirs>).  To support this wonderful new option at the level it
deserves, this module now has an additional parameter.  If B<files-from> is
set to '-' (meaning read from stdin) you can define B<infun> to be a
reference to a function that prints your file list to the default file handle.
The output from the function is attached to stdin of the rsync call during
exec.  If B<infun> is defined it will be called regardless of the value of
B<files-from>, so it can provide any data expected on stdin, but keep in mind
that stdin will not be attached to a tty so it is not very useful for sending
passwords (see the I<rsync(1)> and I<ssh(1)> man pages for ways to handle
authentication).  The I<rsync(1)> man page has a more complete description of
B<files-from>.  Also see L<File::Find> for ideas to use with B<files-from>
and B<infun>.  The B<infun> option may also be used with the B<include-from>
or B<exclude-from> settings, but this is generally more clumsy than using the
B<include> or B<exclude> arrays.

Version 2.6.3 of I<rsync(1)> provides new options B<partial-dir>,
B<checksum-seed>, B<keep-dirlinks>, B<inplace>, B<ipv4>, and B<ipv6>.
Version 2.6.4 of I<rsync(1)> provides new options B<del>, B<delete-before>
B<delete-during>, B<delay-updates>, B<dirs>, B<filter>, B<fuzzy>,
B<itemize-changes>, B<list-only>, B<omit-dir-times>, B<remove-sent-files>,
B<max-size>, and B<protocol>.

Version 0.38 of this module also adds support for the B<acls> option that
is not part of I<rsync(1)> unless the patch has been applied, but people do
use it.  It also includes a new B<literal> option that takes an array reference
similar to B<include>, B<exclude>, and B<filter>.  Any arguments in the array
are passed as literal arguments to rsync, and are passed first.  They should
have the proper single or double hyphen prefixes and the elements should be
split up the way you want them passed to exec.  The purpose of this option
is to allow the use of arbitrary options added by patches, and/or to allow
the use of new options in rsync without needing an imediate update to the
module in addtition to I<rsync(1)> itself.

=back

=cut

sub new {
   my $class = shift;

   # seed the options hash, booleans, scalars, excludes, source, dest, data,
   # status, stderr/stdout storage for last exec
   my $self = {
      # the full path name to the rsync binary
      'path-to-rsync' => $RsyncConfig{rsync_path},
      # these are the boolean flags to rsync, all default off, including them
      # in the args list turns them on
      'flag' => {qw(
         8-bit-output         0  fuzzy                0  no-specials          0
         acls                 0  group                0  no-super             0
         append               0  hard-links           0  no-times             0
         archive              0  help                 0  no-whole-file        0
         backup               0  ignore-errors        0  numeric-ids          0
         blocking-io          0  ignore-existing      0  omit-dir-times       0
         checksum             0  ignore-non-existing  0  one-file-system      0
         compress             0  ignore-times         0  whole-file           0
         copy-dirlinks        0  inplace              0  owner                0
         copy-links           0  ipv4                 0  partial              0
         copy-unsafe-links    0  ipv6                 0  perms                0
         cvs-exclude          0  keep-dirlinks        0  progress             0
         daemon               0  links                0  prune-empty-dirs     0
         del                  0  list-only            0  recursive            0
         delay-updates        0  no-blocking-io       0  relative             0
         delete               0  no-detach            0  remove-sent-files    0
         delete-after         0  no-devices           0  safe-links           0
         delete-before        0  no-dirs              0  size-only            0
         delete-during        0  no-groups            0  sparse               0
         delete-excluded      0  no-implied-dirs      0  specials             0
         devices              0  no-links             0  stats                0
         dirs                 0  no-owner             0  super                0
         dry-run              0  no-partial           0  times                0
         executability        0  no-perms             0  update               0
         existing             0  no-progress          0  version              0
         force                0  no-recursive         0  xattrs               0
         from0                0  no-relative          0  
      )},
      # these have simple scalar args we cannot easily check
      'scalar' => {qw(
         address              0  log-format           0  protocol             0
         backup-dir           0  max-delete           0  read-batch           0
         block-size           0  max-size             0  rsh                  0
         bwlimit              0  min-size             0  rsync-path           0
         checksum-seed        0  modify-window        0  sockopts             0
         compress-level       0  only-write-batch     0  suffix               0
         config               0  partial-dir          0  temp-dir             0
         csum-length          0  password-file        0  timeout              0
         files-from           0  port                 0  write-batch          0
      )},
      # these are not flags but counters, each time they appear it raises the
      # count, so we keep track and pass them the same number of times
      'counter' => {qw(
         human-readable       0  one-file-system      0  verbose              0
         itemize-changes      0  quiet                0
      )},
      # these can be specified multiple times and are additive, the doc also
      # specifies that it is an ordered list so we must preserve that order
      'chmod'        => [],
      'compare-dest' => [],
      'copy-dest'    => [],
      'exclude'      => [],
      'exclude-from' => [],
      'filter'       => [],
      'include'      => [],
      'include-from' => [],
      'link-dest'    => [],
      'literal'      => [],
      # hostname of source, used if 'source' is an array reference
      'srchost'     => '',
      # source host and/or path names
      'source'      => '',
      # destination host and/or path
      'dest'        => '',
      # return status from last exec
      'status'      => 0,
      'realstatus'  => 0,
      # last rsync command-line executed
      'lastcmd'     => undef,
      # whether or not to print debug statements
      'debug'       => 0,
      # double-quote source and/or destination paths
      'quote-src'   => 0,
      'quote-dst'   => 0,
      # stderr from last exec in array format (messages from remote rsync proc)
      'err'         => 0,
      'errfun'      => undef,
      # stdout from last exec in array format (messages from local rsync proc)
      'out'         => 0,
      'outfun'      => undef,
      # function to prvide --*-from=- data via pipe
      'infun'     => undef,
      # this flag changes error checking in 'exec' when called by 'list'
      'list'        => 0,
   };
   bless $self, $class; # bless it first so defopts can find out the class
   if (@_) {
      &defopts($self,@_) or return;
   }
   return $self;
}

=over 4

=item File::Rsync::defopts

$obj->defopts(@options);

   or

$obj->defopts(\%options);

Set default options for future exec calls for the object.  See I<rsync(1)>
for a complete list of valid options.  This is really the internal
method that I<new> calls but you can use it too.  The B<verbose> and B<quiet>
options to rsync are actually counters.  When assigning the perl hash-style
options you may specify the counter value directly and the module will pass
the proper number of options to rsync.

=back

=cut

sub defopts {
   # this method has now been split into 2 sub methods (parse and save)
   # _saveopts and _parseopts should only be used via defopts or exec
   my $self = shift;
   &_saveopts($self,&_parseopts($self,@_));
}

sub _parseopts {
   # this method checks and converts it's args into a reference to a hash
   # of valid options and returns it to the caller
   my $self = shift;
   my $pkgname = ref $self;
   my @opts = @_;
   my $opt;
   my %OPT = (); # this is the hash we will return a ref to

   # make sure we are passed the proper number of args
   if (@opts == 1) {
      $opt = shift;
      if (my $reftype = ref $opt) {
         unless ($reftype eq 'HASH') {
            carp "$pkgname: invalid reference type ($reftype) in options";
            return;
         }
      } else {
         carp "$pkgname: invalid option ($opt)";
         return;
      }
   } elsif (@opts % 2) {
      carp "$pkgname: invalid number of options passed (must be key/value pairs)";
      return;
   } else {
      $opt = {@opts};
   }

   # now process the options given, we handle debug first since hashes do not
   # have a specific order, and it would not be set first even if we sorted
   if (exists $opt->{'debug'}) {
      $OPT{'debug'} = $opt->{'debug'};
      print(STDERR "setting debug flag\n") if $OPT{'debug'};
   }
   foreach my $hashopt (keys %$opt) {
      my $savopt = $hashopt;
      $savopt =~ tr/_/-/;
      next if $hashopt eq 'debug'; # we did this one first (above)
      print STDERR "processing option: $hashopt\n"
         if $OPT{'debug'} or $self->{'debug'};
      if (exists $self->{'flag'}{$savopt}
            or exists $self->{'scalar'}{$savopt}
            or exists $self->{'counter'}{$savopt}) {
         $OPT{$savopt} = $opt->{$hashopt};
      } else {
         my $tag = '';
         if (     $hashopt eq 'chmod'
               or $hashopt eq 'compare-dest'
               or $hashopt eq 'copy-dest'
               or $hashopt eq 'exclude'
               or $hashopt eq 'exclude-from'
               or $hashopt eq 'filter'
               or $hashopt eq 'include'
               or $hashopt eq 'include-from'
               or $hashopt eq 'link-dest'
               or $hashopt eq 'literal') {
            $tag = $hashopt;
         } elsif ($hashopt eq 'source'
               or $hashopt eq 'src') {
            $tag = 'source';
         }
         if ($tag) {
            if (my $reftype = ref $opt->{$hashopt}) {
               if ($reftype eq 'ARRAY') {
                  $OPT{$tag} = $opt->{$hashopt};
               } elsif ($tag eq 'source' && blessed $opt->{$hashopt}) {
                  $OPT{$tag} = [ $opt->{$hashopt} ];
               } else {
                  carp "$pkgname: invalid reference type for $hashopt option";
                  return;
               }
            } elsif ($tag eq 'source') {
               $OPT{$tag} = [ $opt->{$hashopt} ];
            } else {
               carp "$pkgname: $hashopt is not a reference";
               return;
            }
         } elsif ($hashopt eq 'dest'
               or $hashopt eq 'destination'
               or $hashopt eq 'dst') {
            $OPT{'dest'} = $opt->{$hashopt};

         } elsif ($savopt eq 'path-to-rsync'
               or $savopt eq 'srchost'
               or $savopt eq 'quote-dst'
               or $savopt eq 'quote-src') {
            $OPT{$savopt} = $opt->{$hashopt};
         } elsif ($hashopt eq 'outfun' or $hashopt eq 'errfun'
               or $hashopt eq 'infun') {
            if (ref $opt->{$hashopt} eq 'CODE') {
               $OPT{$hashopt} = $opt->{$hashopt};
            } else {
               carp "$pkgname: $hashopt option is not a function reference";
               return;
            }
         } else {
            carp "$pkgname: $hashopt - unknown option";
            return;
         }
      }
   }
   return \%OPT;
}

sub _saveopts {
   # this method saves the data from the hash passed to it in the object's
   # hash
   my $self = shift;
   my $pkgname = ref $self;
   my $opts = shift;
   return unless ref $opts eq 'HASH';
   foreach my $opt (keys %$opts) {
      if (exists $self->{'flag'}{$opt}) {
         $self->{'flag'}{$opt} = $opts->{$opt};
      } elsif (exists $self->{'scalar'}{$opt}) {
         $self->{'scalar'}{$opt} = $opts->{$opt};
      } elsif (exists $self->{'counter'}{$opt}) {
         $self->{'counter'}{$opt} = $opts->{$opt};
      } elsif ($opt eq 'chmod' or $opt eq 'compare-dest'
            or $opt eq 'copy-dest' or $opt eq 'link-dest'
            or $opt eq 'exclude' or $opt eq 'exclude-from'
            or $opt eq 'include' or $opt eq 'include-from'
            or $opt eq 'filter' or $opt eq 'source' or $opt eq 'dest'
            or $opt eq 'debug' or $opt eq 'outfun' or $opt eq 'errfun'
            or $opt eq 'infun' or $opt eq 'path-to-rsync'
            or $opt eq 'srchost' or $opt eq 'quote-dst'
            or $opt eq 'quote-src' or $opt eq 'literal') {
         $self->{$opt} = $opts->{$opt};
      } else {
         carp "$pkgname: unknown option: $opt";
         return;
      }
   }
   return 1;
}

=over 4

=item File::Rsync::getcmd

my $cmd = $obj->getcmd(@options);

   or

my $cmd = $obj->getcmd(\%options);

   or

my ($cmd, $infun, $outfun, $errfun, $debug) = $obj->getcmd(\%options);

I<getcmd> returns a reference to an array containing the real rsync command
that would be called if the exec function were called.  The last example above
includes a reference to the optional stdin function, stdout function, stderr
function, and the debug setting.  This is the form used by the I<exec> method
to get the extra parameters it needs to do its job.  The function is exposed
to allow a user-defined exec function to be used, or for debugging purposes.

=back

=cut

sub getcmd {
   my $self = shift;
   my $pkgname = ref $self;
   my $merged = $self;
   my $list = $self->{list};
   $self->{list} = 0 if $self->{list};
   if (@_) { # If args are passed to exec then we have to merge the saved
      # (default) options with those passed, for any conflicts those passed
      # directly to exec take precidence
      my $execopts = &_parseopts($self,@_);
      return unless ref $execopts eq 'HASH';
      my %runopts = ();
      # first copy the default info from $self
      foreach my $type (qw(flag scalar counter)) {
         foreach my $opt (keys %{$self->{$type}}) {
            $runopts{$type}{$opt} = $self->{$type}{$opt};
         }
      }
      foreach my $opt (qw(path-to-rsync chmod compare-dest copy-dest
               exclude exclude-from filter include include-from
               link-dest source srchost debug dest outfun
               errfun infun quote-dst quote-src literal)) {
         $runopts{$opt} = $self->{$opt};
      }
      # now allow any args passed directly to exec to override
      foreach my $opt (keys %$execopts) {
         if (exists $runopts{'flag'}{$opt}) {
            $runopts{'flag'}{$opt} = $execopts->{$opt};
         } elsif (exists $runopts{'scalar'}{$opt}) {
            $runopts{'scalar'}{$opt} = $execopts->{$opt};
         } elsif (exists $runopts{'counter'}{$opt}) {
            $runopts{'counter'}{$opt} = $execopts->{$opt};
         } elsif ($opt eq 'chmod' or $opt eq 'compare-dest'
               or $opt eq 'copy-dest' or $opt eq 'link-dest'
               or $opt eq 'exclude' or $opt eq 'exclude-from'
               or $opt eq 'include' or $opt eq 'include-from'
               or $opt eq 'filter' or $opt eq 'source' or $opt eq 'dest'
               or $opt eq 'debug' or $opt eq 'outfun' or $opt eq 'errfun'
               or $opt eq 'infun' or $opt eq 'path-to-rsync'
               or $opt eq 'srchost' or $opt eq 'quote-dst'
               or $opt eq 'quote-src' or $opt eq 'literal') {
            $runopts{$opt} = $execopts->{$opt};
         } else {
            carp "$pkgname: unknown option: $opt";
            return;
         }
      }
      $merged = \%runopts;
   }

   my @cmd = ($merged->{'path-to-rsync'});

   # put any literal options first
   push @cmd,@{$merged->{'literal'}} if @{$merged->{'literal'}};

   foreach my $opt (sort keys %{$merged->{'flag'}}) {
      push @cmd,"--$opt" if $merged->{'flag'}{$opt};
   }
   foreach my $opt (sort keys %{$merged->{'scalar'}}) {
      push @cmd,"--$opt=$merged->{'scalar'}{$opt}" if $merged->{'scalar'}{$opt};
   }
   foreach my $opt (sort keys %{$merged->{'counter'}}) {
      for (my $i = 0;$i<$merged->{'counter'}{$opt};$i++) {
         push @cmd,"--$opt";
      }
   }
   if ((@{$merged->{'exclude'}} != 0) + (@{$merged->{'include'}} != 0)
           + (@{$merged->{'filter'}} != 0) > 1) {
      carp "$pkgname: 'exclude' and/or 'include' and/or 'filter' options specified, only one allowed";
      return;
   }
   foreach my $opt (@{$merged->{'chmod'}}) {
      push @cmd,"--chmod=$opt";
   }
   foreach my $opt (@{$merged->{'compare-dest'}}) {
      push @cmd,"--compare-dest=$opt";
   }
   foreach my $opt (@{$merged->{'copy-dest'}}) {
      push @cmd,"--copy-dest=$opt";
   }
   foreach my $opt (@{$merged->{'exclude'}}) {
      push @cmd,"--exclude=$opt";
   }
   foreach my $opt (@{$merged->{'exclude-from'}}) {
      push @cmd,"--exclude-from=$opt";
   }
   foreach my $opt (@{$merged->{'filter'}}) {
      push @cmd,"--filter=$opt";
   }
   foreach my $opt (@{$merged->{'include'}}) {
      push @cmd,"--include=$opt";
   }
   foreach my $opt (@{$merged->{'include-from'}}) {
      push @cmd,"--include-from=$opt";
   }
   foreach my $opt (@{$merged->{'link-dest'}}) {
      push @cmd,"--link-dest=$opt";
   }
   if ($merged->{'source'}) {
      if ($merged->{'srchost'}) {
         push @cmd, "$merged->{'srchost'}:" . join ' ',
            $merged->{'quote-src'} ? map { "\"$_\"" } @{$merged->{'source'}}
                                    : @{$merged->{'source'}};
      } else {
         push @cmd,
            $merged->{'quote-src'} ? map { "\"$_\"" } @{$merged->{'source'}}
                                    : @{$merged->{'source'}};
      }
   } elsif ($merged->{'srchost'} and $list) {
      push @cmd, "$merged->{'srchost'}:";
   } else {
      if ($list) {
         carp "$pkgname: no 'source' specified";
         return;
      } elsif ($merged->{'dest'}) {
         carp "$pkgname: option 'dest' specified without 'source' option";
         return;
      } else {
         carp "$pkgname: no source or destination specified";
         return;
      }
   }
   unless ($list) {
      if ($merged->{'dest'}) {
         push @cmd,
            $merged->{'quote-dst'} ? "\"$merged->{'dest'}\""
                                   : $merged->{'dest'};
      } else {
         carp "$pkgname: option 'source' specified without 'dest' option";
         return;
      }
   }
   return(wantarray
         ? (\@cmd,
            $merged->{'infun'},
            $merged->{'outfun'},
            $merged->{'errfun'},
            $merged->{'debug'})
         : \@cmd);
}

=over 4

=item File::Rsync::exec

$obj->exec(@options) or warn "rsync failed\n";

   or

$obj->exec(\%options) or warn "rsync failed\n";

This is the method that does the real work.  Any options passed to this
routine are appended to any pre-set options and are not saved.  They effect
the current execution of I<rsync> only.  In the case of conflicts, the options
passed directly to I<exec> take precedence.  It returns B<1> if the return
status was zero (or true), if the I<rsync> return status was non-zero it
returns B<0> and stores the return status.  You can examine the return status
from I<rsync> and any output to stdout and stderr with the methods listed below.

=back

=cut

sub exec {
   my $self = shift;

   my ($cmd, $infun, $outfun, $errfun, $debug) = $self->getcmd(@_);
   return unless $cmd;
   print STDERR "exec: @$cmd\n" if $debug;
   my $out = FileHandle->new; my $err = FileHandle->new;
   $err->autoflush(1);
   $out->autoflush(1);
   local $SIG{CHLD}='DEFAULT';
   my $pid;
   {
      my $in = FileHandle->new;
      $in->autoflush(1);
      $pid = eval{ open3 $in,$out,$err,@$cmd };
      $self->{lastcmd} = $cmd;
      if ($@) {
         $self->{'realstatus'} = 0;
         $self->{'status'} = 255;
         $self->{'err'} = [$@,"Execution of rsync failed.\n"];
         return 0;
      }
      if ($infun) {
         select((select($in),&{$infun})[0]);
      }
      $in->close;
   }
   my $odata = my $edata = '';

   my $stream = { 
     $out->fileno => {
        name         => 'out',
        data         => \$odata,
        buffer_tail  => '',
        block_size   => ($out->stat)[11] || 1024,
        handler      => $outfun
     },         
     $err->fileno => {
        name         => 'err',
        data         => \$edata,
        buffer_tail  => '',
        block_size   => ($err->stat)[11] || 1024,
        handler      => $errfun
     }
   };

   my $select = IO::Select->new;
   $select->add($out,$err);

   while ($out->opened or $err->opened) {
      foreach my $fd ( $select->can_read(1) ) {
         my $str = $stream->{$fd->fileno};
         warn("stream not found") unless $str;

         my $buffer;
         if ( $fd->sysread($buffer, $str->{block_size}) ) {
            ${$str->{data}} .= $buffer;
            if ( $str->{handler} ) {
               my $tail = '';
               $tail = $1 if $buffer =~ s/([^\n]+)\z//s;
               foreach my $line ( split /^/m, $str->{buffer_tail}.$buffer ) {
                  &{$str->{handler}}($line, $str->{name});
               }
               $str->{buffer_tail} = $tail;
            }
         } else {
            $select->remove($fd);
            $fd->close;
         }
      }
   }

   $self->{'out'} = $odata ? [ split /^/m,$odata ] : '';
   $self->{'err'} = $edata ? [ split /^/m,$edata ] : '';
   $out->close;
   $err->close;
   waitpid $pid,0;
   $self->{'realstatus'} = $?;
   $self->{'status'} = $?>>8;
   return($self->{'status'} ? 0 : 1);
}

=over 4

=item File::Rsync::list

$out = $obj->list(@options);

   or

$out = $obj->list(\%options);

   or

@out = $obj->list(\%options);

This is a wrapper for I<exec> called without a destination to get a listing.
It returns the output of stdout like the I<out> function below.  When
no destination is given rsync returns the equivalent of 'ls -l' or 'ls -lr'
modified by any include/exclude/filter parameters you specify.  This is useful
for manual comparison without actual changes to the destination or for
comparing against another listing taken at a different point in time.

(As of rsync version 2.6.4-pre1 this can also be accomplished with the
'list-only' option regardless of whether a destination is given.)

=back

=cut

sub list {
   my $self = shift;
   $self->{list}++;
   $self->exec(@_);
   if ($self->{'out'}) {
      return(wantarray ? @{$self->{'out'}} : $self->{'out'});
   } else {
      return;
   }
}

=over 4

=item File::Rsync::status

$rval = $obj->I<status>;

Returns the status from last I<exec> call right shifted 8 bits.

=back

=cut

sub status {
   my $self = shift;
   return $self->{'status'};
}

=over 4

=item File::Rsync::realstatus

$rval = $obj->I<realstatus>;

Returns the real status from last I<exec> call (not right shifted).

=back

=cut

sub realstatus {
   my $self = shift;
   return $self->{'realstatus'};
}

=over 4

=item File::Rsync::err

$aref = $obj->I<err>;

In a scalar context this method will return a reference to an array containing
all output to stderr from the last I<exec> call, or zero (false) if there
was no output.  In an array context it will return an array of all output to
stderr or an empty list.  The scalar context can be used to efficiently test
for the existance of output.  I<rsync> sends all messages from the remote
I<rsync> process and any error messages to stderr.  This method's purpose is
to make it easier for you to parse that output for appropriate information.

=back

=cut

sub err {
   my $self = shift;
   if ($self->{'err'}) {
      return(wantarray ? @{$self->{'err'}} : $self->{'err'});
   } else {
      return;
   }
}

=over 4

=item File::Rsync::out

$aref = $obj->I<out>;

Similar to the I<err> method, in a scalar context it returns a reference to an
array containing all output to stdout from the last I<exec> call, or zero
(false) if there was no output.  In an array context it returns an array of all
output to stdout or an empty list.  I<rsync> sends all informational messages
(B<verbose> option) from the local I<rsync> process to stdout.

=back

=cut

sub out {
   my $self = shift;
   if ($self->{'out'}) {
      return(wantarray ? @{$self->{'out'}} : $self->{'out'});
   } else {
      return;
   }
}

=over 4

=item File::Rsync::lastcmd

$aref = $obj->I<lastcmd>;

Returns the actual system command used by the last I<exec> call, or '' before
any calls to I<exec> for the object.  This can be useful in the case of an
error condition to give a more informative message or for debugging purposes.
In an array context it return an array of args as passed to the system, in
a scalar context it returns a space-seperated string.  See I<getcmd> for access
to the command before execution.

=back

=cut

sub lastcmd {
   my $self = shift;
   if ($self->{lastcmd}) {
      return wantarray ? @{$self->{lastcmd}} : join ' ',@{$self->{lastcmd}};
   } else {
      return;
   }
}

=head1 Author

Lee Eakin E<lt>leakin@dfw.nostrum.comE<gt>

=head1 Credits

The following people have contributed ideas, bug fixes, code or helped out
by reporting or tracking down bugs in order to improve this module since
it's initial release.  See the Changelog for details:

Greg Ward

Boris Goldowsky

James Mello

Andreas Koenig

Joe Smith

Jonathan Pelletier

Heiko Jansen

Tong Zhu

Paul Egan

Ronald J Kimball

James CE Johnson

Bill Uhl

Peter teStrake

Harald Flaucher

Simon Myers

Gavin Carr

Petya Kohts

=head1 Inspiration and Assistance

Gerard Hickey                             C<PGP::Pipe>

Russ Allbery                              C<PGP::Sign>

Graham Barr                               C<Net::*>

Andrew Tridgell and Paul Mackerras        rsync(1)

John Steele   E<lt>steele@nostrum.comE<gt>

Philip Kizer  E<lt>pckizer@nostrum.comE<gt>

Larry Wall                                perl(1)

I borrowed many clues on wrapping an external program from the PGP modules,
and I would not have had such a useful tool to wrap except for the great work
of the B<rsync> authors.  Thanks also to Graham Barr, the author of the libnet
modules and many others, for looking over this code.  Of course I must mention
the other half of my brain, John Steele, and his good friend Philip Kizer for
finding B<rsync> and bringing it to my attention.  And I would not have been
able to enjoy writing useful tools if not for the creator of the B<perl>
language.

=head1 Copyrights

      Copyright (c) 1999-2005 Lee Eakin.  All rights reserved.
 
      This program is free software; you can redistribute it and/or modify
      it under the same terms as Perl itself. 

=cut

1;
