<?php

namespace App\Controllers;

use App\Lib\Controller\Controller;
use App\Lib\DataBase;
use App\Models\User;

class IndexController extends Controller{
    public function index(){
        $this->render("index");
    }
    public function login(){
        $this->render("login");
    }
    public function create(){
        $this->render("CriarConta");
    }
    public function createAccount(){
        $this->view->callback = [];
        // criptograda as senhas
        $_POST["pass"] = md5($_POST["pass"]);
        $_POST["confirm_pass"] = md5($_POST["confirm_pass"]);

        // cria um novo objeto de usuario
        $user = new User();
        $user->name          = $_POST["name"];
        $user->email         = $_POST["email"];
        $user->pass          = $_POST["pass"];
        $user->confirm_pass  = $_POST["confirm_pass"];
        $result = $user->validateData();
        
        if($result->success == true){
            $user->createAccount();
        }
        $this->view->callback = [
            "success" => $result->success,
            "message" => $result->message
        ];

        $this->render("CriarConta");
    }
    public function loginAccount(){
        $this->view->callback = [];
        // criptograda as senhas
        $_POST["pass"] = md5($_POST["pass"]);
        // cria um novo objeto de usuario
        $user = new User();
        $user->name = $_POST["name"];
        $user->pass = $_POST["pass"];
        
        $result = $user->login();
        $this->view->callback = [
            "success" => $result->success,
            "message" => $result->message
        ];
        $this->render("login");
    }   
}