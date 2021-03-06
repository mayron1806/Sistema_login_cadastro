<?php

namespace App\Models;

use App\Lib\Models\Model;

class User extends Model{
    protected string $id;
    protected string $name;
    protected string $email;
    protected string $pass;

    public function createAccount(){
        $query = "INSERT INTO tb_users(name, email, password) VALUES (?, ?, ?);";
        $stmt = $this->pdo->prepare($query);
        $pass_cript = md5($this->pass);
        $stmt->execute(array($this->name, $this->email, $pass_cript));
    }
    public function login(){
        $returnObj = new \stdClass();
        $returnObj->success = false;

        $user = $this->searchInTableUsers(data: $this->name, colunm: "name");
        // criptografa a senha
        $pass_cript = md5($this->pass);
        if(!empty($user) && $user["password"] == $pass_cript){
            $returnObj->success = true;
            $returnObj->user = $user;
        }
        return $returnObj;
    }

    public function validateData(){
        $returnObj = new \stdClass();
        $returnObj->success = false;
        
        // validate name
        // size
        if(!$this->validateSize($this->name, 5, 50)){
            $returnObj->message = "name_size";
            return $returnObj; 
        }
        // is used
        if(!empty($this->searchInTableUsers(data: $this->name, colunm: "name"))){
            $returnObj->message = "name_used";
            return $returnObj; 
        }

        //email
        // is used
        if(!empty($this->searchInTableUsers(data: $this->email, colunm: "email"))){
            $returnObj->message = "email_used";
            return $returnObj; 
        }
        // valid
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $returnObj->message = "email_invalid";
            return $returnObj;
        }

        // pass
        // size
        if(!$this->validateSize($this->pass, 5, 32)){
            $returnObj->message = "password_size";
            return $returnObj; 
        }
        $returnObj->message = "created";
        $returnObj->success = true;
        return $returnObj;
    }

    private function validateSize(string $property, int $min_size = 0, int $max_size = 1000){
        if(strlen($property) >= $min_size && strlen($property) <= $max_size){
            return true;
        }
        return false;
    }
    private function searchInTableUsers(string $data, string $colunm){
        // verifica se o nome ja existe no banco de dados
        $query = "SELECT * FROM tb_users WHERE {$colunm} = ?;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($data));
        $property_db = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $property_db;
    }
    public function getAllUsers(){
        $query = "SELECT name FROM tb_users WHERE id_user != ?;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(1, $this->id);
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
    
}