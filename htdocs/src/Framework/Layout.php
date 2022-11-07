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

    public function renderStatic($dynamicView)
    {
        $this->dynamicView = $dynamicView; // hand over dynamic view for call in staticView
        include(LAYOUT_PATH.DS.'staticView.php'); // call static view
    }

    public function renderDynamic1() // call dynamic view (staticView)
    {
        echo $this->controller->renderDynamic2($this->dynamicView); // call dynamic view in specific controller object
    }
    
}
