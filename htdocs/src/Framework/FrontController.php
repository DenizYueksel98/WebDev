<?php
namespace Framework; //Was passiert wenn ich den namespace gleich lasse aber die Datei in einen anderen Ordner lege?
include_once(__DIR__.'/../../core/initialize.php');
class FrontController
{
    private $controllerName;
    private $actionName;
    private $controller;
    private $layout;
    private $id;
    private $query;

    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_ACTION = 'default';

    public function __construct()
    { // fist - set all parameter variables to default
        $this->controllerName = self::DEFAULT_CONTROLLER;
        $this->actionName = self::DEFAULT_ACTION;
    }

    public function dispatch() // check all the parameters in the URI and instantiate the corresponding Layout object(index.php)
    {
        if (isset($_REQUEST['c'])==true) // check if there is a controller-paramter Wenn $_REQUEST['c'] (Array-Zeiger) einen Wert besitzt 'default' mit diesem ersetzen
        {
            $this->controllerName = $_REQUEST['c']; //give controller-parameter as String - $_REQUEST?c="xyz"
        }
        if (isset($_REQUEST['a'])) // check if there is an action-parameter $_REQUEST['a'] (Array-Zeiger) 
        {
            $this->actionName = $_REQUEST['a'];  //give action-parameter
        }
        

        $controllerClassName = 'Controller\\' . ucfirst(strtolower($this->controllerName)) . 'Controller'; // built controller path
        $actionName = strtolower($this->actionName) . 'Action'; // built action path (e.g. detail action)
        $this->controller = new $controllerClassName(); // instantiate controller object
        if (isset($_REQUEST['i'])) // check if there is an id-parameter
        {
            $this->id = intval($_REQUEST['i']); // get integer of id-parameter
            $this->controller->id=$this->id; // hand over id-parameter to controller object
        }
        if (isset($_REQUEST['q'])) // check if there is an query-parameter
        {
            $this->controller->query=strval($_REQUEST['q']);; // get string of query-parameter 
        }
        
        if (method_exists($this->controller, $actionName)) // check if there is a corresponding action-method in controller object
        {
            $this->controller->$actionName(); // do action()
        } 
        else 
        {
            echo 'action ' . $actionName . ' not found in ' . $controllerClassName; // error if there is no action
        }
        $dynamicView = VIEW_PATH.DS . ucfirst(strtolower($this->controllerName)) . DS . strtolower($this->actionName) . '.php';//built path for dynamic view
        
        $this->layout = new Layout( // instantiate new layout objct
            $this->controller,
            $dynamicView, 
        );
    }

    public function render() // first render (index.php)
    {
        if($this->controller->hasView){ //check if view-switch is on (AbstractController)
        $this->layout->renderStatic();// call static view in layout hand over dynamic view for later call  
        }
    }
}