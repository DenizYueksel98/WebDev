<?php

namespace Controller;

use Framework\AbstractController;

class AjaxController extends AbstractController
{

    public function defaultAction()
    {
        $this->disableView();//Führe Methode disableView() aus, um die View dieses Controllers zu deaktivieren
        //Methode wurde vererbt von AbstractController
        $result= [ //Ergebnis wird definiert als
            (object)[
                'label'=>'CarDefaultView', //Label des ersten Objekts
                'url'=>'http://localhost:8080/bu.index.php?c=car' //Link des ersten Objekts
            ],
            (object)[
                'label'=>'Car Default View', //Label des zweiten Objekts
                'url'=>'http://localhost:8080/bu.index.php?c=car' //Links des zweiten Objekt
            ],

        ];
        $json = json_encode($result); //Encode macht aus Objekt eine JSON

        sleep(2);//Warte für Animation (Redundant, allerdings nur da, dass man das rotieren sieht)
        print_r($json);//gibt aus
    }
    public function detailAction()
    {
    }
 
}