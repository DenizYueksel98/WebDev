<?php

namespace Controller;

use Controller\CarController;
use Directory;
use Framework\CarDatabase;
use Framework\CarRepository;
use SimpleXMLElement;

class XmlController extends CarController
{
    protected $error_message;
    protected $upload_message;
    public function defaultAction()
    {
        $db = new CarDatabase("127.0.0.1", "root", "", "cars");
        $db->connect();
        $db->truncateTable("`xml`");
        $affectedRow = 0;
        
        $file = file_get_contents("./input.xml");
        $xml = simplexml_load_string($file)
            or die("Error: Cannot create object");
        foreach ($xml->children() as $row) {
            $id = $row->id;
            $name = $row->name;
            $schein = $row->schein;
            $wltp = $row->wltp;
            $nefz = $row->nefz;
            $b21 = $schein->b21[0];
            $b22 = $schein->b22[0];
            $j = $schein->j[0];
            $vier = $schein->vier[0];
            $d1 = $schein->d1[0];
            $d21 = $schein->d21[0];
            $d22 = $schein->d22[0];
            $d23 = $schein->d23[0];
            $zwei = $schein->zwei[0];
            $fuenf1 = $schein->fuenf1[0];
            $fuenf2 = $schein->fuenf2[0];
            $v9 = $schein->v9[0];
            $vierzehn = $schein->vierzehn[0];
            $p3 = $schein->p3[0];
            $verbin = $nefz->verbin[0];
            $verbin_unit = $nefz->verbin['unit'];
            $verbau = $nefz->verbau[0];
            $verbko = $nefz->verbko[0];
            $co2kom = $nefz->co2kom[0];
            $sehrs = $wltp->sehrs[0];
            $schnell = $wltp->schnell[0];
            $langsam = $wltp->langsam[0];
            $co2komb = $wltp->co2kom[0];
            
            //print_r($verbin['unit']);

            // SQL query to insert data into xml table
            $sql = "INSERT INTO `xml`(
                `id`,
                `name`,
                `b21`,
                `b22`,
                `j`,
                `vier`,
                `d1`,
                `d21`,
                `d22`,
                `d23`,
                `zwei`,
                `fuenf1`,
                `fuenf2`,
                `v9`,
                `vierzehn`,
                `p3`,
                `verbin`,
                `verbin_unit`,
                `verbau`,
                `verbko`,
                `co2kom`,
                `sehrs`,
                `schnell`,
                `langsam`,
                `co2komb`) VALUES ('" .
                $id . "','" .
                $name . "','" . 
                $b21 . "','" .
                $b22 . "','" .
                $j . "','" .
                $vier . "','" .
                $d1 . "','" .
                $d21 . "','" .
                $d22 . "','" .
                $d23 . "','" .
                $zwei . "','" .
                $fuenf1 . "','" .
                $fuenf2 . "','" .
                $v9 . "','" .
                $vierzehn . "','" .
                $p3 . "','" .
                $verbin . "','" .
                $verbin_unit . "','" .
                $verbau . "','" .
                $verbko . "','" .
                $co2kom . "','" .
                $sehrs . "','" .
                $schnell . "','" .
                $langsam . "','" .
                $co2komb . "')";
            $result = $db->query2($sql);
            if (empty($result)==false) {
                $affectedRow++;
            } else {
                $this->error_message = mysqli_error($db->getdbhandle()) . "\n";
            }
        }
        $db->close();
    }
    public function exportAction()
    {
        $db = new CarDatabase("127.0.0.1", "root", "", "cars");
        $db->connect();
        $file = file_get_contents("./input.xml");
        $xml = simplexml_load_string($file)
            or die("Error: Cannot create object");
        $carModel = parent::getCarModel(); //tätige Abfrage und packe Ergebnis in carModel
        //print_r($carModel);
        $xml = new SimpleXMLElement('<db></db>');
        $caritem=$xml->addChild('car');
        foreach($carModel as $car){
            $caritem->addChild('id',$car->id);
            $caritem->addChild('name',$car->name);

            $schein=$caritem->addChild('schein');
            $schein->addChild('b21',$car->b21);
            $schein->addChild('b22',$car->b22);
            $schein->addChild('j',$car->j);
            $schein->addChild('vier',$car->vier);
            $schein->addChild('d1',$car->d1);
            $schein->addChild('d21',$car->d21);
            $schein->addChild('d22',$car->d22);
            $schein->addChild('d23',$car->d23);
            $schein->addChild('zwei',$car->zwei);
            $schein->addChild('fuenf1',$car->fuenf1);
            $schein->addChild('fuenf2',$car->fuenf2);
            $schein->addChild('v9',$car->v9);
            $schein->addChild('vierzehn',$car->vierzehn);
            $schein->addChild('p3',$car->p3);

            $nefz=$caritem->addChild('nefz');
            $verbin=$nefz->addChild('verbin',$car->verbin);
            $verbin->addAttribute('unit', $car->verbin_unit);
            $nefz->addChild('verbau',$car->verbau);
            $nefz->addChild('verbko',$car->verbko);
            $nefz->addChild('co2kom',$car->co2kom);

            $wltp=$schein->addChild('wltp');
            $wltp->addChild('sehrs',$car->sehrs);
            $wltp->addChild('schnell',$car->schnell);
            $wltp->addChild('langsam',$car->langsam);
            $wltp->addChild('co2kom',$car->co2komb);
        }

        $xml->asXML('export.xml');
        $this->upload_message="Successfully exported your XML-File.";
    }
}
