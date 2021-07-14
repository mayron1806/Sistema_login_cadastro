<?php
    session_start();
    if(isset($_SESSION['status'])){
        if($_SESSION['status'] === 1){
            header('location: http://localhost:8080/home.php');
        }
        else if($_SESSION['status'] === 0){
            header('location: http://localhost:8080/index.php?login=nao_autenticado');
        }
    }else{
        header('location: http://localhost:8080/index.php?login=nao_autenticado');
    }
    //-------------------------------------------------------------------------------------------------------
    
    class ValidadorCriacaoDeConta{
        public function validar($sql, $nome, $email, $senha1, $senha2){
            // validar nome
            $nome_validado = $this->validarNome($sql, $nome);
            if($nome_validado === 'nome_em_uso'){
                return $nome_validado;
            }

            // validar email
            $email_validado = $this->validarEmail($sql, $email);
            if ($email_validado === 'email_invalido' || $email_validado === 'email_em_uso'){
                return $email_validado;
            }

            // validar senha
            $senha_validada = $this->validarSenha($senha1, $senha2);
            if ($senha_validada === 'senha_invalida' || $senha_validada === 'senhas_diferentes'){
                return $senha_validada;
            }
            return 'validado';
        }
        public function validarNome(PDO $sql, string $nome){
            // pega todos usuarios do banco de dados e compara com o nome inserido
            $query = "select nome_usuario from tb_usuarios";
            $stmt = $sql->query($query);
            $nomes_cadastrados = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($nomes_cadastrados as $nome_index){
                if($nome_index->nome_usuario !== $nome){
                    continue;
                }else{
                    return 'nome_em_uso';
                    break;
                }
            }
        }
        public function validarEmail(PDO $sql,  string $email){
            // verifica se o email e valido
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                return 'email_invalido';
            }else{
                // verifica no banco de dados se o email esta sendo usado
                $query = "select email_usuario from tb_usuarios";
                $stmt = $sql->query($query);
                $emails_cadastrados = $stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($emails_cadastrados as $email_index){
                    if($email_index->email_usuario !== $email){
                        continue;
                    }else{
                        return 'email_em_uso';
                        break;
                    }
                }
            }
        }
        public function validarSenha(string $senha1, string $senha2){
            // verifica se as senhas são iguais
            if($senha1 === $senha2){
                $senha = $senha1;
                // verifica se a senha tem entre 8 e 20 caracteres
                if (strlen($senha) >= 5 && strlen($senha) <= 20){
                    return 'senha_aprovada';
                }else{
                    return 'senha_invalida';
                }
            }else{
               return 'senhas_diferentes';
            }
        }
    }
    
?>