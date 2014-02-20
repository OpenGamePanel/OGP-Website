<?php

// Class by Boylett
// Released under GNU/GPL.

// Designed for IVMP 0.1 Beta T4

class IVMPQuery
{
    var $socket = false;
    var $ip = false;
    var $port = false;

    function Query($ip,$port,&$errno,&$errstr,$timeout = 5,$gettimeout = 1)
    {
        $this->Close();
        $this->ip = $ip;
        $this->port = $port;
        $this->socket = @fsockopen('udp://'.$ip,$port,$errno,$errstr,$timeout);

        if($this->socket === false) return false;
        @stream_set_timeout($this->socket,$gettimeout);
        return true;
    }

    function Close()
    {
        if($this->socket !== false)
        {
            fclose($this->socket);
            $this->socket = false;
        }
    }

    function GetPacketData($command)
    {
		$packet = 'IVMP';
        $packet .= $command;
        return $packet;
    }

    function ServerData()
    {
		fputs($this->socket,$this->GetPacketData('i'));
		@fread($this->socket,5); // IVMPi
		
        $len = ord(@fread($this->socket,4));		
        $hostname = @fread($this->socket,$len); // read hostname
        $players = ord(@fread($this->socket,4)); // read players
        $maxplayers = ord(@fread($this->socket,4)); // read max players
        $passworded = ord(@fread($this->socket,1)); // 1 byte for password

        return array(
            'hostname' => $hostname,
            'players' => $players,
            'maxplayers' => $maxplayers,
            'passworded' => (bool)$passworded
        );
    }

    function Players()
    {
		fputs($this->socket,$this->GetPacketData('l'));
		@fread($this->socket,5); // IVMPl
		
        $count = ord(@fread($this->socket,4));
		$arr = array();
		for($i = 0; $i < $count; $i++)
		{
			$id = ord(@fread($this->socket,4));
			$len = ord(@fread($this->socket,4));
			$arr[$id] = @fread($this->socket,$len);
		}
		
		return $arr;
    }
}

?>