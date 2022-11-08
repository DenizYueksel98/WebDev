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
    protected $export_message;
    protected $validate_message;
    public function defaultAction()
    {
        $db = new CarDatabase("127.0.0.1", "root", "", "cars");
        $db->connect();
        $db->truncateTable("`xml`");
        $affectedRow = 0;

        $file = file_get_contents("./dbXML.xml");
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
            $verbau = $nefz->verbau[0];
            $verbko = $nefz->verbko[0];
            $co2kom = $nefz->co2kom[0];
            $sehrs = $wltp->sehrs[0];
            $schnell = $wltp->schnell[0];
            $langsam = $wltp->langsam[0];
            $co2komb = $wltp->co2kom[0];
            $verb_unit = $nefz->verbin['unit'];
            $co2_unit = $wltp->co2kom['unit'];

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
                `verbau`,
                `verbko`,
                `co2kom`,
                `sehrs`,
                `schnell`,
                `langsam`,
                `co2komb`,
                `verb_unit`,
                `co2_unit`) VALUES ('" .
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
                $verbau . "','" .
                $verbko . "','" .
                $co2kom . "','" .
                $sehrs . "','" .
                $schnell . "','" .
                $langsam . "','" .
                $co2komb .  "','" .
                $verb_unit . "','" .
                $co2_unit ."')";
            $result = $db->query2($sql);
            if (empty($result) == false) {
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
        $caritem = $xml->addChild('car');
        foreach ($carModel as $car) {
            $caritem->addChild('id', $car->id);
            $caritem->addChild('name', $car->name);

            $schein = $caritem->addChild('schein');
            $schein->addChild('b21', $car->b21);
            $schein->addChild('b22', $car->b22);
            $schein->addChild('j', $car->j);
            $schein->addChild('vier', $car->vier);
            $schein->addChild('d1', $car->d1);
            $schein->addChild('d21', $car->d21);
            $schein->addChild('d22', $car->d22);
            $schein->addChild('d23', $car->d23);
            $schein->addChild('zwei', $car->zwei);
            $schein->addChild('fuenf1', $car->fuenf1);
            $schein->addChild('fuenf2', $car->fuenf2);
            $schein->addChild('v9', $car->v9);
            $schein->addChild('vierzehn', $car->vierzehn);
            $schein->addChild('p3', $car->p3);

            $nefz = $caritem->addChild('nefz');
            $verbin = $nefz->addChild('verbin', $car->verbin);
            $verbau=$nefz->addChild('verbau', $car->verbau);
            $verbko=$nefz->addChild('verbko', $car->verbko);
            $co2kom=$nefz->addChild('co2kom', $car->co2kom);
            $verbin->addAttribute('unit', $car->verb_unit);
            $verbau->addAttribute('unit', $car->verb_unit);
            $verbko->addAttribute('unit', $car->verb_unit);
            $co2kom->addAttribute('unit', $car->co2_unit);

            $wltp = $schein->addChild('wltp');
            $sehrs=$wltp->addChild('sehrs', $car->sehrs);
            $schnell=$wltp->addChild('schnell', $car->schnell);
            $langsam=$wltp->addChild('langsam', $car->langsam);
            $co2komb=$wltp->addChild('co2kom', $car->co2komb);
            $sehrs->addAttribute('unit', $car->verb_unit);
            $schnell->addAttribute('unit', $car->verb_unit);
            $langsam->addAttribute('unit', $car->verb_unit);
            $co2komb->addAttribute('unit', $car->co2_unit);

        }

        $xml->asXML('export.xml');
        $this->export_message = "XML-File erfolgreich exportiert.";
    }

    public function validateAction()
    {

        // Enable user error handling
        libxml_use_internal_errors(true);

        $xml = new \DOMDocument();
        $xml->load('dbXML.xml');

        if (!$xml->schemaValidate('dbschema.xsd')) {
            print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
            $this->libxml_display_errors();
        }
        $this->validate_message="XML erfolgreich mit Schema abgeglichen.";
    }
    function libxml_display_error($error)
    {
        $return = "<br/>\n";
        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $return .= "<b>Warning $error->code</b>: ";
                break;
            case LIBXML_ERR_ERROR:
                $return .= "<b>Error $error->code</b>: ";
                break;
            case LIBXML_ERR_FATAL:
                $return .= "<b>Fatal Error $error->code</b>: ";
                break;
        }
        $return .= trim($error->message);
        if ($error->file) {
            $return .=    " in <b>$error->file</b>";
        }
        $return .= " on line <b>$error->line</b>\n";

        return $return;
    }

    function libxml_display_errors()
    {
        $errors = libxml_get_errors();
        foreach ($errors as $error) {
            print $this->libxml_display_error($error);
        }
        libxml_clear_errors();
    }
}
