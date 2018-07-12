Open Game Panel
-------------------------------------

**Backup Database**

Backup of the existing database can be done with following command:

$ `mysqldump --user [username] -p [database] > backup.sql`

Replace the `[username]` with username located in includes/config.inc.php and 
`[database]` with database located in same file. After executing the command
the password is asked (same as in config.inc.php).


**Restore Database Backup**

Backup can be restored with the following command:

$ `mysql --user [username] -p [database] < backup.sql`


**Lost Admin Password**

In case you lose the admin password you can reset the password with, for
example, the following command:

$ `mysql --user [username] -p [database]`

Then type in the following command but change the `OGP_USERNAME` and `NEW_PASSWORD`
to the proper ones:
```
UPDATE ogp_users SET users_passwd=MD5('NEW_PASSWORD') 
WHERE ogp_users.users_login='OGP_USERNAME';
```
After this type `quit` to exit the MySQL prompt.
