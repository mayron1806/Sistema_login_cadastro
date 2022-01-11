<?php
namespace App\Lib\Models;

use App\Lib\DataBase;

abstract class Model{
    protected \PDO $pdo;
    public function __construct(){
        $this->pdo = DataBase::Connect();
    }
    public function __set($name, $value){
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}