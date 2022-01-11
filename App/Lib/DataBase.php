<?php

namespace App\Lib;

class DataBase{
    public static function Connect(){
        define('DB_CONFIG', [
            "host" => "localhost",
            "db_name" => "db_users",
            "user" => "root",
            "pass" => "admin"
        ]);
        $pdo = new \PDO("mysql:host=" . DB_CONFIG["host"] . ";dbname=" . DB_CONFIG["db_name"], DB_CONFIG["user"], DB_CONFIG["pass"]);
        return $pdo;
    }
}