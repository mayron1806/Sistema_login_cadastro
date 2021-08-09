<?php
    session_start();
    // verifica se o usuario esta realmente logado na conta
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Web</title>
</head>
<body>
    <h1>Welcome <?= $_SESSION['user_name'] ?></h1>
    <button><a href="../Models/Loguot.php">Sair</a></button>
</body>
</html>