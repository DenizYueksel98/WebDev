<?php

namespace Framework;

class AbstractController
{
    public function render($view)
    {
        include($view);
    }
}