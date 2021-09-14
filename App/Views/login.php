<?php
    // verifica se o usuario esta logado na conta
    // se estiver vai redirecionar para pagina principal
    session_start();
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true){
        header('location: home.php');
    }
    echo "<pre>";
        print_r($_SESSION);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Chat Web</title>
</head>
<body>
    <form action="../Controllers/loginController.php" method="POST" class="enter_account">
        <h1>Chat Web</h1>
        <div class="user_data">
            <input type="text" name="name" id="name" placeholder="Type your username" required>
            <input type="password" name="password" id="password" placeholder="Type your password" required>
            <div class="show_hide_pass">
                <input type="checkbox" name="show_hide_pass" id="show_hide_pass"> Mostrar senha
            </div>
            <div class="erro">
                <? if(isset($_GET['login']) && $_GET['login'] === 'login_error'){ ?>
                    <P>User or password not found.</P>
                <?}?>
            </div>
            <input type="submit" value="Login">
        </div>
        <div class="link">
            <a href="createAccount.php">Create account</a>
        </div>
    </form>
    <script src="../../assets/js/show_hide_pass.js"></script>
</body>
</html>
