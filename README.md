# php-call-lisk-api
This code for PHP call LISK API

All API classes in api folder

All API classes loaded automatically in index.php

config.php is the config file

Example 1:
$accounts = new accounts();
$address = '6356913781456505636L';
$balance = $accounts->getBalance(PROTOCOL, HOST, PORT, $address);

Example 2:
$loader = new loader();
$loadingStatus = $loader->getLoadingStatus(PROTOCOL, HOST, PORT);

Any questions please contact: nzwzdl[at]gmail.com
