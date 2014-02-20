# -*- perl -*-
# vim:ft=perl foldlevel=1
package File::Rsync::Config;

require Exporter;
use vars qw(@ISA @EXPORT %RsyncConfig);
use strict;

@EXPORT=qw(%RsyncConfig);
@ISA=qw(Exporter);

%RsyncConfig=(
      rsync_path => '/usr/bin/rsync',
);
1;
