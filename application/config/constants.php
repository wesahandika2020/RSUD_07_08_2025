<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/* ALL MY SETTING FAIZ MUHAMMAD SYAM */
define('SYAM_DEFAULT_CONTROL', 'apps');

// $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
// $base_url .= "://" . $_SERVER['HTTP_HOST'];
// $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

$url = $_SERVER['SCRIPT_NAME'];
$url = substr($url,0,strpos($url,".php"));
$url = substr($url,0,(strlen($url) - strpos(strrev($url),"/")));
$url = ((isset($_SERVER['HTTPS']) OR @$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ? 'https' : 'http')."://".$_SERVER['HTTP_HOST'].$url;

define('BASE_URL', $url);

// Dev Public
define('SM_PORT', '1094');
define('SM_SCHEMA', 'userdb_simrs');
define('SM_HOST_NAME', '202.150.152.107');
define('SM_USERNAME', 'userdb_simrs');
define('SM_PASSWORD', 'a7uSdYHkdu9EC9nT5#$!!2021');
define('SM_DATABASE', 'db_apl_simrs');



//Prod
// define('SM_PORT', '5432');
// define('SM_SCHEMA', 'userdb_simrs');
// define('SM_HOST_NAME', '10.10.10.14');
// define('SM_USERNAME', 'userdb_simrs');
// define('SM_PASSWORD', 'a7uSdYHkdu9EC9nT5#$!!2021');
// define('SM_DATABASE', 'db_apl_simrs');




// define('SM_PORT', '5432');
// define('SM_SCHEMA', 'userdb_simrs');
// define('SM_HOST_NAME', '');
// define('SM_USERNAME', 'postgres');
// define('SM_PASSWORD', 'postgres');
// define('SM_DATABASE', 'db_simrs');

// key untuk update inventory
define('UPDATE_KEY', '12345');

// url vclaim
define('DIR_VCLAIM', 'vclaim_bpjs/vclaim_v2/vclaim_form/');
define('DIR_RUJUKAN_VCLAIM', 'vclaim_bpjs/vclaim_v2/rujukan_form/');
define('URL_VCLAIM', 'vclaim_bpjs/api/vclaim_bpjs_v2/');
define('URL_VCLAIM_PRINT', 'vclaim_bpjs/vclaim_bpjs_v2/');
define('URL_VCLAIM_V1', 'vclaim_bpjs/api/vclaim_bpjs/');
define('URL_APLICARES', 'aplicares_bpjs/api/aplicares_bpjs/');
