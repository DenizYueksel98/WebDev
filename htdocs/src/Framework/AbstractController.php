<?php

namespace Framework;

class AbstractController
{
    public $hasView=true;// view-switch on (Frontcontroller)
    protected function disableView(){// view-switch off (for java script)
        $this->hasView=false;
    }
    protected function enableView(){// view-switch on (for dynamic view)
        $this->hasView=true;
    }
    public function renderDynamic2($dynamicView) // call dynamic view
    {
        include($dynamicView);
    }
}