<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    
    <title>App Help Desk</title>
</head>
<body>
    <div id='main'>
        
        <form action="valida_login.php" method="post">
            <h1 id="login">Login</h1>
            <label for="email">Usuario</label>
            <input class="dados" type="text" name="nome" id="nome" required>
            <label for="senha">Senha</label>
            <input class="dados" type="password" name="senha" id="senha" required>
            
            <input class="botao" type="submit" value="Entrar">

            <a href="criar_conta.php">Criar conta</a>
        </form>
      
    </div>
</body>
</html>