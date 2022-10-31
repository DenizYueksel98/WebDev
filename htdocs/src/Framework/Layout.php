<?php

namespace Framework;
include_once('./core/initialize.php');
class Layout
{
    private $controller;
    private $action;
    private $dynamicView;

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    public function renderStatic2($dynamicView)
    {
        $this->dynamicView = $dynamicView;//Hier steckt der Pfad für die dynamische dynamicView.php drin
        include(LAYOUT_PATH.DS.'staticView.php');//Statischer Part
    }

    public function renderDynamic3()//Dynamischer Part // --> Wird in der HTML (Layout/staticView.php) aufgerufen
    {
        echo $this->controller->render($this->dynamicView); // --> Wird von der AbstractController ausgeführt
        // in der AbstractController wird nun ENDLICH mit include($dynamicView); die Dynamische sicht aufgerufen
    }
    
}
