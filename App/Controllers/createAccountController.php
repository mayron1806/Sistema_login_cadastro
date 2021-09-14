<?php
<<<<<<< HEAD
    //session_start();
    require_once(__DIR__. '/../require.php');
=======
    session_start();
    require_once(__DIR__."/../Models/User.php");
    require_once(__DIR__."/../Models/CreateAccountValidator.php");
    require_once(__DIR__."/../Models/addAccount.php");
>>>>>>> develop

    // cria um novo objeto usuario e adiciona os dados
    $user_input_data = new User();
    $user_input_data->createUser($_POST);

    // verifica se o nome email e senha sao validos
    $datavalidator = new CreateAccountValidator($user_input_data);
    $result = $datavalidator->validate($user_input_data);

    // verifica se os dados foram validados 
    if ($result === 'validated'){
        // enviar para o banco de dados
        $addAccount = new AddAccount();
        $addAccount->add($user_input_data);
        
        // entra na conta
        $_SESSION['user_name']          = $user_input_data->name;
        $_SESSION['user_email']         = $user_input_data->email;
        $_SESSION['user_password']      = $user_input_data->password;
        $_SESSION['authenticated']      = true;
        header('location: ../Views/home.php');
        die();
    }else{
        header("location: ../Views/createAccount.php?createAcoountError=$result");
        die();
    }
?>