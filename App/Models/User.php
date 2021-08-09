<?php
    class User{
        private $name;
        private $email;
        private $password;
        private $confirm_password;

        // preenche os campos necessarios pra criar a conta
        public function createUser($user_data){
            // atribuindo valores 
            $this->name                 = $user_data['name'];
            $this->email                = $user_data['email'];
            $this->password             = $user_data['password'];
            $this->confirm_password     = $user_data['confirm_passord'];
        }
        
        // preenche os campos necessarios para fazer o login
        public function loginUser($user_data){
            // atribuindo valores 
            $this->name                 = $user_data['name'];
            $this->password             = $user_data['password'];
        }

        public function __get($attr){
            return $this->$attr;
        }
    }
?>