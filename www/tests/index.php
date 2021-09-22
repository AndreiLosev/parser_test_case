<?php
require __DIR__ . '/../bitrix/modules/main/cli/bootstrap.php';
require __DIR__ . '/vendor/autoload.php';
Bitrix\Main\Loader::includeModule('iblock');

use Sotbit\Parsertest\Page;


$pageTest = new Page();
$pageTest->run();