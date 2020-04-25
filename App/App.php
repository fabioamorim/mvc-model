<?php 

namespace App;

class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    private $controllerName;

    public function __construct()
    {
        // System constants.

        define('APP_HOST'       ,$_SERVER['HTTP_HOST']);
        define('PATH'           ,realpath('./'));
        define('TITLE'          ,'Title app');
        define('DB_HOST'        ,'locahost');
        define('DB_USER'        ,'root');
        define('DB_PASSWORD'    ,'');
        define('DB_NAME'        ,'db_name');
        define('DB_DRIVER'      ,'mysql');

        $this->url();
    }

    public function run()
    {

    }

    public function url()
    {
        $path = $_GET['url'];
        $path = rtrim($path, '/');
        $path = filter_var($path, FILTER_SANITIZE_URL);

        $path = explode('/' , $path);

        $this->controller   = $this->checkArray($path, 0);
        $this->action       = $this->checkArray( $path, 1);

        if ($this->checkArray($path, 2)) {
            unset($path[0]);
            unset($path[1]);
            $this->params = array_values($path);
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getaction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    private function checkArray($array, $key)
    {
        if (isset($array[$key]) && !empty($array[$key])) 
            return $array[$key];
        return null;
    }
}