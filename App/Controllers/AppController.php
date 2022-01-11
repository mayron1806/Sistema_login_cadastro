<?php
namespace App\Controllers;

use App\Lib\Controller\Controller;
use App\Models\User;

class AppController extends Controller {
    public function index(){
        if($this->isAuthenticated()){
            /// pega todos usuarios exceto o logado
            $user = new User;
            $user->id = $_SESSION['id'];
            $user->name = $_SESSION['name'];
            $this->view->users = $user->getAllUsers();
            $this->render('app');
        }else{
            header("location: /conta/login");
        }
    }
}
    
?>