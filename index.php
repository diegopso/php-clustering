<?php

chdir(__DIR__);
require_once 'vendor/autoload.php';

$task = new app\Main();
$task();