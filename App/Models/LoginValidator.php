<?php
    require_once(__DIR__.'/../require.php');
    class LoginValidator{
        private $database;

        // conecta ao banco de dados
        public function __construct(){
            $database = new DatabaseConnect();
            $this->database = $database->connectDatabase();
        }

        // chama a funcao para realizar a validacao do login
        // se der tudo certo retorna um objeto com os dados do usuario 
        public function validateLogin($user_data_input){
            $query = 'SELECT * FROM tb_users';
            $stmt = $this->database->query($query);

            // aplica os dados a variavel $db_users_data
            $db_users_data = $stmt->fetchAll(PDO::FETCH_OBJ);

            // procura o usuario 
            foreach($db_users_data as $db_user_data){
                // se encontrar o usuario vai verificar se a senha esta certa
                if($db_user_data->name === $user_data_input->name){
                    if ($db_user_data->password === $user_data_input->password){
                        return $db_user_data;
                    }
                }
            }
        }
    }
?>