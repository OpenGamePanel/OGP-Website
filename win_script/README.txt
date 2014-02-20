BOTH SCRIPTS:
Both installers must be run as administrator.
This script will install all in the folder where it is executed.
CygWin and all the scripts must be installed in the same folder.
Do not change any option in the cygwin setup but the main mirror. 
Cygports mirror ( mirros.kernel.org ) must be checked as well.
After the first Cygwin installation you should use the commands
mkpasswd and mkgroup to generate the file /etc/passwd:

mkpasswd -l > /etc/passwd
mkgroup -l > /etc/group

This is usefull to prevent the error:
"Unable to open the passwd file: No such file or directory"

PANEL SCRIPT:
Stop the agent and pure-ftpd before running the panel installer, 
because apache2 needs to use 'rebaseall -v' from the dash shell to get it working properly,
and this action requieres all processes stopped before running it.