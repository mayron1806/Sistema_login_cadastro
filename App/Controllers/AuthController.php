<?php

namespace App\Controllers;

use App\Lib\Controller\Controller;
use App\Lib\DataBase;
use App\Models\User;

class AuthController extends Controller{
    public function autenticate(){
        // cria um novo objeto de usuario
        $user = new User();
        $user->name = $_POST["name"];
        $user->pass = md5($_POST["pass"]);
        
        $result = $user->login();

        if($result->success){
            session_start();
            $_SESSION["id"] = $result->user['id_user'];
            $_SESSION["name"] = $result->user['name'];
            header("location: /app");
        }else{
            header("location: /conta/login?login=erro");
        }
    }
    public function exit(){
        session_start();
        session_destroy();
        header("location: / ");
    }
}