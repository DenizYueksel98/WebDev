<?php

namespace Framework;

class AbstractController
{
    public function renderDynamic4($dynamicView)
    {
        include($dynamicView);
    }
}