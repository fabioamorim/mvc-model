<?php

namespace App\Controllers;

abstract class Controller
{
    protected $app;
    private $viewVar;

    public function __construct($app)
    {
        
    }

    public function render($view)
    {
        $viewVar = $this->getViewVar();
    //  $Sessao  = Sessao:class;

        require_once PATH . '/App/Views/layouts/header.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layouts/footer.php'; 
    }

    public function redirect($view)
    {
        header('Location: https://' . APP_HOST . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }
}