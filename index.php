<?php
// Error Reporting
error_reporting(E_ALL);

// Version
define('VERSION', '0.1.0');

// Configuration
if (is_file('config.php')) {
	require 'config.php';
}

define('DIR_SYSTEM', dirname(__FILE__) . '/');

// load api class file automatically
function autoload($class) {
	$file = DIR_SYSTEM . 'api/' . str_replace('\\', DIRECTORY_SEPARATOR, strtolower($class)) . '.php';
	
	if (is_file($file)) {
		include_once($file);
		return true;
	}
	
	return false;
}

spl_autoload_register('autoload');

$accounts = new accounts();

$address = '6356913781456505636L';

$balance = $accounts->getBalance(PROTOCOL, HOST, PORT, $address);

print_r($balance);

echo '<br>----------------------<br>';

$loader = new loader();

$loading_status = $loader->getLoadingStatus(PROTOCOL, HOST, PORT);

print_r($loading_status);

echo '<br>----------------------<br>';

$transactions = new transactions();

$peers = new peers();

$blocks = new blocks();

$signatures = new signatures();

$delagates = new delagates();