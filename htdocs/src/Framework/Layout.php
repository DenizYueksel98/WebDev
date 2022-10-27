<?php

namespace Framework;
include_once('./core/initialize.php');
class Layout
{
    private $controller;
    private $action;
    private $view;

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    public function render($view)
    {
        $this->view = $view;//Hier steckt der Pfad für die dynamische View.php drin
        include(LAYOUT_PATH.DS.'default.php');//Statischer Part
    }

    public function renderView()//Dynamischer Part
    {
        echo $this->controller->render($this->view);
    }
}
