<?php

use App\App;
use App\Libs\Error;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

$app = new App();

try {
    $app->run();
} catch (\Exception $e) {
    $error = new Error($e);
    $error->render();
}