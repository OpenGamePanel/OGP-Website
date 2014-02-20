@echo off
net session >nul 2>&1
if NOT %errorLevel% == 0 (
	echo Failure: Current permissions inadequate.
	echo[
	echo Run this script by using "Run as administrator" in the context menu.
	pause >nul
	exit
)
set WD=%~dp0
pushd %WD%
REM Set the needed enviroment variables to run Cygwin executables without writing the full path
set CYGWIN=server ntsec
set path=%WD%\bin;%WD%\usr\sbin;%path%
set SHELL=/bin/bash
REM Create a vbs script that downloads the installer for Cygwin
echo strFileURL = "http://cygwin.com/setup-x86_64.exe" > dwl_setup.vbs
echo Dim strSavePath >> dwl_setup.vbs
echo strSavePath = CreateObject("Scripting.FileSystemObject").GetAbsolutePathName(".") ^& "\setup-x86_64.exe" >> dwl_setup.vbs
echo Set objXMLHTTP = CreateObject("MSXML2.XMLHTTP") >> dwl_setup.vbs
echo objXMLHTTP.open "GET", strFileURL, false >> dwl_setup.vbs
echo objXMLHTTP.send() >> dwl_setup.vbs
echo If objXMLHTTP.Status = 200 Then >> dwl_setup.vbs
echo     Set objADOStream = CreateObject("ADODB.Stream") >> dwl_setup.vbs
echo     objADOStream.Open >> dwl_setup.vbs
echo     objADOStream.Type = 1 'adTypeBinary >> dwl_setup.vbs
echo     objADOStream.Write objXMLHTTP.ResponseBody >> dwl_setup.vbs
echo     objADOStream.Position = 0 >> dwl_setup.vbs
echo     Set objFso = Createobject("Scripting.FileSystemObject") >> dwl_setup.vbs
echo     If objFso.Fileexists(strSavePath) Then objFSO.DeleteFile strSavePath >> dwl_setup.vbs
echo     Set objFso = Nothing >> dwl_setup.vbs
echo     objADOStream.SaveToFile strSavePath >> dwl_setup.vbs
echo     objADOStream.Close >> dwl_setup.vbs
echo     Set objADOStream = Nothing >> dwl_setup.vbs
echo End if >> dwl_setup.vbs
echo Set objXMLHTTP = Nothing >> dwl_setup.vbs
REM Advice 
echo DO NOT CLOSE THIS WINDOW YET.
echo The setup process will continue once cygwin installation ends.
REM start the download for Cygwin setup.exe 
dwl_setup.vbs
REM start the setup for cygwin with the requiered repositories, paths and packages
setup-x86_64.exe -K http://cygwinports.org/ports.gpg -s ftp://mirrors.kernel.org/sources.redhat.com/cygwinports -s ftp://ftp.gwdg.de/pub/linux/sources.redhat.com/cygwin --quiet-mode --root %WD% --local-package-dir %WD%cygTemp -P apache2 -P php5 -P mysql -P mysqld -P apache2-mod_php5 -P php -P php-Archive_Tar -P php-xmlrpc -P php-curl -P php-xmlreader -P php-simplexml -P php-json -P php-mysql -P php-gd -P php-PEAR -P php-session -P php-ftp -P php-ctype -P php-zip -P curl -P cygrunsrv -P subversion -P cron -P dos2unix -P bzip2 -P ca-certificates -P crypt -P csih -P diffutils -P gettext -P groff -P less -P libarp1 -P libaprutil1 -P libasn1_8 -P libattr1 -P libbz2_1 -P libcom_err2 -P libcurl4 -P libdb4.5 -P libdb4.8 -P libexpat1 -P libfreetype6 -P libgcc1 -P libgdbm4 -P libgmp10 -P libgmp3 -P libgssapi3 -P libheimbase1 -P libheimntlm0 -P libhx509_5 -P libiconv2 -P libidn11 -P libintl8 -P libiodbc2 -P libjpeg8 -P libkrb5_26 -P liblzma5 -P libmetalink3 -P libmpfr4 -P libmysqlclient18 -P libncurses10 -P libncursesw10 -P libneon27 -P libopenldap2_4_2 -P libopenssl100 -P libpcre0 -P libpcre1 -P libpng15 -P libpopt0 -P libpq5 -P libproxy1 -P libroken18 -P libsasl2_3 -P libserf1_0 -P libsqlite3_0 -P libssh2_1 -P libssp0 -P libstdc++6 -P libuuid1 -P libuuid1 -P libvpx1 -P libwind0 -P libwrap0 -P libX11_6 -P libXau6 -P libxcb1 -P libXdmcp6 -P libxml2 -P libXpm4 -P openssl -P perl -P perl-Clone -P perl-DBD-mysql -P perl-DBI -P perl_vendor -P php-bz2 -P php-Console_Getopt -P php-Structures_Graph -P php-XML_Util -P php-zlib -P php-mbstring -P t1lib5 -P texinfo -P xz -P _autorebase -P _update-info-dir -P libapr1 -P libasprintf0 -P libcrypt0 -P libdb5.3 -P libreadline7 -P perl-Params-Util -P terminfo > cygwin_setup.log
mkpasswd -l > /etc/passwd
mkgroup -l > /etc/group
REM Stop servers and remove any service that can be running from a previous setup
net stop cygserver
net stop cron
set /p MYSQLD_PID=<%WD%var\run\mysqld.pid
kill -15 %MYSQLD_PID%
bash /usr/sbin/apachectl2 stop
cls
sc delete cygserver
sc delete cron
cls
REM Runs 'rebaseall' that fixes owners and/or permissions for all Cygwin file system
dash -c '/usr/bin/rebaseall -v'
REM Runs the the setup for cygserver service
bash cygserver-config
REM Creating a bash script that configures cron as service with the administrator privilegies of the current user
echo In order to schedule tasks from the panel,
echo you need to run cron as a Windows administrator so
set /p PASS=please enter the password for user '%USERNAME%':
echo cron-config ^<^< EOF> auto-cron-config
echo yes>> auto-cron-config
echo[>> auto-cron-config
echo no>> auto-cron-config
echo no>> auto-cron-config
echo no>> auto-cron-config
echo %PASS%>> auto-cron-config
echo %PASS%>> auto-cron-config
echo no>> auto-cron-config
echo EOF>> auto-cron-config
dos2unix auto-cron-config
chmod +x auto-cron-config
REM Runs the script that configures cron
bash auto-cron-config
REM Creating a pair of bash scripts to configure PHP and php-PEAR
echo if test "$(cat /etc/php5/php.ini | grep "^^include_path")" == ""; then echo "include_path = \".:/usr/share/pear\"" ^>^> /etc/php5/php.ini; fi > test_pear_path
echo sed -i 's/DirectoryIndex .*/DirectoryIndex index.html index.php/g' /etc/apache2/httpd.conf > test_index_php
chmod +x test_pear_path 
chmod +x test_index_php
dos2unix test_pear_path 
dos2unix test_index_php
REM Run PHP scripts
bash test_pear_path
bash test_index_php
REM Delete (once used) useless scripts
rm -f test_pear_path test_index_php
cls
REM Create the database files, needed to run MySQL server
bash  mysql_install_db
REM Creating a bash script that starts MySQL server with a pid file
echo /usr/sbin/mysqld --pid-file=/var/run/mysqld.pid --log-error=/var/log/mysql_err.log> %WD%\bin\mysqld_start
REM Fixing the file to run in bash and make it executable
dos2unix /usr/bin/mysqld_start
chmod +x /usr/bin/mysqld_start
REM Creating a bash script that stops MySQL server by its pid file
echo kill -15 ^`cat /var/run/mysqld.pid^` > %WD%\bin\mysqld_stop
REM Fixing the file to run in bash and make it executable
dos2unix /usr/bin/mysqld_stop
chmod +x /usr/bin/mysqld_stop
REM Creating batch scripts to stop/start MySQL server using bash and their respective bash scripts
echo @echo off> mysqld_start.bat
echo set WD=%%~dp0>> mysqld_start.bat
echo pushd %%WD%%>> mysqld_start.bat
echo set path=%%WD%%bin;%%WD%%usr\sbin;%%path%%>> mysqld_start.bat
echo set CYGWIN=server ntsec>> mysqld_start.bat
echo set SHELL=/bin/bash>> mysqld_start.bat
cp -f mysqld_start.bat mysqld_stop.bat
cp -f mysqld_start.bat apache2_stop.bat
cp -f mysqld_start.bat apache2_start.bat
echo bash mysqld_start>> mysqld_start.bat
echo bash mysqld_stop>> mysqld_stop.bat
REM Creating bash scripts to start/stop Apache2 web server
echo net start cygserver>> apache2_start.bat
echo net start httpd2>> apache2_start.bat
echo net stop httpd2>> apache2_stop.bat
echo net stop cygserver>> apache2_stop.bat
REM Creating a vbs script that hiddes the window of the batch script that starts MySQL server
echo Dim strSavePath> mysql_start_background.vbs
echo strSavePath = CreateObject("Scripting.FileSystemObject").GetAbsolutePathName(".") ^& "\mysqld_start.bat">> mysql_start_background.vbs
echo CreateObject("Wscript.Shell").Run "" ^& strSavePath ^& "" , 0, false>> mysql_start_background.vbs
REM Running MySQL server hidden
mysql_start_background.vbs
cls
echo Waiting for Mysql Server to start...
@ping 127.0.0.1 -n 15 -w 1000 > nul
cls
REM Creating a blank database named ogp_panel to use it for the panel later
%WD%\bin\mysql -u root -e "CREATE DATABASE ogp_panel";
cls
REM Setting up the SQL server
%WD%\bin\bash mysql_secure_installation
REM Getting the lastest version of OGP web panel from SVN
echo Getting the lastest version of OGP web panel from SVN...
%WD%\bin\svn co svn://svn.code.sf.net/p/hldstart/code/trunk/upload /srv/www/htdocs
rm -f /srv/www/htdocs/index.html
REM Asks for adding mysqld and httpd to the system startup 
set /p ONBOOT= Start MySQL server at system boot[Y/n]:
IF "X%ONBOOT%" == "X" (
set ONBOOT=Y
)
IF "X%ONBOOT%" == "Xy" (
set ONBOOT=Y
)
IF "X%ONBOOT%" == "XN" (
set ONBOOT=n
)
IF "X%ONBOOT%" == "XY" (
schtasks /create /tn "MySQL server start on boot" /rl highest /ru %USERDOMAIN%\%USERNAME% /rp "%PASS%" /tr %WD%mysqld_start.bat /sc onstart
) ELSE (
IF "X%ONBOOT%" == "Xn" (
schtasks /delete /tn "MySQL server start on boot"
)
)
bash /usr/sbin/httpd2-config
net start cygserver
net start httpd2
echo Now you can close this window and complete the installation 
echo of the panel from http://localhost/install.php.
echo PS: The database name is ogp_panel.
pause
REM Start Intrenet explorer and show the panel setup
start iexplore "http://localhost/install.php"