<?php

namespace App\Controllers;

use App\Lib\Controller\Controller;
use App\Lib\DataBase;
use App\Models\User;

class IndexController extends Controller{
    public function index(){
        if($this->isAuthenticated()){
            header('location: /app');
        }

        $this->render("index");
    }
    public function login(){
        if($this->isAuthenticated()){
            header('location: /app');
        }

        $this->render("login");
    }
    public function create(){
        // verifica se o usuario esta autenticado
        if($this->isAuthenticated()){
            header('location: /app');
        }

        // se a global post nao estiver fazia vai tentar criar uma conta
        if(!empty($_POST)){
            if($_POST["pass"] === $_POST["confirm_pass"]){
                 // cria um novo objeto de usuario
                $user = new User();
                $user->name  = $_POST["name"];
                $user->email = $_POST["email"];
                $user->pass  = $_POST["pass"];
                
                // valida as informacoes
                $result = $user->validateData();
                
                // se validar com sucesso cria a conta
                if($result->success){
                    $user->createAccount();
                }

                // define as views
                $this->view->message['status'] = $result->success ? "success" : "error";
                $this->view->message['message'] = $result->message;
            }
            else{
                $this->view->message['status'] = "error";
                $this->view->message['message'] = "different_passwords";
            }
        }
        // remderiza a pagina de criacao de conta 
        $this->render("CriarConta");
    }
}