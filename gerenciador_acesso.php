<?php
    require_once('validador_criar_conta.php');
    require_once('conexao.php');

    // criar conta
    if($_GET['acao'] === "criar_Conta"){
        // conecta ao banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();


        $validador = new ValidadorCriacaoDeConta();
        
        // valida email, senha e nome
        if($validador->validarSenha($_POST['senha'], $_POST['confirmar_senha']) === true){
            
              
                    $query ="
                        insert into tb_usuarios(nome_usuario, email_usuario, senha)
                        values ('{$_POST['nome']}', '{$_POST['email']}', '{$_POST['senha']}');
                    ";
        
                    $stmt = $sql->query($query);
                    $stmt->fetch();
        
                    echo 'Conta criada com sucesso';
                
            
        
        }
    }
    
    // fazer login

?>