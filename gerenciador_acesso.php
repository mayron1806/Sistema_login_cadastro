<?php
    session_start();
    if(isset($_SESSION['status'])){
        if($_SESSION['status'] === 1){
            header('location: http://localhost:8080/sistema/home.php');
        }
        else if($_SESSION['status'] === 0){
            header('location: http://localhost:8080/index.php?login=nao_autenticado');
        }
    }else{
        header('location: http://localhost:8080/index.php?login=nao_autenticado');
    }
    //-------------------------------------------------------------------------------------------------------

    require_once('validador_criar_conta.php');
    require_once('validador_entrar.php');
    require_once('conexao.php');

    // conecta ao banco de dados
    $conexao = new Conexao();
    $sql = $conexao->conectar();


    // criar conta
    if($_GET['acao'] === "criar_Conta"){
        $validador = new ValidadorCriacaoDeConta();
        $resultado = $validador->validar($sql, $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['confirmar_senha']);
        if($resultado === 'validado'){
            $query ="
            insert into
                tb_usuarios(nome_usuario, email_usuario, senha)
            values 
                ('{$_POST['nome']}', '{$_POST['email']}', '{$_POST['senha']}');";
            $stmt = $sql->query($query);
            $stmt->fetch();

            
            $_SESSION['status'] = 1; // 1 = autenticado

            header('location: http://localhost:8080/sistema/home.php');
        } else{
            $_SESSION['status'] = 0; // 0 = nao autenticado
            header("location: http://localhost:8080/criar_conta.php?acesso={$resultado}");
            
        }
    }
    
    // fazer login
    if($_GET['acao'] === 'entrar'){
        $validador = new ValidaLogin();
        $resultado = $validador->validar($sql, $_POST['nome'], $_POST['senha']);
        if($resultado == 'autenticado'){
            $_SESSION['status'] = 1; // 1 = autenticado
            header('location: http://localhost:8080/sistema/home.php');
            
        }else if ($resultado == 'nao_antenticado'){
            $_SESSION['status'] = 0; // 0 = nao autenticado
            header('location: http://localhost:8080/index.php?acesso=usuario_ou_senha_incorretos');
        }
    }

?>