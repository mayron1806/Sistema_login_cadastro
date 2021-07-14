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
    class ValidaLogin{
        public function validar(PDO $sql, string $nome, string $senha){
            $nome_validado = $this->validarNome($sql, $nome);
            if($nome_validado){
                $senha_validada = $this->validaSenha($sql, $nome, $senha);
                if ($senha_validada){
                    return('autenticado');
                    die();
                }else{
                    return('nao_antenticado');
                    die();
                }
            }else{
                return('nao_antenticado');
                die();
            }
        }
        private function validarNome(PDO $sql, string $nome){
            $query ='select nome_usuario from tb_usuarios';
            $stmt = $sql->query($query);
            $usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            foreach($usuarios as $index_usuario){
                if ($index_usuario->nome_usuario == $nome){
                    return true;
                    break;
                }
            }
        }
        private function validaSenha(PDO $sql, string $nome, string $senha){
            $query = "select senha from tb_usuarios where nome_usuario = '{$nome}'";
            $stmt = $sql->query($query);
            $senha_db = $stmt->fetch(PDO::FETCH_OBJ);
            if ($senha_db->senha === $senha){
                return true;
            }
        }
    }
?>