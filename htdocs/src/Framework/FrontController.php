<?php
namespace Framework;

include_once('.\\core\\initialize.php');
class FrontController
{
    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_ACTION = 'default';

    private $controllerName;
    private $actionName;
    private $controller;
    private $action;
    private $layout;

    public function __construct()
    {
        $this->controllerName = self::DEFAULT_CONTROLLER;
        $this->actionName = self::DEFAULT_ACTION;
    }

    public function dispatch() 
    {
        if (isset($_REQUEST['c'])) 
        {
            $this->controllerName = $_REQUEST['c'];  
        }
        if (isset($_REQUEST['a'])) 
        {
            $this->actionName = $_REQUEST['a'];  
        }

        $controllerClassName = 'Controller\\' . ucfirst(strtolower($this->controllerName)) . 'Controller';
        $actionName = strtolower($this->actionName) . 'Action';

        $this->controller = new $controllerClassName();

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
    {
        $view = VIEW_PATH.DS . ucfirst(strtolower($this->controllerName)) . DS . strtolower($this->actionName) . '.php';
        $this->layout->render($view);
    }
}