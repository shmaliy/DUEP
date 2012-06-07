<?php
return array (
  'appnamespace' => 'Application',
  'phpSettings' => 
  array (
    'display_startup_errors' => 1,
    'display_errors' => 1,
    'default_charset' => 'UTF-8',
    'date.timezone' => 'Europe/Kiev',
  ),
  'bootstrap' => 
  array (
    'path' => 'W:\\home\\duep/application/Bootstrap.php',
    'class' => 'Bootstrap',
  ),
  'resources' => 
  array (
    'frontController' => 
    array (
      'controllerDirectory' => 'W:\\home\\duep/application/controllers',
      'params' => 
      array (
        'displayExceptions' => 1,
      ),
      'moduleDirectory' => 'W:\\home\\duep/application/modules',
    ),
    'modules' => 
    array (
    ),
    'layout' => 
    array (
      'layoutPath' => 'W:\\home\\duep/application/layouts/scripts/',
      'layout' => 'layout',
      'viewSuffix' => 'php3',
    ),
    'view' => 
    array (
      'encoding' => 'utf-8',
      'doctype' => 'XHTML1_TRANSITIONAL',
      'charset' => 'utf-8',
      'contentType' => 'text/html; charset=utf-8',
    ),
  ),
  'multidb' => 
  array (
    'default' => 
    array (
      'default' => true,
      'adapter' => 'PDO_MYSQL',
      'params' => 
      array (
        'profiler' => true,
        'dbname' => 'shmaliym_htdpua',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'driver_options' => 
        array (
          1002 => 'SET NAMES \'utf8\'',
        ),
      ),
    ),
  ),
);
