<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Copied from original config.file
$root = dirname(__FILE__);

$global = $root . DIRECTORY_SEPARATOR . 'global.php';
$local  = $root . DIRECTORY_SEPARATOR . 'local.php';

// Include global.php
$config = (file_exists($global) && is_readable($global)) 
    ? include $global 
    : [];

// Adds local.php
$config = array_merge_recursive(
    $config, 
    (file_exists($local) && is_readable($local)) 
        ? include $local 
        : []
);

// Codeigniter

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $config['VirtualGamesDB']['hostname'],
	'username' => $config['VirtualGamesDB']['user'],
	'password' => $config['VirtualGamesDB']['password'],
	'database' => $config['VirtualGamesDB']['db'],
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
