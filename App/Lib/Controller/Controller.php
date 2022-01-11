<?php
namespace App\Lib\Controller;

abstract class Controller{
    protected object $view;
    public function __construct(){
        $this->view = new \stdClass;
        $this->view->message = [ "status", "message"];
    }
    protected function render(string $page, string $ext = ".phtml"){
        $dir = "../App/Views/" . $page . $ext;
        require_once $dir;
    }
    protected function isAuthenticated(){
        session_start();
        if(!empty($_SESSION['id']) && !empty($_SESSION['name'])){
            return true;
        }
        return false;
    }
}