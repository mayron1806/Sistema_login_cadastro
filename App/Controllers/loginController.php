<?php
    session_start();
    
    require_once(__DIR__."/../require.php");

    //  cria um novo objeto usuario e adiciona os dados
    $user = new User();
    $user->loginUser($_POST);

    //realoza a validacao do login 
    $loginValidator = new LoginValidator();
    $result = $loginValidator->validateLogin($user);

    // $result pode ter 2 valores 
    // 1° string = 'user_not_found'
    // 2° object = um objeto com os dados do usuario
    if ($result !== 'login_error'){
        // entrar na conta
        $_SESSION['user_name']          = $result->name;
        $_SESSION['user_email']         = $result->email;
        $_SESSION['user_password']      = $result->password;
        $_SESSION['authenticated']      = true;
        header("location: ../Views/home.php");
    }else{
        header("location: ../Views/login.php?login=$result");
    }
?>