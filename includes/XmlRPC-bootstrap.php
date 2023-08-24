<?php

/**
 * @author Gaetano Giunta
 * @copyright (c) 2020 G. Giunta
 * @license code licensed under the BSD License: see license.txt
 */
include_once 'XmlRPC.php';
use PhpXmlRpc\Polyfill\XmlRpc as p;

if (!function_exists('xmlrpc_decode')) {
    /**
     * @param string $xml
     * @param string $encoding
     * @return mixed
     */
    function xmlrpc_decode($xml, $encoding = "iso-8859-1") { return p\XmlRpc::xmlrpc_decode($xml, $encoding); }
}

if (!function_exists('xmlrpc_decode_request')) {
    /**
     * @param string $xml
     * @param string $method
     * @param string $encoding
     * @return mixed
     */
    function xmlrpc_decode_request($xml, &$method, $encoding = "iso-8859-1") { return p\XmlRpc::xmlrpc_decode_request($xml, $method, $encoding); }
}

if (!function_exists('xmlrpc_encode')) {
    /**
     * @param mixed $value
     * @return string
     */
    function xmlrpc_encode($value) { return p\XmlRpc::xmlrpc_encode($value); }
}

if (!function_exists('xmlrpc_encode_request')) {
    /**
     * @param string $method
     * @param mixed $params
     * @param array $output_options
     * @return string
     */
    function xmlrpc_encode_request($method, $params, $output_options = array()) { return p\XmlRpc::xmlrpc_encode_request($method, $params, $output_options); }
}

if (!function_exists('xmlrpc_get_type')) {
    /**
     * @param mixed $value
     * @return string
     */
    function xmlrpc_get_type($value) { return p\XmlRpc::xmlrpc_get_type($value); }
}

if (!function_exists('xmlrpc_is_fault')) {
    /**
     * @param array $arg
     * @return bool
     */
    function xmlrpc_is_fault($arg) { return p\XmlRpc::xmlrpc_is_fault($arg); }
}

if (!function_exists('xmlrpc_parse_method_descriptions')) {
    /**
     * @param string $xml
     * @return array
     */
    function xmlrpc_parse_method_descriptions($xml) { return p\XmlRpc::xmlrpc_parse_method_descriptions($xml); }
}

if (!function_exists('xmlrpc_server_add_introspection_data')) {
    /**
     * @param \PhpXmlrpc\Server $server
     * @param array $desc
     * @return int
     */
    function xmlrpc_server_add_introspection_data($server, $desc) { return p\XmlRpc::xmlrpc_server_add_introspection_data($server, $desc); }
}

if (!function_exists('xmlrpc_server_call_method')) {
    /**
     * @param \PhpXmlrpc\Server $server
     * @param string $xml
     * @param mixed $user_data
     * @param array $output_options
     * @return string
     */
    function xmlrpc_server_call_method($server, $xml, $user_data, $output_options = array()) { return p\XmlRpc::xmlrpc_server_call_method($server, $xml, $user_data, $output_options); }
}

if (!function_exists('xmlrpc_server_create')) {
    /**
     * @return \PhpXmlrpc\Server
     */
    function xmlrpc_server_create() { return p\XmlRpc::xmlrpc_server_create(); }
}

if (!function_exists('xmlrpc_server_destroy')) {
    /**
     * @param \PhpXmlrpc\Server $server
     * @return int
     */
    function xmlrpc_server_destroy($server) { return p\XmlRpc::xmlrpc_server_destroy($server); }
}

if (!function_exists('xmlrpc_server_register_introspection_callback')) {
    /**
     * @param \PhpXmlrpc\Server $server
     * @param string $function
     * @return bool
     */
    function xmlrpc_server_register_introspection_callback($server, $function) { return p\XmlRpc::xmlrpc_server_register_introspection_callback($server, $function); }
}

if (!function_exists('xmlrpc_server_register_method')) {
    /**
     * @param \PhpXmlrpc\Server $server
     * @param string $method_name
     * @param string $function
     * @return bool
     */
    function xmlrpc_server_register_method($server, $method_name, $function) { return p\XmlRpc::xmlrpc_server_register_method($server, $method_name, $function); }
}

if (!function_exists('xmlrpc_set_type')) {
    /**
     * @param string $value
     * @param string $type
     * @return bool
     */
    function xmlrpc_set_type(&$value, $type) { return p\XmlRpc::xmlrpc_set_type($value, $type); }
}
