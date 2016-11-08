

v5.0.8

Change:
- [Major] Update of plugin versions. Compatibility for maven 3

Fixes:
- [Minor] Bug 3514265 : Error when starting Upload via JavaScript without files
- [Minor] Bug 3487886 - When uploading to a URL with a port number different from 80, the upload would fail (against IBM WebSphere). Thanks to Nicholas DiPiazza (ndipiazza) for both the bug report and solution !
- [Minor] php bug fixes (reported by pascal_p)  (jupload.php)
- [Minor] Fix bug where upload failed if MD5sum disabled and single file uploaded (jupload.php)
- [Minor] Override system umask for dir/file permissions (jupload.php)
- [Minor] Fix incorrect expression evaluations (jupload.php)
- [Minor] A try to fix the bug 3482625 : java.util.ConcurrentModificationException (random bug when multiple JUpload applets are on the same web page).
- [Minor] Remove a bug, which generates 'random' error while executing JUnit tests of PictureFileDataTest. 

v5.0.7

Fixes:
- [Major] The applet could try to post to a wrong URL, due to a bad cookie and userAgent management, during the first HEAD request to the server.
This bug would occur, when the server returns the redirection (HTTP 302 return code) to the applet, due to the lack of cookies or userAgent header in the HEAD request. 

Change:
- [Minor] Add of the uploadedfiles() method, in the PHP jupload class. This allows external PHP script to access to the uploaded files,
without directly accessing the internal 'files' attribute of the class.

 

v5.0.6

Fixes:
- [Minor] Compatibility with m2e Maven3 eclipse plugin  (for eclipse 3.7)
- [Minor ... for non Hebrew speaker] The Hebrew translation was not accessible.



v5.0.5

Changes:
- All source files are now encoded in UTF-8, out of applet files, which remains in UTF-16 (hum, that'll have to be changed...)

Fixes :
- [translation plugin] Add of language sort, in the list of languages.
- [Minor] The message "Preparing File 1/n" was not displayed for the first file. Was annoying, when the file preparation was long (e.g.: long 
MD5sum calculation).
- [Minor] JUnit test would crash on Mac. Thanks to devilshands.
- [Minor] Removed a warning during Maven compilation (character encoding). Thanks to devilshands.

Translation:
- [Finnish] Update of the Finnish translation submitted by 'anonymous'  (!) 
- [Simplified Chinese] Update of the Simplified Chinese translation submitted by 'anonymous'  (!) 


v5.0.4

Fixes:
- [Major-PictureMode] Corrected a memory leak, when using the file chooser. Would lead to OutOfMemoryError.


v5.0.3

Fixes:
- [Packaging] The maven-translation-plugin was missing in the release packages
- [Translation] Danish translation updated, thanks to Jeppe Bundsgaard


v5.0.2

Fixes:
- [Major] For upload chunks, the retry feature didn't work (the sent data was corrupted). Thanks to jmont25 for the report.
- [Major] (picture mode only) In the file chooser, opening a folder with tiff pictures would throw a NullPointerException. 
- [Minor] When an error occurs, the error log is copied (like in earlier versions) in the clipboard.
- [Minor] (picture mode only) In the file chooser, if non-picture files are displayed, the wait cursor would remain.

v5.0.1

Fix:
- [Major] Bug 3132737. Czech (and Croatian) translation : upload would not work (due to a UnknownFormatConversionException error)  
- [Minor] The reported upload speed was wrong
- [Minor] Bug 3131598 (POST params getting double urlencoding). The postURL are now properly urldecoded before being sent as post parameters (thanks to ... for the report) 
- [Minor] The advanced_demo uses now the correct lang codes (making its multilangual capabilities testable) 
- [Minor] The status bar is now also cleared, 5" after a successful upload

Translation:
- Swedish translation, updated, thanks to Henrik Friz�n


v5.0.0

Changes:
- [Translation] Add of the maven-translation-plugin, to manage translations (documentation and packaging). See the howto-translate.html
page on the JUpload site for details.
- [Applet parameter] New "sendMD5Sum" applet parameter. Interesting as MD5Sum calculation takes time for big files. Set it 
to true, if you want the applet to calculate and send the MD5Sum to the server. Default to false. 
PREVIOUS BEHAVIOR: the applet would always send the MD5Sum.
- [Minor] The applet now checks if it is signed, and displays a proper message when it is unsigned.  
- [JUpload Developper only] Creation of the jupload-translation maven plugin, to format all lang files, according to the Java needs.
- [Proxy] SSL through HTTP Proxy (Patch given by cuspy: Patch 3043476 on Sourceforge)
- [Minor] Bug 3061033: The column size in the file panel, is now a percentage of the available space.
- [Minor] MD5Sum is no more mandatory, when using the given PHP script 


Fixes:
- [Major] If the user would click on the 'stop' button, all files being uploaded would be removed, despite the
fact that they were actually not uploaded.
- [Minor] The upload speed displayed it no more 'Infinity', but a real upload speed.
- [Minor] After clearing the debug output, nothing more was logged
- [Minor] Bug 3065033: Content-Type should use charset= (thanks for the report ... and the correction to Andy Lindeman (alindeman))


v5.0.0rc4

Changes:
- MAVEN MIGRATION. The project structure has been updated to use Apache Maven. It is STILL POSSIBLE TO BUILD WITH ANT.
  This allows to simplify the build process and to easily use external tools, 
  like quality tools. Please read the http://jupload.sourceforge.net/howto-compile.html page for details
- [new  applet parameter] fileFilterName allows to control the name of the file filter in the file chooser. Interesting 
when using a long list of allowed file extensions.
- [Code] Add of the UploadPolicy.updateButtonState() method, which allows the UploadPolicy to manage specific GUI items, depending 
on the current execution status of the applet.

Fixes:
- [Major] Compatibility with https upload is corrected (still no client certificate management)
- [Major] Patch 3000216 (407 Proxy Authentication for https fix). Https through Proxy connection is now possible.
- [Major] Samples.PHP/index.php may not work, due to a lacking session.
- [Major] Czech translation corrected (upload would not work)
- [Minor] When a message contains several lines, it's still truncated by pieces of 80 (?) characters, despite the fact the 
each line may be less than 80 characters
- [Minor] Compatibility issue with Paste operation on Linux where an URL to file is pasted instead of the actual data.
- [Minor] Internationalization for Paste message.
- [Minor] Paste operation calls UploadPolicy.afterFileDropped to have a consistent behaviour with drag and drop operation.
- [Minor] Bug 3006175: Minor typo in PHP example... (this-> missing on line 719)
- [Minor] When a directory is pasted, the directory as well as its files  is uploaded thus keeping informations on the directory itself,
and not on only its consituents.


v5.0.rc3

Changes:
- [Major] Add of the resume feature: when a resumable error occurs (typically: a network error), the applet will try to 
resume the upload. That is: a dialog box is open to ask the user if he wants to retry the upload, by re-executing it. A
timer makes this retry automatic: if the user doesn't choose (eg: if he is aways from his computer), the upload will
automatically be re-executed. 
(Please read the new applet parameters documentation: retryMaxNumberOf and retryNbSecondsBetween for further information)
- [Minor] The not really useful column 'Readable?', on the file list, has been removed.
- [Minor] Add of mime types Office 2007 support (thanks to jsibby)
- [Minor] (Regression since 5.0.rc1) The message indicating the index of uploaded files was wrong. 
- [PHP] A PHP class is now embedded in each release. It contains a ready to use PHP class that manage all the applet 
parameters, and a sample on how to use it.

Fixes:
- [Major] Chunk upload was broken (since 5.0rc1)
- [Major] Bug 2985227: When nbFilesPerRequest is set to -1, the upload button just does nothing.
- [Major] Bug 2985230: When the file to upload is too big, the button are not properly enabled (impossible to add new files
without refreshing the web page)
- [Minor] Bug 2960834: Applet doesn't response to the stop button, when waiting for the server response.
- [Minor] Better thread management at applet startup. Can prevent some (very rare) browser crash.

Translation:
- (bug 2961791) Correction of the language code (the country code was used instead). The corrected translation are:
  lang_br: removed (lang_pt and lang_pt_BR are Ok).
  Czech: lang_cz -> lang_cs
  Danish: lang_dk -> lang_da
  Hebrew: lang_il -> lang_he
  Swedish: lang_se -> lang_sv
  Slovenian: lang_si -> lang_sl
Note: the applet can't guess the language wich is selected in the navigator. You'll have to use the applet
lang parameter, to transmit this information.



v5.0.rc2

Fixes:
- [Minor] n� 2951651. Drag&drop didnt work on Linux
- [Major] Regression in v5.0.rc1: The property index was wrong, when using 'iteration' parameters (default applet behavior)
- [Major] Bug n�2945676  Upload progress doesn't update on 5.0.0rc1
- [Minor] The HEAD request (to check the HTTP server protocol, and any temporary redirection) is now done in a separate 
thread, to accelerate the applet startup
- [Minor] Corrected the demo web site: The applet now starts at a normal speed (the caching of the jar file was prohibited!)
- [Minor] Better release of used resources, when the applet is stopped

Translation
- [Romanian] New translation, thanks to ady1503
- [Bulgarian] New translation, thanks to zulix  (zulix at zulix.net)


v5.0.rc1

Changes:
- [Major] Rewriting of the upload code, to separate file preparation, file grouping in packet, and uploading. This should
make the applet consume less memory and less CPU... and have a code easier to understand !
- [Major] Add of the samples.PHP folder, based on the wiki content. It contains a ready to use PHP class, to easily manage the applet and uplaoded files.
- [Minor] Better exception management during upload
- [Minor] browseDirectory applet parameter: The applet now manages path beginning by ~ (current user's home)

Fixes:
- [Minor] Applet startup is quicker.
- [Minor] Stop button is now more responsive.
- [Minor] New methods in UploadPolicy: 
	confirmDialogStr(str, optionTypes), to display confirmation dialog (as JOPtionPane.showConfirmDialog).
	displayErr(errorText, exception, optionTypes), to log an error and display a confirmation dialog.
	getString(key) is renamed as getLocalizedString(key)
	getLocalizedString(key, param1) and getLocalizedString(key, param1, param2) are created, to manage dynamic localized strings.


v4.6.0

- [Major] Compatibility with Java 1.5 is now restored. Make it work on Mac computers. 
- [Major] bug n�2884603. When using a proxy, the port number of the postURL was ignored.
- [Major] In FTP mode, uploaded to the root of the available folder (eg: ftp://user:mdp@host/) would throw a NullPointerException.
- [Minor] httpUploadParameterName and httpUploadParameterType are now fully implemented, and changed a little. Check their definition, in the
'howto customize' documentation. Also added the httpUploadParameterType oneFile Type.
- [Minor] One thread was still running on, when the navigator would stop the applet. 
- [Minor] Better management of the debug output. Consume less CPU
- [Code] UploadPolicy.setCurrentBrowsingDirectory(File) is deprecated. Please new use UploadPolicy#setCurrentBrowsingDirectory(String)

v4.5.0
- [Medium, Picture mode]
  * parameter targetPictureFormat is now supported and can take a list of conversion formats
  * new parameter keepOriginalFileExtensionForConvertedImages to let the user decide if she 
    want to change the file extension of a converted image or not
- [Minor] In some case, the file root was not correctly calculated (drop of several files)
- [Minor] Bug 2819872: Better behavior of the applet, when using form-data with an INPUT tag that has no name 
(the item is just ignored, a WARN is logged)
- [Minor] Empty headers are now ignored, when writing the HTTP query (prevent upload errors, caused by malformed HTTP 
query, containing an empty line in the headers)
- [Minor] The formData parameter now accepts form names that contain a minus (-) sign in the name.
- [Minor] If the formData contains a form name which is present two times on the HTML page, the applet no more ignore it. It takes
the first form of this name.
- [Minor] Add of the httpUploadParameterName and httpUploadParameterType applet parameter: allow to better control the parameter name 
and format (array or iteration) in the HTTP upload request. To be generalized to all upload data (md5, path...) in next version.

v4.4.0

Fix:
- [Major] Prevents the applet to freeze, when a message is displayed to the user during upload.
- [Major] formData would not work on IE7

Changes: 
- [Minor] The UploadPolicy.isUploadReady() and UploadPolicy.beforeUpload() has been merged, in the beforeUpload() method.


v4.3.3

Fix:
- [Major, Picture mode] If the picture has too big resized before upload, it was done twice. The applet could event freeze
while doing that (caused by an OutOfMemory)


v4.3.2

IMPORTANT NOTE (repeated from 4.3.0 release): the language packaging has changed. Please check the:
* That the applet still work the way you want, in your language.
* That your translation is up-to-date: 


Fix:
- [Major] Applet would freeze, when an error occurs (while displaying an error message)


v4.3.1

IMPORTANT NOTE (repeated from 4.3.0 release): the language packaging has changed. Please check the:
* That the applet still work the way you want, in your language.
* That your translation is up-to-date: 


Fix:
- [Major] Applet would freeze, when an error occurs (while displaying an error message)
- [Major] https upload did not work (probably since 4.0)


v4.3.0

IMPORTANT NOTE: the language packaging has changed. Please check the:
* That the applet still work the way you want, in your language.
* That your translation is up-to-date: 

Fix:
- [Major] The STOP button now works correctly.
- [Medium] Chunk upload would not redirect to afterUploadURL, after a successful upload (thanks to Michael LaRosa, SF account: larosa)
- [Medium] Fixed a problem when using the formData applet parameter, on complex html FORM. Would prevent upload to work. 
- [Medium] The STOP button is much more effective. Now manage through a Java exception, to really interrupt the running on upload.
- [Minor] FTP connection is better managed (check of FTP connection, before using it).
- [Minor] Warning and error messages can now contain line breaks (see stringUploadWarning and stringUploadError applet parameters)
- [Minor] relpathinfo has now the same value for dropped files, and for files selected by the file chooser (was corrected in 4.2.0)

Change:
- [CPU] All logging actions are now done in a separate thread: this should make upload consume less CPU, especially in debug mode. This
may make upload quicker on fast networks (1Gb).
- [FTP] Add of the ftpCreateDirectoryStructure applet parameter. Default false: all files are uploaded in
the folder given in postURL. If true, the folder structure will be created on the target FTP server. 
- [Cookies] Add of the readCookieFromNavigator applet parameter. Default to true (applet behavior unchanged). If
false, the caller should put the relevant Cookie: header in the specificHeaders applet parameter.
- [nbFilesPerRequest] Default to the nbFilesPerRequest applet parameter is now 1 (was -1!).


v4.2.0

Fix:
- [Major] Upload speed restored (50% quicker than 4.x releases): it has slown down due to the management of
the progress bar, and the increase of debug information logged. The debug file has been removed.
- [Major] Corrected a NullPointerException, when 'HttpOnly' is in the SetCookie header. Typically, with PHP, when 
session.cookie_httponly is set to 1.
- [Major] Management of urlToSendErrorTo would generate an error (but the error was correctly sent to the URL). Thanks
to  (thanks to Zapp29, sourceforge account: brusaf)
- [Minor] Uploaded file would not be correctly released, until the java applet would close. (thanks to Zapp29, sourceforge account: brusaf)
- [Minor] Add of the missing call to uploadPolicy.beforeUpload() (regression since 4.0). (thanks to Zapp29, sourceforge account: brusaf)

v4.1.0

Mainly a bug correction release.

Fix:
- [Major] Regression in the 4.0: the SUCCESS or ERROR in the HTTP return was not properly checked.
- [Major] In some cases, chunk upload would not work (two files would be sent at once, which doesn't work)
- [Major] For afterUploadURL in javascript: the parameters msg and body were not correctly managed.
- [Minor] The upload speed, and the estimated time of arrival were wrong. Calculation is now more precise than before.
- [Minor] Add of a new message, when trying to transform (resize, rotate) a gif picture, in JRE 1.5: not supported
by the sun JRE. JRE 1.6 is needed. 
- [Minor] FTP: add of the ftpTransfertBinary and ftpTransfertPassive parameters.
- [Minor] Regression in the 4.0: after the STOP button has been hit, the other button would not return to their correct state.

Martin Westin found another way to sign applet. See:
https://sourceforge.net/forum/forum.php?thread_id=2991519&forum_id=199106
(ref added to the README.txt file)

v4.0.0

Fix:
- [Major] Fixed a regression in chunk upload, which came with the 4.0.0rc1 version.
- [Minor] relpathinfo was empty, when files were dropped or pasted onto the applet.
- [Minor] JUpload is compatible again with a JRE 1.5.


Translation:
- [Arabic] Add of the Arabic translation, thanks to Abdulrhman Alkhodiry 


V4.0.0rc1

Changes:
- [MAJOR] Rewrite of the core upload code. Introduction of multi-threading: one thread to
prepare files, one to upload files. Especially useful for picture mode.
- [Major] Add of a new applet parameter: browsingDirectory. It allows the control of the directory in which
the browse button will open the FileChooser for the first time.
- [Minor] The allowHttpPersistent default value is now false, as a lot of people had troubles with persistent connections.
- [Minor] When opening the FileChooser a second time, it will open where the user has closed it the previous time.
- [Minor] When the file is too big, the applet now displays a file size in Gb, Mb or Kb, instead
of the total amount of bytes.
- [Minor] Hidden files are no more visible in the file chooser. They can still be added by drag'n'drop 
or paste operations. 
- [Minor] When a file is too big, the alert message now displays a size in Mb, Gb... (not the while byte number).
- [Minor] Hidden files are not visible within the FileChooser. Hidden files can still be dropped or pasted
onto the applet.
- [Minor] There are now two progress bar: file preparation (quite useless for default upload policy) and the 
upload progress. Text has been updated.  
- [Minor] In picture mode, the file chooser is much more reactive to user interactions, especially on directory 
containing a lot of files.

Fix:
- [Major] Allows sending very large number of files. Previous version was crashing with 4000 files.
- [2189777] The applet would generate a non-blocking NullPointerException for server response
with Content-Length to 0. Typically: a HEAD response.


V3.5.1

Fix:
- [Major] Bug n�2174306: 'Upload' button remained disabled after using 'Browse..' button


V3.5.0

Note:
- Error management has been enhanced

Changes:
- [Major] It's now possible to paste files onto the applet. A contextual manue (right-click) is available for 
that on the applet.
- [Major] The error management has been corrected: see the urlToSendErrorTo applet parameter description.
- [Minor] Stack trace display is enhanced. When an error occurs during upload, the stack trace should now
always give the line that fired the exception.
- [Minor] showLogWindow is now a string (was a boolean). Allowed values are: true, false and onError.
- [Minor] Setters added in UploadPolicy for the following applet parameters: lang, urlToSendErrorTo 
- [Minor] Some attributes switched to protected, for easier use of the applet when embedded in others program, 
as there is no getter/setter for these ones: userAgent, cookie, debugFile and debugOK. 
- debugOut. The addMsgToDebugLog(String msg) method has been switched to protected.
  Note:
   1) There are existing methods to generate output.
   2) The whole debug output will be changed sooner or later. I want to embed log4j, or a log4j like API.
   So addMsgToDebugLog(String msg) will be renamed ... a day in the future.
- resourceBundle => set with the setLang parameter.
- [Minor] When an error occurs when starting the upload thread, the applet does not fail silently anymore. If 
it fails here, at least, you know why...  
- [Minor] showLogWindow is now always respected, whatever the value of debugLevel is. A new entry in the debug menu
has been added (CTRL+Right Click on the applet, to open it)
- [Minor] The debug menu (CTRL+Right Click) is slightly better. 

Fixes:
- [Major] Patch given by Stani: corrects the use of the applet on Firefox on Mac.
- [Major] The query is appended (again) to the URL when quering the HEAD to guess protocol: would block some
access, like Coppermine upload (was getting a wrong 302 HTTP return code). 
- [Major] 2145770 correction (Cookie not sent with HEAD request). The specific headers is also sent in the HEAD request
- [Minor] Redirection (HTTP code 301, 302, 303) would not work with original URL containing more than one slash ('/').
- [Minor] When a "Empty HEAD response" occurs in HttpConnect (during applet start), it's now logged as a warning, and no more
displayed as an error. 
- [Minor] Better management of CR, LF and CRLF end of line. Now the server output is changed to have CRLF for all
end of line characters.
- [Minor] Correction in HTTPConnect, when hitting an NGINX proxy server, thanks to Brian Moran.
- [Minor] in picture mode, when using the allowedFileExtensions applet parameter, picture that match this parameter
are added to the file list, even if they are not pictures.

Translation:
- [Chinese] Chinese translation updated by bluesway
- [Slovak] New translation, thanks to wradgio
- [Hungarian] New translation, thanks to R�zs� G�bor  

V3.4.1f

No code change. 'Just' a package correction. The 3.4.0 release was almost empty, and original 3.4.1 jar upload to sourceforge was corrupted !!!

Sorry for the inconvenience.



V3.4.0

Fixes:
- [Minor] Removed 404 errors on the web server, when the applet was looking for the translation properties files. Thanks
to Patrick (onkelkarle).
- [Minor] The build.xml file no more pollute the src directory: all files are now generated into the build directory.
- [Minor] Correction of an error in md5 sum calculation, when files are uploaded into different HTTP requests, for instance
when nbFilesPerRequest is 1 and several files are uploaded. This bug was a regression while developping the 3.3.2 (did not
occur in any official release).

Changes:
- [Major] Thanks to huotte, it's now possible to start an upload from javascript. See in the demo site, the
advanced demo. The link is below the applet.
- [Major] The applet can now manage the 301, 302 and 303 HTTP return code for the postURL parameter. 
- [Major] It's now easy to add new file properties to a HTTP upload: create a new FileData, and use the new
FileData.appendFileProperties method. See the UploadPolicy.createFileData method to instanciate this new FileData.
- [Minor] When dropping several files that should be refused (by the allowedFileExtensions parameter or by the upload 
policy) the applet now displays a message each time (was only once for PictureUploadPolicy), and allows the user to
hit 'cancel', so that no more file are added for this drop.


  

V3.3.1

Fixes:
- [Major] Correct the "bad header" error on IIS 6 and IIS 7, when uploading files. 
- [Minor] The debug output is now always correctly filled, even when debug mode is not enabled. Previously, some
information would be written in the debug file only when in debug mode. 

Translation:
- [Portugese] The Portugese translation is now a native Portugese, not Brasilian Portugese anymore, thanks to Filipe Teixeira 


V3.3.0

Changes (all modes):
- [Major] The applet can now correctly manage filename containing non-ASCII characters. Works Ok with French 
accents. Should work with any other language, like Asian characters (please give me feedback: I can't test that).
- [Major] When using formdata, or postURL parameters with non-ASCII characters, their encoding in the upload
is now correct.
- [Minor] Due to previous point, the filenameEncoding applet parameter is now deprecated.
- [Minor] The applet now transfers for each file, the date/time of last modification (thanks to XXXXXXXXXXXXX). 
Note: the date format is a "dd/MM/yyyy HH:mm:ss". It's defined as a constant in UploadPolicy, and can not be 
changed by a 'simple' applet parameter.
- [Internal code] UploadPolicy.onAppendHeader: the parameter is changed from StringBuffer to the new class 
ByteArrayEncoder. This should change only the parameter type, not the code of the method (append works on 
ByteArrayEncoder).
- [Minor-FTP] FTP mode: stringUploadSuccess forced to null. The applet won't test the response body against this 
regexp, as ... there is no response body in FTP mode.


Changes (picture mode):
- [Major] picture mode: quality for uploaded has been downgraded to bad quality resizing. Now corrected.
- [Minor] Default value for maxPicHeight, maxPicWidth, maxRealHeight, maxRealWidth changed from -1 to 
Integer.MAX_VALUE
- [Minor] Default value for pictureTransmitMetadata set to false, to avoid color problem (see explanation
of this parameter in the given doc).
- [Minor] the progress bar is now updated while picture resizing is running, when preparing files before upload,
instead of being changed for each prepared file. Not really necessary, but I'm happy with this one !    :-)


Fixes:
- [Major] (bug 1831234: PostURL Parameter NULL) When postURL contains a parameter with no value 
(ex: ?param1=&param2=value2), the applet would generate an error.
- [Major] when the pictureTransmitMetadata applet parameter is set to false, metadata are never transmitted. 
Previously, non updated (resized, rotated) pictures were uploaded untransformed, that is with their metadata.
- [Minor-Picture] Picture mode: due to wrong number rounding, the resized picture could sometime be one pixel bigger than
the maximum allowed size. 
- [Minor] When postUrl is a javascript call, the applet is now able to manage $ characters as $ character, and not
as 'end of line' (fix given by Jon Gjengset).
 


Translation
- Add of the Croatian language, thanks to Bruno Simic.
- Norvegian translation updated, thanks to P�l Knudsen.
- Hebrew translation added, thanks to David Lior, liorda@gmail.com
- Swedish translation added, thanks to Erik Lindahl (erik@fisensmosse.se)


V3.2.0


WARNING: 
  Default value for stringUploadSuccess and stringUploadError applet parameter changed, for better control
of upload success error (see javadoc). You should check that the applet still works ok in both success and error 
cases, for your application.
  Please note also that the used regexp function is now: matches(), and no more find().  


Changes:
- [Major] Default value for stringUploadSuccess and stringUploadError applet parameter changed.
- [Major] The upload policy can now define the exact content of the applet 
(see the UploadPolicy.addComponentsToJUploadPanel(JUploadPanel) method) 
- [Minor] The applet now opens correctly, and display a proper message when postURL is wrong (or can not 
be accessed)   
- [Minor] putting the debugLevel to -1 will prevent the logWindow to become visible when this parameter is set
to false, and an error occurs.
- [Minor] Picture mode: EXIF and IPTC data are now transmitted, even if the applet resizes or rotates the 
transmitted picture
- [Minor] All components of the applet are now valid drop target, so that the user can drop files on any component
(previously: the only valid drop target was the file list)
- [Minor] All components of the applet are can now display the JUpload popup menu (CTRL + Right Click). Currently,
this menu allow only to put on/off the debug mode.
- [Minor] After an upload, the progress bar now goes back to '0%', instead of keeping 100% displayed.
- [Minor] When an error occurs, a message (alert box) is displayed to the user.

Fixes:
- [Medium] Corrected the error that occurs during startup (Unexpected HEAD response). This would make the log 
window become visible, when debugLevel is 0, and showLogWindow is set to false. 
- [Medium] The release version was not displayed in the status bar, when used within the navigator. The following 
string is displayed, instead of the subversion commit number: "Unknown revision (please use the build.xml ant script)"
- [Minor] picture mode: after a double click on a file, changing the selected file with the keyboard arrow (up 
and down) would not be detected by the applet.
- [Minor] The uploadPolicy.onFileDoubleClicked method is now clicked when a user double clicks on a file.

Known bug:
- [Minor] Whe the applet transmits picture metadata (EXIF) coming from Canon EOS 30D, shooted in portait mode, the 
colors of the resize or rotated pictures are 'strange'. No problem in landscape! Works Ok for Canon EOS 20D.


V3.1.0
- [Fix] The JUpload project now compiles 'out of the box', even from eclipse. No more need to use the given 
build.xml ant script. The script is still necessary, so that the applet indicates the correct SVN revision and 
build date.
- [Fix] Uploading several files in FTP mode, with wrong nbFilesPerRequest or maxChunkSize would generate an error.
- [Fix] The setServerProtocol now correctly manage ftp URL. It doesn't generate an error any more when the server 
protocol applet parameter is not set.
- [Fix] Drag'n Drop: the applet now controls whether the dropped files correspond to the current file filter (list 
of allowed file extensions).
- [Fix] Management of files which can't be read by the applet: files are not uploaded, and a proper warning is 
displayed, instead of a Java error that blocks the upload.
- [Minor] PictureUploadPolicy: the picture preview in the file chooser displays bigger pictures.
- [Minor] Better management of the wait cursor in picture mode.
- [Minor] FileChooser: various enhancement of the pictre mode:
  * The display of the preview image in the fileChooserAccessory is now done in a dedicated thread, so that selecting 
  a file is instantaneous.
  * file icons generated from the picture content is now done in a separate thread (the file chooser is much more 
  reactive than before). See applet parameter fileChooserIconFromFileContent.
  * Picture preview in quicker
- [Translation] Czech translation available, thanks to Vladan Zajda.
- [Picture mode] New applet parameter (fileChooserIconFromFileContent), to display the file content in the file 
chooser as the file icon or use the default file system icon.
- [Fix] All file icons are now displayed (the last one was not refreshed)
- [Picture mode] New applet parameter (fileChooserIconSize), to control the size of these icons, in the file chooser.
- [Picture mode] New applet parameter (fileChooserImagePreview), to add or not the preview accessory.

V3.0.2b3
- [Fix] HTTP response handling was broken. We now use raw byte I/O and apply
charset conversion in one single step at the end of the response. Use
Content-Length, if available. Use charset attribute of the Content-Type header.
if available.
- [Feature] Added placeholders for javascript in afterUploadURL:
%success%, %msg% and %body. See howto-customization.html for a detailed description.
- [Feature] Add of the specificHeaders applet parameter. This allows the caller to define 
a list of headers that will be added in each HTTP request to the server. This allows
Basic HTTP Authentication (see the doc for all details).
- [Change] When a file filter list is provided (see allowedFileExtensions), the user may not select other files. 
That is: he can not change the current filter by 'All files'.

V3.0.2b2
- [Fix] renamed POST variables "md5sum", "mimetype", "pathinfo" and "relpathinfo" to
"md5sum[]", "mimetype[]", "pathinfo[]" and "relpathinfo[]" in order to make them
work with multi-file-posts and php.
- [Feature] afterUploadURL can now be used to execute JavaScript instead of showing
another JavaScript. In order to do so, afterUploadURL has to start with the string
"javascript:". If that is the case, the remainder of the string is evaluated as
JavaScript-expression in the context of the current document.
- [Feature] New POST variables "pathinfo" and "relpathinfo":
  pathinfo simply contains the absolute path of the containing directory of the
  transferred file in native format (Slashes vs. Backslashes depend on the users OS).
  relpathinfo contains a path relative to a "virtual root" which was determined when the
  user had added (or dropped) a directory. Example:
  Suppose the following hierarchy:
    /foo/bar/a/
               1.jpg
               2.jpg
               3.jpg
    /foo/bar/b/
               4.jpg
               5.jpg
               6.jpg
  If the user now adds the directory "bar", then during upload, for the files [123].jpg,
  relpathinfo would be "bar/a" and for the files [456].jpg, relpathinfo would be "bar/b".
  This info can now be used on the server side in order to reconstruct whole directory
  trees. This info is in native format as well (Slashes vs. Backslashes depend on the
  users OS).
- [Fix] Optimized the class-loading in UploadPolicyFactory: If the parameter
uploadPolicy is unqualified (contains no dots), then it is prefixed with
"wjhk.jupload2.policies." before trying the first Class.forName(). This eliminates an
usually unsuccessful try of loading the plain class file.

V3.0.2b1

- [Change] showStatusBar renamed to showLogWindow (see below)
- [Feature] Added a status bar. This changes the semantics of the applet parameter
"showStatusBar": Before, "showStatusBar" was used to control the visibility of the log
window, Now, "showStatusBar" does what it's name suggests: It controls the visibility
of the status bar. If shown, the status bar provides useful information during transfer:
The current transfer speed and the estimated time of completion. The visibility of the
log window is now controlled by the new parameter "showLogWindow".
- [Picture] Picture resized by the applet are now smaller than before (better for the web). Will
be even smaller in next versions.
- [Fix] Resizing of PNG pictures now works.
- [Fix] Better error handling in picture handling.
- [Feature] Working verification of server certificates and cert-based
client-authentication. Configurable by a new parameter sslVerifyCert. See
howto-customization.html for more info.

Translation:
- [Turkish] Add of the Turquish translation, thanks to Gunay Mazmanoglu


V3.0.1
- [Fix] Automatic detection of the HTTP protocol was not called when the applet parameter
  "serverProtocol" was specified with an empty string.
- [Fix] Release are now compiled with 1.5 JVM



V3.0.0

Fritz Elfert joined the dev team: we are now two active developpers!  ;-)
That's probably enough, as we want the applet to remain as small as possible.

Fritz is responsasible for most changes in this version.

Changes:
- [Code] Use of the SVN source repository (replace the CVS)
- [Code] General code restructuration, thanks to Fritz.
- [Code] Added common GPL comment in all sources.
- [Code] Use system properties for cookie and user-agent in debug mode.
- [Code] Added ant buld.xml conributed by Matthijs Lambooy and tweaked/extended
  "dist" and related targets for signing the jar. Added an internal target
  "customhowto" which generates wwwroot/howto-customization.html automatically.

- [Fix] Corrected content-length calculation of multipart message.
- [Fix] After uploading, enable file-specific buttons only if there are still files
  to handle.
- [Fix] Speed up column sorting of the upload table by caching some data.
- [Fix] An ArrayIndexOutOfBounds exception could be thrown, when trying to
  access some file data (from within an AWT update event) which is already deleted.
- [Fix] fileView was not shutdown in some cases.
- [Fix] picture would not always be resized, when realMaxPicWidth and/or
  realMaxPicHeight would be give as applet parameters.
- [Fix] Calculate and use a percent value for setting the progress bar. Without that,
  if the total size of the upload exceeds 2^31 - 1 bytes the progress bar does not work.
- [Fix] Chunk decoding now allows training chunk-extensions and additional whitespace.
- [Fix] The "album" parameter was not alway appended correctly in CoppermineUploadPolicy.

- [Feature] Added POST form fields "md5sum" and "mimetype". md5sum contains the MD5
  checksum of every transfered chunk. This makes it easier to detect upload errors
  on the server side. mimetype always contains the real mimetype of the transfered
  file (as detected locally). (The mime-type in the form data header may change to
  application/octet-stream in order to guarantee 8bit-transparent transmission in
  the future.)
- [Feature] Implemented HTTP- and SOCKS-proxy support.
- [Feature] Parameter postURL can now be relative or even be omitted. The new default
  null results in using the DocumentBaseURL of the applet.
- [Feature] The chunk parameters are now provided as both GET *and* POST variables.
  The GET variables are still there because we don't want to break
  backwards-compatibility.
- [Feature] Use generic java.applet.AppletContext.showDocument instead of JS bridge
  for redirection (reduces code size).
- [Feature] Applet parameters "postURL", "afterUploadURL" and "urlToSendErrorTo" now
  accept relative URLs. Furthermore, URLs are checked (syntactically) during applet
  startup.
- [Feature] Changed the status-update (progressbar) method. It now gets updated from
  within the ActionPerformed in JUploadPanel when the timer expires - regardless of
  the amount of bytes transferred.
- [Feature] Added a textual status message which gets shown in the Browser's statusbar.
  In order to view this in IE, the security settings must allow modification of the
  status line.
- [Feature] Applied layout patches from Ben M. <bovinator@users.sf.net>.
- [Feature] The error message, read from the server response body, is now decoded
  from UTF-8. To do: check that the content-type is actually UTF-8, and document that.
- [Feature] Better display of applet parameters, when entering in debug mode.
- [Feature] Added automatic method for getting HTTP protocol version. The applet
  parameter "serverProtocol" now defaults to null. If null, the version is determined
  automatically by issuing a HEAD request to the postURL and examining the returned
  response.
- [Feature] In order to save memory, the debug log (used fore eventually submit a
  bug report to the webmaster) is now written to a temporary file.
- [Feature] In Picture mode, the icon now represents the picture contained in the file.

- [Major] The applet can now properly read response body, when it is chunked by the
  web server. This allows to correctly search for the success and error strings in
  this body.
- [Major] The minimum java version is now 1.5

New applet parameters:
- [formdata] Allows to upload form data from the current web page, along with the
  file upload. Note, that the data from the referred form are *always* transmitted
  in the POST request along with the file - even if the referenced form has a
  method="get" attribute in the HTML code.
- [afterUploadTarget] Allows the redirection after a successfull upload, to occur
  toward another frame or window.
- [stringUploadError] Allows search an error message in the response body of the upload.
- [allowHttpPersistent] Allows switching off persistent HTTP connections (Keep-Alive)
  which are enabled by default. Currently, we encountered problems with persistent
  connections when testing on a windows box using a loopback interface only.

Translations:
- [Danish] Add of the Danish translation, thanks to Jeppe Bundsgaard.
- [Russian] Russian translation has been given by Max Turanskiy.


V2.9.2

Changes:
- [Minor/pictureMode] Temporary files are now created by File.createTempFile. They are removed by the end of the JVM, even if
debugLevel>=100. No more pollution of the picture directory.

Bug correction:
- [Minor] The lookAndFeel aapplet parameter was uncorrecty managed. Correction given by Fritz (sourceforge username)


V2.9.1

Changes:
- [Minor] The mime types is now set. The reference list is taken from http://www.mimetype.org/, thanks to them!

Translations:
- [Polish] Polish translation has been given by Wojtek Semik: wojteks at pvd dot pl
- [Slovenian] Slovenian translation has been given by Alenka Pirman and Damjan Leban: damjan dot leban at siol dot net

Bugs correction:
- [Major] The applet would not resize a picture that has been previewed in the applet. This file could then remain
bigger than maxFileSize, and not be uploaded.



V2.9.0

Changes:
- [FTP Upload] Thanks to Evin Callahan, you can now put FTP URL in the postURL parameter. The files will be uploaded to any kind of FTP 
server (anonymous or not).
- [Internal Code] A new DefaultUploadThreadV5 is created. This should help to create new upload behaviours, for instance
SMTP upload (to send files by email) or Samba upload (to send files on a local network, in intranet configuration). Just 
inherit from it, and implement the few fabstract methods defined in DefaultUploadThreadV5.
- [Minor] It's now possible to select multiple files in the file list, to remove several files, for instance.

Languages:
- [Chinese] A chinese translation is now available, thanks to Liu (Fbo ?)
- [Bresilian - Portugese] A Bresilian translation, is available, thanks to Frederico Ronfaut Klein. I copied this file 
to also give a first Portugese translation. I don't know the differences between Portugese and Bresilian...
- [Norwegian] Updated translation, thanks to Pal Knudsen.

New parameters / setProperty method:
- [setProperty] The applet setProperty method allows to change any applet parameter from the javascript on the web page.
This allows, for instance, to change the postURL or afterUploadURL parameters according to value selected by the user
on the web page.
- [showStatusBar] Thanks to XXXXXXXXXXX, a new applet parameter (showStatusBar) allows to hide the status bar. This
status bar will remain visible, if debugLevel is > 0 (or if debug is activated while the applet is running. You can 
now put the debug on, by CTRL+right click on both the status bar or the file list. If debug is on, the showSatusBar 
parameter is ignored.
- [afterUploadURL] If this parameter is set, the applet will redirect the current web page to this
URL. This allows the application to view the uploaded files, and entre comments, for instance.
- [realMaxPicWidth, realMaxPicHeight] Add of the realMaxPicWidth and realMaxPicHeight. This allows you to better control when the applet
will generate a new picture file: these parameters allow you to prevent any picture work from the applet, when 
uploading a picture that doesn't need to be transformed (-> speed up of upload time).
- [allowedFileExtensions] Allows the caller to specify a list of file extensions.


Bug Corrected:
- [Boolean] Default value for boolean parameter were inverted (false to true, and true to false).

V2.8.0

Main change:
- [Upload] The applet is now able of splitting the file to upload in chunks. This allow to upload file of any size, 
whatever the max_upload_size of your server is.

Changes:
- [Translation] Add of the Japanese translation.
- [Translation] Add of the Norwegian translation.
- The following methods have been added to the applet. They directly call the relevant method of the current upload
policy. Useful to display additional information from the HTML, in coordination with the urlToSendErrorTo applet
parameter. I use it to add to the status area the version of the HTML page that calls the applet. New functions 
are: displayErr, displayInfo, displayWarn and displayDebug.


V2.6.0

The next changes and corrections are given by David Gnedt:
- [New fuctionnality] SSL management. You can now upload files with JUpload in SSL (HTTPS)!  Great!
- [Update] Better picture resizing: the use of BufferedImage.getScaledInstance() allows better picture quality, when 
resizing a picture. But it consumes more CPU and memory (see below the new applet parameter highQualityPreview)
- [Correction] When the picture file format should change, the applet would not do it if there where no rotation
or resizing.

Other changes:
- [Parameter] A new applet parameter: highQualityPreview. It allows the calculation of better preview picture. But
displaying the full screen preview is longer. On an old PII 500MHz and a 8,5M pixels picture, the full screen
picture is displayed in 12 seconds when highQualityPreview is set to true, instead of 5s when the parameter is not
set or set to false.



V2.5.0

Bugs Corrected:
- [Major] Corrected an important memory leak when viewing a fullscreen picture (by clicking on the preview picture). 
- [Minor] When previewing a picture in 'big' format (full screen), the size is now calculated only with the Window 
size, not with the maxPicWidth and maxPicHeight parameters.
- [Minor] Temporary files where not deleted, when using picture mode, and stopping the upload with the 'stop' button.
- [Minor] Correction of the howto-customise and the javadoc: a lot of applet parameters were not displayed in these html
files.


Changes:
- [Major] The applet has been tested, and runs well with only a little allocated memory: tested with a JVM of 
minMemory=8M and a maxMemory=16M.
- [Translation] Now translated in Esperanto, thanks to Chuck Smith (whiz.at.users.sourceforge.net)
- [Translation] Now translated in Dutch, thanks to Rob van Kempen (rob.at.vankempen.nu)
- [Major] Add of a popup menu that allows changing the debug mode while using the applet: very useful to help
debugging a problem on a distant server, with only a standard user access to the site. To switch the debug mode on: 
click on the right button, while holding the CTRL down.
- [Minor] (feature request n�1625013) Add of a new applet parameter: lookAndFeel. It allows to control the way the 
applet is displayed. This allow to display the applet with a java look & feel, or to use the current user's system 
one, or any other. Please, take a look to the list of applet parameters, to use it.


V2.4.0

Bugs Corrected:
- It's now possible to use the 'stop' button to stop an upload. 
- It's no more possible to click on 'upload' during an upload, which could lead to unpredictable behaviour.
- In the given examples, the parse.jsp had the following bug, now corrected: no call to fileItem.delete(). Without it 
the heap server quickly runs out of memory.


Changes:
- for Picture uploads (PictureUploadPolicy and CoppermineUploadPolicy) Upload of pictures stored in a read-only 
directory won't block the upload anymore. The original file is send, without being resized or rotated.
- The Mime Type is now correct, but only for pictures (see PictureUploadPolicy and CoppermineUploadPolicy).
- Modified a test of the stringUploadSuccess applet parameter: if it's not found, a warning is now displayed. This
test seems to be buggy on a lot of various systems. But I could repeat the troubles on my server. Now, if the 
success string is not found, there is only a warning message.
- Add of a FileUploadThread interface, that will be manipulated by other packages. This will help creation of new
version of FileUploadThreadVn. The FileUploadThreadVn are the successive versions of these classes. I keep them, as 
people often update them for their needs.
- Add of a FileUploadThreadV4 and a UploadFileData. These class will help to implement further extension like _chunk_ 
(to send file piece per piece) or eaisier mark of upload error per file. The original FileUploadThread has been renamed into
FileUploadThreadV1 (of anyone stil use it). FileUploadThreadV1, FileUploadThreadV2 and FileUploadThreadV3 implement 
- Creation of a FileData interface. The default implementation is now into the DefaultFileData.

V2.3.1

Changes:
- Spanish translation available (thanks to jesusangelwork: jesusangelwork[at]users.sourceforge[dot]net)
- The UploadPolicy.getUploadFilename method has been renamed in getUploadName, to avoid error, as this is not the
filename. See the javadoc for all details. BE CAREFUL, if you create a new UploadPolicy, that a new getUploadFilename
has been created. This to allow future encoding of filenames (still work in progress)


V 2.3.0

Bugs corrected:
- The upload would fail when there are less files to upload than nbFilesPerRequest (NullPointerException 
in FileUploadThreadV3).
- The stringUploadSuccess was never read from the applet parameters.

Changes:
- Add of the German language, thanks to Dr. Zoidberg.
- UPLOAD CLASS IS DYNAMIC. You can now create your own UploadPolicy, and put the full class name (with its package) 
into the uploadPolicy parameter to the applet: the UploadPolicyFactory will create it. Ths constructor for UploadPolicy
must have one parameter: JUploadApplet. From this applet, the UploadPolicy can get any necessary parameter, like
the statusArea, where it can displays text to the user.
- A new 'advanced_jd_demo.html' page allows a newcomer to check the effect of all parameters on the applet.
- The UploadPolicy.afterUpload() parameters changed : filePanel has been removed (useless, as it can be retrieve with 
the applet reference, already known from the UploadPolicy, see its constructor).
- The files are now removed just after upload. This means that, for instance, when uploading file by file, the user 
can see the already removed files disappear from the list of files to upload. If a crash occurs, he can then retry
the upload, with the remaining files.

V 2.2.4

Bugs corrected:
- NullPointerException (in FilePanelDataModel2 and in PictureFileData) because of the suppression of static methods 
in UploadPolicyFactory.

Changes:
- Java samples updated. They should be clean now. They use the last jakarta commons fileupload package.


V 2.2.3

Bugs corrected:
- Samples were bugguy: wrong URL, missing 'MAYSCRIPT' in the applet tags, which causes JSException
- minor bug: UploadPolicyFactory contains erroneous static getCurrentUploadPolicy, which would cause unpredictale 
result when several instances of the applet exist in memory

Enhancement:
- Upload policies can now 'refuse' a file added by the user. For instance, PictureUploadPolicy accepts only picture 
files (see createFileData).
- Sample now separate all uploaded files. This was already coded by William (creator of jupload), but not used by the 
sample.
- (minor) PictureFileData now correctly handles the isPicture internal variable.


V 2.2.0

  This version is a major release of jupload. It is based on the 'juploadV20040415R2' package. It adds the following 
functionnalities:
  
- Picture management. The applet is now able to:
  - Preview pictures,
  - Resize picture, to a maximum width and/or height before upload (this lower the network traffic, and can prevent 
the server to transform picture after upload)
  - Display a full screen picture (by clicking on the previewed picture),
  - Rotate the picture right or left,
  - Download pictures and select the upload album on the same web page (with the jupload.php script),
  - Upload all pictures/files in one click,
- UploadPolicy allows easy configuration of the the applet behaves (see below for the current list of parameters), 
- Multi-language.

Here are the current parameters allows that the upload policies allows to control. All details are given in the javadoc:
- uploadPolicy
- postURL
- debugLevel
- lang
- urlToSendErrorTo
- nbFilesPerRequest
- serverProtocol
- stringUploadSuccess
- maxPicHeight
- PictureUploadPolicy
- maxPicWidth
- maxPicHeight
- targetPictureFormat
- albumId
- storeBufferedImage
