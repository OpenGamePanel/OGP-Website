<?php
/**
 * This file is part of GameQ.
 *
 * GameQ is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * GameQ is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

abstract class GameQ_Protocols_Ecoapi extends GameQ_Protocols_Http
{
    /**
     * Array of packets we want to look up.
     * Each key should correspond to a defined method in this or a parent class
     *
     * @var array
     */
    protected $packets = array(
            self::PACKET_STATUS => "GET /info HTTP/1.0\r\nAccept: */*\r\n\r\n",
			self::PACKET_PLAYERS => "GET /api/v1/analysis/playstyles HTTP/1.0\r\nAccept: */*\r\n\r\n",
    );

    /**
     * Methods to be run when processing the response(s)
     *
     * @var array
     */
    protected $process_methods = array(
            "process_status",
			"process_players",
    );

    /**
     * The protocol being used
     *
     * @var string
     */
    protected $protocol = 'ecoapi';

    /**
     * String name of this protocol class
     *
     * @var string
     */
    protected $name = 'ecoapi';

    /**
     * Longer string name of this protocol class
     *
     * @var string
     */
    protected $name_long = "ECO API";

    /*
     * Internal methods
     */
    protected function preProcess_status($packets)
    {
        // Implode and rip out the JSON
        preg_match('/\{(.*)\}/ms', implode('', $packets), $m);
		
        return $m[0];
    }

    protected function process_status()
    {
        
		// Make sure we have a valid response
        if(!$this->hasValidResponse(self::PACKET_STATUS))
        {
			return array();
        }
		
        // Return should be JSON, let's validate
        if(($json = json_decode($this->preProcess_status($this->packets_response[self::PACKET_STATUS]))) === NULL)
        {
            throw new GameQ_ProtocolsException("JSON response from ECO API is invalid.");
        }
		
        // Set the result to a new result instance
        $result = new GameQ_Result();

        // Server is always dedicated
        $result->add('dedicated', $json->IsLAN);

        // No mods, as of yet
        $result->add('mod', FALSE);

        // These are the same no matter what mode the server is in
        $result->add('hostname', $json->Description);
        $result->add('game_port', $json->GamePort);
        $result->add('num_players', $json->OnlinePlayers);
        $result->add('maxplayers', $json->TotalPlayers);
		
        return $result->fetch();
    }
	
	/**
     * Pre-process the player data sent
     *
     * @param array $packets
     */
    protected function preProcess_players($packets)
    {
		// Implode and rip out the JSON
        //preg_match('/\{(.*)\}/ms', implode('', $packets), $m);
		echo $packets;
        return $packets;
    }
	
	protected function process_players()
    {
		// Make sure we have a valid response
        if(!$this->hasValidResponse(self::PACKET_PLAYERS))
        {
			return array();
        }

        // Return should be JSON, let's validate
        if(($json = json_decode($this->preProcess_players($this->packets_response[self::PACKET_PLAYERS]))) === NULL)
        {
            throw new GameQ_ProtocolsException("JSON response from ECO API is invalid.");
        }
		
        // Set the result to a new result instance
        $result = new GameQ_Result();
		
		// Players are a comma(space) seperated list
        if(isset($json) && !empty($json))
		{
			// Do the players
			foreach($json AS $player)
			{
				$result->addPlayer('name', $player->Username);
			}
		}

        return $result->fetch();
    }
}
