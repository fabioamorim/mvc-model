<?php

use App\App;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

try {
    $app = new App();
    $app->run();
} catch (\Throwable $th) {
    //throw $th;
}