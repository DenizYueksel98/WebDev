<?php

namespace Controller;

use Framework\AbstractController;

class UserController extends AbstractController
{
    public $userModel = [];
    public $singleUser = [];
    public $message;
    public $id;

    public function defaultAction(){

    }
    public function registerAction(){

    }
    public function authenticateAction(){

    }
    public function readAction()
    {
        $curl = curl_init(); // Initializing curl
        curl_setopt(
            $curl,
            CURLOPT_URL,                            // Sending GET request to reqres.in
            "http://localhost:8080/src/Model/read_all.php" // API to get JSON data aka MODEL
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
            $this->userModel = $decoded['data'];             //navigate one down into nested array into data field
            $this->message = "<h3>JSON file data</h3>";
        }
        curl_close($curl);  // Closing curl
    }
    public function detailAction()
    {
    }
    public function getUserModel(){
        $this->defaultAction();
        return $this->userModel; 
    }
    public function createAction()
    {
        
        //lege Fahrzeug an
    }
}