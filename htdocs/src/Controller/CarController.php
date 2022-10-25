<?php

namespace Controller;

use Framework\AbstractController;

class CarController extends AbstractController
{
    public $carModel = [];

    public function defaultAction()
    {
        $this->carModel = [
            'BMW',
            'VW',
            'Jaguar',
            'Porsche',
            'Mercedes',
        ];
    }

    public function detailAction()
    {

    }
    public function createAction()
    {
        //lege Fahrzeug an
    }
}