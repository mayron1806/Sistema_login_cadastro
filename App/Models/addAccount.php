<?php
    require_once(__DIR__.'/../require.php');
    class AddAccount{
        // adiciona a conta ao banco de dados
        public function add(User $user){
            // se conecta ao banco de dados
            $database = new DatabaseConnect();
            $database = $database->connectDatabase();
            
            // cria um novo usuario e insere os dados
            
            $stmt = $database->prepare("INSERT INTO tb_users(name, email, password) VALUES (?, ?, ?)");
            $stmt->execute(Array($user->name, $user->email, $user->password));
        }
    }
?>