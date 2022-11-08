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
        return $this->db->readFilter($filter,$theta,$value);
    }
    public function readSingle($id)
    {
        return $this->db->readSingle($id);
        
    }
    public function readSingleCar($id)
    {
        return $this->db->readSingleCar($id);
    }
    public function readAll()
    {
        return $this->db->readAll();
   }
    
    public function create(Car $car) //create new tupel in db
    {
        return $this->db->create($car);
    }
}
