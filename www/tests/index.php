#!/usr/bin/env php
<?php
require __DIR__ . '/../bitrix/modules/main/cli/bootstrap.php';
require __DIR__ . '/vendor/autoload.php';
Bitrix\Main\Loader::includeModule('iblock');

use Symfony\Component\Console\Application;
use Sotbit\Parsertest\Commands\HelloWorldCommand;


$app = new Application(PHP_EOL . 'Parset Test', '0.0.1');
$app->add(new HelloWorldCommand());

$app->run();


// use Sotbit\Parsertest\Page;


// // $pageTest = new Page('192.168.100.45');
// // $pageTest->run();

