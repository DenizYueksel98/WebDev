<?php

namespace Framework;

class AbstractController
{
    public $hasView=true;//Initial haben alle Controller eine View
    protected function disableView(){//Falls eine View nicht gewünscht ist, kann diese Methode aufgerufen werden
        $this->hasView=false;
    }
    protected function enableView(){
        $this->hasView=true;
    }
    public function renderDynamic4($dynamicView)
    {
        include($dynamicView);
    }
}