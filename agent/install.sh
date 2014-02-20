#!/bin/bash

#
# OGP - Open Game Panel
# Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
#
# http://www.opengamepanel.org/
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#

# Parameters can be passed into the install.sh script to automate OGP updates
# $1 = Operation Type (Used as opType)
# $2 = OGP User (Used as ogpAgentUser)
# $3 = OGP User Sudo Pass (Used as ogpUserPass)
# $4 = Install Path (Used as ogpInsPath)

readonly DEFAULT_PORT=12679
readonly DEFAULT_IP=0.0.0.0
readonly AGENT_VERSION='v1.0'

failed()
{
    echo "ERROR: ${1}"
    exit 1
}

# Parameter notifications
if [ ! -z "$1" ]; then
	echo -n "Received operation type of $1 as a parameter."
	opType="$1"
fi

if [ ! -z "$2" ]; then
	echo -n "Received OGP user of $2 as a parameter."
	ogpAgentUser="$2"
fi 

if [ ! -z "$3" ]; then
	echo -n "Received OGP sudo password of $3 as a parameter."
	ogpUserPass="$3"
fi 

if [ ! -z "$4" ]; then
	echo -n "Received OGP agent path of $4 as a parameter."
	ogpInsPath="$4"
fi 

if [ "X`which screen &> /dev/null;echo $?`" != "X0" ]; then
    failed "You need to install software called 'screen', before you can install OGP agent.";
fi

if [ "X`which sed &> /dev/null;echo $?`" != "X0" ]; then
    failed "You need to install software called 'sed', before you can install OGP agent.";
fi
echo
clear
echo "#######################################################################"
echo "# OGP Agent installation and configuration"
echo "# This program will:"
echo "# Create ${DEFAULT_AGENT_HOME} or user defined directory"
echo "# Copy ogp_agent files to ${DEFAULT_AGENT_HOME} or user defined dir"
echo "# Copy the ogp_agent init script to /etc/init.d or user defined dir"
echo "# Create an initial configuration file"
echo "# Thank you for using OGP. http://www.opengamepanel.org/"
echo "#######################################################################"
echo 


if [ "X`which rsync &> /dev/null;echo $?`" != "X0" ]; then
    echo "*** WARNING **** missing rsync client. It is not required, but needed to use the rsync game installer";
fi

if [ "X`whoami`" != "Xroot" ]
then 
    echo
    echo "Detected non-root install..."
    username=`whoami`
	echo -n "Enter sudo password: ";
    read sudo_password;
else
    echo "Next you need to type the username of the user that owns the agent homes.";
    echo "This user must own (have access to) all the game home directories that you"
    echo "want to run with this agent and must to be in sudoers list so it can perform"
	echo "administrative tasks.";echo
    while [ 1 ]
    do
		if [ ! -z "$ogpAgentUser" ] ; then
			username="$ogpAgentUser"
		else
			echo -n "Enter user name: ";
			read username;
        fi
		
		if [ -z "$ogpUserPass" ] ; then
			echo -n "Enter user password: ";
			read sudo_password;
		else
			sudo_password="$ogpUserPass"
		fi

        if [ -z "${username}" ]
        then
            echo "Username can not be empty.";echo
            continue;
        fi

        if [ "Xroot" == "X${username}" ]
        then
            echo "'${username}' can not be used as user for agent.";echo
            continue;
        fi

        ID_OF_USER=`id -u ${username} 2> /dev/null`
        if [ $? != 0 ]
        then
            echo "User with entered username (${username}) does not exist.";echo
            continue;
        fi

        break;
    done
fi

readonly AGENT_USER_HOME="`cat /etc/passwd | grep "^${username}:" | cut -d':' -f6`/OGP/"

echo
echo "Next the directory for the agent needs to be chosen. The default directory";
echo "Should be fine in most of the cases."
echo

if [ -z "$ogpInsPath" ]; then
	echo "Where do you want to install the agent?"
	echo -n "[Default is ${AGENT_USER_HOME}]: "
	read agent_home
else
	agent_home="$ogpInsPath"
fi

if [ -z "${agent_home}" ]  
then 
    agent_home=$AGENT_USER_HOME
fi

# Try to prevent users from doing damage to their systems.
case ${agent_home} in
    /bin*|/boot*|/dev*|/etc*|/lib*|/proc*|/root*|/sbin*|/sys*|/)
        failed "The agent home can not be ${agent_home}";
        ;;
esac

echo "Agent install dir is ${agent_home}"
echo
agent_home=${agent_home%/}

if [ ! -e ${agent_home} ]
then 
    mkdir -p ${agent_home} || failed "Failed to create the directory (${agent_home}) for agent."
elif [ ! -w ${agent_home} ]
then
    failed "You do not have write permissions to the directory you assigned as agent home (${agent_home})."
fi

if [ "X`whoami`" == "Xroot" ];
then
    readonly DEFAULT_INIT_DIR="/etc/init.d/"
else
    readonly DEFAULT_INIT_DIR="${agent_home}/"
fi

if [ "X`uname`" != "XLinux" ]
then 
    echo
    echo "Detected non-Linux platform..."
    echo "Where do you want to put the init scripts?"
	echo -n "[Default ${DEFAULT_INIT_DIR}]: "
    read init_dir
fi

if [ -z "$opType" ]; then
	echo "Where do you want to put the init scripts?"
	echo -n "[Default ${DEFAULT_INIT_DIR}]:"
	read init_dir
fi

if [ -z "${init_dir}" ]  
then 
    init_dir=${DEFAULT_INIT_DIR}
fi
init_dir=${init_dir%/}
echo "Copying files..."

cp -avf Crypt EHCP File Frontier IspConfig KKrcon ogp_agent.pl ogp_screenrc ogp_agent_run ${agent_home}/ || failed "Failed to copy agent files to ${agent_home}."

# Create the directory for configs.
mkdir -p ${agent_home}/Cfg || failed "Failed to create ${agent_home}/Cfg dir."
echo

if [ -e /etc/gentoo-release ] 
then
    echo "Copying ogp_agent.init.gentoo to $init_dir - Gentoo Specific Init"
    init_file_template='includes/ogp_agent.init.gentoo' 
elif [ -e /etc/sysconfig ] && [ ! -e /etc/debian_version ]
then
    echo "Copying ogp_agent.init.rh to $init_dir - Redhat Style Init (also SuSE, and Mandrake)"
    init_file_template='includes/ogp_agent.init.rh' 
elif [ -e /etc/debian_version ]
then
    echo "Copying ogp_agent.init.dbn to $init_dir - Debian Style Init"
    init_file_template='includes/ogp_agent.init.dbn'
else
    echo "Copying the generic init script because I don't know what kind of Linux distro this is"
    init_file_template='includes/ogp_agent.init'
fi

init_file=${init_dir}/ogp_agent

cp -f $init_file_template $init_file || failed "Failed to create init file ($init_file)."
# Next we replace the OGP_AGENT_DIR with the actual dir in init file.
sed -i "s|OGP_AGENT_DIR|${agent_home}|" ${init_file} || failed "Failed to modify init file ($init_file)."
sed -i "s|OGP_USER|${username}|" ${init_file} || failed "Failed to modify init file ($init_file)."

chmod a+x $init_file
echo;
echo "Install Successful!"
echo "Now configuring..."
echo ""

cfgfile=${agent_home}/Cfg/Config.pm
prefsfile=${agent_home}/Cfg/Preferences.pm
bashprefsfile=${agent_home}/Cfg/bash_prefs.cfg

overwrite_config=1

if [ -z "$opType" ]; then

	if [ -e ${cfgfile} ]; then
		while [ 1 ]
		do
			echo "Overwrite old config file ($cfgfile)?"
			echo -n "(yes/no) [Default yes]: " 
			read octmp
			if [ "$octmp" == "yes" -o -z "$octmp" ]
			then
				break
			elif [ "$octmp" == "no" ]
			then
				overwrite_config=0
				break
			else
				echo "You need to type 'yes', 'no' or leave empty for default value [yes].";
			fi
		done
	fi

else
	overwrite_config=0
fi

if [ "X${overwrite_config}" == "X1" ]
then
    echo "#######################################################################"
    echo ""
    echo "OGP agent uses basic encryption to prevent unauthorized users from connecting"
    echo "Enter a string of alpha-numeric characters for example 'abcd12345'"
    echo "**** NOTE - Use the same key in your Open Game Panel webpage config file - they must match *****"
    echo ""

    while [ -z "${key}" ]
    do 
        echo -n "Set encryption key: "
        read key
    done

    echo
    echo "Set the listen port for the agent. The default should be fine for everyone."
    echo "However, if you want to change it that can be done here, otherwise just press Enter."
    echo -n "Set listen port [Default ${DEFAULT_PORT}]: "
    read port

    if [ -z "${port}" ]
    then 
        port=$DEFAULT_PORT
    fi

    echo 
    echo "Set the listen IP for the agent."
    echo "Use ${DEFAULT_IP} to bind on all interfaces."
    echo -n "Set listen IP [Default ${DEFAULT_IP}]: "
    read ip

    if [ -z "${ip}" ]  
    then 
        ip=$DEFAULT_IP
    fi 

    while [ 1 ]
    do
        echo
        echo "For some games the OGP panel is using Steam client."
        echo "This client has its own license that you need to agree before continuing."
        echo "This agreement is available at http://store.steampowered.com/subscriber_agreement/"
        echo;
		echo "Do you accept the terms of Steam(tm) Subscriber Agreement?"
		echo -n "(Accept|Reject): "
        read steam_license
        if [ "$steam_license" == "Accept" -o "$steam_license" == "Reject" ]
        then 
            break;
        fi

        echo "You need to type either 'Accept' or 'Reject'.";
    done
    
    echo "Writing Config file - $cfgfile"

    echo "%Cfg::Config = (
    logfile => '${agent_home}/ogp_agent.log',
    listen_port  => '${port}',
    listen_ip => '${ip}',
    version => '${AGENT_VERSION}',
    key => '${key}',
    steam_license => '${steam_license}',
    sudo_password => '${sudo_password}',
    );" > $cfgfile
	
	if [ $? != 0 ]
    then
        failed "Failed to write config file."
    fi 
    
    echo;
	while [ 1 ]
    do
		echo "The agent should be updated when the service is restarted or started?"
		echo -n "(yes|no) [Default yes]: "
		read auto_update
		if [ "${auto_update}" == "yes" -o "${auto_update}" == "no" -o -z "${auto_update}" ]
		then 
			if [ "${auto_update}" == "yes" ]
			then
				autoUpdate=1
			elif [ -z "${auto_update}" ]
			then
				autoUpdate=1
			else
				autoUpdate=0
			fi
			break;
		fi
        echo "You need to type 'yes', 'no' or leave empty for default value [yes].";
    done
	
    echo;
	while [ 1 ]
    do
		echo "The agent should backup the server log files in the game server directory?"
		echo -n "(yes|no) [Default yes]: "
		read log_local_copy
		if [ "${log_local_copy}" == "yes" -o "${log_local_copy}" == "no" -o -z "${log_local_copy}" ]
		then 
			if [ "${log_local_copy}" == "yes" ]
			then
				logLocalCopy=1
			elif [ -z "${log_local_copy}" ]
			then
				logLocalCopy=1
			else
				logLocalCopy=0
			fi
			break;
		fi
		echo "You need to type 'yes', 'no' or leave empty for default value [yes].";
    done
	
	echo;	
    echo "After how many days should be deleted the old backups of server's logs?"
	echo -n "[Default 30]: "
    read delete_logs_after
    case ${delete_logs_after} in
    	''|*[!0-9]*) deleteLogsAfter=30 ;;
    	*) deleteLogsAfter=${delete_logs_after} ;;
    esac
    
    echo;
	while [ 1 ]
    do
		echo "The agent should automatically restart game servers if they crash?"
		echo -n "(yes|no) [Default yes]: "
		read auto_restart
		if [ "${auto_restart}" == "yes" -o "${auto_restart}" == "no" -o -z "${auto_restart}" ]
		then 
			if [ "${auto_restart}" == "yes" ]
			then
				autoRestart=1
			elif [ -z "${auto_restart}" ]
			then
				autoRestart=1
			else
				autoRestart=0
			fi
			break;
		fi
		echo "You need to type 'yes', 'no' or leave empty for default value [yes].";
    done
	
	echo;
	echo "What mirror you want to use for updating the agent?: "
	echo;
	echo "1  - SourceForge, Inc. (Chicago, Illinois, US)"
	echo "2  - AARNet (Melbourne, Australia, AU)"
	echo "3  - CityLan (Moscow, Russian Federation, RU)"
	echo "4  - Free France (Paris, France, FR)"
	echo "5  - garr.it (Ancona, Italy, IT)"
	echo "6  - HEAnet (Ireland, IE)"
	echo "7  - HiVelocity (Tampa, FL, US)"
	echo "8  - Internode (Adelaide, Australia, AU)"
	echo "9  - Japan Advanced Institute of Science and Technology (Nomi, Japan, JP)"
	echo "10 - kaz.kz (Almaty, Kazakhstan, KZ)"
	echo "11 - University of Kent (Canterbury, United Kingdom, GB)"
	echo "12 - NetCologne (K&ouml;ln, Germany, DE)"
	echo "13 - Optimate-Server (Germany, DE)"
	echo "14 - Softlayer (Dallas, TX, US)"
	echo "15 - SURFnet (Zurich, Switzerland, CH)"
	echo "16 - SWITCH (Zurich, Switzerland, CH)"
	echo "17 - Centro de Computacao Cientifica e Software Livre (Curitiba, Brazil, BR)"
	read setmirror
	case ${setmirror} in
		1) mirror="master"
		;;
		2) mirror="aarnet"
		;;
		3) mirror="citylan"
		;;
		4) mirror="freefr"
		;;
		5) mirror="garr"
		;;
		6) mirror="heanet"
		;;
		7) mirror="hivelocity"
		;;
		8) mirror="internode"
		;;
		9) mirror="jaist"
		;;
		10) mirror="kaz"
		;;
		11) mirror="kent"
		;;
		12) mirror="netcologne"
		;;
		13) mirror="optimate"
		;;
		14) mirror="softlayer-dal"
		;;
		15) mirror="surfnet"
		;;
		16) mirror="switch"
		;;
		17) mirror="ufpr"
		;;
		*) mirror="master"
		;;
	esac
	
    echo;
	while [ 1 ]
    do
		echo "Should Open Game Panel create and manage FTP accounts?"
		echo -n "(yes|no) [Default yes]: "
		read manage_ftp
		if [ "${manage_ftp}" == "yes" -o "${manage_ftp}" == "no" -o -z "${manage_ftp}" ]
		then
			if [ "${manage_ftp}" == "yes" ]
			then
				ogpManagesFTP=1
			elif [ -z "${manage_ftp}" ]
			then
				ogpManagesFTP=1
			else
				ogpManagesFTP=0
			fi
			break;
		fi
		echo "You need to type 'yes', 'no' or leave empty for default value [yes].";
    done
	
    echo;
    # Only ask these install questions if users want OGP to manage FTP accounts    
    if [ "$ogpManagesFTP" == "1" ]
	then
		while [ 1 ]
		do
			echo "If you are running ISPConfig 3 in this machine the agent"
			echo "can use it to create FTP accounts instead of using Pure-FTPd."
			echo "Would you like to configure this agent to use the API of ISPConfig 3?"
			echo -n "(yes|no) [Default no]: "
			read IspConfig
			if [ "${IspConfig}" == "yes" -o "${IspConfig}" == "no" -o -z "${IspConfig}" ]
			then
				if [ "${IspConfig}" == "yes" ]
				then
					ftpMethod="IspConfig"
				else
					IspConfig="no"
				fi
				break;
			fi
			echo "You need to type 'yes', 'no' or leave empty for default value [no].";
		done
		
		if [ "${IspConfig}" == "yes" ]
		then
			while [ 1 ]
			do
				echo "Do you use HTTPS to access to your ISPConfig 3 Panel?"
				echo -n "(yes|no) [Default no]: "
				read https
				if [ "${https}" == "yes" -o "${https}" == "no" -o -z "${https}" ]
				then
					if [ "${https}" == "yes" ]
					then
						secure="s"
					else
						secure=""
					fi
					break;
				fi
				echo "You need to type 'yes', 'no' or leave empty for default value [no].";
			done
			
			echo -n "What port do you use to connect to your ISPConfig 3 Panel? [Default 8080]: "
			read setport
			case ${setport} in
				''|*[!0-9]*) port=8080 ;;
				*) port=${setport} ;;
			esac
			
			echo -n "Enter an user name to sing in remotelly (Remote user): "
			read remote_login_username

			echo -n "Enter password (Remote user): "
			read remote_login_password
			
			echo -e "<?php\n\$username = '${remote_login_username}';" > ${agent_home}/IspConfig/soap_config.php
			echo "\$password = '${remote_login_password}';" >> ${agent_home}/IspConfig/soap_config.php
			echo "\$soap_location = 'http${secure}://127.0.0.1:${port}/remote/index.php';" >> ${agent_home}/IspConfig/soap_config.php
			echo -e "\$soap_uri = 'http${secure}://127.0.0.1:${port}/remote/';\n?>" >> ${agent_home}/IspConfig/soap_config.php
			
		else
		
			while [ 1 ]
			do
				echo;
				echo "If you have installed the Easy Hosting Control Panel (EHCP - www.ehcp.net),"
				echo "the agent can use it to create FTP accounts instead of using Pure-FTPd."
				echo "Would you like to configure this agent to use the API of EHCP?"
				echo -n "(yes|no) [Default no]: "
				read ehcp
				if [ "${ehcp}" == "yes" -o "${ehcp}" == "no" -o -z "${ehcp}" ]
				then 
					if [ "${ehcp}" == "yes" ]
					then
						ftpMethod="EHCP"
					fi
					break;
				fi
				echo "You need to type 'yes', 'no' or leave empty for default value [no].";
			done
			
			if [ "${ehcp}" == "yes" ]
			then
				echo "Please enter the MySQL database password for the ehcp user"
				echo -n "(created during the install of EHCP): "
				read ehcpDB
					
				ehcpConf=${agent_home}/EHCP/config.php
				sed -i "s/changeme/${ehcpDB}/" $ehcpConf
			else
				ftpMethod="PureFTPd"
			fi
		fi
   	else
		ftpMethod=""
	fi
	
	clear
	echo "Writing Preferences file - $prefsfile"
	
    echo "%Cfg::Preferences = (
    screen_log_local => '${logLocalCopy}',
    delete_logs_after => '${deleteLogsAfter}',
    ogp_manages_ftp => '${ogpManagesFTP}',
    ftp_method => '${ftpMethod}',
    ogp_autorestart_server => '${autoRestart}',
    );" > $prefsfile 
	
	if [ $? != 0 ]
    then
        failed "Failed to write preferences file."
    fi
    
    echo "Writing bash script preferences file - $bashprefsfile"
	
    echo "agent_auto_update=${autoUpdate}\nsf_update_mirror=${mirror}" > $bashprefsfile
	
	if [ $? != 0 ]
    then
        failed "Failed to write MISC configuration file used by bash scripts."
    fi
fi

echo "Setting Permissions on files in ${agent_home}..."
chmod 750 ${init_dir}/ogp_agent || failed "Failed to chmod ${init_dir}/ogp_agent to 750."
chmod 750 ${agent_home}/ogp_agent.pl || failed "Failed to chmod ${agent_home}/ogp_agent.pl to 750."
chmod 600 ${cfgfile} || failed "Failed to chmod ${cfgfile} to 600."
chmod 750 ${agent_home}/ogp_agent_run || failed "Failed to chmod ${agent_home}/ogp_agent_run to 750."

echo "Chmodding files to user ${username}...";
# Group of the files in agent_home can differ from the user so 
# lets leave them as they are. So no chown user:group here.
chown --preserve-root -R ${username} ${agent_home} || failed "Failed to chmod the agent_home ${agent_home} for user ${username}."

echo;echo 
echo "Installation complete!"  
echo "Start the agent manually to test it like this:"
echo "  cd ${agent_home}"
echo "  ./ogp_agent.pl"
echo
echo "If everything looks good, hit <Ctrl C> to kill the agent." 
echo "The agent can be started with the init scripst by using following command"
echo "  ${init_dir}/ogp_agent start";
echo 
exit 0

