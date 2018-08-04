<?php
/**
 *                          ts3webinterface.class.php						<br />
 *                          -------------------------						<br />
 *   begin                : Sunday, Dec 24, 2009							<br />
 *   copyright            : (C) 2009-2010 RK Programming					<br />
 *   email                : robin@rk-programming.de							<br />
 *   version              : 0.3.6											<br />
 *   last modified        : Tuesday, Dec 29, 2009							<br />
 *
 * @author		RK Programming <robin@rk-programming.de>
 * @copyright	Copyright (c) 2009-2010, Robin K.
 * @version		0.3.6
 
 
 	TS3webinterface is free software. You can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, version 1.3.
	
**/

define('TS3WEBINTERFACE_VERSION', '0.3.6');

require_once('ts3remote.class.php');

function getAssignedServerUsers()
{
	global $db;
	$ts3vservers = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXts3_homes 
									 WHERE vserver_id='".
									 TS3WEBINTERFACE_VSERVER_ID."' AND rserver_id=".
									 $_SESSION['rserver_id'] );
	if($ts3vservers != FALSE)
	{
		$users_assigned = array();
		foreach($ts3vservers as $ts3vserver)
		{
			if($ts3vserver['user_id'] != $_SESSION['user_id'])
				$users_assigned[] = $ts3vserver['user_id'];
		}
	}
	$subusers = $db->getUsersSubUsersIds($_SESSION['user_id']);
	$subusersb = array();
	$subusers_list = array();
	if(is_array($subusers))
	{
		foreach($subusers as $subuser)
		{
			if(!in_array($subuser,$users_assigned))
				$subusers_list[] = $db->getUserById($subuser);
			$subusersb[] = $subuser;
		}
		if(empty($subusers_list))
			$subusers_list = FALSE;
	}
	if(is_array($users_assigned))
	{
		$subusers_assigned_list = array();
		foreach($users_assigned as $user_assigned)
		{
			if(in_array($user_assigned,$subusersb))
				$subusers_assigned_list[] = $db->getUserById($user_assigned);
		}
		if(empty($subusers_assigned_list))
			$subusers_assigned_list = FALSE;
	}
	return array('users_assigned' => $users_assigned,
				 'subusers' => $subusersb,
				 'subusers_assigned_list' => $subusers_assigned_list,
				 'subusers_list' => $subusers_list);
}

class TS3webinterface
{
	private $serverIP;
	private $serverPort;
	private $server;
	private $errorString;
	private $session;
	private $template;
	private $language;
	
	function __construct($ip, $port)
	{
		global $db;
		$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
		
		$this->loadLanguage();
		
		$this->server = new TS3remote($ip, $port);
		
		// CHECK IF CONNECTED
		$tmpConnectError = $this->server->getError();
		if( !empty($tmpConnectError) )
		{
			die($this->language['error'].' '.$tmpConnectError[1].': '.$tmpConnectError[2]);
		}
		$this->server->r_clientupdate(array(array('client_nickname', 'TS3webinterface Client | by Prookie')));
		
		$this->server->setDeEscapeResults(true);
		
		$this->template = null;
		
		$this->serverIP = $ip;
		$this->serverPort = $port;
		
		$this->errorString = '';
		
		$this->session = $_SESSION;
		
		if( !isset($this->session['loggedin']) )   $this->session['loggedin']   = false;
		if( !isset($this->session['lvserver']) )   $this->session['lvserver']   = 0;
		if( !isset($this->session['luser']) )      $this->session['luser']      = '';
		if( !isset($this->session['lpwd']) )       $this->session['lpwd']       = '';
		if( !isset($this->session['lastaction']) ) $this->session['lastaction'] = 0;
		
		$user = TS3WEBINTERFACE_NAME;
		$password = TS3WEBINTERFACE_PWD;
		
		if( !empty($user) && !empty($password) )
		{
			if( $this->checkLoginData(TS3WEBINTERFACE_NAME, TS3WEBINTERFACE_PWD) )
			{
				$this->session['loggedin'] = true;
				$this->session['luser']    = TS3WEBINTERFACE_NAME;
				$this->session['lpwd'] = TS3WEBINTERFACE_PWD;
				if ( !$isAdmin )
					$this->session['lvserver'] = TS3WEBINTERFACE_VSERVER_ID;
				$this->session['lastaction'] = time();
			}
		}
		
		if( $isAdmin AND isset( $_GET['changevServer'] ) )
		{
				$this->session['lvserver'] = 0;
		}
		else if( $isAdmin AND isset( $_POST['vserverSubmit'] ) && !empty( $_POST['vserver'] ) )
		{
			$this->session['lvserver'] = $_POST['vserver'];
		}
		
		if( $this->checkSession() )
		{
			if( !$this->login() )
			{
				echo 'TS3webinterface ERROR: '.$this->errorString;
				
				$this->renewSession();
			}
			else
			{
				$this->switchAction();
			}
		}
		else
		{
			$this->initSmarty();
			
			$this->template->assign('title', $this->language['title'].' :: Login');
			$this->template->display('header.tpl');
			
			$this->template->display('loginForm.tpl');
			
			$this->template->display('footer.tpl');
		}
		
		$this->server->disconnect();
	}
	
	function __destruct()
	{
		$_SESSION = $this->session;
	}
	
	private function initSmarty()
	{
		require_once('smarty/Smarty.class.php');
	
		$this->template = new Smarty();
		$this->template->compile_check = true;
		$this->template->debugging = false;

		$this->template->template_dir = dirname(__FILE__) .'/templates';
		$this->template->compile_dir = dirname(__FILE__) .'/templates_c';
		
		if( is_array($this->language) )
		{
			$this->template->assign('lang', $this->language);
		}
		else
		{
			die('TS3webinterface ERROR: no language file available');
		}
		
		$this->template->assign_by_ref('webinterface', $this, array('parseTime', 'parseDate', 'convertByteToMB', 'convertByteToKB'));
	}
	
	private function loadLanguage($lang=false)
	{
		$constants = get_defined_constants(true);
		$this->language = $constants['user'];
	}
	
	public function getError()
	{
		$tmp = $this->errorString;
		$this->errorString = '';
		
		return $tmp;
	}
	
	private function renewSession()
	{
		$this->session['loggedin']   = false;
		$this->session['lvserver']   = 0;
		$this->session['luser']      = '';
		$this->session['lpwd']       = '';
		$this->session['lastaction'] = 0;
	}
	
	private function checkSession()
	{
		if( $this->session['loggedin'] === true && $this->session['luser'] != '' &&
			$this->session['lpwd'] != '' && (time()-1800 < $this->session['lastaction']) )
		{
			$this->session['lastaction'] = time();
			return true;
		}
		else if( time()-1800 <= $this->session['lastaction'] )
		{
			$this->errorString .= '['.$this->language['e_session_timedout'].']';
			$this->renewSession();
			return false;
		}
		else
		{
			$this->renewSession();
			return false;
		}
	}
	
	private function checkLoginData($user, $pwd, $vserver=false)
	{
		if( !$this->server->isConnected() ) return false;
		
		if( $vserver )
		{
			if( !$this->server->r_use($vserver) )
			{
				$this->errorString .= '['.$this->language['e_conn_vserver'].']';
				return false;
			}
		}
		
		if( !$this->server->r_login($user, $pwd) )
		{
			$this->errorString .= '['.$this->language['e_conn_serverquery'].']';
			return false;
		}
		
		return true;
	}
	
	
	private function login($vserver=true)
	{
		if( !$this->server->isConnected() ) return false;
		
		if( $vserver )
		{
			if( !$this->server->r_use($this->session['lvserver']) )
			{
				$this->errorString .= '['.$this->language['e_conn_vserver'].']';
				return false;
			}
		}
		
		if( !$this->server->r_login($this->session['luser'], $this->session['lpwd']) )
		{
			$this->errorString .= '['.$this->language['e_conn_serverquery'].']';
			return false;
		}
		
		return true;
	}
	
	
	private function switchAction()
	{
		global $db;

		if( isset($_GET['getchannelbackup']) && $this->session['lvserver'] != 0 )
		{
			if( $channelBackupString = $this->getChannelBackupString() )
			{
				header('Content-Disposition: attachment; filename="ts3wi_channelbackup_vserver'.$this->session['lvserver'].'.txt"');
				header('Content-Type: x-type/subtype');
				echo $channelBackupString;
			}
			$this->server->disconnect();
			exit();
		}
		
		if( isset($_POST['ajaxRequest']) )
		{
			$response = '';
			
			switch($_POST['do'])
			{
				case 'serveredit':
					if( !empty($_POST['serverprop']) && isset($_POST['value']) )
					{
						if( $this->server->r_serveredit(array(array($_POST['serverprop'], $_POST['value']))) )
						{
							$response = array('OK', $_POST['serverprop'], $_POST['value']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
							if( $resolvedError = $this->resolveErrorID($error[2]) )
							{
								$response[2] .= "\n\n".$resolvedError;
							}
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'serverupdate':
					if( !empty($_POST['serverprop']) )
					{
						if( $tmp = $this->server->r_serverinfo() )
						{
							$tmp = $tmp[0];
							
							$response = array('OK');
							
							if( !is_array($_POST['serverprop']) ) $_POST['serverprop'] = array($_POST['serverprop']);
							for($i=0; $i<count($_POST['serverprop']); $i++)
							{
								if( $_POST['serverprop'][$i] == 'virtualserver_uptime' )
								{
									$tmp[$_POST['serverprop'][$i]] = $this->parseTime($tmp[$_POST['serverprop'][$i]]);
								}
								else if( $_POST['serverprop'][$i] == 'connection_bytes_sent_total' || $_POST['serverprop'][$i] == 'connection_bytes_received_total' )
								{
									$tmp[$_POST['serverprop'][$i]] = $this->convertByteToMB($tmp[$_POST['serverprop'][$i]]);
								}
								else if( $_POST['serverprop'][$i] == 'connection_bandwidth_sent_last_second_total' || $_POST['serverprop'][$i] == 'connection_bandwidth_received_last_second_total'
									  || $_POST['serverprop'][$i] == 'connection_bandwidth_sent_last_minute_total' || $_POST['serverprop'][$i] == 'connection_bandwidth_received_last_minute_total' )
								{
									$tmp[$_POST['serverprop'][$i]] = $this->convertByteToKB($tmp[$_POST['serverprop'][$i]]);
								}
								$response[] = array($_POST['serverprop'][$i], $tmp[$_POST['serverprop'][$i]]);
							}
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
				
				case 'startserver':
				case 'stopserver':
					if( !empty($_POST['serverid']) )
					{
						$actionDone = '';
						
						if( $_POST['do'] == 'startserver' )
						{
							$tmp = $this->server->r_serverstart($_POST['serverid']);
							$actionDone = 'serverstart';
						}
						else if( $_POST['do'] == 'stopserver' )
						{
							$tmp = $this->server->r_serverstop($_POST['serverid']);
							$actionDone = 'serverstop';
						}
						
						if( $tmp )
						{
							$response = array('OK', $_POST['serverid'], $actionDone);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'deleteserver':
					if( !empty($_POST['serverid']) )
					{
						$this->server->r_serverstop($_POST['serverid']);
						if( $this->server->r_serverdelete($_POST['serverid']) )
						{
							$response = array('OK', $_POST['serverid'], 'serverdelete');
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'deletetoken':
					if( !empty($_POST['token']) )
					{
						if( $this->server->r_tokendelete($_POST['token']) )
						{
							$response = array('OK', $_POST['token']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'serverviewupdate':
					$this->initSmarty();
					$this->template->assign('serverTree', $this->getLiveview());
					$this->template->display('liveview.tpl');
					break;
				
				case 'clientkick':
					if( !empty($_POST['clid']) )
					{
						if( $this->server->r_clientkick($_POST['clid']) )
						{
							$response = array('OK', $_POST['clid']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'clientban':
					if( isset($_POST['clid']) && isset($_POST['duration']) && isset($_POST['reason']) )
					{
						if( $this->server->r_banclient($_POST['clid'], $_POST['duration'], $_POST['reason']) )
						{
							$response = array('OK', $_POST['clid']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
				break;
					
				case 'clientmove':
					if( !empty($_POST['clid']) && !empty($_POST['cid']) )
					{
						if( $this->server->r_clientmove($_POST['clid'], $_POST['cid']) )
						{
							$response = array('OK', $_POST['clid'], $_POST['cid']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'clientpoke':
					if( !empty($_POST['clid']) && isset($_POST['msg']) )
					{
						if( $this->server->r_clientpoke($_POST['clid'], $_POST['msg']) )
						{
							$response = array('OK', $_POST['clid']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'clientmsg':
					if( !empty($_POST['cid']) && !empty($_POST['mode']) && isset($_POST['msg']) )
					{
						if( $this->server->r_sendtextmessage($_POST['mode'], $_POST['cid'], $_POST['msg']) )
						{
							$response = array('OK', $_POST['cid'], $_POST['mode']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'deleteban':
					if( !empty($_POST['banid']) )
					{
						if( $this->server->r_bandel($_POST['banid']) )
						{
							$response = array('OK', $_POST['banid']);
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
					break;
					
				case 'addban':
					if( isset($_POST['ip']) && isset($_POST['name']) && isset($_POST['uid']) && isset($_POST['reason']) && isset($_POST['duration']) )
					{
						if( $this->server->r_banadd($_POST['ip'], $_POST['name'], $_POST['uid'], $_POST['duration'], $_POST['reason']) )
						{
							$response = array('OK');
						}
						else
						{
							$error = $this->server->getError();
							$response = array('ERROR', $error[2], $this->language['n_server_responded'].' '.$error[3]);
						}
					}
					else
					{
						$response = array('ERROR', 2, 'missing arguments');
					}
				break;
				
				case 'banlistupdate':
					$this->initSmarty();
					if( is_array($this->language) )
						$this->template->assign('lang', $this->language);
					else
						die('TS3webinterface ERROR: no language file available');
					$this->template->assign('banList', $this->server->r_banlist());
					$this->template->display('banlist.tpl');
					break;
					
				default:
					$response = array('ERROR', 1, 'unknown action requested');
			}
			
			if( !empty($response) )
				echo json_encode($response);
		}
		else
		{
			// normal
			$this->initSmarty();
			
			if( $this->session['lvserver'] == 0 )
			{
				$this->template->display('header.tpl');

				$addData = array();
				
				if( isset($_GET['do']) && $_GET['do'] == 'addserver' )
				{
					if( isset($_POST['serverAddSubmit']) && !empty($_POST['servername']) && !empty($_POST['serverslots']) )
					{
						if( $addData = $this->server->r_servercreate($_POST['servername'], array(array('virtualserver_maxclients', $_POST['serverslots']))) )
						{
							$addData = $addData[0];
							array_unshift($addData, 'OK');
						}
						else
						{
							$error = $this->server->getError();
							$addData = array('ERROR', $error[2], $this->language['n_server_responded'].$error[3]);
						}
					}
					else
					{
						$addData = array('ERROR', 0, $this->language['e_fill_out']);
					}
				}
				
				$vServerList = $this->server->r_serverlist();
				if( !isset($vServerList[0]) )
				{
					$tmp = array($vServerList);
					$vServerList = $tmp;
				}

				$getPublicIp = $db->resultQuery("SELECT display_public_ip FROM OGP_DB_PREFIXremote_servers WHERE remote_server_id=".$_SESSION['rserver_id']);
				$display_ip = checkDisplayPublicIP($getPublicIp[0]['display_public_ip'],$this->serverIP);

				$this->template->assign('IP', $this->serverIP);
				$this->template->assign('display_public_ip', $display_ip);
				$this->template->assign('selectvServer', $vServerList);
				$this->template->assign('addData', $addData);

				$updateAvailable = $this->checkForUpdate();
				$this->template->assign('updateAvailable', $updateAvailable);
				if( $updateAvailable != "" )
				{
					$this->template->display('updateAvailable.tpl');
				}

				$this->template->display('selectvServer.tpl');

				$this->template->display('footer.tpl');
			}
			else
			{
				if( isset($_GET['liveview']) ) $this->template->assign('liveviewAutoUpdate', true);
				else $this->template->assign('liveviewAutoUpdate', false);
				
				$this->template->display('header.tpl');
				
				$updateAvailable = $this->checkForUpdate();
				$this->template->assign('updateAvailable', $updateAvailable);
				if( $updateAvailable != "" )
				{
					$this->template->display('updateAvailable.tpl');
				}
				
				$infoBoxData = $this->server->r_serverinfo();
				$this->template->assign('data', $infoBoxData[0]);
				
				
				if( isset($_GET['token']) )
				{
					$addToken = array();
					
					if( isset($_GET['do']) && $_GET['do'] == 'addtoken' )
					{
						$tokenid1 = false;
						$tokenid2 = false;
						
						if( isset($_POST['tokentype']) )
						{
							switch((int)$_POST['tokentype'])
							{
							case 0:
								if( !isset($_POST['tokenid1_0']) ) break;
								
								$tokenid1 = $_POST['tokenid1_0'];
								$tokenid2 = 0;
								
								break;
							case 1:
								if( !isset($_POST['tokenid1_1']) || !isset($_POST['tokenid2_1']) ) break;
								
								$tokenid1 = $_POST['tokenid1_1'];
								$tokenid2 = $_POST['tokenid2_1'];
								
								break;
							}
						}
						
						if( $tokenid1 !== false )
						{
							if( $this->server->r_tokenadd($_POST['tokentype'], $tokenid1, $tokenid2) )
							{
								$addToken = array('OK');
							}
							else
							{
								$error = $this->server->getError();
								$addToken = array('ERROR', $error[2], $this->language['n_server_responded'].$error[3]);
							}
						}
						else
						{
							$addToken = array('ERROR', 0, $this->language['e_fill_out']);
						}
					}
					
					$this->template->assign('addToken', $addToken);
					
					
					$this->template->assign('tokenList', $this->server->r_tokenlist());
					
					
					$serverGroupList = $this->server->r_servergrouplist();
					$serverGroupListNames = array();
					for($i=0; $i<count($serverGroupList); $i++)
					{
						$serverGroupListNames[$serverGroupList[$i]['sgid']] = $serverGroupList[$i];
					}
					$this->template->assign('serverGroupList', $serverGroupList);
					$this->template->assign('serverGroupListNames', $serverGroupListNames);
					
					$channelGroupList = $this->server->r_channelgrouplist();
					$channelGroupListNames = array();
					for($i=0; $i<count($channelGroupList); $i++)
					{
						$channelGroupListNames[$channelGroupList[$i]['cgid']] = $channelGroupList[$i];
					}
					$this->template->assign('channelGroupList', $channelGroupList);
					$this->template->assign('channelGroupListNames', $channelGroupListNames);
					
					$channelList = $this->server->r_channellist();
					$channelListNames = array();
					for($i=0; $i<count($channelList); $i++)
					{
						$channelListNames[$channelList[$i]['cid']] = $channelList[$i];
					}
					$this->template->assign('channelList', $channelList);
					$this->template->assign('channelListNames', $channelListNames);
					
					
					$this->template->display('vServerToken.tpl');
				}
				else if( isset($_GET['liveview']) )
				{
					$insertResult = array();
					
					if( isset($_FILES['backup']) )
					{
						$insertResult = array('ERROR', 0, $this->language['e_upload_failed']);
						
						$filename = 'modules/TS3Admin/templates_c/channelbackup_'.rand(111,999).rand(111,999).'.txt';
						if( $_FILES['backup']['error'] == 0 && move_uploaded_file($_FILES['backup']['tmp_name'], $filename) )
						{
							if( $this->insertChannelBackup(file_get_contents($filename)) )
							{
								$insertResult = array('OK');
							}
							unlink($filename);
						}
					}
					
					$this->template->assign('insertResult', $insertResult);
					
					
					$this->template->assign('serverTree', $this->getLiveview($infoBoxData[0]));	// serverinfo param for no double query
					
					
					$this->template->assign('banList', $this->server->r_banlist());
					
					$this->template->display('vServerLiveview.tpl');
				}
				else
				{
					global $db;
					$is_parent_user = FALSE;
					$subusers_installed = $db->isModuleInstalled('subusers');
					if( $subusers_installed )
					{
						if(defined('TS3WEBINTERFACE_VSERVER_ID'))
							$assigned_info = getAssignedServerUsers();
						if( isset($_POST['assign_subuser']) and
							in_array($_POST['user_id'],$assigned_info['subusers']) )
						{
							$db->query("INSERT INTO OGP_DB_PREFIXts3_homes 
										(`rserver_id`, `ip`, `pwd`, `vserver_id`, `user_id`) 
										VALUES ('".$_SESSION['rserver_id']."', '".
												   TS3WEBINTERFACE_IP."', '".
												   TS3WEBINTERFACE_PWD."', '".
												   TS3WEBINTERFACE_VSERVER_ID."', '".
												   $_POST['user_id'].
										"');");
							$assigned_info = getAssignedServerUsers();
						}
						if( isset($_POST['unassign_subuser']) and
							is_array($assigned_info['subusers']) and
							in_array($_POST['user_id'],$assigned_info['users_assigned']) and
							in_array($_POST['user_id'],$assigned_info['subusers']) )
						{
							$db->query( "DELETE FROM OGP_DB_PREFIXts3_homes WHERE vserver_id='". 
													TS3WEBINTERFACE_VSERVER_ID."' AND user_id='".
													$_POST['user_id']."' AND rserver_id='".
													$_SESSION['rserver_id'].
											"';" );
							$assigned_info = getAssignedServerUsers();
						}
						if(defined('TS3WEBINTERFACE_VSERVER_ID'))
						{
							$this->template->assign('subusers_assigned', $assigned_info['subusers_assigned_list']);
							$this->template->assign('subusers', $assigned_info['subusers_list']);
							$is_parent_user = is_array($assigned_info['subusers']);
						}
					}
					$this->template->assign('is_parent_user', $is_parent_user);
					$this->template->assign('subusers_installed', $subusers_installed);

					$getPublicIp = $db->resultQuery("SELECT display_public_ip FROM OGP_DB_PREFIXremote_servers WHERE remote_server_id=".$_SESSION['rserver_id']);
					$display_ip = checkDisplayPublicIP($getPublicIp[0]['display_public_ip'],$this->serverIP);

					$this->template->assign('display_public_ip', $display_ip);

					$this->template->assign('IP', $this->serverIP);
					$this->template->display('vServerOverview.tpl');
				}
				
				$this->template->display('footer.tpl');
			}
		}
	}
	
	private function getLiveview($server=false)
	{
		if( !$server )
		{
			$server = $this->server->r_serverinfo();
			if( !$server )
			{
				$errArray = $this->server->getError();
				echo strtoupper($this->language['error']).' #'.$errArray[2].': '.$this->language['n_server_responded'].' \''.$errArray[3].'\'';
				return false;
			}
			$server = $server[0];
		}
		else
		{
			if( !empty($server[0]) )
				$server = $server[0];
		}
		
		$channels = $this->server->r_channellist(true, true, true, true);
		if( !$channels )
		{
			$errArray = $this->server->getError();
			echo strtoupper($this->language['error']).' #'.$errArray[2].': '.$this->language['n_server_responded'].' \''.$errArray[3].'\'';
			return false;
		}
		
		
		$clients = $this->server->r_clientlist(true, true, true, true, true);
		if( !$clients )
		{
			$errArray = $this->server->getError();
			echo strtoupper($this->language['error']).' #'.$errArray[2].': '.$this->language['n_server_responded'].' \''.$errArray[3].'\'';
			return false;
		}
		
		function sortClients($a, $b)
		{
			if( strpos(',', $a['client_servergroups']) !== false )
			{
				$aID = explode(',', $a['client_servergroups'], 2);
				$aID = $aID[0];
			}
			else
			{
				$aID = $a['client_servergroups'];
			}
			
			if( strpos(',', $b['client_servergroups']) !== false )
			{
				$bID = explode(',', $b['client_servergroups'], 2);
				$bID = $bID[0];
			}
			else
			{
				$bID = $b['client_servergroups'];
			}
			
			if( $aID > $bID ) return 1;
			if( $aID < $bID ) return -1;
			if( $aID = $bID ) return 0;
		}
		
		usort($clients, "sortClients");
		
		$pidStack = array(0);
		$lastLevel = array();
		
		$cidConnection = array();
		$channelNum = count($channels);
		for($i=0; $i<$channelNum; $i++)
		{
			$cidConnection[$channels[$i]['cid']] = $i;
			
			$channels[$i]['is_last_channel'] = false;
			
			/*if( $channels[$i]['pid'] != $pidStack[count($pidStack)-1] )
			{
				if( in_array($channels[$i]['pid'], $pidStack) )
				{
					do
					{
						array_pop($pidStack);
					} while( in_array($channels[$i]['pid'], $pidStack) && count($pidStack) > 1 );
					//$pidStack[] = $channels[$i]['pid'];
					$channels[$i]['is_last_channel'] = true;
				}
				else
				{
					$pidStack[] = $channels[$i]['pid'];
				}
			}*/
			//$channels[$i]['level'] = count($pidStack)-1;
			
			if( $channels[$i]['pid'] == 0 ) $channels[$i]['level'] = 0;
			else $channels[$i]['level'] = $channels[$cidConnection[$channels[$i]['pid']]]['level'] + 1;
			
			
			$channels[$i]['is_server'] = false;
			$channels[$i]['clients'] = array();
			
			$lastLevel[$channels[$i]['level']] = $i;
		}
		
		/*$reversedCounter = count($channels)-1;
		do
		{
			
			if( $channels[$reversedCounter]['pid'] == 0 )
			{
				$channels[$reversedCounter]['is_last_channel'] = true;
				break;
			}
			$reversedCounter--;
		} while( $reversedCounter >= 0 );*/
		for($i=0; $i<$channelNum; $i++)
		{
			if( !isset($channels[$i-1]) && !isset($channels[$i+1]) ) 
			{
				$channels[$i]['mode'] = 'l';
				//continue;
			}
			else if( isset($channels[$i-1]) && !isset($channels[$i+1]) )
			{
				$channels[$i]['mode'] = 'l';
				//continue;
			}
			else if( !isset($channels[$i-1]) && isset($channels[$i+1]) )
			{
				$channels[$i]['mode'] = 't';
				//continue;
			}
			
			else if( $channels[$i]['level'] == $channels[$i+1]['level'] )
			{
				$channels[$i]['mode'] = 't';
			}
			else if( $channels[$i]['level'] > $channels[$i+1]['level'] )
			{
				$channels[$i]['mode'] = 'l';
			}
			else
			{
				if( $lastLevel[$channels[$i]['level']] == $i )
				{
					$channels[$i]['mode'] = 'l';
				}
				else
				{
					$channels[$i]['mode'] = 't';
				}
			}
			
			//$channels[$i]['TEST'] = $i;
			if( $channels[$i]['pid'] != 0 )
			{
				$before = array();
				
				//$subtractLevels = 0;
				
				//$tmp = $channels[$cidConnection[$channels[$i]['pid']]];
				//$tmpPID = $channels[$i]['pid'];
				//echo $tmpPID.' ';
				$tmp = $channels[$cidConnection[$channels[$i]['pid']]];
				//echo $channels[$i]['pid'].'='.$cidConnection[$channels[$i]['pid']].' ';
				//var_dump($channels[$cidConnection[$channels[$i]['pid']]]['is_last_channel']);
				$tmpPID = $channels[$i]['pid'];
				//if( $tmp['mode'] == 'l' ) $subtractLevels++;
				if( $tmp['mode'] != 'l' )
					array_unshift($before, 'line_i');
				else
					array_unshift($before, 'spacer');
				
				//for($ii=$channels[$i]['level']; $ii>0; $ii--)
				while(true)
				{
					
					
					
					$tmpPID = $tmp['pid'];
					if( /*$tmpPID != 0 &&*/ isset($cidConnection[$tmpPID]) && isset($channels[$cidConnection[$tmpPID]]) )
						$tmp = $channels[$cidConnection[$tmpPID]];
					else
						break;
					//echo $tmpPID.' ';
					
					
					
					if( $tmp['mode'] != 'l' )
						array_unshift($before, 'line_i');
					else
						array_unshift($before, 'spacer');
					
					//if( $tmp['mode'] != 'l' ) break;
					
					//$subtractLevels++;
				}
				
				$channels[$i]['draw_before'] = $before;
				//print_r($before);
				
				//$channels[$i]['num_i_lines'] = $channels[$i]['level'] - $subtractLevels;
				//$channels[$i]['num_spacers'] = $subtractLevels;
			}
		}
		
		$clientNum = count($clients);
		for($i=0; $i<$clientNum; $i++)
		{
			if( $clients[$i]['client_input_hardware'] == '0' ) $clients[$i]['status_img'] = '16x16_hardware_input_muted';
			else if( $clients[$i]['client_output_muted'] == '1' ) $clients[$i]['status_img'] = '16x16_output_muted';
			else if( $clients[$i]['client_input_muted'] == '1' ) $clients[$i]['status_img'] = '16x16_input_muted';
			else if( $clients[$i]['client_flag_talking'] == '1') $clients[$i]['status_img'] = '16x16_player_on';
			else $clients[$i]['status_img'] = '16x16_player_off';
			
			$channels[$cidConnection[$clients[$i]['cid']]]['clients'][] = $clients[$i];
			$channels[$cidConnection[$clients[$i]['cid']]]['clients'][(count($channels[$cidConnection[$clients[$i]['cid']]]['clients']))-1]['level'] = $channels[$cidConnection[$clients[$i]['cid']]]['level'] + 1;
			$clients[$i]['level'] = $channels[$cidConnection[$clients[$i]['cid']]]['level'] + 1;
		}
		
		array_unshift($channels, array(
										'channel_name' => $server['virtualserver_name'],
										'cid' => $server['virtualserver_id'],
										'is_server' => true
		));
		
		return $channels;
	}
	
	private function getChannelBackupString()
	{
		$this->server->setDeEscapeResults(false);
		
		$result = $this->server->r_channellist(true, true, true, true);

		if( !$result )
		{
			$errArray = $ts->getError();
			echo 'ERROR #'.$errArray[2].': the server returned: \''.$errArray[3].'\'';
			return false;
		}

		$channels = array();
		$cidConnection = array();
		
		$channelNum = count($result);
		for($i=0; $i<$channelNum; $i++ )
		{
			$cidConnection[$result[$i]['cid']] = $i;
			
			$tmp = $this->server->r_channelinfo($result[$i]['cid']);
			if( !$tmp )
			{
				echo "channelinfo failed\n";
				return false;
			}
			else
			{
				$result[$i] = array_merge($result[$i], $tmp[0]);
			}
			
			if( $result[$i]['pid'] != 0 )
			{
				$result[$i]['pid'] = $cidConnection[$result[$i]['pid']];
			}
			if( $result[$i]['channel_order'] != 0 )
			{
				$result[$i]['channel_order'] = $cidConnection[$result[$i]['channel_order']];
			}
			
			unset($result[$i]['cid']);
			unset($result[$i]['total_clients']);
			unset($result[$i]['channel_filepath']);
		}
		
		$this->server->setDeEscapeResults(true);
		
		return json_encode($result);
	}
	
	private function insertChannelBackup($backup)
	{
		if( !$backup = json_decode($backup, true) )
		{
			echo "json parse error\n";
			return false;
		}

		$cidConnection = array();
		
		$backupNum = count($backup);

		for($i=0; $i<$backupNum; $i++)
		{
			$tmpCreate = array();
			
			$channelPropNum = count($backup[$i]);
			foreach($backup[$i] as $key => $value)
			{
				if( $key == 'pid' || $key == 'channel_order' || $key == 'channel_name' ) continue;
				
				$tmpCreate[] = array($key, $value);
			}

			$tmp = $this->server->r_channelcreate($backup[$i]['channel_name'], $tmpCreate, '', false);
			
			if( !$tmp )
			{
				echo "channelcreate error\n";
				return false;
			}
			else
			{				
				if( $backup[$i]['pid'] != 0 )
				{
					if( $backup[$i]['channel_order'] == 0 ) $channelOrder = 0;
					else $channelOrder = $cidConnection[$backup[$i]['channel_order']];
					
					if( !$this->server->r_channelmove($backup[$i]['cid'], $cidConnection[$backup[$i]['pid']], $channelOrder) )
					{
						echo "channelmove error, ".$backup[$i]['cid']." under ".$cidConnection[$backup[$i]['pid']]."\n";
						return false;
					}
				}
			}
		}
		
		return true;
	}
	
	private function resolveErrorID($id)
	{
		switch($id)
		{
			case 2568:
				return $this->language['e_2568'];
				break;
				
			default:
				return '';
		}
	}
	
	public function parseTime($timeSeconds)
	{
		$timeSeconds = round($timeSeconds);
		
		$days = floor($timeSeconds / 86400);
		$daysForm = ( $days === 1 ) ? $this->language['time_day'] : $this->language['time_days'];
		
		$hours = floor(($timeSeconds % 86400) / 3600);
		$hoursForm = ( $days === 1 ) ? $this->language['time_hour'] : $this->language['time_hours'];
		
		$minutes = floor(($timeSeconds % 3600) / 60);
		$minutesForm = ( $days === 1 ) ? $this->language['time_minute'] : $this->language['time_minutes'];
		
		$seconds = $timeSeconds % 60;
		$secondsForm = ( $days === 1 ) ? $this->language['time_second'] : $this->language['time_seconds'];
		
		return "$days $daysForm, $hours $hoursForm, $minutes $minutesForm, $seconds $secondsForm";
	}
	public function parseDate($timeSeconds, $add=0, $format='r')
	{
		if( $add != 0 ) $timeSeconds += $add;
		
		return date($format, $timeSeconds);
	}
	
	public function convertByteToMB($num, $prec=2)
	{
		return round($num/1024/1024, $prec);
	}
	
	public function convertByteToKB($num, $prec=2)
	{
		return round($num/1024, $prec);
	}
	
	private function checkForUpdate()
	{
		return '';
	}
}
?>