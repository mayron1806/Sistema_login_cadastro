<?php
    session_start();
    if(isset($_SESSION['status']) && $_SESSION['status'] === 1){
        header('location: http://localhost:8080/home.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    
    <title>Login</title>
</head>
<body>
    <div id='main'>
        
        <form action="gerenciador_acesso.php?acao=entrar" method="post">
            <h1 id="login">Login</h1>
            <label for="email">Usuario</label>
            <input class="dados" type="text" name="nome" id="nome" required>
            <label for="senha">Senha</label>
            <input class="dados" type="password" name="senha" id="senha" required>
            <? if(isset($_GET['acesso']) && $_GET['acesso'] === 'usuario_ou_senha_incorretos'){ ?>
                <p>Usuario e/ou senha incorretos</p>
            <?}?>
            <input class="botao" type="submit" value="Entrar">

            <a href="criar_conta.php">Criar conta</a>
        </form>
      
    </div>
</body>
</html>