<?php
    session_start();
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true){
        header('location: ../views/home.php');
    }
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
    <form action="../Controllers/createAccountController.php" method="POST" class="create_account">
        <h1>Chat Web</h1>
        <div class="user_data">
            <input type="text" name="name" id="name" placeholder="Type your username" required>
            <input type="email" name="email" id="email" placeholder="Type your email" required>
            <input type="password" name="password" id="password" placeholder="Type your password" required>
            <input type="password" name="confirm_passord" id="confirm_passord" placeholder="Confirm your password" required>
            <div class="show_hide_pass">
                <input type="checkbox" name="show_hide_pass" id="show_hide_pass"> Mostrar senha
            </div>
            
            <div class="erro">
                <? if(isset($_GET['createAcoountError']) && $_GET['createAcoountError'] == 'name_size_invalid'){?>
                    <p>The name must contain more than 5 characters and less than 30.</p>
                <?}?>
                <? if(isset($_GET['createAcoountError']) && $_GET['createAcoountError'] == 'name_used'){?>
                    <p>The name is already being used.</p>
                <?}?>
                <? if(isset($_GET['createAcoountError']) && $_GET['createAcoountError'] == 'email_invalid'){?>
                    <p>This email is invalid.</p>
                <?}?>
                <? if(isset($_GET['createAcoountError']) && $_GET['createAcoountError'] == 'email_used'){?>
                    <p>The email is already being used.</p>
                <?}?>
                <? if(isset($_GET['createAcoountError']) && $_GET['createAcoountError'] == 'different_passwords'){?>
                    <p>Passwords do not match.</p>
                <?}?>
                <? if(isset($_GET['createAcoountError']) && $_GET['createAcoountError'] == 'password_invalid'){?>
                    <p>Password invalid.</p>
                <?}?>
            </div>
        
            <input type="submit" value="Create account">
        </div>
        <div class="link">
            <a href="login.php">Log in</a>
        </div>
    </form>
    <script src="../../assets/js/show_hide_pass.js"></script>
</body>
</html>
