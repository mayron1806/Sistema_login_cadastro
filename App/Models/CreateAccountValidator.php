<?php
    require_once(__DIR__.'/../require.php');
    class CreateAccountValidator{
        private $database;
        public function validate(User $user)
        {   
            // conexao com o banco de dados
            $this->database = new DatabaseConnect();
            $this->database = $this->database->connectDatabase();

            //validar nome
            $result_name = $this->validateName($user->name);
            if ($result_name != null){
                return $result_name;
                die();
            }

            //validar email
            $result_email = $this->validateEmail($user->email);
            if ($result_email != null){
                return $result_email;
                die();
            }

            // validar senha
            $result_password = $this->validatePassword($user->password, $user->confirm_password);
            if ($result_password != null){
                return $result_password;
                die();
            }
            
            // confirma validacao
            if ($result_name == null && $result_email == null && $result_password == null){
                return 'validated';
                die();
            }
        }
        private function validateName(String $user_name){
            // verifica o tamanho do nome
            $name_size = strlen($user_name);
            if ($name_size < 5 || $name_size > 30){
                return 'name_size_invalid';
                die();
            }else{
                // pega o nome do todos usuarios da apliacao e atribiu a variavel $all_user_names
                $query = 'SELECT name FROM tb_users';
                $stmt = $this->database->query($query);
                $all_user_names = $stmt->fetchAll(PDO::FETCH_OBJ);

                // verificar se o nome ja esta sendo usado
                foreach ($all_user_names as $user_name_to_compare){
                    if($user_name === $user_name_to_compare->name){
                        return 'name_used';
                        break;
                    }
                }
            }
        }
        private function validateEmail(String $user_email){
            //valida se é um email valido
            if(filter_var($user_email, FILTER_VALIDATE_EMAIL) != false){
                // pega todos emails de usuarios da aplicacao e atrubui a variavel $all_user_emails
                $query = 'SELECT email FROM tb_users';
                $stmt = $this->database->query($query);
                $all_user_emails = $stmt->fetchAll(PDO::FETCH_OBJ);

                // verifica se o email estan sendo usado
                foreach ($all_user_emails as $user_email_to_compare){
                    if($user_email === $user_email_to_compare->email){
                        return 'email_used';
                        break;
                    }
                }
            }else{
                return 'email_invalid';
            }
        }
        private function validatePassword(String $password, String $confirm_password){
            // verifica se as senhas coincidem
            if ($password != $confirm_password){
                return 'different_passwords';
            }
            // verifica se a senha tem o tamanho requerido
            else{
                $password_size = strlen($password);
                if ($password_size < 5 || $password_size > 30){
                    return 'password_invalid';
                }
            }
        }
    }
?>