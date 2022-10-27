<?php
namespace Framework;
include_once('./core/initialize.php');
class FrontController
{
    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_ACTION = 'default';

    private $controllerName;
    private $actionName;
    private $controller;
    private $action;
    private $layout;
    private $id;

    public function __construct()
    {
        $this->controllerName = self::DEFAULT_CONTROLLER;
        $this->actionName = self::DEFAULT_ACTION;
    }

    public function dispatch() 
    {
        if (isset($_REQUEST['c'])==true) 
        {
            $this->controllerName = $_REQUEST['c'];//$_REQUEST?c="xyz"
        }
        if (isset($_REQUEST['a'])) 
        {
            $this->actionName = $_REQUEST['a'];  
        }
        

        $controllerClassName = 'Controller\\' . ucfirst(strtolower($this->controllerName)) . 'Controller';
        $actionName = strtolower($this->actionName) . 'Action';

        $this->controller = new $controllerClassName();//Controller\CarController()
        if (isset($_REQUEST['i'])) 
        {
            $this->id = intval($_REQUEST['i']);
            $this->controller->id=$this->id;
        }
        if (method_exists($this->controller, $actionName)) 
        {
            $this->controller->$actionName();
        } 
        else 
        {
            echo 'action ' . $actionName . ' not found in ' . $controllerClassName;
        }
        
        $this->layout = new Layout(
            $this->controller,
            $this->action,
        );
    }

    public function render()
    {//bu.index.php?c=car&a=default 
        $view = VIEW_PATH.DS . ucfirst(strtolower($this->controllerName)) . DS . strtolower($this->actionName) . '.php';
        $this->layout->render($view);
    }
}