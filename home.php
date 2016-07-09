<?php
require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Kentucky/Louisville');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler('app.txt', Monolog\Logger::WARNING));
$log->addWarning('Foo');

echo "EAT ME Sugar Scrubs";

?>
