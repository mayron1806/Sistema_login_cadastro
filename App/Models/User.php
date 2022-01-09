<?php

namespace App\Models;

use App\Lib\Models\Model;

class User extends Model{
    public string $name;
    public string $email;
    public string $pass;
    public string $confirm_pass;

    public function validateData(){
        $returnObj = new \stdClass();
        $returnObj->success = false;
        
        // validate name
        // size
        if(!$this->validateSize($this->name, 5, 50)){
            $returnObj->message = "name size invalid";
            return $returnObj; 
        }
        // is used
        if(sizeof($this->beingUsed("name", $this->name)) > 0){
            $returnObj->message = "name has been used";
            return $returnObj; 
        }
        

        //email
        // is used
        if(sizeof($this->beingUsed("email", $this->email)) > 0){
            $returnObj->message = "email has been used";
            return $returnObj; 
        }

        // pass
        // equal
        if(!$this->validateEqual($this->pass, $this->confirm_pass)){
            $returnObj->message = "different passwords";
            return $returnObj; 
        } 
        $returnObj->message = "account created";
        $returnObj->success = true;
        return $returnObj;        
    }

    private function validateSize(string $property, int $min_size = 0, int $max_size = 1000){
        if(strlen($property) > $min_size && strlen($property) < $max_size){
            return true;
        }
        return false;
    }

    private function beingUsed(string $colunm, string $data){
        // verifica se o nome ja existe no banco de dados
        $query = "SELECT name, email, password FROM tb_users WHERE {$colunm} = '{$data}'";
        $stmt = $this->pdo->query($query);
        $property_db = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $property_db;
    }
    private function validateEqual(mixed $value1, mixed $value2){
        return $value1 === $value2;
    }

    public function createAccount(){
        $query = "INSERT INTO tb_users(name, email, password) VALUES (?, ?, ?);";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(1, $this->name);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->pass);
        $stmt->execute();
    }
    public function login(){
        $returnObj = new \stdClass();
        $returnObj->success = false;

        $user = $this->beingUsed("name", $this->name);
        if(sizeof($user) > 0 && sizeof($user) < 2){
            if($user[0]["password"] === $this->pass){
                $returnObj->success = true;
                $returnObj->message = "login";
            }else{
                $returnObj->message = "incorrect password";
            }
            
        }
        else{
            $returnObj->message = "name";
        }
        return $returnObj;
    }
}