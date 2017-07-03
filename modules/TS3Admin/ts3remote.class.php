<?php
/**
 *                            ts3remote.class.php							<br />
 *                            -------------------							<br />
 *   begin                : Sunday, Dec 22, 2009							<br />
 *   copyright            : (C) 2009-2010 RK Programming					<br />
 *   email                : robin@rk-programming.de							<br />
 *   version              : 0.9.1											<br />
 *   last modified        : Tuesday, Dec 29, 2009							<br />
 *
 * @author		RK Programming <robin@rk-programming.de>
 * @copyright	Copyright (c) 2009-2010, Robin K.
 * @version		0.9.1
 
 
 	TS3remote and TS3lib is free software. You can redistribute it and/or
	modify it under the terms of the GNU General Public License as published
	by the Free Software Foundation, version 1.3.
	
**/

define('TS3REMOTE_VERSION', '0.9.0');

require_once('ts3lib.class.php');

class TS3remote extends TS3lib
{
	protected $loggedin;
	
	function __construct($ip, $port)
	{
		parent::__construct($ip, $port);
		
		$this->loggedin = false;
	}
	
	function __destruct()
	{
		parent::__destruct();
	}
	
	public function r_login($user, $password)
	{
		$user = $this->escape($user);
		$password = $this->escape($password);
		
		if( $this->performResultless("login client_login_name=$user client_login_password=$password") )
		{
			$this->loggedin = true;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function r_logout()
	{
		$this->loggedin = false;
		
		return $this->performResultless('logout');
	}
	
	public function r_version($parse=TS3_PARSED)	// or TS3_RAW
	{
		return $this->perform('version', $parse);
	}
	
	public function r_hostinfo($parse=TS3_PARSED)
	{
		return $this->perform('hostinfo', $parse);
	}
	
	public function r_instanceinfo($parse=TS3_PARSED)
	{
		return $this->perform('instanceinfo', $parse);
	}
	
	public function r_instanceedeit($var, $value)
	{
		$var = $this->escape($var);
		$value = $this->escape($value);
		
		return $this->performResultless("instanceedit $var=$value");
	}
	
	public function r_bindinglist($parse=TS3_PARSED)
	{
		return $this->perform('bindinglist', $parse);
	}
	
	public function r_use($sid, $port=0)
	{
		$sid = $this->escape($sid);
		
		$this->vserver = $sid;
		
		if( $port > 0 )
		{
			$port = $this->escape($port);
			
			return $this->performResultless("use sid=$sid port=$port");
		}
		else
		{
			return $this->performResultless("use sid=$sid");
		}
	}
	
	public function r_serverlist($all=true, $parse=TS3_PARSED)
	{
		if( $all ) $all = ' -all';
		else $all = '';
		
		return $this->perform("serverlist$all", $parse);
	}
	
	public function r_serveridgetbyport($sid, $parse=TS3_PARSED)
	{
		$sid = $this->escape($sid);
		
		return $this->perform("serveridgetbyport virtualserver_port=$sid", $parse);
	}
	
	public function r_serverdelete($sid)
	{
		$sid = $this->escape($sid);
		
		return $this->performResultless("serverdelete sid=$sid");
	}
	
	public function r_servercreate($vServerName, $props, $parse=TS3_PARSED)
	{
		$vServerName = $this->escape($vServerName);
		
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $this->escape($props[$i][0]).'='.$this->escape($props[$i][1]);
		}
		$propString = implode(' ', $props);
		
		return $this->perform("servercreate virtualserver_name=$vServerName $propString", $parse);
	}
	
	public function r_serverstart($sid)
	{
		$sid = $this->escape($sid);
		
		return $this->performResultless("serverstart sid=$sid");
	}
	
	public function r_serverstop($sid)
	{
		$sid = $this->escape($sid);
		
		return $this->performResultless("serverstop sid=$sid");
	}
	
	/*
	  serverprocessstop
	*/
	
	public function r_serverinfo($parse=TS3_PARSED)
	{
		return $this->perform('serverinfo', $parse);
	}
	
	public function r_serverrequestconnectioninfo($parse=TS3_PARSED)
	{
		return $this->perform('serverrequestconnectioninfo', $parse);
	}
	
	public function r_serveredit($props)
	{
		//print_r($props);
		//$props = $this->escape($props);
		//print_r($props);
		
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $this->escape($props[$i][0]).'='.$this->escape($props[$i][1]);
		}
		$propString = implode(' ', $props);
		
		//echo $propString;
		
		return $this->performResultless("serveredit $propString");
	}
	
	public function r_servergrouplist($parse=TS3_PARSED)
	{
		if( $this->vserver > 0 )
			return $this->perform('servergrouplist', $parse);
		else
			return false;
	}
	
	public function r_servergroupadd($grpName, $parse=TS3_PARSED)
	{
		$grpName = $this->escape($grpName);
		
		return $this->perform("servergroupadd name=$grpName", $parse);
	}
	
	public function r_servergroupdel($sgid, $force=1)
	{
		$sgid = $this->escape($sgid);
		if( $force != 0 ) $force = 1;
		
		return $this->performResultless("servergroupdel sgid=$sgid force=$force");
	}
	
	public function r_servergrouprename($sgid, $newName)
	{
		$sgid = $this->escape($sgid);
		$newName = $this->escape($newName);
		
		return $this->performResultless("servergrouprename sgid=$sgid name=$newName");
	}
	
	public function r_servergrouppermlist($sgid, $parse=TS3_PARSED)
	{
		$sgid = $this->escape($sgid);
		
		return $this->perform("servergrouppermlist sgid=$sgid", $parse);
	}
	
	public function r_servergroupaddperm($sgid, $permid, $value, $negated, $skip)
	{
		$sgid = $this->escape($sgid);
		$permid = $this->escape($permid);
		$value = $this->escape($value);
		$negated = $this->escape($negated);
		$skip = $this->escape($skip);
		
		return $this->performResultless("servergroupaddperm sgid=$sgid permid=$permid permvalue=$value permnegated=$negated permskip=$skip");
	}
	
	public function r_servergroupdelperm($sgid, $permid)
	{
		$sgid = $this->escape($sgid);
		$permid = $this->escape($permid);
		
		return $this->performResultless("servergroupdelperm sgid=$sgid permid=$permid");
	}
	
	public function r_servergroupaddclient($sgid, $clientdbid)
	{
		$sgid = $this->escape($sgid);
		$clientdbid = $this->escape($clientdbid);
		
		return $this->performResultless("servergroupaddclient sgid=$sgid cldbid=$clientdbid");
	}
	
	public function r_servergroupdelclient($sgid, $clientdbid)
	{
		$sgid = $this->escape($sgid);
		$clientdbid = $this->escape($clientdbid);
		
		return $this->performResultless("servergroupdelclient sgid=$sgid cldbid=$clientdbid");
	}
	
	public function r_servergroupclientlist($sgid, $names=true, $parse=TS3_PARSED)
	{
		if( $names ) $names = ' -names';
		else $names = '';
		
		return $this->perform("servergroupclientlist sgid=$sgid$names", $parse);
	}
	
	public function r_servergroupsbyclientid($clientdbid, $parse=TS3_PARSED)
	{
		$sgid = $this->escape($sgid);
		
		return $this->perform("servergroupsbyclientid cldbid=$clientdbid", $parse);
	}
	
	public function r_serversnapshotcreate($parse=TS3_PARSED)
	{
		return $this->perform("serversnapshotcreate", $parse);
	}
	
	/*
	 * serversnapshotdeploy
	 * servernotifyregister
	 * servernotifyunregister
	 */
	
	public function r_gm($msg)
	{
		$msg = $this->escape($msg);
		
		return $this->performResultless("gm msg=$msg");
	}
	
	public function r_sendtextmessage($targetmode, $target, $msg)
	{
		$targetmode = $this->escape($targetmode);
		$target = $this->escape($target);
		$msg = $this->escape($msg);
		
		return $this->performResultless("sendtextmessage targetmode=$targetmode target=$target msg=$msg");
	}
	
	public function r_logview($limit=50, $parse=TS3_PARSED)
	{
		$limit = $this->escape($limit);
		
		return $this->perform("logview limitcount=$limit", $parse);
	}
	
	public function r_logadd($level, $msg)
	{
		$level = $this->escape($level);
		$msg = $this->escape($msg);
		
		return $this->performResultless("logadd loglevel=$level logmsg=$msg");
	}
	
	public function r_channellist($topic='', $flags='', $voice='', $limits='', $parse=TS3_PARSED)
	{
		if( $topic !== '' ) $topic = ' -topic';
		if( $flags !== '' ) $flags = ' -flags';
		if( $voice !== '' ) $voice = ' -voice';
		if( $limits !== '' ) $limits = ' -limits';
		
		return $this->perform("channellist$topic$flags$voice$limits", $parse);
	}
	
	public function r_channelinfo($cid, $parse=TS3_PARSED)
	{
		$cid = $this->escape($cid);
		
		return $this->perform("channelinfo cid=$cid", $parse);
	}
	
	/*
	  channelfind		(page 16 pdf)
	  ...
	  ...
	 */
	
	public function r_channelfind($pattern, $parse=TS3_PARSED)
	{
		$pattern = $this->escape($pattern);
		
		return $this->perform("channelfind pattern=$cid", $parse);
	}
	
	public function r_channelmove($cid, $newParentid, $sortorder='')
	{
		$cid = $this->escape($cid);
		$newParentid = $this->escape($newParentid);
		if( $sortorder !== '' ) $sortorder = ' order='.$this->escape($sortorder);
		
		//echo "channelmove cid=$cid cpid=$newParentid$sortorder\n";
		return $this->performResultless("channelmove cid=$cid cpid=$newParentid$sortorder");
	}
	
	public function r_channelcreate($name, $props, $parse=TS3_PARSED, $escape=true)
	{
		if( !is_array($props) ) return false;
		
		if( $escape )
		{
			$name = $this->escape($name);
			$props = $this->escape($props);
		}
		
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $props[$i][0].'='.$props[$i][1];
		}
		$propString = implode(' ', $props);
		
		return $this->perform("channelcreate channel_name=$name $propString", $parse);
	}
	
	public function r_channeledit($cid, $props)
	{
		if( !is_array($props) ) return false;
		
		$cid = $this->escape($cid);
		$props = $this->escape($props);
		
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $props[$i][0].'='.$props[$i][1];
		}
		$propString = implode(' ', $props);
		
		return $this->performResultless("channeledit cid=$cid $propString");
	}
	
	public function r_channeldelete($cid, $force=1)
	{
		$cid = $this->escape($cid);
		if( $force != 0 ) $force = 1;
		
		return $this->performResultless("channeldelete cid=$cid force=$force");
	}
	
	public function r_channelpermlist($cid, $parse=TS3_PARSED)
	{
		$cid = $this->escape($cid);
		
		return $this->perform("channelpermlist cid=$cid", $parse);
	}
	
	public function r_channeladdperm($cid, $perms)
	{
		$cid = $this->escape($cid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1].' '.$perms[$i][2].'='.$perms[$i][3];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("channeladdperm cid=$cid $permString");
	}
	
	public function r_channeldelperm($cid, $perms)
	{
		$cid = $this->escape($cid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("channeldelperm cid=$cid $permString");
	}
	
	public function r_channelgrouplist($parse=TS3_PARSED)
	{
		return $this->perform("channelgrouplist", $parse);
	}
	
	public function r_channelgroupadd($name, $parse=TS3_PARSED)
	{
		$name = $this->escape($name);
		
		return $this->perform("channelgroupadd name=$name", $parse);
	}
	
	public function r_channelgroupdel($cgid, $force=1)
	{
		$cgid = $this->escape($cgid);
		if( $force != 0 ) $force = 1;
		
		return $this->performResultless("channelgroupdel cgid=$cgid force=$force");
	}
	
	public function r_channelgrouprename($cgid, $name)
	{
		$cgid = $this->escape($cgid);
		$name = $this->escape($name);
		
		return $this->performResultless("channelgrouprename cgid=$cgid name=$name");
	}
	
	public function r_channelgroupaddperm($cgid, $perms)
	{
		$cgid = $this->escape($cgid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1].' '.$perms[$i][2].'='.$perms[$i][3];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("channelgroupaddperm cid=$cgid $permString");
	}
	
	public function r_channelgroupdelperm($cgid, $perms)
	{
		$cgid = $this->escape($cgid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("channelgroupdelperm cid=$cgid $permString");
	}
	
	public function r_channelgrouppermlist($cgid, $parse=TS3_PARSED)
	{
		$cgid = $this->escape($cgid);
		
		return $this->perform("channelgrouppermlist cgid=$cgid", $parse);
	}
	
	public function r_channelgroupclientlist($cid=0, $clid=0, $cgid=0, $parse=TS3_PARSED)
	{
		if( $cid  != 0 && $cid  != false ) $cid  = ' cid='.$this->escape($cid);
		if( $clid != 0 && $clid != false ) $clid = ' clid='.$this->escape($clid);
		if( $cgid != 0 && $cgid != false ) $cgid = ' cgid='.$this->escape($cgid);
		
		return $this->perform("channelgroupclientlist$cid$clid$cgid", $parse);
	}
	
	public function r_setclientchannelgroup($cgid, $cid, $cldbid)
	{
		$cgid = $this->escape($cgid);
		$cid = $this->escape($cid);
		$cldbid = $this->escape($cldbid);
		
		return $this->performResultless("setclientchannelgroup cgid=$cgid cid=$cid cldbid=$cldbid");
	}
	
	public function r_clientlist($uid='', $away='', $voice='', $groups='', $info='', $parse=TS3_PARSED)
	{
		if( $uid != '' ) $uid = ' -uid';
		if( $away != '' ) $away = ' -away';
		if( $voice != '' ) $voice = ' -voice';
		if( $groups != '' ) $groups = ' -groups';
		if( $info != '' ) $info = ' -info';
		
		return $this->perform("clientlist$uid$away$voice$groups$info", $parse);
	}
	
	public function r_clientinfo($clid, $parse=TS3_PARSED)
	{
		$clid = $this->escape($clid);
		
		return $this->perform("clientinfo clid=$clid", $parse);
	}
	
	public function r_clientfind($namePattern, $parse=TS3_PARSED)
	{
		$namePattern = $this->escape($namePattern);
		
		return $this->perform("clientfind pattern=$namePattern", $parse);
	}
	
	public function r_clientedit($clid, $props)
	{
		$clid = $this->escape($clid);
		$props = $this->escape($props);
		
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $props[$i][0].'='.$props[$i][1];
		}
		$propString = implode(' ', $props);
		
		return $this->performResultless("clientedit clid=$clid $propString");
	}
	
	public function r_clientdblist($parse=TS3_PARSED)
	{
		return $this->perform("clientdblist", $parse);
	}
	
	public function r_clientdbfind($clPattern, $uid='', $parse=TS3_PARSED)
	{
		$clPattern = $this->escape($clPattern);
		if( $uid != '' ) $uid = ' -uid';
		
		return $this->perform("clientdbfind pattern=$clPattern$uid", $parse);
	}
	
	public function r_clientdbedit($cldbid, $props)
	{
		$cldbid = $this->escape($cldbid);
		
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $props[$i][0].'='.$props[$i][1];
		}
		$propString = implode(' ', $props);
		
		return $this->performResultless("clientdbedit cldbid=$cldbid $propString");
	}
	
	public function r_clientdbdelete($cldbid)
	{
		$cldbid = $this->escape($cldbid);
		
		return $this->performResultless("clientdbdelete cldbid=$cldbid");
	}
	
	public function r_clientgetids($cluid, $parse=TS3_PARSED)
	{
		$cluid = $this->escape($cluid);
		
		return $this->perform("clientgetids cluid=$cluid", $parse);
	}
	
	public function r_clientgetdbidfromuid($cluid, $parse=TS3_PARSED)
	{
		$cluid = $this->escape($cluid);
		
		return $this->perform("clientgetdbidfromuid cluid=$cluid", $parse);
	}
	
	public function r_clientgetnamefromuid($cluid, $parse=TS3_PARSED)
	{
		$cluid = $this->escape($cluid);
		
		return $this->perform("clientgetnamefromuid cluid=$cluid", $parse);
	}
	
	public function r_clientgetnamefromdbid($cldbid, $parse=TS3_PARSED)
	{
		$cldbid = $this->escape($cldbid);
		
		return $this->perform("clientgetnamefromdbid cldbid=$cldbid", $parse);
	}
	
	public function r_clientsetserverquerylogin($name, $parse=TS3_PARSED)
	{
		$name = $this->escape($name);
		
		return $this->perform("clientsetserverquerylogin client_login_name=$name", $parse);
	}
	
	public function r_clientupdate($props)
	{
		$countProps = count($props);
		for($i=0; $i<$countProps; $i++)
		{
			$props[$i] = $this->escape($props[$i][0]).'='.$this->escape($props[$i][1]);
		}
		$propString = implode(' ', $props);
		
		return $this->performResultless("clientupdate $propString");
	}
	
	public function r_clientmove($clid, $cid, $cpw='')
	{
		$clid = $this->escape($clid);
		$cid = $this->escape($cid);
		if( $cpw != '' ) $cpw = ' cpw='.$this->escape($cpw);
		
		if( is_array($clid) )
		{
			$countClid = count($clid);
			for($i=0; $i<$countClid; $i++)
			{
				$clid[$i] = $clid[$i][0].'='.$clid[$i][1];
			}
			$clidString = implode('|', $clid);
		}
		else
		{
			$clidString = ' clid='.$clid;
		}
		
		return $this->performResultless("clientmove $clidString cid=$cid$cpw");
	}
	
	public function r_clientkick($clid, $reasonid=5, $reasonmsg='')
	{
		$clid = $this->escape($clid);
		$reasonid = $this->escape($reasonid);
		if( $reasonmsg != '' ) $reasonmsg = ' reasonmsg='.$this->escape($reasonmsg);
		
		if( is_array($clid) )
		{
			$countClid = count($clid);
			for($i=0; $i<$countClid; $i++)
			{
				$clid[$i] = $clid[$i][0].'='.$clid[$i][1];
			}
			$clidString = implode('|', $clid);
		}
		else
		{
			$clidString = ' clid='.$clid;
		}
		
		return $this->performResultless("clientkick $clidString reasonid=$reasonid$reasonmsg");
	}
	
	public function r_clientpoke($clid, $msg)
	{
		$clid = $this->escape($clid);
		$msg = $this->escape($msg);
		
		if( is_array($clid) )
		{
			$countClid = count($clid);
			for($i=0; $i<$countClid; $i++)
			{
				$clid[$i] = $clid[$i][0].'='.$clid[$i][1];
			}
			$clidString = implode('|', $clid);
		}
		else
		{
			$clidString = ' clid='.$clid;
		}
		
		return $this->performResultless("clientpoke $clidString msg=$msg");
	}
	
	public function r_clientpermlist($cldbid, $parse=TS3_PARSED)
	{
		$cldbid = $this->escape($cldbid);
		
		return $this->perform("clientpermlist cldbid=$cldbid", $parse);
	}
	
	public function r_clientaddperm($cldbid, $perms)
	{
		$cldbid = $this->escape($cldbid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1].' '.$perms[$i][2].'='.$perms[$i][3].' '.$perms[$i][4].'='.$perms[$i][5];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("clientaddperm cldbid=$cldbid $permString");
	}
	
	public function r_clientdelperm($cldbid, $perms)
	{
		$cldbid = $this->escape($cldbid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("clientdelperm cldbid=$cldbid $permString");
	}
	
	public function r_channelclientpermlist($cid, $cldbid, $parse=TS3_PARSED)
	{
		$cid = $this->escape($cid);
		$cldbid = $this->escape($cldbid);
		
		return $this->perform("channelclientpermlist cid=$cid cldbid=$cldbid", $parse);
	}
	
	public function r_channelclientaddperm($cid, $cldbid, $perms)
	{
		$cid = $this->escape($cid);
		$cldbid = $this->escape($cldbid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1].' '.$perms[$i][2].'='.$perms[$i][3];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("channelclientaddperm cid=$cid cldbid=$cldbid $permString");
	}
	
	public function r_channelclientdelperm($cid, $cldbid, $perms)
	{
		$cid = $this->escape($cid);
		$cldbid = $this->escape($cldbid);
		$perms = $this->escape($perms);
		
		$countPerms = count($perms);
		for($i=0; $i<$countPerms; $i++)
		{
			$perms[$i] = $perms[$i][0].'='.$perms[$i][1];
		}
		$permString = implode('|', $perms);
		
		return $this->performResultless("channelclientdelperm cid=$cid cldbid=$cldbid $permString");
	}
	
	public function r_permissionlist($parse=TS3_PARSED)
	{
		return $this->perform("permissionlist", $parse);
	}
	
	public function r_permoverview($cid, $cldbid, $permid=0, $parse=TS3_PARSED)
	{
		$cid = $this->escape($cid);
		$cldbid = $this->escape($cldbid);
		$permid = $this->escape($permid);
		
		return $this->perform("permoverview cid=$cid cldbid=$cldbid permid=$permid", $parse);
	}
	
	public function r_permfind($permid, $parse=TS3_PARSED)
	{
		$permid = $this->escape($permid);
		
		return $this->perform("permfind permid=$permid", $parse);
	}
	
	public function r_tokenlist($parse=TS3_PARSED)
	{
		return $this->perform("tokenlist", $parse);
	}
	
	public function r_tokenadd($tokentype, $tokenid1, $tokenid2=0, $parse=TS3_PARSED)
	{
		$tokentype = $this->escape($tokentype);
		$tokenid1 = $this->escape($tokenid1);
		$tokenid2 = $this->escape($tokenid2);
		
		return $this->perform("tokenadd tokentype=$tokentype tokenid1=$tokenid1 tokenid2=$tokenid2", $parse);
	}
	
	public function r_tokendelete($tokenkey)
	{
		$tokenkey = $this->escape($tokenkey);
		
		return $this->performResultless("tokendelete token=$tokenkey");
	}
	
	public function r_tokenuse($tokenkey)
	{
		$tokenkey = $this->escape($tokenkey);
		
		return $this->performResultless("tokenuse token=$tokenkey");
	}
	
	public function r_messagelist($parse=TS3_PARSED)
	{
		return $this->perform("messagelist", $parse);
	}
	
	public function r_messageadd($cluid, $subject, $msg)
	{
		$cluid = $this->escape($cluid);
		$subject = $this->escape($subject);
		$msg = $this->escape($msg);
		
		return $this->performResultless("messageadd cluid=$cluid subject=$subject message=$msg");
	}
	
	public function r_messageget($msgid, $parse=TS3_PARSED)
	{
		$msgid = $this->escape($msgid);
		
		return $this->perform("messageget msgid=$msgid", $parse);
	}
	
	public function r_messageupdateflag($msgid, $readflag)
	{
		$msgid = $this->escape($msgid);
		if( $readflag != 0 ) $readflag = 1;
		
		return $this->performResultless("messageupdateflag msgid=$msgid flag=$readflag");
	}
	
	public function r_messagedel($msgid)
	{
		$msgid = $this->escape($msgid);
		
		return $this->performResultless("messagedel msgid=$msgid");
	}
	
	public function r_complainlist($targetcldbid="", $parse=TS3_PARSED)
	{
		if( $targetcldbid != "" ) $targetcldbid = ' tcldbid='.$this->escape($targetcldbid);
		
		return $this->perform("complainlist$targetcldbid", $parse);
	}
	
	public function r_complainadd($targetcldbid, $msg, $parse=TS3_PARSED)
	{
		$targetcldbid = $this->escape($targetcldbid);
		$msg = $this->escape($msg);
		
		return $this->perform("complainadd tcldbid=$targetcldbid message=$msg", $parse);
	}
	
	// 2. from id = client who complained about the target
	public function r_complaindel($targetcldbid, $fromcldbid)
	{
		$targetcldbid = $this->escape($targetcldbid);
		$fromcldbid = $this->escape($fromcldbid);
		
		return $this->performResultless("complaindel tcldbid=$targetcldbid fcldbid=$fromcldbid");
	}
	
	public function r_complaindelall($targetcldbid)
	{
		$targetcldbid = $this->escape($targetcldbid);
		
		return $this->performResultless("complaindelall tcldbid=$targetcldbid");
	}
	
	public function r_banclient($clid, $time=0, $reason="", $parse=TS3_PARSED)
	{
		$clid = $this->escape($clid);
		if( $time != 0 ) $time = ' time='.$this->escape($time);
		else $time = '';
		if( $reason != '' ) $reason = ' banreason='.$this->escape($reason);
		
		return $this->perform("banclient clid=$clid$time$reason", $parse);
	}
	
	public function r_banlist($parse=TS3_PARSED)
	{
		return $this->perform("banlist", $parse);
	}
	
	public function r_banadd($ip='', $name='', $uid='', $time=0, $reason="", $parse=TS3_PARSED)
	{
		if( $ip != '' ) $ip = ' ip='.$this->escape($ip);
		if( $name != '' ) $name = ' name='.$this->escape($name);
		if( $uid != '' ) $uid = ' uid='.$this->escape($uid);
		
		if( $ip == '' && $name == '' && $uid == '' ) return false;
		
		if( $time != 0 ) $time = ' time='.$this->escape($time);
		else $time = '';
		if( $reason != '' ) $reason = ' banreason='.$this->escape($reason);
		
		return $this->perform("banadd$ip$name$uid$time$reason", $parse);
	}
	
	public function r_bandel($banid)
	{
		$banid = $this->escape($banid);
		
		return $this->performResultless("bandel banid=$banid");
	}
	
	public function r_bandelall()
	{
		return $this->performResultless("bandelall");
	}
	
	/*
	 * ALL FILETRANSFER COMMANDS ARE STILL MISSING 
	 */
	
	public function r_whoami($parse=TS3_PARSED)
	{
		return $this->perform("whoami", $parse);
	}
	
	
	/*
	public function r_($parse=TS3_PARSED)
	{
		return $this->perform("", $parse);
	}
	public function r_()
	{
		return $this->performResultless("");
	}
	*/
}


//$remote = new TS3remote('xxx.xxx.xxx.xxx', 10011);

//var_dump($remote->r_login('admin', 'xxxxxxxx'));
//var_dump($remote->r_use(8));
//var_dump($remote->r_sendtextmessage(1, 2, 'Hi!'));
//var_dump($remote->r_clientpoke(2, 'p0k3d!'));
//var_dump($remote->r_serveredit('virtualserver_name','TS3 Server'));

?>