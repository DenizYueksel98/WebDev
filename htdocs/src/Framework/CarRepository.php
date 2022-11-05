<?php

namespace Framework;

use Model\Car\Car;

//Braucht DB Verbindung
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'AbstractRepository.php');
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
    //give it a prepared stmt and it answers the result  
    public function doMagic($stmt)
    {
        $stmt->execute(); //do query
        $result=mysqli_stmt_get_result($stmt);
        $result->fetch_all(MYSQLI_ASSOC);
        
        foreach($result as $row){
            $car = new Car();
            $car->fromArray((array)$row);
            
            $carArray[]=$car;
        }
        //print_r($cars[0]);
        //$stmt->store_result(); //recieve information into mysqli_stmt-object
        //$result = $stmt->fetch_all(MYSQLI_ASSOC);
        //$result = $this->db->handleResult($stmt); //Stmt parse into Array & parse into JSON-String
        return $carArray;
    }
    public function readFilter($filter, $theta, $value)
    {
        $sql = $this->db->readFilterSql($filter, $theta, $value);
        $stmt = $this->prepare($sql);
        return $this->doMagic($stmt);
    }
    public function readSingle($id)
    {
        $query = $this->db->readSingleSql();
        $stmt = $this->prepare($query); //prepare query
        $stmt->bind_param('i', $id); //bind param for id
        return $this->doMagic($stmt);
    }
    public function readSingleCar($id)
    {
        $query = $this->db->readSingleSql();
        $stmt = $this->prepare($query); //prepare query
        $stmt->bind_param('i', $id); //bind param for id
        $carArray=$this->doMagic($stmt);
        $car=$carArray[0];
        return $car;
    }
    public function readAll()
    {
        $sql = $this->db->readAllSql(); //read sql query as string from function
        $stmt = $this->prepare($sql); //define mysqli_stmt-object
        return $this->doMagic($stmt); //Array with car objects
    }
    
    public function create(Car $car) //create new tupel in db
    {
        $sql1 = $this->db->createNefzSql();//getting the sql query for writing into nefz table
        $stmt = $this->prepare($sql1); //prepare query, store in stmt obj.        
        $stmt->bind_param(              //binding the supplied values from Car object
            'idddd',
            $car->nid,
            $car->verbin,
            $car->verbau,
            $car->verbko,
            $car->co2kom
        );
        if ($stmt->execute() == false) { //exec
            printf("Error while inserting in %s %s. \n", $this->nefz, $stmt->error); //error
        }
        $sql2 = $this->db->createWltpSql();//get SQL-String for INSERT INTO wltp
        $stmt = $this->prepare($sql2); //prepare query, store in stmt
        $stmt->bind_param(              //binding the supplied values from Car object
            'idddd',
            $car->wid,
            $car->sehrs,
            $car->schnell,
            $car->langsam,
            $car->co2komb
        );
        if ($stmt->execute() == false) { //exec
            printf("Error while inserting in %s %s. \n", $this->wltp, $stmt->error); //error
        }
        $sql3 = $this->db->createScheinSql();//get SQL-String for INSER INTO schein
        $stmt = $this->prepare($sql3); //prepare query, store in stmt
        $stmt->bind_param(              //binding the supplied values from Car object
            'issssssssssss',
            $car->id,
            $car->name,
            $car->b21,
            $car->b22,
            $car->j,
            $car->vier,
            $car->d1,
            $car->d2,
            $car->zwei,
            $car->fuenf,
            $car->v9,
            $car->vierzehn,
            $car->p3
        ); //bind params for query
        if ($stmt->execute() == false) { //exec
            printf("Error while inserting in %s %s. \n", $this->table, $stmt->error); //error
            return false;
        }
        return true;
    }

    
}
