<?php
    class DatabaseConnect{
        private $host = 'localhost';
        private $db_name = 'db_users';
        private $user = 'root';
        private $pass = '';

        // se conecta ao banco de dados e retorna a conexao
        public function connectDatabase(){
            $database_connect = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
            return $database_connect;
        }
    }
?>