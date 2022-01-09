<?php
namespace App\Lib\Models;

use App\Lib\DataBase;

abstract class Model{
    protected \PDO $pdo;
    public function __construct(){
        define('config', [
            "host" => "localhost",
            "db_name" => "db_users",
            "user" => "root",
            "pass" => "admin"
        ]);
        $this->pdo = DataBase::Connect(config: config);
    }
    public function __set($name, $value){
        $this->$name = $value;
    }
}