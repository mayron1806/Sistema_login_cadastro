<?php
    session_start();
    if(!isset($_SESSION['status']) || $_SESSION['status'] === 0){
        header('location: http://localhost:8080/index.php?login=nao_autenticado');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="sair.php"><button>Sair</button></a>
</body>
</html>