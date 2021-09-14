<?php
    //session_start();
    require_once(__DIR__. '/../require.php');

    // cria um novo objeto usuario e adiciona os dados
    $user_input_data = new User();
    $user_input_data->createUser($_POST);

    // verifica se o nome email e senha sao validos
    $datavalidator = new CreateAccountValidator($user_input_data);
    $result = $datavalidator->validate($user_input_data);

    // verifica se os dados foram validados 
    if ($result !== 'validated'){
        header("location: ../Views/createAccount.php?createAcoountError=$result");
        die();
    }else{
        // enviar para o banco de dados
        $addAccount = new AddAccount();
        $addAccount->add($user_input_data);
        
        // entra na conta
        $_SESSION['user_name']          = $user_input_data->name;
        $_SESSION['user_email']         = $user_input_data->email;
        $_SESSION['user_password']      = $user_input_data->password;
        $_SESSION['authenticated']      = true;
        header('location: ../Views/home.php');
    }
?>