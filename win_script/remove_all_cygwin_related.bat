@echo off
set WD=%~dp0
pushd %WD%
REM Set the needed enviroment variables to run Cygwin executables without writing the full path
set CYGWIN=server ntsec
set path=%WD%\bin;%WD%\usr\sbin;%path%
set SHELL=/bin/bash
echo Stopping OGP services...
net stop cygserver
sc delete cygserver
net stop httpd2
sc delete httpd2
net stop cron
sc delete cron
net stop mysqld
sc delete mysqld
net stop ogp_agent
sc delete ogp_agent
pause
cls
echo Trying to kill all running screen
echo kill ^`(ps -a ^| grep "$((ps -a |grep screen) | awk '{ print $1 }')")^|awk '{ print $1 }'^` > checkscreen
dos2unix checkscreen
chmod +x checkscreen
bash checkscreen
rm -f checkscreen
screen -wipe
pause
cls
set /p CONFIRM= Are you sure that you want remove all contents in %WD% (Y to confirm):
IF "X%CONFIRM%" == "XY" (
echo rm -Rf --no-preserve-root `cygpath -ua %WD%\`> eraser.sh
echo echo "removed `cygpath -ua %WD%\`">>eraser.sh
dos2unix eraser.sh
bash eraser.sh
)
pause