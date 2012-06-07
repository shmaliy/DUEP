<?php

$config = array();

$config['appnamespace'] = 'Application';

$config['phpSettings'] = array(
    'display_startup_errors' => 1,
    'display_errors'         => 1,
	'default_charset'        => "UTF-8",
    'date.timezone'          => "Europe/Kiev"
);

$config['bootstrap'] = array(
    'path' => ROOT_PATH . '/application/Bootstrap.php',
    'class' => 'Bootstrap'
);

$config['resources'] = array();

$config['resources']['frontController'] = array(
	'controllerDirectory' => ROOT_PATH . '/application/controllers',
	'params' => array(
		'displayExceptions' => 1
	),
	'moduleDirectory' => ROOT_PATH . '/application/modules',
);

$config['resources']['modules'] = array();

$config['resources']['layout'] = array(
	'layoutPath' => ROOT_PATH . '/application/layouts/scripts/',
	'layout' => 'layout',
	'viewSuffix' => 'php3'
);

$config['resources']['view'] = array(
	'encoding' => 'utf-8',
	'doctype'  => 'XHTML1_TRANSITIONAL',
	'charset' => 'utf-8',
	'contentType' => 'text/html; charset=utf-8',
);

$config['multidb'] = array();

$config['multidb']['default'] = array(
	'default' => true,
	'adapter' => 'PDO_MYSQL',
	'params' => array(
		'profiler' => true,
		'dbname'   => 'shmaliym_htdpua',
		'host'     => 'localhost',
    	'username' => 'root',
    	'password' => '',
    	'driver_options'  => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    	)
	)
);
