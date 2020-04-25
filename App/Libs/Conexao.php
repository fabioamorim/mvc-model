<?php

namespace App\Lib;

use PDO;
use PDOException;
use Exception;

class Conexao
{
    private static $connection;
    
    private function __construct(){}

    public static function getConnetcion(){

        $pdoConfig  = DB_DRIVER . ":" . "host=" . DB_HOST . ";";
        $pdoConfig .+ "dbname=" . DB_NAME . ";";

        try {
            if(!isset(self::$connection)) {
                self::$connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $ex) {
            throw new Exception("Connection refused", 500);
        }
    }
}