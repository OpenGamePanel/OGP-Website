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
REM Create a vbs file that downloads the setup binary for Cygwin
echo strFileURL = "http://cygwin.com/setup-x86.exe" > dwl_setup.vbs
echo Dim strSavePath >> dwl_setup.vbs
echo strSavePath = CreateObject("Scripting.FileSystemObject").GetAbsolutePathName(".") ^& "\setup-x86.exe" >> dwl_setup.vbs
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
setup-x86.exe -K http://cygwinports.org/ports.gpg -s ftp://mirrors.kernel.org/sources.redhat.com/cygwinports -s ftp://ftp.gwdg.de/pub/linux/sources.redhat.com/cygwin --quiet-mode --packages screen --packages subversion --packages perl --packages wget --packages unzip --packages tar --packages gawk --packages pure-ftpd --packages screen --packages bzip2 --packages wget --packages zip --packages unzip --packages nano --packages rsync --root %WD% --local-package-dir %WD%cygTemp -P crypt -P csih -P diffutils -P gettext -P groff -P less -P libapr1 -P libaprutil1 -P libasn1_8 -P libattr1 -P libbz2_1 -P libcom_err2 -P libdb4.5 -P libdb4.8 -P libexpat1 -P libffi6 -P libgcc1 -P libgcrypt11 -P libgdbm4 -P libgmp10	-P libgmp3	-P libgnutls26 -P libgpg-error0 -P libgssapi3 -P libheimbase1 -P libheimntlm0 -P libhx509_5 -P libiconv2 -P libidn11 -P libintl8 -P libiodbc2 -P libkrb5_26 -P liblzma5 -P liblzo2_2 -P libmpfr4 -P libmysqlclient18 -P libncurses10 -P libncursesw10 -P libneon27 -P libopenldap2_4_2 -P libopenssl098 -P libopenssl100 -P libp11-kit0 -P libpcre0 -P libpopt0 -P libpq5 -P libproxy1 -P libroken18 -P libsasl2_3 -P libserf1_0 -P libsqlite3_0 -P libssp0 -P libstdc++6 -P libtasn1_3 -P libuuid1 -P libwind0 -P libxml2 -P openssl -P perl_vendor -P texinfo -P xz -P _autorebase -P _update-info-dir -P perl-Path-Class -P perl-YAML -P make -P libpcre1> cygwin_setup.log
REM Set the needed enviroment variables to run Cygwin executables without writing the full path
set path=%WD%\bin;%WD%\usr\sbin;%path%
set SHELL=/bin/bash
REM Create batch files to start and stop the agent
echo @echo off> agent_start.bat
echo set WD=%%~dp0>> agent_start.bat
echo pushd %%WD%%>> agent_start.bat
echo set path=%%WD%%bin;%%WD%%usr\sbin;%%path%%>> agent_start.bat
echo set CYGWIN=server ntsec>> agent_start.bat
echo set SHELL=/bin/bash>> agent_start.bat
cp -f agent_start.bat agent_stop.bat
echo set /p PID1=^<%%WD%%OGP\ogp_agent.pid>> agent_stop.bat
echo kill -15 %%PID1%%>> agent_stop.bat
echo set /p PID2=^<%%WD%%var\run\pure-ftpd.pid>> agent_stop.bat
echo kill -15 %%PID2%%>> agent_stop.bat
echo set /p PID3=^<%%WD%%OGP\ogp_agent_run.pid>> agent_stop.bat
echo kill -15 %%PID3%%>> agent_stop.bat
echo rm -Rf /OGP/.svn>> agent_start.bat
echo rm -Rf /usr/bin/.svn>> agent_start.bat
echo bash ogp_agent -pidfile /OGP/ogp_agent_run.pid>> agent_start.bat
REM Create a vbs to run agent_start.bat hidden
echo Dim strSavePath> agent_start_background.vbs
echo strSavePath = CreateObject("Scripting.FileSystemObject").GetAbsolutePathName(".") ^& "\agent_start.bat">> agent_start_background.vbs
echo CreateObject("Wscript.Shell").Run "" ^& strSavePath ^& "" , 0, false>> agent_start_background.vbs
REM download the bash script that starts the agent setup 
echo Downloading the agent setup bash script from SVN ...
svn co svn://svn.code.sf.net/p/hldstart/code/trunk/agent_win/bin bin
chmod +x bin/ogp_install
REM Asks for adding OGP agent to the system startup 
set /p ONBOOT= Start OGP agent at system boot[Y/n]:
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
set /p PASS=please enter the password for user '%USERNAME%':
schtasks /create /tn "OGP agent start on boot" /rl highest /ru %USERDOMAIN%\%USERNAME% /rp "%PASS%" /tr %WD%agent_start.bat /sc onstart
) ELSE (
IF "X%ONBOOT%" == "Xn" (
schtasks /delete /tn "OGP agent start on boot"
)
)
REM run the agent setup
bash -i ogp_install

