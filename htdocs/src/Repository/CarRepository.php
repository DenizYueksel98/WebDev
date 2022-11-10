<?php

namespace Repository;

use Model\Car\Car;
use Framework\AbstractRepository;
use Framework\CarDatabase;

include_once(__DIR__.'/../Framework/AbstractRepository.php');
//Braucht DB Verbindung
class CarRepository extends AbstractRepository
{
    protected $db; //CarDatabase, muss im Constructor mitgegeben werden
    public $carArray = array();

    public function __construct(CarDatabase $db)
    {
        $this->db = $db;
        $this->db->connect();
    }
    public function real_escape_string($str)
    {
        return $this->db->real_escape_string($str);
    }
    public function prepare($sql)
    {
        return $this->db->prepare($sql);
    }
    
    public function readFilter($filter, $theta, $value)
    {
        if($carArray=$this->db->readFilter($filter,$theta,$value)){
            return json_encode($carArray); 
        }
        else{
            return json_encode(array('message' => 'No cars found.'));
        }
    }

    public function readSingleCar($id)
    {
        $result= $this->db->readSingleCar($id);        
        foreach ($result as $row) {
            $car = new Car();
            $car->fromArray((array)$row);
            $carArray[] = $car;
        }
        $car = $carArray[0];
        return $car;
    }
    public function readAll()
    {
        $result = $this->db->readAll();
        foreach ($result as $row) {
            $car = new Car();
            $car->fromArray((array)$row);
            $carArray[] = $car;
        }
        $this->carArray=$carArray;
        return $carArray;
   }
    
    public function create(Car $car) //create new tupel in db
    {
        return $this->db->create($car);
    }
}
