<?php

namespace Controller;

use Framework\AbstractController;
use Directory;
use Framework\CarDatabase;
use Framework\CarRepository;
use SimpleXMLElement;

class XmlController extends AbstractController
{

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
            if (!empty($result)) {
                $affectedRow++;
            } else {
                //$error_message = mysqli_error($db->dbhandle) . "\n";
            }
        }
        $db->close();
    }
    public function exportAction()
    {
        $db = new CarDatabase("127.0.0.1", "root", "", "cars");
        $db->connect();
        $file = file_get_contents("./input.xml");
        //$xml = simplexml_load_string($file)
        //    or die("Error: Cannot create object");
        $xml = new SimpleXMLElement('<xml></xml>');
        
        
    }
}
