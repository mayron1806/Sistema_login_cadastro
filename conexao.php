<?php
    class Conexao{
        private $sgbd = 'mysql';
        private $host = 'localhost';
        private $dbname = 'db_sistema_login';
        private $user = 'root';
        private $password ='';

        public function conectar(){
            return new PDO("{$this->sgbd}:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
        }
    }

?>