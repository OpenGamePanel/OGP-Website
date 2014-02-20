<?php

/**
 * Provides backwards support for php 5.2's lack of setTimestamp and getTimestamp
 */
class DateTime_52 extends DateTime{
	/**
	 * Set the time of the datetime object by a unix timestamp
	 * @param int $unixtimestamp
	 * @return DateTime_52
	 */
	public function setTimestamp($unixtimestamp){
		if(!is_numeric($unixtimestamp) && !is_null($unixtimestamp)){
			trigger_error('DateTime::setTimestamp() expects parameter 1 to be long, '.gettype($unixtimestamp).' given', E_USER_WARNING);
		} else {
			$this->setDate(date('Y', $unixtimestamp), date('n', $unixtimestamp), date('d', $unixtimestamp));
			$this->setTime(date('G', $unixtimestamp), date('i', $unixtimestamp), date('s', $unixtimestamp));
		}
		return $this;
	}
	/**
	 * Get the time of the datetime object as a unix timestamp
	 * @return int a unix timestamp representing the time in the datetime object
	 */
	public function getTimestamp(){
		return $this->format('U');
	}
}

if(!function_exists('date_timestamp_get')){
	/**
	 * Get the timestamp of a DateTime object
	 * @param DateTime $object
	 * @see DateTime_52::getTimestamp
	 */
	function date_timestamp_get(DateTime &$object){
		return $object->getTimestamp();
	}

}


if(!function_exists('date_timestamp_set')){
	/**
	 * Set the timestamp of a DateTime object
	 * @param DateTime $object
	 * @param int $unixtimestamp
	 * @return DateTime_52
	 * @see DateTime_52::setTimestamp
	 */
	function date_timestamp_set(DateTime &$object, $unixtimestamp){
		return $object->setTimestamp($unixtimestamp);
	}

}