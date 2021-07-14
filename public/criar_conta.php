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
    
    <title>Criar conta</title>
</head>
<body>
    <div id='main'>
        
        <form action="gerenciador_acesso.php?acao=criar_Conta" method="post">
            <h1 id="login">Criar conta</h1>
            <label for="email">Usuario</label>
            <input class="dados" type="text" name="nome" id="nome" required>
            <label for="email">Email</label>
            <input class="dados" type="email" name="email" id="email" required>
            <label for="senha">Senha</label>
            <input class="dados" type="password" name="senha" id="senha" required>
            <label for="senha">Confirmar senha</label>
            <input class="dados" type="password" name="confirmar_senha" id="confirmarSenha" required>
            <? if (isset($_GET['acesso']) && $_GET['acesso'] == 'nome_em_uso'){?>
                <p>Esse nome já está sendo usado</p>
            <?}?>
            <? if (isset($_GET['acesso']) && $_GET['acesso'] == 'email_invalido'){?>
                <p>Email invalido</p>
            <?}?>
            <? if (isset($_GET['acesso']) && $_GET['acesso'] == 'email_em_uso'){?>
                <p>Email já cadastrado</p>
            <?}?>
            <? if (isset($_GET['acesso']) && $_GET['acesso'] == 'senhas_diferentes'){?>
                <p>Senhas diferentes</p>
            <?}?>
            <? if (isset($_GET['acesso']) && $_GET['acesso'] == 'senha_invalida'){?>
                <p>Senha invalida</p>
            <?}?>
            
            <input class="botao" type="submit" value="Criar conta">

            <a href="index.php">Entrar</a>
        </form>
      
    </div>

    <script>
        function redirecionar(){
           window.location.href = 'index.php';
        }
    </script>

</body>
</html>