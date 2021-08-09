<?php
    session_start();
    class Logout{
        // destrou a sessao e redireciona para a pagina de login
        public function exit(){
            session_destroy();
            header('location: ../Views/login.php');
        }
    }
    $logout = new Logout;
    $logout->exit();
?>