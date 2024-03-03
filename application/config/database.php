<?php
defined('BASEPATH') or exit('No direct script access allowed');

$query_builder = TRUE;
$active_group = ENVIRONMENT;

$db['production'] = array(
	'dsn' => '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '123456',
	'port' => '52992',
	'dbdriver' => 'pdo',
	'subdriver' => 'sqlsrv',
	'database' => 'BD_CGMAB',
	'dbprefix' => '',
	'pconnect' => false,
	'db_debug' => false,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => false,
	'compress' => false,
	'stricton' => false,
	'failover' => array(),
	'save_queries' => true,
);

$db['development'] = $db['production'];
$db['development']['hostname'] = 'localhost';
$db['development']['db_debug'] = true;
unset($db['development']['port']);

$db['default'] = $db[ENVIRONMENT];