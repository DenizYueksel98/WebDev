<?php
namespace Framework; //Was passiert wenn ich den namespace gleich lasse aber die Datei in einen anderen Ordner lege?

include_once('./core/initialize.php');
class FrontController
{
    private $controllerClassName;
    private $actionMethodName;
    private $actionName;
    private $controller;
    private $layout;
    private $id;

    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_ACTION = 'default';

    public function __construct()
    {   //Zuerst mal alles auf 'default'
        $this->controllerName = self::DEFAULT_CONTROLLER;
        $this->actionName = self::DEFAULT_ACTION;
    }


    public function dispatch() 
    {
        if (isset($_REQUEST['c'])==true) // Wenn $_REQUEST['c'] (Array-Zeiger) einen Wert besitzt 'default' mit diesem ersetzen
        {
            $this->controllerName = $_REQUEST['c'];//$_REQUEST?c="xyz"
        }
        if (isset($_REQUEST['a'])) // Wenn $_REQUEST['a'] (Array-Zeiger) einen Wert besitzt 'default' mit diesem ersetzen
        {
            $this->actionName = $_REQUEST['a'];  
        }
        
        // Zusammenbauen des des Pfades für entsprechende Controller-Klasse (z.B. Conroller\\CarController)
        $controllerClassName = 'Controller\\' . ucfirst(strtolower($this->controllerName)) . 'Controller';
        // Zusammenbauen des des Pfades für entsprechende Action-Methode (z.B. detailAction)
        $actionMethodName = strtolower($this->actionName) . 'Action';

        //Nun wird die Controller-Klasse instanziiert (Conroller/CarController)
        $this->controller = new $controllerClassName();

        if (isset($_REQUEST['i'])) 
        {
            $this->id = intval($_REQUEST['i']);
            //z.B. localhost:8080?['i']=3
            $this->controller->id=$this->id;
            //this.controller.id = this.id - Schreibe den integer in die klasse "controller" (instanz von Klasse CarController)
        }  

        if (method_exists($this->controller, $actionMethodName)) //Prüfe ob die actionMethodeName-Methode ontroller-Klasse existiert
        {
            $this->controller->$actionMethodName(); //actionMethodeName-Methode ausführen
        } 
        else 
        {
            echo 'action ' . $actionMethodName . ' not found in ' . $controllerClassName; // Fehlermeldung
        }
           
        // GEHT DER AUFRUF OHNE USE FRAMEWORK WEIL DIE KLASSE LAYOUT IM SELBEN ORDNER IST?
        // Ich euzeuge nun ein layout-Objekt mit deom controller-Objekt und dem ActionMethodenNamen (Brauche ich für die render())
        $this->layout = new Layout(
            $this->controller,
            $this->actionMethodName,
        );
    }
    

    
    public function render1()//--> Wird von der index.php aufgerufen (Übergeordnete Render-Funktion)
    {
        $dynamicView = VIEW_PATH.DS . ucfirst(strtolower($this->controllerName)) . DS . strtolower($this->actionName) . '.php';
        // Pfad für Dynamische View bauen = //var/www/html'/src/view/Car/details.php
        $this->layout->renderStatic2($dynamicView);
        // --> Übergang zu Framework/Layout.renderDynamic(Mit_der_hier_definierten_$dynamicView)        
    }
}