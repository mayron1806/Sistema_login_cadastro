<?php

namespace App\Lib;

class DataBase{
    public static function Connect(array $config){
        $pdo = new \PDO("mysql:host=" . $config["host"] . ";dbname=" . $config["db_name"], $config["user"], $config["pass"]);
        return $pdo;
    }
}