<?php

namespace Controller;

//Wir benutze den USE mit dem Namespace "Framework" damit wir direkt "extenden" können
//Sonst müssten wir den Pfade den Namespace folgendermaßen nochmals angebne "...extends Framework\AbstractController" 
use Framework\AbstractController;


class CarController extends AbstractController
{
    public $carModel = []; //Beinhaltet später alle Cars, die die API geliefert hat, als Array 
    public $singleCar = []; //Abfrage einzelnes Auto
    public $detailLinkBegin="<br><a href=?c=car&a="; //Definiere den Beginn unseres Links, dass er aus der HTML (VIEW) abrufbar ist
    public $detailLinkEnd=">Show details</a>"; //Definiere das Ende des Detail Links, dass er aus der HTML (View/Car/) abrufbar ist
    public $message; //Antwort der Abfrage
    public $id; // id, die angefragt wurde


    public function defaultAction()
    {
        $curl = curl_init(); // Initializing curl
        curl_setopt(
            $curl,
            CURLOPT_URL,                            // Sending GET request to reqres.in
            "http://localhost:8080/src/Model/Car/read_all.php" // API to get JSON data aka MODEL
        );
        curl_setopt(
            $curl,                  // Telling curl to store JSON
            CURLOPT_RETURNTRANSFER, // data in a variable instead
            true                    // of dumping on screen
        );
        $response = curl_exec($curl); // Executing curl store it in response

        if ($e = curl_error($curl)) { //Checking if any error occurs during request
            echo $e;
        } else {
            $decoded =
                json_decode($response, true);   //decoding JSON, making array
            $this->carModel = $decoded['data'];             //navigate one down into nested array into data field
            $this->message = "<h3>JSON file data</h3>";
        }
        curl_close($curl);  // Closing curl
        /*
        $this->carModel = [
            'BMW',
            'VW',
            'Jaguar',
            'Porsche',
            'Mercedes',
        ];*/
    }
    public function detailAction()
    {
        $this->defaultAction();//Damit carModel gefüllt ist
        $this->singleCar[]=$this->carModel[$this->id-1];//Packe in das singleCar Array die Daten des Autos aus dem carModel Array
        return "detail";//gib detail zurück
    }
    public function getCarModel(){//returned einfach das CarModel, so kann es von anderen Klassen angefragt werden
        $this->defaultAction();
        return $this->carModel; 
    }
    public function readAction(){
        
    }
    public function createAction()
    {
        //lege Fahrzeug an
    }
}