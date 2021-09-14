<?php
    use function PHPSTORM_META\type;
        
    session_start();

    require_once(__DIR__."/../Models/User.php");
    require_once(__DIR__."/../Models/LoginValidator.php");

    //  cria um novo objeto usuario e adiciona os dados
    $user = new User();
    $user->loginUser($_POST);   
   
    //realiza a validacao do login 
    $loginValidator = new LoginValidator();
    $result = $loginValidator->validateLogin($user);
    
    if ($result !== null){
        // entrar na conta
        $_SESSION['user_name']          = $result->name;
        $_SESSION['user_email']         = $result->email;
        $_SESSION['user_password']      = $result->password;
        $_SESSION['authenticated']      = true;
        header("location: ../Views/home.php");
    }else{
        header("location: ../Views/login.php?login=login_error");
    }
    

    
?>