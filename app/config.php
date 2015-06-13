<?php

// Application Defaults
$baseUrl = 'http://localhost/dev/PhpSkeletonMvc/';
$baseModule = 'DefaultApp';
$baseController = 'index';
$baseAction = 'index';

// Modules
$modules = array('DefaultApp','UserApp','SearchApp');

// Database Configurations
$dbType = 'mysql';
$dbHost = 'localhost';
$dbName = 'phpskeletonmvc';
$dbUser = 'root';
$dbPass = '';



// Constants
define('BASE_MODULE', $baseModule);
define('BASE_CONTROLLER', $baseController);
define('BASE_ACTION', $baseAction);
define('BASE_URL', $baseUrl);
define('DB_TYPE', $dbType);
define('DB_HOST', $dbHost);
define('DB_NAME', $dbName);
define('DB_USER', $dbUser);
define('DB_PASS', $dbPass);

foreach ($modules as $module) {
	define(strtolower($module), $module);
}