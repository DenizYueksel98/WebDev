<?php

namespace Framework;
include_once('./core/initialize.php');
class Layout
{
    private $controller;
    private $actionMethodName;
    private $dynamicView;

    public function __construct($controller, $actionMethodName)
    {
        $this->controller = $controller;
        $this->action = $actionMethodName;
    }


    //Zuvor wird in der index.php frontController->dispatch() und frontController->render() aufgerufen
  

    public function renderStatic2($dynamicView)//--> Wird von der Frontcontroller.renderDynamic() aufgerufen
    {
        $this->dynamicView = $dynamicView; // $dynamicView =//var/www/html'/src/view/Car/details.php
        include(LAYOUT_PATH.DS.'staticView.php');
        //Statischer Part wird ausgeführt - Darin wird dann renderDynamicHTML() aufgerufen
    }

    public function renderDynamic3()// --> Wird in der HTML (Layout/staticView.php) aufgerufen
    {
        echo $this->controller->renderDynamic4($this->dynamicView); // --> Wird von der AbstractController ausgeführt
        // in der AbstractController wird nun ENDLICH mit include($dynamicView); die Dynamische sicht aufgerufen
    }
}
