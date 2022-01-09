<?php
namespace App\Lib\Controller;

abstract class Controller{
    protected object $view;
    public function __construct()
    {
        $this->view = new \stdClass();
    }
    protected function render(string $page, string $ext = ".phtml"){
        $dir = "../App/Views/" . $page . $ext;
        require_once $dir;
        die();
    }
    protected function viewReturn(bool $error, string $message){
        $this->view->type = $error;
        $this->view->type = $message;
        
    }
}