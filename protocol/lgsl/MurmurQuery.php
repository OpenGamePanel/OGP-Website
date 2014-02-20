<?php

/**
 * Murmur Query Class
 *
 * Based on GT MURMUR PLUGIN, which allows us to query a Murmur server
 * without having to install PHP ICE on the web server.
 * @link http://www.gametracker.com/downloads/gtmurmurplugin.php
 *
 * The response is constructed using Channel Viewer Protocol.
 * @link http://mumble.sourceforge.net/Channel_Viewer_Protocol
 *
 * @author		Edmundas Kondrašovas <as@edmundask.lt>
 * @license		http://www.opensource.org/licenses/MIT
 * @copyright	Copyright (c) 2011 Edmundas Kondrašovas <as@edmundask.lt>
 * @version		0.6
 *
 */

 class MurmurQuery
 {
 	/* Packets */
 	const Q_XML		= "\x78\x6D\x6C";
 	const Q_JSON	= "\x6A\x73\x6F\x6E";

 	private $users = array();
 	private $channels = array();

 	private $socket;

 	private $host;
 	private $port;
 	private $timeout;
 	private $format;

 	private $response;

 	private $status;
 	private $raw;
 	private $online = false;

 	/**
	* Constructor
	*
	* @access	public
	* @param	string			hostname 
	* @param	integer			port (optional)
	* @param	integer			timeout in miliseconds (optional)
	* @param	string			format (optional)
	* @return	void
	*/

 	public function __construct($host = '', $port = 27800, $timeout = 200, $format = 'json')
 	{
 		if(!empty($host))
 		{
 			$this->setup($host, $port, $timeout, $format);
	 		$this->query();
 		}
 	}

 	/**
	* Set the parameters
	*
	* @access	public
	* @param	string/array	hostname or settings array
	* @param	integer			port (optional)
	* @param	integer			timeout in miliseconds (optional)
	* @param	string			format (optional)
	* @return	void
	*/

 	public function setup($host, $port = 27800, $timeout = 200, $format = 'json')
 	{
 		if(is_array($host))
 		{
 			$this->host = array_key_exists('host', $host) ? $host['host'] : '';
 			$this->port = array_key_exists('port', $host) ? $host['port'] : $port;
 			$this->timeout = array_key_exists('timeout', $host) ? $host['timeout'] : $timeout;
 			$this->format = array_key_exists('format', $host) ? $host['format'] : $format;
 		}
 		else
 		{
 			$this->host = $host;
 			$this->port = $port;
 			$this->timeout = $timeout;
 			$this->format = $format;
 		}
 	}

 	/**
	* Set data format
	*
	* @access	public
	* @param	string	data format
	* @return	void
	*/

 	public function set_format($format = 'json')
 	{
 		$this->format = $format;
 	}

 	/**
	* Query the server
	*
	* @access	public
	* @return	void
	*/

 	public function query()
 	{
		$this->_connect();
		$this->_send_query($this->format);
		$this->_catch_response();

		if(!empty($this->response)) $this->online = true;

		$this->_close();
 	}

 	/**
	* Get server status
	*
	* @access	public
	* @param	boolean		return raw response
	* @return	mixed		json/xml if set to return raw response or array otherwise
	*/

 	public function get_status($raw = false)
 	{
 		return ($raw) ? $this->raw : $this->status;
 	}

 	/**
	* Get users
	*
	* @access	public
	* @return	array
	*/

 	public function get_users()
 	{
 		return $this->users;
 	}

 	/**
	* Get channels
	*
	* @access	public
	* @return	array
	*/

 	public function get_channels()
 	{
 		return $this->channels;
 	}

 	/**
	* Check if the server is online
	*
	* @access	public
	* @return	bool
	*/

 	public function is_online()
 	{
 		return $this->online;
 	}

 	/**
	* Establish a socket connection
	*
	* @access	private
	* @return	bool
	*/

 	private function _connect()
 	{
 		// We need timeout in seconds for fsockopen()
 		$timeout = ($this->timeout < 1000) ? 1 : ceil($this->timeout / 1000);
		$this->socket = @fsockopen($this->host, $this->port, $errno, $errstr, $this->timeout);

		if(!$this->socket) return false;

		return true;
 	}

 	/**
	* Send query to the server
	*
	* @access	private
	* @param	string	query (should be one the constants defined)
	* @return	void
	*/

	private function _send_query($format)
	{
		$data = '';

		switch($format)
		{
			case 'json':
				$data = self::Q_JSON;
			break;

			case 'xml':
				$data = self::Q_XML;
			break;

			default:
				$data = self::Q_JSON;
			break;
		}

		if($this->socket)
		{
			@fwrite($this->socket, $data);
			stream_set_timeout($this->socket, 0, $this->timeout * 1000);
		}
	}

 	/**
	* Receive response from the server
	*
	* @access	private
	* @return	void
	*/

	private function _catch_response()
	{
		if($this->socket)
		{
			while($resp = @fread($this->socket, 1024)) $this->response .= $resp;
			stream_set_timeout($this->socket, 0, $this->timeout * 1000);

			$this->raw = $this->response;
			$this->status = $this->parse_response($this->response, $this->format);
		}
	}

 	/**
	* Close socket connection
	*
	* @access	private
	* @return	void
	*/

	private function _close()
	{
		if($this->socket) fclose($this->socket);

		$this->response = NULL;
		$this->data = NULL;
		$this->socket = NULL;
	}

	/**
	* Parse data returned from the server
	*
	* @access	public
	* @param	string	xml/json
	* @param	string	format
	* @return	array	parsed data
	*/
	
	public function parse_response($data, $format = 'json')
	{
		switch($format)
		{
			case 'json':
				$parsed_data = $this->_parse_json($data);
			break;

			case 'xml':
				$parsed_data = $this->_parse_xml($data);
			break;

			default:
				$parsed_data = $this->_parse_json($data);
			break;
		}

		return $parsed_data;
	}

 	/**
	* Parse JSON
	*
	* @access	private
	* @param	string	json
	* @return	array	parsed data
	*/

	private function _parse_json($data)
	{
		$parsed_data = array();
		$decoded = json_decode($data, true);

		$this->_parse_channels($decoded);

		$parsed_data['channels'] = $this->channels;
		$parsed_data['users'] = $this->users;
		$parsed_data['original'] = $decoded;

		return $parsed_data;
	}

 	/**
	* Parse XML
	*
	* @access	private
	* @param	string	xml
	* @return	array	parsed data
	*/

	// Does not work properly yet.
	private function _parse_xml($data)
	{
		$parsed_data = array();
		$decoded = simplexml_load_string($data);

		$this->_parse_channels($decoded);

		$parsed_data['channels'] = $this->channels;
		$parsed_data['users'] = $this->users;
		$parsed_data['original'] = $decoded;

		return $parsed_data;
	}

 	/**
	* Parse the channels
	*
	* @access	private
	* @param	array		channels
	* @return	void
	*/

	private function _parse_channels($channels)
	{
		// We'll have to deal with the root channel separately
		if(array_key_exists('root', $channels))
		{
			if(count($channels['root']['users']) > 0)
			{
				foreach($channels['root']['users'] as $user) $this->users[] = $user;
			}

			$tmp = $channels['root']['channels'];

			unset($channels['root']['users']);
			unset($channels['root']['channels']);

			$this->_parse_channels($tmp);
		}
		else
		{
			if(count($channels) > 0)
			{
				foreach($channels as $channel)
				{
					if(count($channel['users']) > 0)
					{
						foreach($channel['users'] as $user) $this->users[] = $user;
					}

					if($channel['users'] > 0) unset($channel['users']);

					$this->_parse_channels($channel['channels']);

					if($channel['channels'] > 0) unset($channel['channels']);
					
					$this->channels[] = $channel;
				}
			}
		}
	}
 }

?>