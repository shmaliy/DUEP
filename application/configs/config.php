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
    'path' => APPLICATION_PATH . '/Bootstrap.php',
    'class' => 'Bootstrap',
  ),
  'resources' => 
  array (
    'frontController' => 
    array (
      'controllerDirectory' => APPLICATION_PATH . '/controllers',
      'params' => 
      array (
        'displayExceptions' => 1,
      ),
      'moduleDirectory' => APPLICATION_PATH . '/modules',
    ),
    'modules' => 
    array (
    ),
    'layout' => 
    array (
      'layoutPath' => APPLICATION_PATH . '/layouts/scripts/',
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
  
);
