<?php
/**
 *                              ts3lib.class.php							<br />
 *                              ----------------							<br />
 *   begin                : Sunday, Dec 21, 2009							<br />
 *   copyright            : (C) 2009-2010 RK Programming					<br />
 *   email                : robin@rk-programming.de							<br />
 *   version              : 1.1.0											<br />
 *   last modified        : Tuesday, Dec 29, 2009							<br />
 *
 * @author		RK Programming <robin@rk-programming.de>
 * @copyright	Copyright (c) 2009-2010, Robin K.
 * @version		1.1.0
 
 
 	TS3webinterface is free software. You can redistribute it and/or modify			
	it under the terms of the GNU General Public License as published by	
	the Free Software Foundation, version 1.3.
	
**/


define('TS3LIB_VERSION', '1.1.0');

set_time_limit(15);

define("TS3_OK",    true);
define("TS3_ERROR", false);

define("TS3_PARSED", true);
define("TS3_RAW",    false);

define("NL", '
');

class TS3lib
{
	private $socket;
	private $errorArray;
	private $deEscapeResults;
	private $performLog;
	
	function __construct($ip, $port)
	{
		$this->connected = false;
		$this->errorArray = array();
		$this->deEscapeResults = true;
		$this->performLog = array();
		
		$this->socket = fsockopen($ip, $port, $errno, $error, 5);
		stream_set_timeout($this->socket, 3);
		
		if( !is_resource($this->socket) || !$this->socket )
		{
			echo '<p>TS3lib error: connection failed: '.$errno.' '.$error.'</p>';
			/* $this->errorArray = array('error', $errnom, 'connection failed: '.$error); */ 
		}
		else
		{
			if( strpos(fgets($this->socket), 'TS3') === false )
			{
				echo ' - TS3lib error: no TS3 service running - '."\n";
				$this->errorArray = array('error', 0, 'no TS3 service running');
			}
			/*else
			{
				echo ' - TS3lib notice: TS3 service running - '."\n";
			}*/
		}
	}
	
	
	function __destruct()
	{
		$this->disconnect();
	}
	
	public function disconnect()
	{
		if( !$this->socket ) return;
		else if( is_resource($this->socket) )
		{
			fputs($this->socket, 'quit'."\n");
			fclose($this->socket);
			
			$this->performLog[] = 'quit';
		}
	}
	
	// alias for disconnect()
	public function close()
	{
		$this->disconnect();
	}
	
	public function isConnected()
	{
		if( is_resource($this->socket) )
			return true;
		else
			return false;
	}
	
	
	public function getError()
	{
		$tmpErrorArray = $this->errorArray;		// backup error array
		$this->errorArray = array();			// clear error array
		
		return $this->de_escape($tmpErrorArray);		// return backup error array
	}
	
	public function getLog()
	{
		return $this->performLog;
	}
	
	
	public function setDeEscapeResults($val)
	{
		$this->deEscapeResults = (bool)$val;
	}
	public function getDeEscapeResults()
	{
		return $this->deEscapeResults;
	}
	
	private function readResponse()
	{
		$result = '';
		$tmp = '';
		
		do
		{
			$tmp = fgets($this->socket);
			$result .= $tmp;
		} while ( preg_match('/id=[0-9]+? msg=.*/', $tmp, $tmparray) === 0 );
		
		return $result;
	}
	
	public function perform($command, $parse=TS3_PARSED)
	{
		if( !$this->socket ) return false;
		
		
		fputs($this->socket, $command."\n");
		$this->performLog[] = $command;
		
		if( $parse == TS3_PARSED )
		{
			if( $this->deEscapeResults )
				return $this->de_escape($this->parseResult($this->readResponse()));
			else
				return $this->parseResult($this->readResponse());
		}
		else
		{
			return trim($this->readResponse());
		}
	}
	
	
	public function performResultless($command)
	{
		if( !$this->socket ) return false;
		
		
		fputs($this->socket, $command."\n");
		$this->performLog[] = $command;
		
		return $this->checkResult($this->readResponse());
	}
	
	public function checkResult($resultString)
	{
		if( strpos($resultString, 'id=0 msg=ok') === false )
		{
			$tmparray = array();
			preg_match('/id=([0-9]+?) msg=(.*)/', $resultString, $tmparray);
			
			array_unshift($tmparray, 'ERROR');
			
			
			$this->errorArray = $tmparray;
			
			return false;
		}
		else
		{
			return true;
		}
	}
	
	private function parseResult($resultString)
	{
		if( $checkResult = $this->checkResult($resultString) )
		{
			// parse
			$result = array();
			
			$resultVars = explode('error id=', $resultString, -1);
			
			$resultVarsSplitted = explode('|', trim($resultVars[0]));
			
			$count = count($resultVarsSplitted);
			for($i=0; $i<$count; $i++)
			{
				$resultVarsSplitted[$i] = explode(' ', $resultVarsSplitted[$i]);
				
				$countSub = count($resultVarsSplitted[$i]);
				for($t=0; $t<$countSub; $t++)
				{
					if( strpos($resultVarsSplitted[$i][$t], '=') === false )
					{
						$resultVarsSplitted[$i][$t].= '=';
					}
					$resultVarsSplitted[$i][$t] = explode('=', $resultVarsSplitted[$i][$t], 2);
					$result[$i][$resultVarsSplitted[$i][$t][0]] = $resultVarsSplitted[$i][$t][1];
				}
			}
			
			//if( count($result) == 1 ) $result = $result[0];
			
			return $result;
		}
		else
		{
			return $checkResult;
		}
	}
	
	
	
	public function escape($string)
	{
		$search =  array('\\',   '/',   ' ',   '|',   "\n");
		$replace = array('\\\\', '\\/', '\\s', '\\p', '\\n');
		
		if( is_array($string) )
		{
			foreach($string as $key => $value )
			{
				if( is_array($string[$key]) )
				{
					$string[$key] = $this->escape($string[$key]);
				}
				else
				{
					$string = str_replace($search, $replace, $string);
				}
			}
		}
		else if( is_string($string) )
		{
			$string = str_replace($search, $replace, $string);
		}
		
		return $string;
	}
	
	public function de_escape($string)
	{
		$search =  array('\\n', '\\p', '\\s', '\\/', '\\\\');
		$replace = array('\n',  '|',   ' ',   '/',   '\\');
		
		if( is_array($string) )
		{
			foreach($string as $key => $value )
			{
				if( is_array($string[$key]) )
				{
					$string[$key] = $this->de_escape($string[$key]);
				}
				else
				{
					$string = str_replace($search, $replace, $string);
				}
			}
		}
		else if( is_string($string) )
		{
			$string = str_replace($search, $replace, $string);
		}
		
		return $string;
	}
}





//print_r($result = $ts3->perform('serverlist', TS3_PARSED));
/*var_dump($result = $ts3->performResultless('use 8'));

var_dump($result = $ts3->performResultless('login client_login_name=admin client_login_password=xxxx'));

print_r($result = $ts3->perform('clientlist', TS3_PARSED));

var_dump($result = $ts3->performResultless('clientmove clid=3 cid=51'));
sleep(1);
var_dump($result = $ts3->performResultless('clientmove clid=3 cid=55'));
sleep(1);
var_dump($result = $ts3->performResultless('clientmove clid=3 cid=56'));
sleep(1);
var_dump($result = $ts3->performResultless('clientmove clid=3 cid=51'));
sleep(1);
var_dump($result = $ts3->performResultless('clientmove clid=3 cid=55'));
sleep(1);
var_dump($result = $ts3->performResultless('clientmove clid=3 cid=56'));*/





//$ts3 = new TS3lib('xxx.xxx.xxx', 10011);
//
//$ts3->disconnect();





/*$param = "Test String fürs escapen|ziemlich X\\X normal/anders
oder nicht?\nder autor denkt nichts\nziemlich sinnlos ;)";

echo $param.'

'.$ts3->escape($param).'

'.$ts3->de_escape($ts3->escape($param));*/

?>