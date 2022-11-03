<?php

namespace Controller;

header('Access-Control-Allow-Origin: *'); //cross-origin resource sharing header
//Wir benutze den USE mit dem Namespace "Framework" damit wir direkt "extenden" können
//Sonst müssten wir den Pfade den Namespace folgendermaßen nochmals angebne "...extends Framework\AbstractController" 
use Framework\AbstractController;
use Framework\CarDatabase;
use Framework\CarRepository;
use Model\Car\Car;

class CarController extends AbstractController
{
    public $carModel = []; //Beinhaltet später alle Cars, die die API geliefert hat, als Array 
    public $singleCar = []; //Abfrage einzelnes Auto
    public $detailLinkBegin = "<br><a href=?c=car&a="; //Definiere den Beginn unseres Links, dass er aus der HTML (VIEW) abrufbar ist
    public $detailLinkEnd = ">Show details</a>"; //Definiere das Ende des Detail Links, dass er aus der HTML (View/Car/) abrufbar ist
    public $message; //Antwort der Abfrage
    public $id; // id, die angefragt wurde

    public function curlQuery()
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
            $this->carModel = $decoded;             //navigate one down into nested array into data field
            $this->message = "<h3>JSON file data</h3>";
        }
        curl_close($curl);  // Closing curl
    }
    public function defaultAction()
    {
        //$this->curlQuery();
        $this->readAll();
        //print_r($result);
    }
    public function cleanupCars()
    {
        foreach ($GLOBALS as $name => $var) {
            if ($var instanceof Car) {
                unset($GLOBALS[$name]);
            }
        }
    }
    public function readFromDB()
    {
        $db = new CarDatabase("127.0.0.1", "root", "", "cars");
        $repo = new CarRepository($db); //CarCollection from Methods and DB Functionality
        if ($result = $repo->readAll()) {
            $this->message = "<h3>JSON file data</h3>";
            $decoded = json_decode($result, true); //Parse JSON into Arrays in Arrays
            $this->carModel = $decoded;
            $db->close();
            return $this->carModel;
        } else {
            $this->message = json_encode(array('message' => 'No cars found.'));
        }
        $db->close();
    }
    //Liest neues Auto-Array von der DB ab, prüft ob er es in diesem Zustand kennt und falls nicht, 
    //wird das Auto-Array geupdated und die Auto-Objekte neu erzeugt. 
    public function readAll()
    {
        if (isset($this->carModel)) {
            if ($this->readFromDB() == $this->carModel) {
                return $this->carModel;
                //Stimmen überein
            } else {
                //Stimmen nicht überein
                $this->cleanupCars();
                $this->carModel=$this->readFromDB();
                $this->createCars();
                return $this->carModel;
            }
        } 
        else 
        {
            $this->carModel=$this->readFromDB();
            return $this->carModel;
            //$this->createCars();
        }
    }
    public function createCars()
    {
        foreach ($this->carModel as $car) {
            $car = new Car(
                $car['id'],
                $car['name'],
                $car['b21'],
                $car['b22'],
                $car['j'],
                $car['vier'],
                $car['d1'],
                $car['d2'],
                $car['zwei'],
                $car['fuenf'],
                $car['v9'],
                $car['vierzehn'],
                $car['p3'],
                $car['verbin'],
                $car['verbau'],
                $car['verbko'],
                $car['co2kom'],
                $car['sehrs'],
                $car['schnell'],
                $car['langsam'],
                $car['co2komb']
            );
        }
    }
    public function detailAction()
    {
        $this->readAll(); //Damit carModel gefüllt ist
        $this->singleCar[] = $this->carModel[$this->id - 1]; //Packe in das singleCar Array die Daten des Autos aus dem carModel Array
        return "detail"; //gib detail zurück
    }
    public function getCarModel()
    { //returned einfach das CarModel, so kann es von anderen Klassen angefragt werden
        $this->readAll();
        return $this->carModel;
    }
    public function readAction()
    {
    }
    public function createAction()
    {
        //lege Fahrzeug an
    }
}
