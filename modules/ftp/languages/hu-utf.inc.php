<?php

//   -------------------------------------------------------------------------------
//  |                  net2ftp: a web based FTP client                              |
//  |              Copyright (c) 2003-2013 by David Gartner                         |
//  |                                                                               |
//  | This program is free software; you can redistribute it and/or                 |
//  | modify it under the terms of the GNU General Public License                   |
//  | as published by the Free Software Foundation; either version 2                |
//  | of the License, or (at your option) any later version.                        |
//  |                                                                               |
//   -------------------------------------------------------------------------------

//   -------------------------------------------------------------------------------
//  | For credits, see the credits.txt file                                         |
//   -------------------------------------------------------------------------------
//  |                                                                               |
//  |                              INSTRUCTIONS                                     |
//  |                                                                               |
//  |  The messages to translate are listed below.                                  |
//  |  The structure of each line is like this:                                     |
//  |     $message["Hello world!"] = "Hello world!";                                |
//  |                                                                               |
//  |  Keep the text between square brackets [] as it is.                           |
//  |  Translate the 2nd part, keeping the same punctuation and HTML tags.          |
//  |                                                                               |
//  |  The English message, for example                                             |
//  |     $message["net2ftp is written in PHP!"] = "net2ftp is written in PHP!";    |
//  |  should become after translation:                                             |
//  |     $message["net2ftp is written in PHP!"] = "net2ftp est ecrit en PHP!";     |
//  |     $message["net2ftp is written in PHP!"] = "net2ftp is geschreven in PHP!"; |
//  |                                                                               |
//  |  Note that the variable starts with a dollar sign $, that the value is        |
//  |  enclosed in double quotes " and that the line ends with a semi-colon ;       |
//  |  Be careful when editing this file, do not erase those special characters.    |
//  |                                                                               |
//  |  Some messages also contain one or more variables which start with a percent  |
//  |  sign, for example %1\$s or %2\$s. The English message, for example           |
//  |     $messages[...] = ["The file %1\$s was copied to %2\$s "]                  |
//  |  should becomes after translation:                                            |
//  |     $messages[...] = ["Le fichier %1\$s a �t� copi� vers %2\$s "]             |
//  |                                                                               |
//  |  When a real percent sign % is needed in the text it is entered as %%         |
//  |  otherwise it is interpreted as a variable. So no, it's not a mistake.        |
//  |                                                                               |
//  |  Between the messages to translate there is additional PHP code, for example: |
//  |      if ($net2ftp_globals["state2"] == "rename") {           // <-- PHP code  |
//  |          $net2ftp_messages["Rename file"] = "Rename file";   // <-- message   |
//  |      }                                                       // <-- PHP code  |
//  |  This code is needed to load the messages only when they are actually needed. |
//  |  There is no need to change or delete any of that PHP code; translate only    |
//  |  the message.                                                                 |
//  |                                                                               |
//  |  Thanks in advance to all the translators!                                    |
//  |  David.                                                                       |
//  |                                                                               |
//   -------------------------------------------------------------------------------


// -------------------------------------------------------------------------
// Language settings
// -------------------------------------------------------------------------

// HTML lang attribute
$net2ftp_messages["en"] = "hu";

// HTML dir attribute: left-to-right (LTR) or right-to-left (RTL)
$net2ftp_messages["ltr"] = "ltr";

// CSS style: align left or right (use in combination with LTR or RTL)
$net2ftp_messages["left"] = "bal";
$net2ftp_messages["right"] = "jobb";

// Encoding
$net2ftp_messages["iso-8859-1"] = "UTF-8";


// -------------------------------------------------------------------------
// Status messages
// -------------------------------------------------------------------------

// When translating these messages, keep in mind that the text should not be too long
// It should fit in the status textbox

$net2ftp_messages["Connecting to the FTP server"] = "Kapcsolódás FTP szerverhez";
$net2ftp_messages["Logging into the FTP server"] = "Kilépés az FTP szerverbõl";
$net2ftp_messages["Setting the passive mode"] = "Passzív mód beállítása";
$net2ftp_messages["Getting the FTP system type"] = "Megismeri az FTP-rendszer típusát";
$net2ftp_messages["Changing the directory"] = "Könyvtár módosítása";
$net2ftp_messages["Getting the current directory"] = "Megismeri az aktuális könyvtárat";
$net2ftp_messages["Getting the list of directories and files"] = "Megismeri akönyvtárak  listáját és  a fájlokat";
$net2ftp_messages["Parsing the list of directories and files"] = "Elemzi a könyvtárak listáját és a fájlokat";
$net2ftp_messages["Logging out of the FTP server"] = "Kilépés az FTP szerverbõl";
$net2ftp_messages["Getting the list of directories and files"] = "Megismeri akönyvtárak  listáját és  a fájlokat";
$net2ftp_messages["Printing the list of directories and files"] = "Nyomtatja a könyvtárak listáját és a fájlokat";
$net2ftp_messages["Processing the entries"] = "Feldolgozó bejegyzések";
$net2ftp_messages["Processing entry %1\$s"] = "Feldolgozás bejegyzés %1\$s";
$net2ftp_messages["Checking files"] = "Fájlok ellenõrzése";
$net2ftp_messages["Transferring files to the FTP server"] = "Fájlok átvitele az FTP szerverre";
$net2ftp_messages["Decompressing archives and transferring files"] = "Kicsomagoláskor arhív és fájlok átvitele";
$net2ftp_messages["Searching the files..."] = "Fájlok keresése...";
$net2ftp_messages["Uploading new file"] = "Új fájl feltöltése";
$net2ftp_messages["Reading the file"] = "Olvasni a fájlt";
$net2ftp_messages["Parsing the file"] = "Feldongozni a fájlt";
$net2ftp_messages["Reading the new file"] = "Olvasni az új fájlt";
$net2ftp_messages["Reading the old file"] = "Olvasni a régi fájlt";
$net2ftp_messages["Comparing the 2 files"] = "Összehasonlítani 2 fájlt";
$net2ftp_messages["Printing the comparison"] = "Printing the comparison";
$net2ftp_messages["Sending FTP command %1\$s of %2\$s"] = "Küldés FTP parancs %1\$s of %2\$s";
$net2ftp_messages["Getting archive %1\$s of %2\$s from the FTP server"] = "Arhív kinyerése  %1\$s közül %2\$s az FTP szerveren";
$net2ftp_messages["Creating a temporary directory on the FTP server"] = "Létrehozása egy ideiglenes könyvtárba az FTP szerveren";
$net2ftp_messages["Setting the permissions of the temporary directory"] = "Engedélyeinek beállítását az ideiglenes könyvtár";
$net2ftp_messages["Copying the net2ftp installer script to the FTP server"] = "Másolás a net2ftp telepítõ script az FTP szerverre";
$net2ftp_messages["Script finished in %1\$s seconds"] = "A script fejezõdött %1\$s másodpercen belül";
$net2ftp_messages["Script halted"] = "A script megállt";

// Used on various screens
$net2ftp_messages["Please wait..."] = "Kérem várjon...";


// -------------------------------------------------------------------------
// index.php
// -------------------------------------------------------------------------
$net2ftp_messages["Unexpected state string: %1\$s. Exiting."] = "A string váralanul: %1\$s. Kilépett.";
$net2ftp_messages["This beta function is not activated on this server."] = "Ez a béta funkció nem aktív ezen a szerveren.";
$net2ftp_messages["This function has been disabled by the Administrator of this website."] = "Ez a funkció le van tiltva a rendszergazda által az ezen a weboldalon.";


// -------------------------------------------------------------------------
// /includes/browse.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["The directory <b>%1\$s</b> does not exist or could not be selected, so the directory <b>%2\$s</b> is shown instead."] = "A könyvtár <b>%1\$s</b> nem létezik, vagy nem lehet kiválasztani, ezért a könyvtár <b>%2\$s</b> jelenik meg helyette.";
$net2ftp_messages["Your root directory <b>%1\$s</b> does not exist or could not be selected."] = "A gyökér könyvtárban <b>%1\$s</b> nem létezik, vagy nem lehet kiválasztani.";
$net2ftp_messages["The directory <b>%1\$s</b> could not be selected - you may not have sufficient rights to view this directory, or it may not exist."] = "A könyvtár <b>%1\$s</b> nem lehet kiválasztani - lehet, hogy nem rendelkezik megfelelõ jogokkal, hogy megtekinthesse ezt a könyvtárat, vagy nem is létezik.";
$net2ftp_messages["Entries which contain banned keywords can't be managed using net2ftp. This is to avoid Paypal or Ebay scams from being uploaded through net2ftp."] = "Bejegyzéseket tartalmazó tiltott kulcsszavak nem lehet felhasználásával net2ftp. Ennek célja, hogy elkerüljék, vagy Ebay Paypal csalások attól, hogy feltöltött keresztül net2ftp.";
$net2ftp_messages["Files which are too big can't be downloaded, uploaded, copied, moved, searched, zipped, unzipped, viewed or edited; they can only be renamed, chmodded or deleted."] = "Fájlok, amelyek túl nagy, nem lehet letölteni, feltöltött, másolhatók, mozgathatók, kereshetõ, tömörített, cipzárat kinyitni, megtekintett vagy szerkesztett, csak akkor lehet átnevezni, chmodded vagy törölni.";
$net2ftp_messages["Execute %1\$s in a new window"] = "Végrehajtaja %1\$s egy új ablakban";


// -------------------------------------------------------------------------
// /includes/main.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["Please select at least one directory or file!"] = "Kérjük, válasszon legalább egy könyvtárat vagy fájl!";


// -------------------------------------------------------------------------
// /includes/authorizations.inc.php
// -------------------------------------------------------------------------

// checkAuthorization()
$net2ftp_messages["The FTP server <b>%1\$s</b> is not in the list of allowed FTP servers."] = "Az FTP szerver <b>%1\$s</b> nem szerepel a listán engedélyezett FTP szervereken.";
$net2ftp_messages["The FTP server <b>%1\$s</b> is in the list of banned FTP servers."] = "Az FTP szerver <b>%1\$s</b> van a tilalmi listán szereplõ FTP-szervereket.";
$net2ftp_messages["The FTP server port %1\$s may not be used."] = "Az FTP szerver portja %1\$s nem lehet felhasználni.";
$net2ftp_messages["Your IP address (%1\$s) is not in the list of allowed IP addresses."] = "Az Ön IP címe (%1\$s) nem szerepel a listán az engedélyezett IP-címek.";
$net2ftp_messages["Your IP address (%1\$s) is in the list of banned IP addresses."] = "Az Ön IP címe (%1\$s) van a tilalmi listán szereplõ IP-címek.";

// isAuthorizedDirectory()
$net2ftp_messages["Table net2ftp_users contains duplicate rows."] = "Táblázat tartalmazza net2ftp_users ismétlõdõ sorokban.";

// checkAdminUsernamePassword()
$net2ftp_messages["You did not enter your Administrator username or password."] = "Nem adta meg a rendszergazda felhasználói név vagy jelszó.";
$net2ftp_messages["Wrong username or password. Please try again."] = "Nem vagy bejelentkezve. Kérjük, próbálja újra.";

// -------------------------------------------------------------------------
// /includes/consumption.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["Unable to determine your IP address."] = "Nem sikerült meghatározni az IP címet.";
$net2ftp_messages["Table net2ftp_log_consumption_ipaddress contains duplicate rows."] = "Táblázat tartalmazza net2ftp_log_consumption_ipaddress ismétlõdõ sorokban.";
$net2ftp_messages["Table net2ftp_log_consumption_ftpserver contains duplicate rows."] = "Táblázat tartalmazza net2ftp_log_consumption_ftpserver ismétlõdõ sorokban.";
$net2ftp_messages["The variable <b>consumption_ipaddress_datatransfer</b> is not numeric."] = "A változó <b>consumption_ipaddress_datatransfer</b> nem számérték.";
$net2ftp_messages["Table net2ftp_log_consumption_ipaddress could not be updated."] = "Táblázat net2ftp_log_consumption_ipaddress nem lehet frissíteni.";
$net2ftp_messages["Table net2ftp_log_consumption_ipaddress contains duplicate entries."] = "Táblázat tartalmazza net2ftp_log_consumption_ipaddress ismétlõdõ bejegyzéseket.";
$net2ftp_messages["Table net2ftp_log_consumption_ftpserver could not be updated."] = "Táblázat net2ftp_log_consumption_ftpserver nem lehet frissíteni.";
$net2ftp_messages["Table net2ftp_log_consumption_ftpserver contains duplicate entries."] = "Tképes net2ftp_log_consumption_ftpserver ismétlõdõ bejegyzéseket tartalmaz.";
$net2ftp_messages["Table net2ftp_log_access could not be updated."] = "Táblázat net2ftp_log_access nem lehet frissíteni.";
$net2ftp_messages["Table net2ftp_log_access contains duplicate entries."] = "Táblázat tartalmazza net2ftp_log_access ismétlõdõ bejegyzéseket.";


// -------------------------------------------------------------------------
// /includes/database.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["Unable to connect to the MySQL database. Please check your MySQL database settings in net2ftp's configuration file settings.inc.php."] = "Nem sikerült csatlakozni a MySQL adatbázishoz. Kérjük, ellenõrizze a MySQL adatbázis beállításait net2ftp konfigurációs fájl settings.inc.php.";
$net2ftp_messages["Unable to select the MySQL database. Please check your MySQL database settings in net2ftp's configuration file settings.inc.php."] = "Nem választhatja a MySQL adatbázisban. Kérjük, ellenõrizze a MySQL adatbázis beállításait net2ftp konfigurációs fájl settings.inc.php.";


// -------------------------------------------------------------------------
// /includes/errorhandling.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["An error has occured"] = "Egy hiba lépett fel";
$net2ftp_messages["Go back"] = "Menj vissza";
$net2ftp_messages["Go to the login page"] = "Menjen a bejelentkezõ oldalra";


// -------------------------------------------------------------------------
// /includes/filesystem.inc.php
// -------------------------------------------------------------------------

// ftp_openconnection()
$net2ftp_messages["The <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ftp.installation.php\" target=\"_blank\">php.net</a><br />"] = "The <a href=\"http://www.php.net/manual/en/ref.ftp.php\" target=\"_blank\">FTP module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ftp.installation.php\" target=\"_blank\">php.net</a><br />";
$net2ftp_messages["The <a href=\"http://www.php.net/manual/en/function.ftp-ssl-connect.php\" target=\"_blank\">FTP and/or OpenSSL modules of PHP</a> is not installed.<br /><br /> The administrator of this website should install these modules. Installation instructions are given on php.net: <a href=\"http://www.php.net/manual/en/ftp.installation.php\" target=\"_blank\">here for FTP</a>, and <a href=\"http://www.php.net/manual/en/openssl.installation.php\" target=\"_blank\">here for OpenSSL</a><br />"] = "The <a href=\"http://www.php.net/manual/en/function.ftp-ssl-connect.php\" target=\"_blank\">FTP and/or OpenSSL modules of PHP</a> is not installed.<br /><br /> The administrator of this website should install these modules. Installation instructions are given on php.net: <a href=\"http://www.php.net/manual/en/ftp.installation.php\" target=\"_blank\">here for FTP</a>, and <a href=\"http://www.php.net/manual/en/openssl.installation.php\" target=\"_blank\">here for OpenSSL</a><br />";
$net2ftp_messages["The <a href=\"http://www.php.net/manual/en/function.ssh2-sftp.php\" target=\"_blank\">SSH2 module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ssh2.installation.php\" target=\"_blank\">php.net</a><br />"] = "The <a href=\"http://www.php.net/manual/en/function.ssh2-sftp.php\" target=\"_blank\">SSH2 module of PHP</a> is not installed.<br /><br /> The administrator of this website should install this module. Installation instructions are given on <a href=\"http://www.php.net/manual/en/ssh2.installation.php\" target=\"_blank\">php.net</a><br />";
$net2ftp_messages["Unable to connect to FTP server <b>%1\$s</b> on port <b>%2\$s</b>.<br /><br />Are you sure this is the address of the FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br />"] = "Nem lehet kapcsolódni az FTP szerverre <b>%1\$s</b> a port <b>%2\$s</b>.<br /><br />Biztos vagy benne, hogy ez a cím az FTP szerver? Ez gyakran eltér a HTTP (web) szervert. Kérjük, lépjen kapcsolatba az ISP helpdesk vagy a rendszergazda segítségét.<br />";
$net2ftp_messages["Unable to login to FTP server <b>%1\$s</b> with username <b>%2\$s</b>.<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br />"] = "Nem sikerült bejelentkezni az FTP-kiszolgáló <b>%1\$s</b> a felhasználóneveddel <b>%2\$s</b>.<br /><br />Biztos vagy benne, hogy a felhasználónév és jelszó helyes? Kérjük, lépjen kapcsolatba az ISP helpdesk vagy a rendszergazda segítségét.<br />";
$net2ftp_messages["Unable to switch to the passive mode on FTP server <b>%1\$s</b>."] = "Nem sikerült váltani a passzív módban az FTP szerveren <b>%1\$s</b>.";

// ftp_openconnection2()
$net2ftp_messages["Unable to connect to the second (target) FTP server <b>%1\$s</b> on port <b>%2\$s</b>.<br /><br />Are you sure this is the address of the second (target) FTP server? This is often different from that of the HTTP (web) server. Please contact your ISP helpdesk or system administrator for help.<br />"] = "Nem sikerült kapcsolódni a második (cél) FTP szerver <b>%1\$s</b> a port <b>%2\$s</b>.<br /><br />Biztos vagy benne, hogy ez a címe a második (cél) FTP szerver? Ez gyakran eltér a HTTP (web) szervert. Kérjük, lépjen kapcsolatba az ISP helpdesk vagy a rendszergazda segítségét.<br />";
$net2ftp_messages["Unable to login to the second (target) FTP server <b>%1\$s</b> with username <b>%2\$s</b>.<br /><br />Are you sure your username and password are correct? Please contact your ISP helpdesk or system administrator for help.<br />"] = "Nem sikerült bejelentkezni a második (cél) FTP szerver <b>%1\$s</b> a felhasználóneveddel <b>%2\$s</b>.<br /><br />Biztos vagy benne, hogy a felhasználónév és jelszó helyes? Kérjük, lépjen kapcsolatba az ISP helpdesk vagy a rendszergazda segítségét.<br />";
$net2ftp_messages["Unable to switch to the passive mode on the second (target) FTP server <b>%1\$s</b>."] = "Nem sikerült váltani a passzív módban a második (cél) FTP szerver <b>%1\$s</b>.";

// ftp_myrename()
$net2ftp_messages["Unable to rename directory or file <b>%1\$s</b> into <b>%2\$s</b>"] = "Nem sikerült átnevezni könyvtár vagy fájl <b>%1\$s</b> ba <b>%2\$s</b>";

// ftp_mychmod()
$net2ftp_messages["Unable to execute site command <b>%1\$s</b>. Note that the CHMOD command is only available on Unix FTP servers, not on Windows FTP servers."] = "Nem lehet végrehajtani a parancsot site <b>%1\$s</b>. Ne feledje, hogy a chmod parancs csak Unix FTP szerverek, nem pedig a Windows FTP szervereken.";
$net2ftp_messages["Directory <b>%1\$s</b> successfully chmodded to <b>%2\$s</b>"] = "Könyvtár <b>%1\$s</b> sikeresen chmodded a <b>%2\$s</b>";
$net2ftp_messages["Processing entries within directory <b>%1\$s</b>:"] = "Feldolgozás bejegyzések belül könyvtárban <b>%1\$s</b>:";
$net2ftp_messages["File <b>%1\$s</b> was successfully chmodded to <b>%2\$s</b>"] = "Fájl <b>%1\$s</b> sikeresen chmodded, hogy <b>%2\$s</b>";
$net2ftp_messages["All the selected directories and files have been processed."] = "Az összes kiválasztott könyvtárak és fájlok kerültek feldolgozásra.";

// ftp_rmdir2()
$net2ftp_messages["Unable to delete the directory <b>%1\$s</b>"] = "Nem sikerült törölni a könyvtárat <b>%1\$s</b>";

// ftp_delete2()
$net2ftp_messages["Unable to delete the file <b>%1\$s</b>"] = "Nem sikerült törölni a fájlt<b>%1\$s</b>";

// ftp_newdirectory()
$net2ftp_messages["Unable to create the directory <b>%1\$s</b>"] = "Nem sikerült létrehozni a könyvtárat <b>%1\$s</b>";

// ftp_readfile()
$net2ftp_messages["Unable to create the temporary file"] = "Nem sikerült létrehozni az ideiglenes fájlt";
$net2ftp_messages["Unable to get the file <b>%1\$s</b> from the FTP server and to save it as temporary file <b>%2\$s</b>.<br />Check the permissions of the %3\$s directory.<br />"] = "Nem sikerült beolvasni a fájlt <b>%1\$s</b> Az FTP-kiszolgáló, és mentse el az ideiglenes fájlt <b>%2\$s</b>.<br />Ellenõrizze a jogosultságait a %3\$s könyvtárat.<br />";
$net2ftp_messages["Unable to open the temporary file. Check the permissions of the %1\$s directory."] = "Nem sikerült megnyitni az ideiglenes fájlt. Ellenõrizze a jogosultságait a %1\$s könyvtárat.";
$net2ftp_messages["Unable to read the temporary file"] = "Nem sikerült beolvasni az ideiglenes fájlt";
$net2ftp_messages["Unable to close the handle of the temporary file"] = "Nem sikerült bezárni a kilincset az ideiglenes fájl";
$net2ftp_messages["Unable to delete the temporary file"] = "Nem sikerült törölni az ideiglenes fájlt";

// ftp_writefile()
$net2ftp_messages["Unable to create the temporary file. Check the permissions of the %1\$s directory."] = "Nem sikerült létrehozni az ideiglenes fájlt. Ellenõrizze a jogosultságait a%1\$s könyvtárat.";
$net2ftp_messages["Unable to open the temporary file. Check the permissions of the %1\$s directory."] = "Nem sikerült megnyitni az ideiglenes fájlt. Ellenõrizze a jogosultságait a %1\$s könyvtárat.";
$net2ftp_messages["Unable to write the string to the temporary file <b>%1\$s</b>.<br />Check the permissions of the %2\$s directory."] = "Nem lehet írni a húr az ideiglenes fájl <b>%1\$s</b>.<br />Ellenõrizze a jogosultságait a %2\$s könyvtárat.";
$net2ftp_messages["Unable to close the handle of the temporary file"] = "Nem sikerült bezárni a kilincset az ideiglenes fájl";
$net2ftp_messages["Unable to put the file <b>%1\$s</b> on the FTP server.<br />You may not have write permissions on the directory."] = "Nem sikerült tenni a fájlt <b>%1\$s</b>az FTP-kiszolgálóra.<br />Lehet, hogy nincs írási jogosultsága a könyvtárban.";
$net2ftp_messages["Unable to delete the temporary file"] = "Nem sikerült törölni az ideiglenes fájlt";

// ftp_copymovedelete()
$net2ftp_messages["Processing directory <b>%1\$s</b>"] = "Feldolgozás könyvtár <b>%1\$s</b>";
$net2ftp_messages["The target directory <b>%1\$s</b> is the same as or a subdirectory of the source directory <b>%2\$s</b>, so this directory will be skipped"] = "A cél könyvtár <b>%1\$s</b> megegyezik, vagy egy alkönyvtár a forrás könyvtár<b>%2\$s</b>, így ez a könyvtár kimarad";
$net2ftp_messages["The directory <b>%1\$s</b> contains a banned keyword, so this directory will be skipped"] = "A könyvtár <b>%1\$s</b> tartalmaz egy tiltott kulcsszót, így ez a könyvtár kimarad";
$net2ftp_messages["The directory <b>%1\$s</b> contains a banned keyword, aborting the move"] = "A könyvtár <b>%1\$s</b> tartalmaz egy tiltott kulcsszót, megszakítva a lépés";
$net2ftp_messages["Unable to create the subdirectory <b>%1\$s</b>. It may already exist. Continuing the copy/move process..."] = "Nem sikerült létrehozni a alkönyvtárba <b>%1\$s</b>. Talán már léteznek. Folytatva a másolás / áthelyezés folyamata...";
$net2ftp_messages["Created target subdirectory <b>%1\$s</b>"] = "Created cél alkönyvtár <b>%1\$s</b>";
$net2ftp_messages["The directory <b>%1\$s</b> could not be selected, so this directory will be skipped"] = "A könyvtár <b>%1\$s</b> nem lehet kiválasztani, így ez a könyvtár kimarad";
$net2ftp_messages["Unable to delete the subdirectory <b>%1\$s</b> - it may not be empty"] = "Nem sikerült törölni a alkönyvtárba <b>%1\$s</b> - ez nem lehet üres";
$net2ftp_messages["Deleted subdirectory <b>%1\$s</b>"] = "Törölt alkönyvtár <b>%1\$s</b>";
$net2ftp_messages["Deleted subdirectory <b>%1\$s</b>"] = "Törölt alkönyvtár <b>%1\$s</b>";
$net2ftp_messages["Unable to move the directory <b>%1\$s</b>"] = "Unable to move the directory <b>%1\$s</b>";
$net2ftp_messages["Moved directory <b>%1\$s</b>"] = "Moved directory <b>%1\$s</b>";
$net2ftp_messages["Processing of directory <b>%1\$s</b> completed"] = "Törölt alkönyvtár <b>%1\$s</b> befejezve";
$net2ftp_messages["The target for file <b>%1\$s</b> is the same as the source, so this file will be skipped"] = "A cél az, fájl <b>%1\$s</b> ugyanaz, mint a forrás, ezért ez a fájl kihagyásra";
$net2ftp_messages["The file <b>%1\$s</b> contains a banned keyword, so this file will be skipped"] = "A fájl <b>%1\$s</b> tartalmaz egy tiltott kulcsszót, így ez a fájl kihagyásra";
$net2ftp_messages["The file <b>%1\$s</b> contains a banned keyword, aborting the move"] = "A fájl <b>%1\$s</b> tartalmaz egy tiltott kulcsszót, megszakítva a lépés";
$net2ftp_messages["The file <b>%1\$s</b> is too big to be copied, so this file will be skipped"] = "A fájl <b>%1\$s</b> túl nagy ahhoz, hogy másolható, így ez a fájl kihagyásra";
$net2ftp_messages["The file <b>%1\$s</b> is too big to be moved, aborting the move"] = "A fájl <b>%1\$s</b> túl nagy ahhoz, hogy mozgatni, megszakítva a lépés";
$net2ftp_messages["Unable to copy the file <b>%1\$s</b>"] = "Nem lehet másolni a fájlt <b>%1\$s</b>";
$net2ftp_messages["Copied file <b>%1\$s</b>"] = "Másolhatók fájlt <b>%1\$s</b>";
$net2ftp_messages["Unable to move the file <b>%1\$s</b>, aborting the move"] = "Nem sikerült áthelyezni a fájlt <b>%1\$s</b>, megszakítva a lépés";
$net2ftp_messages["Unable to move the file <b>%1\$s</b>"] = "Unable to move the file <b>%1\$s</b>";
$net2ftp_messages["Moved file <b>%1\$s</b>"] = "Áthelyzett fájl <b>%1\$s</b>";
$net2ftp_messages["Unable to delete the file <b>%1\$s</b>"] = "Nem sikerült törölni a fájlt<b>%1\$s</b>";
$net2ftp_messages["Deleted file <b>%1\$s</b>"] = "Törölt fájl <b>%1\$s</b>";
$net2ftp_messages["All the selected directories and files have been processed."] = "Az összes kiválasztott könyvtárak és fájlok kerültek feldolgozásra.";

// ftp_processfiles()

// ftp_getfile()
$net2ftp_messages["Unable to copy the remote file <b>%1\$s</b> to the local file using FTP mode <b>%2\$s</b>"] = "Nem lehet másolni a távoli fájl <b>%1\$s</b> a helyi fájl FTP-módban <b>%2\$s</b>";
$net2ftp_messages["Unable to delete file <b>%1\$s</b>"] = "Nem sikerült törölni a fájlt <b>%1\$s</b>";

// ftp_putfile()
$net2ftp_messages["The file is too big to be transferred"] = "A fájl túl nagy ahhoz, hogy át";
$net2ftp_messages["Daily limit reached: the file <b>%1\$s</b> will not be transferred"] = "Napi Elérte: a fájl <b>%1\$s</b> nem kerülnek át";
$net2ftp_messages["Unable to copy the local file to the remote file <b>%1\$s</b> using FTP mode <b>%2\$s</b>"] = "Nem lehet másolni a helyi fájlt a távoli fájl <b>%1\$s</b> az FTP mód <b>%2\$s</b>";
$net2ftp_messages["Unable to delete the local file"] = "Nem sikerült törölni a helyi fájl";

// ftp_downloadfile()
$net2ftp_messages["Unable to delete the temporary file"] = "Nem sikerült törölni az ideiglenes fájlt";
$net2ftp_messages["Unable to send the file to the browser"] = "Nem sikerült elküldeni a fájlt a böngészõ";

// ftp_zip()
$net2ftp_messages["Unable to create the temporary file"] = "Nem sikerült létrehozni az ideiglenes fájlt";
$net2ftp_messages["The zip file has been saved on the FTP server as <b>%1\$s</b>"] = "A zip fájl mentett az FTP szerverre <b>%1\$s</b>";
$net2ftp_messages["Requested files"] = "Kért fájlok";

$net2ftp_messages["Dear,"] = "Kedves,";
$net2ftp_messages["Someone has requested the files in attachment to be sent to this email account (%1\$s)."] = "Valaki azt kérte a csatolt fájlokat küldeni az e-mail fiók (%1\$s).";
$net2ftp_messages["If you know nothing about this or if you don't trust that person, please delete this email without opening the Zip file in attachment."] = "Ha nem tudsz semmit errõl, vagy ha nem bízol a személy, törölje az e-mail megnyitása nélkül a zip fájlt mellékletként.";
$net2ftp_messages["Note that if you don't open the Zip file, the files inside cannot harm your computer."] = "Ne feledjük, hogy ha nem tudja megnyitni a zip fájlt, a fájlok belsejében ne károsítsa a számítógépet.";
$net2ftp_messages["Information about the sender: "] = "Információ a feladónak: ";
$net2ftp_messages["IP address: "] = "IP address: ";
$net2ftp_messages["Time of sending: "] = "Küldés idõpontja: ";
$net2ftp_messages["Sent via the net2ftp application installed on this website: "] = "Keresztül küldött net2ftp alkalmazás telepítve van ezen a honlapon: ";
$net2ftp_messages["Webmaster's email: "] = "Webmaster e-mail címe: ";
$net2ftp_messages["Message of the sender: "] = "Üzenet a feladónak: ";
$net2ftp_messages["net2ftp is free software, released under the GNU/GPL license. For more information, go to http://www.net2ftp.com."] = "net2ftp szabad szoftver, megjelent a GNU / GPL licensz érvényes. További információkért látogasson el ahttp://www.net2ftp.com.";

$net2ftp_messages["The zip file has been sent to <b>%1\$s</b>."] = "A zip fájl nem érkezett <b>%1\$s</b>.";

// acceptFiles()
$net2ftp_messages["File <b>%1\$s</b> is too big. This file will not be uploaded."] = "Fájl <b>%1\$s</b> túl nagy. Ez a fájl nem lesz feltöltve.";
$net2ftp_messages["File <b>%1\$s</b> is contains a banned keyword. This file will not be uploaded."] = "Fájl <b>%1\$s</b> nem tartalmaz egy tiltott kulcsszót. Ez a fájl nem lesz feltöltve.";
$net2ftp_messages["Could not generate a temporary file."] = "Nem sikerült létrehozni egy ideiglenes fájlt.";
$net2ftp_messages["File <b>%1\$s</b> could not be moved"] = "Fájl <b>%1\$s</b> volna nem lehet mozgatni";
$net2ftp_messages["File <b>%1\$s</b> is OK"] = "Fájl <b>%1\$s</b> rendben van";
$net2ftp_messages["Unable to move the uploaded file to the temp directory.<br /><br />The administrator of this website has to <b>chmod 777</b> the /temp directory of net2ftp."] = "Nem tud mozogni a feltöltött fájlt a Temp könyvtárba.<br /><br />A rendszergazda ezen a honlapon, hogy <b>chmod 777</b> a / temp címjegyzéke net2ftp.";
$net2ftp_messages["You did not provide any file to upload."] = "Ön nem adott ki a feltöltendõ fájlt.";

// ftp_transferfiles()
$net2ftp_messages["File <b>%1\$s</b> could not be transferred to the FTP server"] = "Fájl <b>%1\$s</b> nem lehetett át az FTP szerver";
$net2ftp_messages["File <b>%1\$s</b> has been transferred to the FTP server using FTP mode <b>%2\$s</b>"] = "Fájl <b>%1\$s</b> átkerült az FTP szerver az FTP mód <b>%2\$s</b>";
$net2ftp_messages["Transferring files to the FTP server"] = "Fájlok átvitele az FTP szerverre";

// ftp_unziptransferfiles()
$net2ftp_messages["Processing archive nr %1\$s: <b>%2\$s</b>"] = "Feldolgozás archívum nr %1\$s: <b>%2\$s</b>";
$net2ftp_messages["Archive <b>%1\$s</b> was not processed because its filename extension was not recognized. Only zip, tar, tgz and gz archives are supported at the moment."] = "Arhív <b>%1\$s</b> nem volt feldolgozni, mert a fájl kiterjesztése nem volt ismert. Csak a zip, tar, tgz, és gz archívum támogatott abban a pillanatban.";
$net2ftp_messages["Unable to extract the files and directories from the archive"] = "Képtelen-hoz kivonat a fájlokat és könyvtárakat az archívumból";
$net2ftp_messages["Archive contains filenames with ../ or ..\\ - aborting the extraction"] = "Archívum fájlnevek a ../ vagy ..\\ - megszakítva a kitermelési";
$net2ftp_messages["Could not unzip entry %1\$s (error code %2\$s)"] = "Could not unzip entry %1\$s (error code %2\$s)";
$net2ftp_messages["Created directory %1\$s"] = "Könyvtár létrehozása %1\$s";
$net2ftp_messages["Could not create directory %1\$s"] = "Nem sikerült létrehozni a könyvtárat %1\$s";
$net2ftp_messages["Copied file %1\$s"] = "Másolhatók fájlt %1\$s";
$net2ftp_messages["Could not copy file %1\$s"] = "Nem lehet másolni file %1\$s";
$net2ftp_messages["Unable to delete the temporary directory"] = "Nem sikerült törölni az ideiglenes könyvtár";
$net2ftp_messages["Unable to delete the temporary file %1\$s"] = "Nem sikerült törölni az ideiglenes fájlt %1\$s";

// ftp_mysite()
$net2ftp_messages["Unable to execute site command <b>%1\$s</b>"] = "Nem lehet végrehajtani a parancsot site <b>%1\$s</b>";

// shutdown()
$net2ftp_messages["Your task was stopped"] = "Az Ön feladata az volt, abbahagyta";
$net2ftp_messages["The task you wanted to perform with net2ftp took more time than the allowed %1\$s seconds, and therefor that task was stopped."] = "A feladat akartál végrehajtható net2ftp több idõt, mint a megengedett %1\$s másodperc, és ennek feladata az volt, hogy megállt.";
$net2ftp_messages["This time limit guarantees the fair use of the web server for everyone."] = "Ez a határidõ garantálja a tisztességes felhasználása a webszerver mindenki számára.";
$net2ftp_messages["Try to split your task in smaller tasks: restrict your selection of files, and omit the biggest files."] = "Próbálja meg osztott a feladatot kisebb feladatok: korlátozzák a kijelölt fájlok, és ki lehet hagyni a legnagyobb fájl.";
$net2ftp_messages["If you really need net2ftp to be able to handle big tasks which take a long time, consider installing net2ftp on your own server."] = "Ha tényleg szükség van net2ftp, hogy képes legyen kezelni a nagy feladatokat, amelyek hosszú idõt vesz igénybe, helyezzen üzembe net2ftp saját szerveren.";

// SendMail()
$net2ftp_messages["You did not provide any text to send by email!"] = "Ön nem adott szöveget küldeni e-mailben!";
$net2ftp_messages["You did not supply a From address."] = "Ön nem a szolgáltatás Feladó cím.";
$net2ftp_messages["You did not supply a To address."] = "Te nem a szolgáltatás foglalkozzanak.";
$net2ftp_messages["Due to technical problems the email to <b>%1\$s</b> could not be sent."] = "Mûszaki problémák miatt az e-mail <b>%1\$s</b> nem lehet elküldeni.";

// tempdir2()
$net2ftp_messages["Unable to create a temporary directory because (unvalid parent directory)"] = "Unable to create a temporary directory because (unvalid parent directory)";
$net2ftp_messages["Unable to create a temporary directory because (parent directory is not writeable)"] = "Unable to create a temporary directory because (parent directory is not writeable)";
$net2ftp_messages["Unable to create a temporary directory (too many tries)"] = "Unable to create a temporary directory (too many tries)";

// -------------------------------------------------------------------------
// /includes/logging.inc.php
// -------------------------------------------------------------------------
// logAccess(), logLogin(), logError()
$net2ftp_messages["Unable to execute the SQL query."] = "Nem lehet végrehajtani az SQL lekérdezést.";
$net2ftp_messages["Unable to open the system log."] = "Nem sikerült megnyitni a rendszer naplót.";
$net2ftp_messages["Unable to write a message to the system log."] = "Nem lehet írni egy üzenetet a rendszer naplót.";

// getLogStatus(), putLogStatus()
$net2ftp_messages["Table net2ftp_log_status contains duplicate entries."] = "Table net2ftp_log_status contains duplicate entries.";
$net2ftp_messages["Table net2ftp_log_status could not be updated."] = "Table net2ftp_log_status could not be updated.";

// rotateLogs()
$net2ftp_messages["The log tables were renamed successfully."] = "The log tables were renamed successfully.";
$net2ftp_messages["The log tables could not be renamed."] = "The log tables could not be renamed.";
$net2ftp_messages["The log tables were copied successfully."] = "The log tables were copied successfully.";
$net2ftp_messages["The log tables could not be copied."] = "The log tables could not be copied.";
$net2ftp_messages["The oldest log table was dropped successfully."] = "The oldest log table was dropped successfully.";
$net2ftp_messages["The oldest log table could not be dropped."] = "The oldest log table could not be dropped.";


// -------------------------------------------------------------------------
// /includes/registerglobals.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["Please enter your username and password for FTP server "] = "Kérjük, adja meg felhasználónevét és jelszavát az FTP-kiszolgáló ";
$net2ftp_messages["You did not fill in your login information in the popup window.<br />Click on \"Go to the login page\" below."] = "Ön nem adja meg a személyes bejelentkezési adatait a felugró ablakban.<br />Kattintson \"Menjen a bejelentkezõ oldalra\"lent.";
$net2ftp_messages["Access to the net2ftp Admin panel is disabled, because no password has been set in the file settings.inc.php. Enter a password in that file, and reload this page."] = "Hozzáférés a net2ftp Admin panel le van tiltva, mert nincs jelszó állapítottak meg a fájlban settings.inc.php. Írja be a jelszót az adott fájlt, és újra tölteni az oldalt.";
$net2ftp_messages["Please enter your Admin username and password"] = "Kérjük, adja meg az Adminisztrátor felhasználónevét és jelszavát "; 
$net2ftp_messages["You did not fill in your login information in the popup window.<br />Click on \"Go to the login page\" below."] = "Ön nem adja meg a személyes bejelentkezési adatait a felugró ablakban.<br />Kattintson \"Menjen a bejelentkezõ oldalra\"lent.";
$net2ftp_messages["Wrong username or password for the net2ftp Admin panel. The username and password can be set in the file settings.inc.php."] = "Hibás a felhasználó név, vagy jelszó a net2ftp Admin panel. A felhasználónév és a jelszó lehet beállítani a fájl settings.inc.php.";


// -------------------------------------------------------------------------
// /skins/skins.inc.php
// -------------------------------------------------------------------------
$net2ftp_messages["Blue"] = "Kék";
$net2ftp_messages["Grey"] = "Szürke";
$net2ftp_messages["Black"] = "Feket";
$net2ftp_messages["Yellow"] = "Sárga";
$net2ftp_messages["Pastel"] = "Pasztell";

// getMime()
$net2ftp_messages["Directory"] = "Könyvtár";
$net2ftp_messages["Symlink"] = "Symlink";
$net2ftp_messages["ASP script"] = "ASP script";
$net2ftp_messages["Cascading Style Sheet"] = "Cascading Style Sheet";
$net2ftp_messages["HTML file"] = "HTML fájl";
$net2ftp_messages["Java source file"] = "Java forrásfájl";
$net2ftp_messages["JavaScript file"] = "JavaScript file";
$net2ftp_messages["PHP Source"] = "PHP Source";
$net2ftp_messages["PHP script"] = "PHP script";
$net2ftp_messages["Text file"] = "Szöveges fájl";
$net2ftp_messages["Bitmap file"] = "Bitmap fájl";
$net2ftp_messages["GIF file"] = "GIF fájl";
$net2ftp_messages["JPEG file"] = "JPEG fájl";
$net2ftp_messages["PNG file"] = "PNG fájl";
$net2ftp_messages["TIF file"] = "TIF fájl";
$net2ftp_messages["GIMP file"] = "GIMP fájl";
$net2ftp_messages["Executable"] = "Kivihetõ";
$net2ftp_messages["Shell script"] = "Shell script";
$net2ftp_messages["MS Office - Word document"] = "MS Office - Word dokumentum";
$net2ftp_messages["MS Office - Excel spreadsheet"] = "MS Office - Excel táblázat";
$net2ftp_messages["MS Office - PowerPoint presentation"] = "MS Office - PowerPoint prezentáció";
$net2ftp_messages["MS Office - Access database"] = "MS Office - Access adatbázis";
$net2ftp_messages["MS Office - Visio drawing"] = "MS Office - Visio rajz";
$net2ftp_messages["MS Office - Project file"] = "MS Office - Project fájl";
$net2ftp_messages["OpenOffice - Writer 6.0 document"] = "OpenOffice - Writer 6.0 dokumentum";
$net2ftp_messages["OpenOffice - Writer 6.0 template"] = "OpenOffice - Writer 6.0 sablon";
$net2ftp_messages["OpenOffice - Calc 6.0 spreadsheet"] = "OpenOffice - Calc 6.0 táblázat";
$net2ftp_messages["OpenOffice - Calc 6.0 template"] = "OpenOffice - Calc 6.0 sablon";
$net2ftp_messages["OpenOffice - Draw 6.0 document"] = "OpenOffice - Draw 6.0 dokumentum";
$net2ftp_messages["OpenOffice - Draw 6.0 template"] = "OpenOffice - Draw 6.0 sablon";
$net2ftp_messages["OpenOffice - Impress 6.0 presentation"] = "OpenOffice - Impress 6.0 prezentáció";
$net2ftp_messages["OpenOffice - Impress 6.0 template"] = "OpenOffice - Impress 6.0 sablon";
$net2ftp_messages["OpenOffice - Writer 6.0 global document"] = "OpenOffice - Writer 6.0 nemzetközi dokumentum";
$net2ftp_messages["OpenOffice - Math 6.0 document"] = "OpenOffice - Math 6.0 dokumentum";
$net2ftp_messages["StarOffice - StarWriter 5.x document"] = "StarOffice - StarWriter 5.x dokumentum";
$net2ftp_messages["StarOffice - StarWriter 5.x global document"] = "StarOffice - StarWriter 5.x nemzetközi dokumentum";
$net2ftp_messages["StarOffice - StarCalc 5.x spreadsheet"] = "StarOffice - StarCalc 5.x táblázat";
$net2ftp_messages["StarOffice - StarDraw 5.x document"] = "StarOffice - StarDraw 5.x nemzetközi dokumentum";
$net2ftp_messages["StarOffice - StarImpress 5.x presentation"] = "StarOffice - StarImpress 5.x prezentáció";
$net2ftp_messages["StarOffice - StarImpress Packed 5.x file"] = "StarOffice - StarImpress Packed 5.x fájl";
$net2ftp_messages["StarOffice - StarMath 5.x document"] = "StarOffice - StarMath 5.x nemzetközi dokumentum";
$net2ftp_messages["StarOffice - StarChart 5.x document"] = "StarOffice - StarChart 5.x nemzetközi dokumentum";
$net2ftp_messages["StarOffice - StarMail 5.x mail file"] = "StarOffice - StarMail 5.x e-mail fájl";
$net2ftp_messages["Adobe Acrobat document"] = "Adobe Acrobat dokumentum";
$net2ftp_messages["ARC archive"] = "ARC archívuma";
$net2ftp_messages["ARJ archive"] = "ARJ archívuma";
$net2ftp_messages["RPM"] = "RPM";
$net2ftp_messages["GZ archive"] = "GZ archívuma";
$net2ftp_messages["TAR archive"] = "TAR archívuma";
$net2ftp_messages["Zip archive"] = "Zip archívuma";
$net2ftp_messages["MOV movie file"] = "MOV filmfájlt";
$net2ftp_messages["MPEG movie file"] = "MPEG filmfájlt";
$net2ftp_messages["Real movie file"] = "Real filmfájlt";
$net2ftp_messages["Quicktime movie file"] = "Quicktime filmfájlt";
$net2ftp_messages["Shockwave flash file"] = "Shockwave flash fájl";
$net2ftp_messages["Shockwave file"] = "Shockwave fájl";
$net2ftp_messages["WAV sound file"] = "WAV hangfájlra";
$net2ftp_messages["Font file"] = "Font fájl";
$net2ftp_messages["%1\$s File"] = "%1\$s Fájl";
$net2ftp_messages["File"] = "Fájl";

// getAction()
$net2ftp_messages["Back"] = "Vissza";
$net2ftp_messages["Submit"] = "Tovább";
$net2ftp_messages["Refresh"] = "Frissítés";
$net2ftp_messages["Details"] = "Részletek";
$net2ftp_messages["Icons"] = "Ikonok";
$net2ftp_messages["List"] = "Lista";
$net2ftp_messages["Logout"] = "Kilépés";
$net2ftp_messages["Help"] = "Súgó";
$net2ftp_messages["Bookmark"] = "Könyvjelzõ";
$net2ftp_messages["Save"] = "Mentés";
$net2ftp_messages["Default"] = "Alapértelmezett";


// -------------------------------------------------------------------------
// /skins/[skin]/header.template.php and footer.template.php
// -------------------------------------------------------------------------
$net2ftp_messages["Help Guide"] = "Segítség Útmutató ";
$net2ftp_messages["Forums"] = "Fórumok";
$net2ftp_messages["License"] = "Engedély";
$net2ftp_messages["Powered by"] = "Készített";
$net2ftp_messages["You are now taken to the net2ftp forums. These forums are for net2ftp related topics only - not for generic webhosting questions."] = "Ön most már bevitték a net2ftp fórumokon. E fórumok számára net2ftp kapcsolatos témák csak - nem a generikus webhosting kérdések.";
$net2ftp_messages["Standard"] = "Standard";
$net2ftp_messages["Mobile"] = "Mobile";

// -------------------------------------------------------------------------
// Admin module
if ($net2ftp_globals["state"] == "admin") {
// -------------------------------------------------------------------------

// /modules/admin/admin.inc.php
$net2ftp_messages["Admin functions"] = "Admin funkciók";

// /skins/[skin]/admin1.template.php
$net2ftp_messages["Version information"] = "Verzió információ";
$net2ftp_messages["This version of net2ftp is up-to-date."] = "Ez a változat a net2ftp naprakész.";
$net2ftp_messages["The latest version information could not be retrieved from the net2ftp.com server. Check the security settings of your browser, which may prevent the loading of a small file from the net2ftp.com server."] = "Ez a változat a net2ftp is up-to-date.";
$net2ftp_messages["Logging"] = "Naplózás";
$net2ftp_messages["Date from:"] = "Idõpontot:";
$net2ftp_messages["to:"] = "to:";
$net2ftp_messages["Empty logs"] = "Üres naplók";
$net2ftp_messages["View logs"] = "Naplók megtekintése";
$net2ftp_messages["Go"] = "Go";
$net2ftp_messages["Setup MySQL tables"] = "Setup MySQL táblák";
$net2ftp_messages["Create the MySQL database tables"] = "Létre a MySQL adatbázis-táblák";

} // end admin

// -------------------------------------------------------------------------
// Admin_createtables module
if ($net2ftp_globals["state"] == "admin_createtables") {
// -------------------------------------------------------------------------

// /modules/admin_createtables/admin_createtables.inc.php
$net2ftp_messages["Admin functions"] = "Admin funkciók";
$net2ftp_messages["The handle of file %1\$s could not be opened."] = "A fájl megfogva %1\$s nem lehet megnyitni.";
$net2ftp_messages["The file %1\$s could not be opened."] = "A fájl %1\$s nem lehet megnyitni.";
$net2ftp_messages["The handle of file %1\$s could not be closed."] = "A fájl megfogva %1\$s nem lehet bezárni.";
$net2ftp_messages["The connection to the server <b>%1\$s</b> could not be set up. Please check the database settings you've entered."] = "A kapcsolat a kiszolgálóval <b>%1\$s</b> nem lehetett létrehozni. Kérjük, ellenõrizze az adatbázis beállításokat lépett.";
$net2ftp_messages["Unable to select the database <b>%1\$s</b>."] = "Nem választhatja az adatbázis <b>%1\$s</b>.";
$net2ftp_messages["The SQL query nr <b>%1\$s</b> could not be executed."] = "Az SQL lekérdezés nr <b>%1\$s</b> is nem hajtható végre.";
$net2ftp_messages["The SQL query nr <b>%1\$s</b> was executed successfully."] = "Az SQL lekérdezésnr <b>%1\$s</b> hajtották végre sikeresen.";

// /skins/[skin]/admin_createtables1.template.php
$net2ftp_messages["Please enter your MySQL settings:"] = "Kérjük, adja meg a MySQL beállítások:";
$net2ftp_messages["MySQL username"] = "MySQL felhasználónevét";
$net2ftp_messages["MySQL password"] = "MySQL jelszavát";
$net2ftp_messages["MySQL database"] = "MySQL adatbázis";
$net2ftp_messages["MySQL server"] = "MySQL szerver";
$net2ftp_messages["This SQL query is going to be executed:"] = "Ez az SQL-lekérdezés lesz végre:";
$net2ftp_messages["Execute"] = "Végrehajt";

// /skins/[skin]/admin_createtables2.template.php
$net2ftp_messages["Settings used:"] = "Beállítások:";
$net2ftp_messages["MySQL password length"] = "A MySQL jelszó hossza";
$net2ftp_messages["Results:"] = "Eredmény:";

} // end admin_createtables


// -------------------------------------------------------------------------
// Admin_viewlogs module
if ($net2ftp_globals["state"] == "admin_viewlogs") {
// -------------------------------------------------------------------------

// /modules/admin_createtables/admin_viewlogs.inc.php
$net2ftp_messages["Admin functions"] = "Admin funkciók";
$net2ftp_messages["Unable to execute the SQL query <b>%1\$s</b>."] = "Nem lehet végrehajtani az SQL lekérdezést <b>%1\$s</b>.";
$net2ftp_messages["No data"] = "Nincs adat";

} // end admin_viewlogs


// -------------------------------------------------------------------------
// Admin_emptylogs module
if ($net2ftp_globals["state"] == "admin_emptylogs") {
// -------------------------------------------------------------------------

// /modules/admin_createtables/admin_emptylogs.inc.php
$net2ftp_messages["Admin functions"] = "Admin funkciók";
$net2ftp_messages["The table <b>%1\$s</b> was emptied successfully."] = "A táblázat <b>%1\$s</b> kiürült sikeresen.";
$net2ftp_messages["The table <b>%1\$s</b> could not be emptied."] = "A táblázat <b>%1\$s</b> nem kell üríteni.";
$net2ftp_messages["The table <b>%1\$s</b> was optimized successfully."] = "A táblázat <b>%1\$s</b> sikeres volt optimalizálva.";
$net2ftp_messages["The table <b>%1\$s</b> could not be optimized."] = "A táblázat <b>%1\$s</b> nem lehetne optimalizálni.";

} // end admin_emptylogs


// -------------------------------------------------------------------------
// Advanced module
if ($net2ftp_globals["state"] == "advanced") {
// -------------------------------------------------------------------------

// /modules/advanced/advanced.inc.php
$net2ftp_messages["Advanced functions"] = "Haladó funkciók";

// /skins/[skin]/advanced1.template.php
$net2ftp_messages["Go"] = "Go";
$net2ftp_messages["Disabled"] = "Tiltva";
$net2ftp_messages["Advanced FTP functions"] = "Advanced FTP függvények";
$net2ftp_messages["Send arbitrary FTP commands to the FTP server"] = "Küldjön tetszõleges FTP-parancsok az FTP-kiszolgáló";
$net2ftp_messages["This function is available on PHP 5 only"] = "Ez a funkció csak a PHP 5";
$net2ftp_messages["Troubleshooting functions"] = "Hibaelhárítási feladatok";
$net2ftp_messages["Troubleshoot net2ftp on this webserver"] = "Elhárítása net2ftp ezen a webszerveren";
$net2ftp_messages["Troubleshoot an FTP server"] = "Elhárítása az FTP szerver";
$net2ftp_messages["Test the net2ftp list parsing rules"] = "Próbálja ki a net2ftp lista parsing szabályok";
$net2ftp_messages["Translation functions"] = "Fordítási feladatok";
$net2ftp_messages["Introduction to the translation functions"] = "Bevezetés a fordítási feladatok";
$net2ftp_messages["Extract messages to translate from code files"] = "Kivonat üzenetek lefordítani a kódot kép";
$net2ftp_messages["Check if there are new or obsolete messages"] = "Ellenõrizze, hogy vannak új üzenetek vagy elavult";

$net2ftp_messages["Beta functions"] = "Béta funkciók";
$net2ftp_messages["Send a site command to the FTP server"] = "Küldje el egy webhely parancsot az FTP szerver";
$net2ftp_messages["Apache: password-protect a directory, create custom error pages"] = "Apache: jelszóval védeni egy könyvtárat, hozzon létre egyéni lapokat";
$net2ftp_messages["MySQL: execute an SQL query"] = "MySQL: kivégez egy SQL lekérdezés";


// advanced()
$net2ftp_messages["The site command functions are not available on this webserver."] = "A weboldal irányító funkciók nem állnak rendelkezésre ezen a webszerveren.";
$net2ftp_messages["The Apache functions are not available on this webserver."] = "Az Apache funkciók nem érhetõk el ezen a webszerveren.";
$net2ftp_messages["The MySQL functions are not available on this webserver."] = "A MySQL függvények nem érhetõk el ezen a webszerveren.";
$net2ftp_messages["Unexpected state2 string. Exiting."] = "Váratlan state2 string. Kilépett.";

} // end advanced


// -------------------------------------------------------------------------
// Advanced_ftpserver module
if ($net2ftp_globals["state"] == "advanced_ftpserver") {
// -------------------------------------------------------------------------

// /modules/advanced_ftpserver/advanced_ftpserver.inc.php
$net2ftp_messages["Troubleshoot an FTP server"] = "Elhárítása az FTP szerver";

// /skins/[skin]/advanced_ftpserver1.template.php
$net2ftp_messages["Connection settings:"] = "Kapcsolat beállításai:";
$net2ftp_messages["FTP server"] = "FTP szerver";
$net2ftp_messages["FTP server port"] = "FTP szerver port";
$net2ftp_messages["Username"] = "Felhasználónév";
$net2ftp_messages["Password"] = "Jelszó";
$net2ftp_messages["Password length"] = "Jelszó hossza";
$net2ftp_messages["Passive mode"] = "Passzív mód";
$net2ftp_messages["Directory"] = "Könyvtár";
$net2ftp_messages["Printing the result"] = "Nyomtatás eredménye";

// /skins/[skin]/advanced_ftpserver2.template.php
$net2ftp_messages["Connecting to the FTP server: "] = "Kapcsolódás az FTP szerver: ";
$net2ftp_messages["Logging into the FTP server: "] = "Bejelentkezik az FTP szerver: ";
$net2ftp_messages["Setting the passive mode: "] = "A passzív mód beállítása: ";
$net2ftp_messages["Getting the FTP server system type: "] = "Megismeri az FTP-kiszolgáló rendszer típusát: ";
$net2ftp_messages["Changing to the directory %1\$s: "] = "Megváltoztatása a könyvtár %1\$s: ";
$net2ftp_messages["The directory from the FTP server is: %1\$s "] = "A könyvtárat az FTP szerver: %1\$s ";
$net2ftp_messages["Getting the raw list of directories and files: "] = "Hogyan lehet a nyers listája könyvtárakat és fájlokat: ";
$net2ftp_messages["Trying a second time to get the raw list of directories and files: "] = "Kipróbálás második alkalommal kap a nyers listát könyvtárakat és fájlokat: ";
$net2ftp_messages["Closing the connection: "] = "A kapcsolat bezárása: ";
$net2ftp_messages["Raw list of directories and files:"] = "Nyers listája könyvtárakat és fájlokat:";
$net2ftp_messages["Parsed list of directories and files:"] = "Parsed listája könyvtárakat és fájlokat:";

$net2ftp_messages["OK"] = "OK";
$net2ftp_messages["not OK"] = "nem OK";

} // end advanced_ftpserver


// -------------------------------------------------------------------------
// Advanced_parsing module
if ($net2ftp_globals["state"] == "advanced_parsing") {
// -------------------------------------------------------------------------

$net2ftp_messages["Test the net2ftp list parsing rules"] = "Próbálja ki a net2ftp lista parsing szabályok";
$net2ftp_messages["Sample input"] = "Minta bemenet";
$net2ftp_messages["Parsed output"] = "Átvizsgált bemenet";

} // end advanced_parsing


// -------------------------------------------------------------------------
// Advanced_webserver module
if ($net2ftp_globals["state"] == "advanced_webserver") {
// -------------------------------------------------------------------------

$net2ftp_messages["Troubleshoot your net2ftp installation"] = "Elhárítása a telepítõ net2ftp";
$net2ftp_messages["Printing the result"] = "Nyomtatás eredménye";

$net2ftp_messages["Checking if the FTP module of PHP is installed: "] = "Ellenõrzése, ha az FTP modul a PHP telepítését: ";
$net2ftp_messages["yes"] = "igen";
$net2ftp_messages["no - please install it!"] = "nem - Kérjük, telepítse azt!";

$net2ftp_messages["Checking the permissions of the directory on the web server: a small file will be written to the /temp folder and then deleted."] = "Ellenõrzi a jogosultságait a könyvtárat a webszerveren: egy kis fájlt kell írni a / temp mappát, majd el kell hagyni.";
$net2ftp_messages["Creating filename: "] = "Fájlnév létrehozása: ";
$net2ftp_messages["OK. Filename: %1\$s"] = "OK. Fájlneve: %1\$s";
$net2ftp_messages["not OK"] = "nem OK";
$net2ftp_messages["OK"] = "OK";
$net2ftp_messages["not OK. Check the permissions of the %1\$s directory"] = "nem OK. Ellenõrizze a jogosultságait a %1\$s könyvtárat";
$net2ftp_messages["Opening the file in write mode: "] = "A fájl írásra használni: ";
$net2ftp_messages["Writing some text to the file: "] = "Írás néhány szöveget a fájlba: ";
$net2ftp_messages["Closing the file: "] = "A fájl bezárása: ";
$net2ftp_messages["Deleting the file: "] = "Törli a fájlt: ";

$net2ftp_messages["Testing the FTP functions"] = "Tesztelés az FTP függvények";
$net2ftp_messages["Connecting to a test FTP server: "] = "Csatlakozás teszt FTP szerver: ";
$net2ftp_messages["Connecting to the FTP server: "] = "Kapcsolódás az FTP szerver: ";
$net2ftp_messages["Logging into the FTP server: "] = "Bejelentkezik az FTP szerver: ";
$net2ftp_messages["Setting the passive mode: "] = "A passzív mód beállítása: ";
$net2ftp_messages["Getting the FTP server system type: "] = "Megismeri az FTP-kiszolgáló rendszer típusát: ";
$net2ftp_messages["Changing to the directory %1\$s: "] = "Megváltoztatása a könyvtár %1\$s: ";
$net2ftp_messages["The directory from the FTP server is: %1\$s "] = "A könyvtárat az FTP szerver: %1\$s ";
$net2ftp_messages["Getting the raw list of directories and files: "] = "Hogyan lehet a nyers listája könyvtárakat és fájlokat: ";
$net2ftp_messages["Trying a second time to get the raw list of directories and files: "] = "Kipróbálás második alkalommal kap a nyers listát könyvtárakat és fájlokat: ";
$net2ftp_messages["Closing the connection: "] = "A kapcsolat bezárása: ";
$net2ftp_messages["Raw list of directories and files:"] = "Nyers listája könyvtárakat és fájlokat:";
$net2ftp_messages["Parsed list of directories and files:"] = "Parsed listája könyvtárakat és fájlokat:";
$net2ftp_messages["OK"] = "OK";
$net2ftp_messages["not OK"] = "nem OK";

} // end advanced_webserver


// -------------------------------------------------------------------------
// Bookmark module
if ($net2ftp_globals["state"] == "bookmark") {
// -------------------------------------------------------------------------

$net2ftp_messages["Drag and drop one of the links below to the bookmarks bar"] = "Drag and drop one of the links below to the bookmarks bar";
$net2ftp_messages["Right-click on one of the links below and choose \"Add to Favorites...\""] = "Right-click on one of the links below and choose \"Add to Favorites...\"";
$net2ftp_messages["Right-click on one the links below and choose \"Add Link to Bookmarks...\""] = "Right-click on one the links below and choose \"Add Link to Bookmarks...\"";
$net2ftp_messages["Right-click on one of the links below and choose \"Bookmark link...\""] = "Right-click on one of the links below and choose \"Bookmark link...\"";
$net2ftp_messages["Right-click on one of the links below and choose \"Bookmark This Link...\""] = "Right-click on one of the links below and choose \"Bookmark This Link...\"";
$net2ftp_messages["One click access (net2ftp won't ask for a password - less safe)"] = "One click access (net2ftp won't ask for a password - less safe)";
$net2ftp_messages["Two click access (net2ftp will ask for a password - safer)"] = "Two click access (net2ftp will ask for a password - safer)";
$net2ftp_messages["Note: when you will use this bookmark, a popup window will ask you for your username and password."] =  "Megjegyzés:: mikor fogja használni ezt a könyvjelzõt, egy felugró ablak fogja kérni a felhasználónevét és jelszavát.";

} // end bookmark


// -------------------------------------------------------------------------
// Browse module
if ($net2ftp_globals["state"] == "browse") {
// -------------------------------------------------------------------------

// /modules/browse/browse.inc.php
$net2ftp_messages["Choose a directory"] = "Válassza ki a könyvtárat";
$net2ftp_messages["Please wait..."] = "Kérem várjon...";

// browse()
$net2ftp_messages["Directories with names containing \' cannot be displayed correctly. They can only be deleted. Please go back and select another subdirectory."] = "Könyvtárak neveit tartalmazó \' nem jeleníthetõ meg helyesen. Csak akkor lehet hagyni. Kérjük, lépjen vissza és válasszon másik alkönyvtár.";

$net2ftp_messages["Daily limit reached: you will not be able to transfer data"] = "Napi Elérte: nem lesz képes adatátvitelre";
$net2ftp_messages["In order to guarantee the fair use of the web server for everyone, the data transfer volume and script execution time are limited per user, and per day. Once this limit is reached, you can still browse the FTP server but not transfer data to/from it."] = "Annak érdekében, hogy biztosítsa a tisztességes felhasználása a webszerver mindenki számára, az adatátvitel volumene és szkript végrehajtási idejét korlátozzák egy felhasználó, vagy naponta. Amint elérik a limitet, akkor is böngészni az FTP szerver, de nem adja át az adatokat / tõle.";
$net2ftp_messages["If you need unlimited usage, please install net2ftp on your own web server."] = "Ha szükség van korlátlan használata, kérjük telepítse net2ftp saját webszerveren.";

// printdirfilelist()
// Keep this short, it must fit in a small button!
$net2ftp_messages["New dir"] = "Új könyvtár";
$net2ftp_messages["New file"] = "Új fájl";
$net2ftp_messages["HTML templates"] = "HTML sablon";
$net2ftp_messages["Upload"] = "Feltöltés";
$net2ftp_messages["Java Upload"] = "Java feltöltés";
$net2ftp_messages["Flash Upload"] = "Flash feltöltés";
$net2ftp_messages["Install"] = "Installáció";
$net2ftp_messages["Advanced"] = "Speciális";
$net2ftp_messages["Copy"] = "Másol";
$net2ftp_messages["Move"] = "Mozgat";
$net2ftp_messages["Delete"] = "Törlés";
$net2ftp_messages["Rename"] = "Átnevezés";
$net2ftp_messages["Chmod"] = "Chmod";
$net2ftp_messages["Download"] = "Letöltés";
$net2ftp_messages["Unzip"] = "Unzip";
$net2ftp_messages["Zip"] = "Zip";
$net2ftp_messages["Size"] = "Méret";
$net2ftp_messages["Search"] = "Keresés";
$net2ftp_messages["Go to the parent directory"] = "Menj a szülõ könyvtár";
$net2ftp_messages["Go"] = "Go";
$net2ftp_messages["Transform selected entries: "] = "Transform kiválasztott bejegyzések: ";
$net2ftp_messages["Transform selected entry: "] = "Transform kijelölt bejegyzést: ";
$net2ftp_messages["Make a new subdirectory in directory %1\$s"] = "Készíts egy új alkönyvtár a könyvtárban %1\$s";
$net2ftp_messages["Create a new file in directory %1\$s"] = "Hozzon létre egy új fájlt a könyvtárban %1\$s";
$net2ftp_messages["Create a website easily using ready-made templates"] = "Hozzon létre egy weboldal segítségével könnyen kész sablonok";
$net2ftp_messages["Upload new files in directory %1\$s"] = "Feltöltés új fájlokat a könyvtárban %1\$s";
$net2ftp_messages["Upload directories and files using a Java applet"] = "Upload könyvtárakat és fájlokat használ Java applet";
$net2ftp_messages["Upload files using a Flash applet"] = "Feltölteni fájlokat Flash kisalkalmazás";
$net2ftp_messages["Install software packages (requires PHP on web server)"] = "Telepítéséhez szoftvercsomagok (requires PHP webszerver)";
$net2ftp_messages["Go to the advanced functions"] = "Menj a speciális funkciókat";
$net2ftp_messages["Copy the selected entries"] = "A kijelölt tételek másolása";
$net2ftp_messages["Move the selected entries"] = "A kijelölt tételek  mozgatása";
$net2ftp_messages["Delete the selected entries"] = "A kijelölt tételek törlése";
$net2ftp_messages["Rename the selected entries"] = "A kijelölt tételek átnevezése";
$net2ftp_messages["Chmod the selected entries (only works on Unix/Linux/BSD servers)"] = "Chmod a kiválasztott pont (csak akkor mûködik, Unix / Linux / BSD szerverek)";
$net2ftp_messages["Download a zip file containing all selected entries"] = "Le egy zip fájl tartalmazza az összes kiválasztott pont";
$net2ftp_messages["Unzip the selected archives on the FTP server"] = "Unzip a kiválasztott archívumokat az FTP szerveren";
$net2ftp_messages["Zip the selected entries to save or email them"] = "Zip a kiválasztott pont menteni, vagy elküldheti e-mailben";
$net2ftp_messages["Calculate the size of the selected entries"] = "Ki kell számítani a mérete a kiválasztott pont";
$net2ftp_messages["Find files which contain a particular word"] = "Keresse meg a fájlokat, amelyek tartalmazzák az adott szót";
$net2ftp_messages["Click to sort by %1\$s in descending order"] = "Kattintson ide a rendezéshez %1\$s a csökkenõ sorrendben";
$net2ftp_messages["Click to sort by %1\$s in ascending order"] = "Kattintson ide a rendezéshez %1\$s a növekvõ sorrendben";
$net2ftp_messages["Ascending order"] = "Növekvõ sorrendben";
$net2ftp_messages["Descending order"] = "Csökkenõ sorrendben";
$net2ftp_messages["Upload files"] = "Feltölt fájlokat";
$net2ftp_messages["Up"] = "Fel";
$net2ftp_messages["Click to check or uncheck all rows"] = "Jelölje be vagy törölje az összes sorok";
$net2ftp_messages["All"] = "Összes";
$net2ftp_messages["Name"] = "Név";
$net2ftp_messages["Type"] = "Típus";
//$net2ftp_messages["Size"] = "Size";
$net2ftp_messages["Owner"] = "Tulajdonos";
$net2ftp_messages["Group"] = "Csoport";
$net2ftp_messages["Perms"] = "Perms";
$net2ftp_messages["Mod Time"] = "Mód. idõ";
$net2ftp_messages["Actions"] = "Akció";
$net2ftp_messages["Select the directory %1\$s"] = "Válassza ki a könyvtárat %1\$s";
$net2ftp_messages["Select the file %1\$s"] = "Válassza ki a fájlt %1\$s";
$net2ftp_messages["Select the symlink %1\$s"] = "Válassza ki a symlink - %1\$s";
$net2ftp_messages["Go to the subdirectory %1\$s"] = "Menj a alkönyvtárba %1\$s";
$net2ftp_messages["Download the file %1\$s"] = "A fájl letöltéséhez %1\$s";
$net2ftp_messages["Follow symlink %1\$s"] = "Symlinket kövesse %1\$s";
$net2ftp_messages["View"] = "Nézet";
$net2ftp_messages["Edit"] = "Szerkeszt";
$net2ftp_messages["Update"] = "Frissítés";
$net2ftp_messages["Open"] = "Megnyitás";
$net2ftp_messages["View the highlighted source code of file %1\$s"] = "Tekintse meg a kijelölt fájl forráskódját %1\$s";
$net2ftp_messages["Edit the source code of file %1\$s"] = "Szerkessze a forráskód fájl %1\$s";
$net2ftp_messages["Upload a new version of the file %1\$s and merge the changes"] = "A fájl újabb verzióját a fájl %1\$s és egyesítése a változások";
$net2ftp_messages["View image %1\$s"] = "Kép megtekintése %1\$s";
$net2ftp_messages["View the file %1\$s from your HTTP web server"] = "Nézzem meg, hogy a fájl %1\$s az Ön HTTP webszerverén van";
$net2ftp_messages["(Note: This link may not work if you don't have your own domain name.)"] = "(Megjegyzés: Ez a kapcsolat nem mûködik, ha Ön nem rendelkezik saját domain név.)";
$net2ftp_messages["This folder is empty"] = "Ez a mappa üres";

// printSeparatorRow()
$net2ftp_messages["Directories"] = "Directories";
$net2ftp_messages["Files"] = "Files";
$net2ftp_messages["Symlinks"] = "Symlinks";
$net2ftp_messages["Unrecognized FTP output"] = "Unrecognized FTP output";
$net2ftp_messages["Number"] = "Number";
$net2ftp_messages["Size"] = "Méret";
$net2ftp_messages["Skipped"] = "Skipped";
$net2ftp_messages["Data transferred from this IP address today"] = "Data transferred from this IP address today";
$net2ftp_messages["Data transferred to this FTP server today"] = "Data transferred to this FTP server today";

// printLocationActions()
$net2ftp_messages["Language:"] = "Nyelv:";
$net2ftp_messages["Skin:"] = "Felület:";
$net2ftp_messages["View mode:"] = "Nézetmód:";
$net2ftp_messages["Directory Tree"] = "Könyvtárfa";

// ftp2http()
$net2ftp_messages["Execute %1\$s in a new window"] = "Végrehajtaja %1\$s egy új ablakban";
$net2ftp_messages["This file is not accessible from the web"] = "This file is not accessible from the web";

// printDirectorySelect()
$net2ftp_messages["Double-click to go to a subdirectory:"] = "Kattintson duplán az alkönyvtárba lépéshez:";
$net2ftp_messages["Choose"] = "Választás";
$net2ftp_messages["Up"] = "Fel";

} // end browse


// -------------------------------------------------------------------------
// Calculate size module
if ($net2ftp_globals["state"] == "calculatesize") {
// -------------------------------------------------------------------------
$net2ftp_messages["Size of selected directories and files"] = "Size of selected directories and files";
$net2ftp_messages["The total size taken by the selected directories and files is:"] = "The total size taken by the selected directories and files is:";
$net2ftp_messages["The number of files which were skipped is:"] = "The number of files which were skipped is:";

} // end calculatesize


// -------------------------------------------------------------------------
// Chmod module
if ($net2ftp_globals["state"] == "chmod") {
// -------------------------------------------------------------------------
$net2ftp_messages["Chmod directories and files"] = "Chmod könyvtárak és fájlok";
$net2ftp_messages["Set all permissions"] = "Minden engedély beállítása";
$net2ftp_messages["Read"] = "Olvasás";
$net2ftp_messages["Write"] = "Írás";
$net2ftp_messages["Execute"] = "Végrehajt";
$net2ftp_messages["Owner"] = "Tulajdonos";
$net2ftp_messages["Group"] = "Csoport";
$net2ftp_messages["Everyone"] = "Mindenki";
$net2ftp_messages["To set all permissions to the same values, enter those permissions and click on the button \"Set all permissions\""] = "A minden engedély beállítása érvényesítéséhez írja be a fent említett engedélyeket és kattintson a gombra \"Minden engedély beállítása\"";
$net2ftp_messages["Set the permissions of directory <b>%1\$s</b> to: "] = "Set the permissions of directory <b>%1\$s</b> to: ";
$net2ftp_messages["Set the permissions of file <b>%1\$s</b> to: "] = "Set the permissions of file <b>%1\$s</b> to: ";
$net2ftp_messages["Set the permissions of symlink <b>%1\$s</b> to: "] = "Set the permissions of symlink <b>%1\$s</b> to: ";
$net2ftp_messages["Chmod value"] = "Chmod érték";
$net2ftp_messages["Chmod also the subdirectories within this directory"] = "Chmod also the subdirectories within this directory";
$net2ftp_messages["Chmod also the files within this directory"] = "Chmod also the files within this directory";
$net2ftp_messages["The chmod nr <b>%1\$s</b> is out of the range 000-777. Please try again."] = "The chmod nr <b>%1\$s</b> is out of the range 000-777. Please try again.";

} // end chmod


// -------------------------------------------------------------------------
// Clear cookies module
// -------------------------------------------------------------------------
// No messages


// -------------------------------------------------------------------------
// Copy/Move/Delete module
if ($net2ftp_globals["state"] == "copymovedelete") {
// -------------------------------------------------------------------------
$net2ftp_messages["Choose a directory"] = "Válassza ki a könyvtárat";
$net2ftp_messages["Copy directories and files"] = "Copy directories and files";
$net2ftp_messages["Move directories and files"] = "Move directories and files";
$net2ftp_messages["Delete directories and files"] = "Delete directories and files";
$net2ftp_messages["Are you sure you want to delete these directories and files?"] = "Are you sure you want to delete these directories and files?";
$net2ftp_messages["All the subdirectories and files of the selected directories will also be deleted!"] = "All the subdirectories and files of the selected directories will also be deleted!";
$net2ftp_messages["Set all targetdirectories"] = "Set all targetdirectories";
$net2ftp_messages["To set a common target directory, enter that target directory in the textbox above and click on the button \"Set all targetdirectories\"."] = "To set a common target directory, enter that target directory in the textbox above and click on the button \"Set all targetdirectories\".";
$net2ftp_messages["Note: the target directory must already exist before anything can be copied into it."] = "Note: the target directory must already exist before anything can be copied into it.";
$net2ftp_messages["Different target FTP server:"] = "Different target FTP server:";
$net2ftp_messages["Username"] = "Felhasználónév";
$net2ftp_messages["Password"] = "Jelszó";
$net2ftp_messages["Leave empty if you want to copy the files to the same FTP server."] = "Leave empty if you want to copy the files to the same FTP server.";
$net2ftp_messages["If you want to copy the files to another FTP server, enter your login data."] = "If you want to copy the files to another FTP server, enter your login data.";
$net2ftp_messages["Leave empty if you want to move the files to the same FTP server."] = "Leave empty if you want to move the files to the same FTP server.";
$net2ftp_messages["If you want to move the files to another FTP server, enter your login data."] = "If you want to move the files to another FTP server, enter your login data.";
$net2ftp_messages["Copy directory <b>%1\$s</b> to:"] = "Copy directory <b>%1\$s</b> to:";
$net2ftp_messages["Move directory <b>%1\$s</b> to:"] = "Move directory <b>%1\$s</b> to:";
$net2ftp_messages["Directory <b>%1\$s</b>"] = "Directory <b>%1\$s</b>";
$net2ftp_messages["Copy file <b>%1\$s</b> to:"] = "Copy file <b>%1\$s</b> to:";
$net2ftp_messages["Move file <b>%1\$s</b> to:"] = "Move file <b>%1\$s</b> to:";
$net2ftp_messages["File <b>%1\$s</b>"] = "File <b>%1\$s</b>";
$net2ftp_messages["Copy symlink <b>%1\$s</b> to:"] = "Copy symlink <b>%1\$s</b> to:";
$net2ftp_messages["Move symlink <b>%1\$s</b> to:"] = "Move symlink <b>%1\$s</b> to:";
$net2ftp_messages["Symlink <b>%1\$s</b>"] = "Symlink <b>%1\$s</b>";
$net2ftp_messages["Target directory:"] = "Target directory:";
$net2ftp_messages["Target name:"] = "Target name:";
$net2ftp_messages["Processing the entries:"] = "Processing the entries:";

} // end copymovedelete


// -------------------------------------------------------------------------
// Download file module
// -------------------------------------------------------------------------
// No messages


// -------------------------------------------------------------------------
// EasyWebsite module
if ($net2ftp_globals["state"] == "easyWebsite") {
// -------------------------------------------------------------------------
$net2ftp_messages["Create a website in 4 easy steps"] = "Create a website in 4 easy steps";
$net2ftp_messages["Template overview"] = "Template overview";
$net2ftp_messages["Template details"] = "Template details";
$net2ftp_messages["Files are copied"] = "Files are copied";
$net2ftp_messages["Edit your pages"] = "Edit your pages";

// Screen 1 - printTemplateOverview
$net2ftp_messages["Click on the image to view the details of a template."] = "Click on the image to view the details of a template.";
$net2ftp_messages["Back to the Browse screen"] = "Back to the Browse screen";
$net2ftp_messages["Template"] = "Template";
$net2ftp_messages["Copyright"] = "Copyright";
$net2ftp_messages["Click on the image to view the details of this template"] = "Click on the image to view the details of this template";

// Screen 2 - printTemplateDetails
$net2ftp_messages["The template files will be copied to your FTP server. Existing files with the same filename will be overwritten. Do you want to continue?"] = "The template files will be copied to your FTP server. Existing files with the same filename will be overwritten. Do you want to continue?";
$net2ftp_messages["Install template to directory: "] = "Install template to directory: ";
$net2ftp_messages["Install"] = "Installáció";
$net2ftp_messages["Size"] = "Méret";
$net2ftp_messages["Preview page"] = "Preview page";
$net2ftp_messages["opens in a new window"] = "opens in a new window";

// Screen 3
$net2ftp_messages["Please wait while the template files are being transferred to your server: "] = "Please wait while the template files are being transferred to your server: ";
$net2ftp_messages["Done."] = "Done.";
$net2ftp_messages["Continue"] = "Continue";

// Screen 4 - printEasyAdminPanel
$net2ftp_messages["Edit page"] = "Edit page";
$net2ftp_messages["Browse the FTP server"] = "Browse the FTP server";
$net2ftp_messages["Add this link to your favorites to return to this page later on!"] = "Add this link to your favorites to return to this page later on!";
$net2ftp_messages["Edit website at %1\$s"] = "Edit website at %1\$s";
$net2ftp_messages["Internet Explorer: right-click on the link and choose \"Add to Favorites...\""] = "Internet Explorer: jobb gombbal a hivatkozásra, és válassza a \"Add a kedvencekhez...\"";
$net2ftp_messages["Netscape, Mozilla, Firefox: right-click on the link and choose \"Bookmark This Link...\""] = "Netscape, Mozilla, Firefox: right-click on the link and choose \"Linket adja a Könyvjelzõhöz ...\"";

// ftp_copy_local2ftp
$net2ftp_messages["WARNING: Unable to create the subdirectory <b>%1\$s</b>. It may already exist. Continuing..."] = "WARNING: Unable to create the subdirectory <b>%1\$s</b>. It may already exist. Continuing...";
$net2ftp_messages["Created target subdirectory <b>%1\$s</b>"] = "Created cél alkönyvtár <b>%1\$s</b>";
$net2ftp_messages["WARNING: Unable to copy the file <b>%1\$s</b>. Continuing..."] = "WARNING: Unable to copy the file <b>%1\$s</b>. Continuing...";
$net2ftp_messages["Copied file <b>%1\$s</b>"] = "Másolhatók fájlt <b>%1\$s</b>";
}


// -------------------------------------------------------------------------
// Edit module
if ($net2ftp_globals["state"] == "edit") {
// -------------------------------------------------------------------------

// /modules/edit/edit.inc.php
$net2ftp_messages["Unable to open the template file"] = "Unable to open the template file";
$net2ftp_messages["Unable to read the template file"] = "Unable to read the template file";
$net2ftp_messages["Please specify a filename"] = "Please specify a filename";
$net2ftp_messages["Status: This file has not yet been saved"] = "Status: This file has not yet been saved";
$net2ftp_messages["Status: Saved on <b>%1\$s</b> using mode %2\$s"] = "Status: Saved on <b>%1\$s</b> using mode %2\$s";
$net2ftp_messages["Status: <b>This file could not be saved</b>"] = "Status: <b>This file could not be saved</b>";
$net2ftp_messages["Not yet saved"] = "Not yet saved";
$net2ftp_messages["Could not be saved"] = "Could not be saved";
$net2ftp_messages["Saved at %1\$s"] = "Saved at %1\$s";

// /skins/[skin]/edit.template.php
$net2ftp_messages["Directory: "] = "Directory: ";
$net2ftp_messages["File: "] = "File: ";
$net2ftp_messages["New file name: "] = "New file name: ";
$net2ftp_messages["Character encoding: "] = "Character encoding: ";
$net2ftp_messages["Note: changing the textarea type will save the changes"] = "Note: changing the textarea type will save the changes";
$net2ftp_messages["Copy up"] = "Copy up";
$net2ftp_messages["Copy down"] = "Copy down";

} // end if edit


// -------------------------------------------------------------------------
// Find string module
if ($net2ftp_globals["state"] == "findstring") {
// -------------------------------------------------------------------------

// /modules/findstring/findstring.inc.php 
$net2ftp_messages["Search directories and files"] = "Search directories and files";
$net2ftp_messages["Search again"] = "Search again";
$net2ftp_messages["Search results"] = "Search results";
$net2ftp_messages["Please enter a valid search word or phrase."] = "Please enter a valid search word or phrase.";
$net2ftp_messages["Please enter a valid filename."] = "Please enter a valid filename.";
$net2ftp_messages["Please enter a valid file size in the \"from\" textbox, for example 0."] = "Please enter a valid file size in the \"from\" textbox, for example 0.";
$net2ftp_messages["Please enter a valid file size in the \"to\" textbox, for example 500000."] = "Please enter a valid file size in the \"to\" textbox, for example 500000.";
$net2ftp_messages["Please enter a valid date in Y-m-d format in the \"from\" textbox."] = "Please enter a valid date in Y-m-d format in the \"from\" textbox.";
$net2ftp_messages["Please enter a valid date in Y-m-d format in the \"to\" textbox."] = "Please enter a valid date in Y-m-d format in the \"to\" textbox.";
$net2ftp_messages["The word <b>%1\$s</b> was not found in the selected directories and files."] = "The word <b>%1\$s</b> was not found in the selected directories and files.";
$net2ftp_messages["The word <b>%1\$s</b> was found in the following files:"] = "The word <b>%1\$s</b> was found in the following files:";

// /skins/[skin]/findstring1.template.php
$net2ftp_messages["Search for a word or phrase"] = "Search for a word or phrase";
$net2ftp_messages["Case sensitive search"] = "Case sensitive search";
$net2ftp_messages["Restrict the search to:"] = "Restrict the search to:";
$net2ftp_messages["files with a filename like"] = "files with a filename like";
$net2ftp_messages["(wildcard character is *)"] = "(wildcard character is *)";
$net2ftp_messages["files with a size"] = "files with a size";
$net2ftp_messages["files which were last modified"] = "files which were last modified";
$net2ftp_messages["from"] = "from";
$net2ftp_messages["to"] = "to";

$net2ftp_messages["Directory"] = "Könyvtár";
$net2ftp_messages["File"] = "Fájl";
$net2ftp_messages["Line"] = "Line";
$net2ftp_messages["Action"] = "Action";
$net2ftp_messages["View"] = "Nézet";
$net2ftp_messages["Edit"] = "Szerkeszt";
$net2ftp_messages["View the highlighted source code of file %1\$s"] = "Tekintse meg a kijelölt fájl forráskódját %1\$s";
$net2ftp_messages["Edit the source code of file %1\$s"] = "Szerkessze a forráskód fájl %1\$s";

} // end findstring


// -------------------------------------------------------------------------
// Help module
// -------------------------------------------------------------------------
// No messages yet


// -------------------------------------------------------------------------
// Install size module
if ($net2ftp_globals["state"] == "install") {
// -------------------------------------------------------------------------

// /modules/install/install.inc.php
$net2ftp_messages["Install software packages"] = "Install software packages";
$net2ftp_messages["Unable to open the template file"] = "Unable to open the template file";
$net2ftp_messages["Unable to read the template file"] = "Unable to read the template file";
$net2ftp_messages["Unable to get the list of packages"] = "Unable to get the list of packages";

// /skins/blue/install1.template.php
$net2ftp_messages["The net2ftp installer script has been copied to the FTP server."] = "The net2ftp installer script has been copied to the FTP server.";
$net2ftp_messages["This script runs on your web server and requires PHP to be installed."] = "This script runs on your web server and requires PHP to be installed.";
$net2ftp_messages["In order to run it, click on the link below."] = "In order to run it, click on the link below.";
$net2ftp_messages["net2ftp has tried to determine the directory mapping between the FTP server and the web server."] = "net2ftp has tried to determine the directory mapping between the FTP server and the web server.";
$net2ftp_messages["Should this link not be correct, enter the URL manually in your web browser."] = "Should this link not be correct, enter the URL manually in your web browser.";

} // end install


// -------------------------------------------------------------------------
// Java upload module
if ($net2ftp_globals["state"] == "jupload") {
// -------------------------------------------------------------------------
$net2ftp_messages["Upload directories and files using a Java applet"] = "Upload könyvtárakat és fájlokat használ Java applet";
$net2ftp_messages["Your browser does not support applets, or you have disabled applets in your browser settings."] = "Your browser does not support applets, or you have disabled applets in your browser settings.";
$net2ftp_messages["To use this applet, please install the newest version of Sun's java. You can get it from <a href=\"http://www.java.com/\">java.com</a>. Click on Get It Now."] = "To use this applet, please install the newest version of Sun's java. You can get it from <a href=\"http://www.java.com/\">java.com</a>. Click on Get It Now.";
$net2ftp_messages["The online installation is about 1-2 MB and the offline installation is about 13 MB. This 'end-user' java is called JRE (Java Runtime Environment)."] = "The online installation is about 1-2 MB and the offline installation is about 13 MB. This 'end-user' java is called JRE (Java Runtime Environment).";
$net2ftp_messages["Alternatively, use net2ftp's normal upload or upload-and-unzip functionality."] = "Alternatively, use net2ftp's normal upload or upload-and-unzip functionality.";

} // end jupload



// -------------------------------------------------------------------------
// Login module
if ($net2ftp_globals["state"] == "login") {
// -------------------------------------------------------------------------
$net2ftp_messages["Login!"] = "Belépés!";
$net2ftp_messages["Once you are logged in, you will be able to:"] = "Miután bejelentkezett, Ön képes lesz:";
$net2ftp_messages["Navigate the FTP server"] = "Navigálni az FTP szerveren";
$net2ftp_messages["Once you have logged in, you can browse from directory to directory and see all the subdirectories and files."] = "Ha már bejelentkezett, akkor böngészhetünk a könyvtárból könyvtárba, és látni az alkönyvtárakat és fájlokat.";
$net2ftp_messages["Upload files"] = "Feltölt fájlokat";
$net2ftp_messages["There are 3 different ways to upload files: the standard upload form, the upload-and-unzip functionality, and the Java Applet."] = "Jelenleg 3 különbözõ módon lehet feltölteni fájlokat: a szabványos feltöltési ûrlapon, a feltöltés-és unzip funkció, és a Java kisalkalmazással.";
$net2ftp_messages["Download files"] = "Fájlok letöltése";
$net2ftp_messages["Click on a filename to quickly download one file.<br />Select multiple files and click on Download; the selected files will be downloaded in a zip archive."] = "Kattintson egy fájlnevévre gyorsan letölt egy fájlt. <br /> Válasszon ki több fájlt, és kattintson a Downloadra, a kiválasztott fájlok letöltését a zip archívumban.";
$net2ftp_messages["Zip files"] = "Zip fájlok";
$net2ftp_messages["... and save the zip archive on the FTP server, or email it to someone."] = "... and save the zip archive on the FTP server, or email it to someone.";
$net2ftp_messages["Unzip files"] = "Unzip fájl";
$net2ftp_messages["Different formats are supported: .zip, .tar, .tgz and .gz."] = "Different formats are supported: .zip, .tar, .tgz and .gz.";
$net2ftp_messages["Install software"] = "Szoftver Installálás";
$net2ftp_messages["Choose from a list of popular applications (PHP required)."] = "Choose from a list of popular applications (PHP required).";
$net2ftp_messages["Copy, move and delete"] = "Copy, move and delete";
$net2ftp_messages["Directories are handled recursively, meaning that their content (subdirectories and files) will also be copied, moved or deleted."] = "Directories are handled recursively, meaning that their content (subdirectories and files) will also be copied, moved or deleted.";
$net2ftp_messages["Copy or move to a 2nd FTP server"] = "Copy or move to a 2nd FTP server";
$net2ftp_messages["Handy to import files to your FTP server, or to export files from your FTP server to another FTP server."] = "Handy to import files to your FTP server, or to export files from your FTP server to another FTP server.";
$net2ftp_messages["Rename and chmod"] = "Rename and chmod";
$net2ftp_messages["Chmod handles directories recursively."] = "Chmod handles directories recursively.";
$net2ftp_messages["View code with syntax highlighting"] = "View code with syntax highlighting";
$net2ftp_messages["PHP functions are linked to the documentation on php.net."] = "PHP functions are linked to the documentation on php.net.";
$net2ftp_messages["Plain text editor"] = "Plain text editor";
$net2ftp_messages["Edit text right from your browser; every time you save the changes the new file is transferred to the FTP server."] = "Edit text right from your browser; every time you save the changes the new file is transferred to the FTP server.";
$net2ftp_messages["HTML editors"] = "HTML editors";
$net2ftp_messages["Edit HTML a What-You-See-Is-What-You-Get (WYSIWYG) form; there are 2 different editors to choose from."] = "Edit HTML a What-You-See-Is-What-You-Get (WYSIWYG) form; there are 2 different editors to choose from.";
$net2ftp_messages["Code editor"] = "Code editor";
$net2ftp_messages["Edit HTML and PHP in an editor with syntax highlighting."] = "Edit HTML and PHP in an editor with syntax highlighting.";
$net2ftp_messages["Search for words or phrases"] = "Search for words or phrases";
$net2ftp_messages["Filter out files based on the filename, last modification time and filesize."] = "Filter out files based on the filename, last modification time and filesize.";
$net2ftp_messages["Calculate size"] = "Calculate size";
$net2ftp_messages["Calculate the size of directories and files."] = "Calculate the size of directories and files.";

$net2ftp_messages["FTP server"] = "FTP szerver";
$net2ftp_messages["Example"] = "Példa";
$net2ftp_messages["Port"] = "Port";
$net2ftp_messages["Protocol"] = "Protocol";
$net2ftp_messages["Username"] = "Felhasználónév";
$net2ftp_messages["Password"] = "Jelszó";
$net2ftp_messages["Anonymous"] = "Névtelen";
$net2ftp_messages["Passive mode"] = "Passzív mód";
$net2ftp_messages["Initial directory"] = "Kezdõ könyvtár";
$net2ftp_messages["Language"] = "Nyelv";
$net2ftp_messages["Skin"] = "Felület";
$net2ftp_messages["FTP mode"] = "FTP mód";
$net2ftp_messages["Automatic"] = "Automatikus";
$net2ftp_messages["Login"] = "Belépés";
$net2ftp_messages["Clear cookies"] = "Sütik törlése";
$net2ftp_messages["Admin"] = "Adminisztrátor";
$net2ftp_messages["Please enter an FTP server."] = "Please enter an FTP server.";
$net2ftp_messages["Please enter a username."] = "Kérem adja meg a felhasználói nevét.";
$net2ftp_messages["Please enter a password."] = "Kérem adja meg a jelszót.";

} // end login


// -------------------------------------------------------------------------
// Login module
if ($net2ftp_globals["state"] == "login_small") {
// -------------------------------------------------------------------------

$net2ftp_messages["Please enter your Administrator username and password."] = "Kérem adja meg az Adminisztrátor felhasználói nevét és jelszavát.";
$net2ftp_messages["Please enter your username and password for FTP server <b>%1\$s</b>."] = "Kérjük, adja meg felhasználónevét és jelszavát az FTP-kiszolgálóhoz <b>%1\$s</b>.";
$net2ftp_messages["Username"] = "Felhasználónév";
$net2ftp_messages["Your session has expired; please enter your password for FTP server <b>%1\$s</b> to continue."] = "Mûveleti ideje lejárt, kérjük adja meg a jelszót az FTP-kiszolgáló <b>%1\$s</b> folytatásához.";
$net2ftp_messages["Your IP address has changed; please enter your password for FTP server <b>%1\$s</b> to continue."] = "Az Ön IP címe megváltozott; Kérjük, adja meg a jelszavát az FTP-kiszolgáló <b>%1\$s</b> folytatásához.";
$net2ftp_messages["Password"] = "Jelszó";
$net2ftp_messages["Login"] = "Belépés";
$net2ftp_messages["Continue"] = "Continue";

} // end login_small


// -------------------------------------------------------------------------
// Logout module
if ($net2ftp_globals["state"] == "logout") {
// -------------------------------------------------------------------------

// logout.inc.php
$net2ftp_messages["Login page"] = "Login page";

// logout.template.php
$net2ftp_messages["You have logged out from the FTP server. To log back in, <a href=\"%1\$s\" title=\"Login page (accesskey l)\" accesskey=\"l\">follow this link</a>."] = "You have logged out from the FTP server. To log back in, <a href=\"%1\$s\" title=\"Login page (accesskey l)\" accesskey=\"l\">follow this link</a>.";
$net2ftp_messages["Note: other users of this computer could click on the browser's Back button and access the FTP server."] = "Note: other users of this computer could click on the browser's Back button and access the FTP server.";
$net2ftp_messages["To prevent this, you must close all browser windows."] = "To prevent this, you must close all browser windows.";
$net2ftp_messages["Close"] = "Close";
$net2ftp_messages["Click here to close this window"] = "Click here to close this window";

} // end logout


// -------------------------------------------------------------------------
// New directory module
if ($net2ftp_globals["state"] == "newdir") {
// -------------------------------------------------------------------------
$net2ftp_messages["Create new directories"] = "Create new directories";
$net2ftp_messages["The new directories will be created in <b>%1\$s</b>."] = "The new directories will be created in <b>%1\$s</b>.";
$net2ftp_messages["New directory name:"] = "New directory name:";
$net2ftp_messages["Directory <b>%1\$s</b> was successfully created."] = "Directory <b>%1\$s</b> was successfully created.";
$net2ftp_messages["Directory <b>%1\$s</b> could not be created."] = "Directory <b>%1\$s</b> could not be created.";

} // end newdir


// -------------------------------------------------------------------------
// Raw module
if ($net2ftp_globals["state"] == "raw") {
// -------------------------------------------------------------------------

// /modules/raw/raw.inc.php
$net2ftp_messages["Send arbitrary FTP commands"] = "Send arbitrary FTP commands";


// /skins/[skin]/raw1.template.php
$net2ftp_messages["List of commands:"] = "List of commands:";
$net2ftp_messages["FTP server response:"] = "FTP server response:";

} // end raw


// -------------------------------------------------------------------------
// Rename module
if ($net2ftp_globals["state"] == "rename") {
// -------------------------------------------------------------------------
$net2ftp_messages["Rename directories and files"] = "Rename directories and files";
$net2ftp_messages["Old name: "] = "Old name: ";
$net2ftp_messages["New name: "] = "New name: ";
$net2ftp_messages["The new name may not contain any dots. This entry was not renamed to <b>%1\$s</b>"] = "The new name may not contain any dots. This entry was not renamed to <b>%1\$s</b>";
$net2ftp_messages["The new name may not contain any banned keywords. This entry was not renamed to <b>%1\$s</b>"] = "The new name may not contain any banned keywords. This entry was not renamed to <b>%1\$s</b>";
$net2ftp_messages["<b>%1\$s</b> was successfully renamed to <b>%2\$s</b>"] = "<b>%1\$s</b> was successfully renamed to <b>%2\$s</b>";
$net2ftp_messages["<b>%1\$s</b> could not be renamed to <b>%2\$s</b>"] = "<b>%1\$s</b> could not be renamed to <b>%2\$s</b>";

} // end rename


// -------------------------------------------------------------------------
// Unzip module
if ($net2ftp_globals["state"] == "unzip") {
// -------------------------------------------------------------------------

// /modules/unzip/unzip.inc.php
$net2ftp_messages["Unzip archives"] = "Unzip archives";
$net2ftp_messages["Getting archive %1\$s of %2\$s from the FTP server"] = "Arhív kinyerése  %1\$s közül %2\$s az FTP szerveren";
$net2ftp_messages["Unable to get the archive <b>%1\$s</b> from the FTP server"] = "Unable to get the archive <b>%1\$s</b> from the FTP server";

// /skins/[skin]/unzip1.template.php
$net2ftp_messages["Set all targetdirectories"] = "Set all targetdirectories";
$net2ftp_messages["To set a common target directory, enter that target directory in the textbox above and click on the button \"Set all targetdirectories\"."] = "To set a common target directory, enter that target directory in the textbox above and click on the button \"Set all targetdirectories\".";
$net2ftp_messages["Note: the target directory must already exist before anything can be copied into it."] = "Note: the target directory must already exist before anything can be copied into it.";
$net2ftp_messages["Unzip archive <b>%1\$s</b> to:"] = "Unzip archive <b>%1\$s</b> to:";
$net2ftp_messages["Target directory:"] = "Target directory:";
$net2ftp_messages["Use folder names (creates subdirectories automatically)"] = "Use folder names (creates subdirectories automatically)";

} // end unzip


// -------------------------------------------------------------------------
// Upload module
if ($net2ftp_globals["state"] == "upload") {
// -------------------------------------------------------------------------
$net2ftp_messages["Upload to directory:"] = "Upload to directory:";
$net2ftp_messages["Files"] = "Files";
$net2ftp_messages["Archives"] = "Archives";
$net2ftp_messages["Files entered here will be transferred to the FTP server."] = "Files entered here will be transferred to the FTP server.";
$net2ftp_messages["Archives entered here will be decompressed, and the files inside will be transferred to the FTP server."] = "Archives entered here will be decompressed, and the files inside will be transferred to the FTP server.";
$net2ftp_messages["Add another"] = "Add another";
$net2ftp_messages["Use folder names (creates subdirectories automatically)"] = "Use folder names (creates subdirectories automatically)";

$net2ftp_messages["Choose a directory"] = "Válassza ki a könyvtárat";
$net2ftp_messages["Please wait..."] = "Kérem várjon...";
$net2ftp_messages["Uploading... please wait..."] = "Uploading... please wait...";
$net2ftp_messages["If the upload takes more than the allowed <b>%1\$s seconds<\/b>, you will have to try again with less/smaller files."] = "If the upload takes more than the allowed <b>%1\$s seconds<\/b>, you will have to try again with less/smaller files.";
$net2ftp_messages["This window will close automatically in a few seconds."] = "This window will close automatically in a few seconds.";
$net2ftp_messages["Close window now"] = "Close window now";

$net2ftp_messages["Upload files and archives"] = "Upload files and archives";
$net2ftp_messages["Upload results"] = "Upload results";
$net2ftp_messages["Checking files:"] = "Checking files:";
$net2ftp_messages["Transferring files to the FTP server:"] = "Transferring files to the FTP server:";
$net2ftp_messages["Decompressing archives and transferring files to the FTP server:"] = "Decompressing archives and transferring files to the FTP server:";
$net2ftp_messages["Upload more files and archives"] = "Upload more files and archives";

} // end upload


// -------------------------------------------------------------------------
// Messages which are shared by upload and jupload
if ($net2ftp_globals["state"] == "upload" || $net2ftp_globals["state"] == "jupload") {
// -------------------------------------------------------------------------
$net2ftp_messages["Restrictions:"] = "Restrictions:";
$net2ftp_messages["The maximum size of one file is restricted by net2ftp to <b>%1\$s</b> and by PHP to <b>%2\$s</b>"] = "The maximum size of one file is restricted by net2ftp to <b>%1\$s</b> and by PHP to <b>%2\$s</b>";
$net2ftp_messages["The maximum execution time is <b>%1\$s seconds</b>"] = "The maximum execution time is <b>%1\$s seconds</b>";
$net2ftp_messages["The FTP transfer mode (ASCII or BINARY) will be automatically determined, based on the filename extension"] = "The FTP transfer mode (ASCII or BINARY) will be automatically determined, based on the filename extension";
$net2ftp_messages["If the destination file already exists, it will be overwritten"] = "If the destination file already exists, it will be overwritten";

} // end upload or jupload


// -------------------------------------------------------------------------
// View module
if ($net2ftp_globals["state"] == "view") {
// -------------------------------------------------------------------------

// /modules/view/view.inc.php
$net2ftp_messages["View file %1\$s"] = "View file %1\$s";
$net2ftp_messages["View image %1\$s"] = "Kép megtekintése %1\$s";
$net2ftp_messages["View Macromedia ShockWave Flash movie %1\$s"] = "View Macromedia ShockWave Flash movie %1\$s";
$net2ftp_messages["Image"] = "Image";

// /skins/[skin]/view1.template.php
$net2ftp_messages["Syntax highlighting powered by <a href=\"http://luminous.asgaard.co.uk\">Luminous</a>"] = "Syntax highlighting powered by <a href=\"http://luminous.asgaard.co.uk\">Luminous</a>";
$net2ftp_messages["To save the image, right-click on it and choose 'Save picture as...'"] = "To save the image, right-click on it and choose 'Save picture as...'";

} // end view


// -------------------------------------------------------------------------
// Zip module
if ($net2ftp_globals["state"] == "zip") {
// -------------------------------------------------------------------------

// /modules/zip/zip.inc.php
$net2ftp_messages["Zip entries"] = "Zip entries";

// /skins/[skin]/zip1.template.php
$net2ftp_messages["Save the zip file on the FTP server as:"] = "Save the zip file on the FTP server as:";
$net2ftp_messages["Email the zip file in attachment to:"] = "Email the zip file in attachment to:";
$net2ftp_messages["Note that sending files is not anonymous: your IP address as well as the time of the sending will be added to the email."] = "Note that sending files is not anonymous: your IP address as well as the time of the sending will be added to the email.";
$net2ftp_messages["Some additional comments to add in the email:"] = "Some additional comments to add in the email:";

$net2ftp_messages["You did not enter a filename for the zipfile. Go back and enter a filename."] = "You did not enter a filename for the zipfile. Go back and enter a filename.";
$net2ftp_messages["The email address you have entered (%1\$s) does not seem to be valid.<br />Please enter an address in the format <b>username@domain.com</b>"] = "The email address you have entered (%1\$s) does not seem to be valid.<br />Please enter an address in the format <b>username@domain.com</b>";

} // end zip

?>