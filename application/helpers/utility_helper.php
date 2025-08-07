<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('resources_url()')) {
    function resource_url()
    {
        return base_url() . 'resources/';
    }
}

if (!function_exists('get_hash')) {
    function convert_hash($PlainPassword)
    {
        $option = [
            'cost' => 5, // proses hash sebanyak: 2^5 = 32x
        ];
        return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);
    }
}

if (!function_exists('hash_verified')) {
    function hash_verified($PlainPassword, $HashPassword)
    {
        return password_verify($PlainPassword, $HashPassword) ? true : false;
    }
}

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}