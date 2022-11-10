<?php

namespace Controller;

//Wir benutze den USE mit dem Namespace "Framework" damit wir direkt "extenden" können
//Sonst müssten wir den Pfade den Namespace folgendermaßen nochmals angebne "...extends Framework\AbstractController" 

use Framework\AbstractController;
use Model\Car\Car;

class CarController extends AbstractController
{
    public $carModel = []; //Beinhaltet später alle Cars, die die API geliefert hat, als Array 
    public $car;           //Beinhaltet später das einzeln abgefragte CarObjekt
    public $json;          //Beinhaltet später alle Cars, die die API geliefert hat, als JSON
    public $message; //Antwort der Abfrage
    public $id; // id, die angefragt wurde

    public function curlQuery()
    {
        $curl = curl_init(); // Initializing curl
        curl_setopt(
            $curl,
            CURLOPT_URL,                            // Sending GET request to reqres.in
            "http://localhost:8080/src/Api/Car/read_all.php" // API to get JSON data aka MODEL
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
    public function uploadImageAction()
    {
        $upload_folder = './img/'; //Das Upload-Verzeichnis
        $this->carModel=$this->readFromDB(); //update CarModel
        $filename = $this->carModel[$this->id-1]->id; //carID - 1 = ArrayIndex (car mit ID 21 steht im Arrayan der Stelle[20]=[(21-1)])
        $extension = strtolower(pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION));//Dateiendung wird ausgelesen
        //Überprüfung der Dateiendung, nur JPEG und JPG sind erlaubt
        $allowed_extensions = array('jpeg', 'jpg');
        if (in_array($extension, $allowed_extensions)==false) {
            die("Ungültige Dateiendung. Nur  jpeg-Dateien sind erlaubt");
        }

        //Überprüfung der Dateigröße
        $max_size = 5000 * 1024; //5000 KB
        if ($_FILES['fileToUpload']['size'] > $max_size) {
            die("Bitte keine Dateien größer 5000kb hochladen");
        }

        //Überprüfung dass das Bild keine Fehler enthält
        if (function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
            $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detected_type = exif_imagetype($_FILES['fileToUpload']['tmp_name']);
            if (!in_array($detected_type, $allowed_types)) {
                die("Nur der Upload von Bilddateien ist gestattet");
            }
        }
        
        //Pfad zum Upload inklusive Dateiname&Endung ./img/21.jpeg
        $new_path = $upload_folder . $filename . '.jpeg';

        //Neuer Dateiname falls die Datei bereits existiert, 
        if (file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
            $id = 1;
            do {
                $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
                $id++;
            } while (file_exists($new_path));
        }

        //Alles okay, verschiebe Datei an neuen Pfad
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $new_path);
        $this->message= 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>
        <a href="index.php?c=car&a=detail&i=' . $this->id . '">Zum Auto</a>';
    }
    public function defaultAction()
    {
        //$this->curlQuery();
        $this->readAll();
        //print_r($result);
    }
    public function readFromDB()
    {
        include(__DIR__.'/../../core/config.php');
        //$result ist unser carArray mit den einzelnen Car-Objekten
        if ($result = $repo->readAll()) { //Recieve JSON and save into $result var
            $this->message = "<h3>JSON data</h3>";
            $json=json_encode($result);
            $this->json=$json;//Set plain result(json-string) so class variable json and make it available for CarView
            //$decoded = json_decode($result, true); //Parse JSON into 2D Array (Arrays in Array)
            $this->carModel = $result; 
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
        //$this->cleanupCars();
        $this->carModel = $this->readFromDB();
        return $this->carModel;
    }
    
        public function detailAction()
    {
        include(__DIR__.'/../../core/config.php');
        $car = $repo->readSingleCar($this->id);
        $db->close();
        $this->car=$car;
    }
    public function getCarModel()
    { //returned einfach das CarModel, so kann es von anderen Klassen angefragt werden
        return $this->readAll();

    }
    public function readAction()
    {
    }
    public function createAction()
    {
        //lege Fahrzeug an, passiert über Form an JS, schickt an Api/Car/create.php
    }
}
