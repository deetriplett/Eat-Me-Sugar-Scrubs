<?php

require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.txt', Monolog\Logger::WARNING));
$log->addWarning('Foo');

echo "EAT ME Sugar Scrubs";

?>
