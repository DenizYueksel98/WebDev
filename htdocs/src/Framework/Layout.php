<?php

namespace Framework;
include_once(__DIR__.DS.'..'.DS.'..'.DS.'core/initialize.php');
class Layout
{
    private $controller;
    private $dynamicView;

    public function __construct($controller, $dynamicView)
    {
        $this->controller = $controller;
        $this->dynamicView= $dynamicView;
    }

    public function renderStatic()
    { // hand over dynamic view for call in staticView
        include(LAYOUT_PATH.DS.'staticView.php'); // call static view
    }

    public function renderDynamic1() // call dynamic view (staticView)
    {
        echo $this->controller->renderDynamic2($this->dynamicView); // call dynamic view in specific controller object
    }
    
}
