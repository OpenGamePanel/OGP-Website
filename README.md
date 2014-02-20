Open-Game-Panel
===============
OGP is a game server control panel. It uses a web interface (PHP/MySQL) that controls an agent (Perl) running on the servers hosting your games. It is used to start/stop/monitor game server instances. More features like a config file editor are coming soon.

It allows users to administer a game server without having shell access. Panel admins can lock down various features to users, like limit which IPs or ports can be used for each game.

Games can be assigned a specific cpu priority (with nice) and on multi cpu boxes, a game can be assigned to a specific CPU, allowing admins to balance servers across CPU cores.

Games are started as the user who owns them. So the agent will see that a given Counter-Strike server is owned by user 'greg'. It will launch the game server as 'greg'. That way, if greg were to SSH or FTP to the server to collect log files or edit a config etc...the files will still be owned by him, and he'll have access to all the files. This is also useful if admins enforce some kind of user based qutoa policy like disk quota or ulimit settings in Linux/Unix.

Game installations can be cloned from the panel, making it easy to provision new game servers from base templates.

Steam based games can be installed or updated using the steam client from the web interface.

If the server is rebooted, the agent will restart the game servers that were running when the reboot occured.

Open Game Panel is designed around the idea that many different people can use the panel to control many different servers. It can be used for gaming clans, Game Hosting Companies, and individual users alike. 

