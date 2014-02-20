@echo off
set WD=%~dp0
pushd %WD%
REM Set the needed enviroment variables to run Cygwin executables without writing the full path
set CYGWIN=server ntsec
set path=%WD%\bin;%WD%\usr\sbin;%path%
set SHELL=/bin/bash
REM Stop running services
echo Stopping OGP services...
net stop cygserver
net stop httpd2
net stop cron
net stop mysqld
net stop ogp_agent
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
echo Runing rebaseall -v
REM Runs 'rebaseall' that fixes owners and/or permissions for all Cygwin file system
dash -c '/usr/bin/rebaseall -v'
pause
cls
echo Starting OGP services...
net start cygserver
net start httpd2
net start cron
net start mysqld
net start ogp_agent
pause