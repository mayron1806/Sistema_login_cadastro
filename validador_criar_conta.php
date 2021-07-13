<?php
    class ValidadorCriacaoDeConta{
        public function validarNome(PDO $sql, string $nome){
            $query = "select nome_usuario from tb_usuarios";
            $stmt = $sql->query($query);
            $nomes_cadastrados = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($nomes_cadastrados as $nome_index){
                if($nome_index->nome_usuario === $nome){
                    header('location: http://localhost:8080/criar_conta.php?acesso=nome_em_uso');
                    break;
                }else{
                    return true;
                }
            }
        }
        public function validarEmail(PDO $sql,  string $email){
            // verifica se o email e valido
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                header('location: http://localhost:8080/criar_conta.php?acesso=email_invalido');
            }else{
                // verifica no banco de dados se o email esta sendo usado
                $query = "select email_usuario from tb_usuarios";
                $stmt = $sql->query($query);
                $emails_cadastrados = $stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($emails_cadastrados as $email_index){
                    if($email_index->email_usuario === $email){
                        header('location: http://localhost:8080/criar_conta.php?acesso=email_em_uso');
                        break;
                    }else{
                        return true;
                    }
                }
            }
        }

        public function validarSenha(string $senha1, string $senha2){
            if($senha1 === $senha2){
                $senha = $senha1;
                if (strlen($senha) >= 8 && strlen($senha) <= 20){
                    return true;
                }else{
                    header('location: http://localhost:8080/criar_conta.php?acesso=senha_invalida');
                }
            }else{
                header('location: http://localhost:8080/criar_conta.php?acesso=senhas_diferentes');
            }
        }
    }
?>