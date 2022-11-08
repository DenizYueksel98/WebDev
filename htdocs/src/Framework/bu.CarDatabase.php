<?php

namespace Framework;

use Model\Car\Car;
use Directory;

//Braucht DB Verbindung
include_once(__DIR__. DS.'Database.php');
include_once(__DIR__.DS."..".DS."Model".DS."Car".DS."car.php");
//DB-Type: MariaDB
class CarDatabase implements Database
{
    private $host;
    private $username;
    private $password; //insert wwi2021a for docker
    private $userdatabase;
    private $dbhandle;
    private $table = 'schein'; //define table schein
    private $wltp = 'wltp'; // define wltp
    private $nefz = 'nefz'; //define nefz

    public function __construct(
        $host,
        $username,
        $password,
        $userdatabase
    ) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->userdatabase = $userdatabase;
    }
    public function getdbhandle(){
        return $this->dbhandle;
    }
    public function connect()
    {
        $this->dbhandle = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->userdatabase
        ) or die("error");
    }
    public function prepare($sql)
    {
        $stmt = mysqli_prepare(
            $this->dbhandle,
            $sql
        );
        return $stmt;
    }
    public function real_escape_string($str)
    {
        return $this->dbhandle->real_escape_string($str);
    }
    public function query($str)
    {
        $result = mysqli_query(
            $this->dbhandle,
            $str
        ); //fetch_all(MYSQLI_ASSOC)
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function query2($str)
    {
        $result = mysqli_query(
            $this->dbhandle,
            $str
        ); //fetch_all(MYSQLI_ASSOC)
        return $result;
    }
    public function truncateTable($table){
        $sql= "TRUNCATE ".$table;
        $result= mysqli_query($this->dbhandle, $sql);
        return $result;
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
    public function doOldMagic($stmt){
        //$stmt->get_result(); //recieve information into mysqli_stmt-object
        //$stmt->fetch_all(MYSQLI_ASSOC);
        $result = $this->handleResult($stmt); //Stmt parse into Array & parse into JSON-String
        return $result;
    }
    public function readFilter($filter, $theta, $value){
        $stmt = $this->prepare($this->readFilterSql($filter, $theta, $value));
        $stmt->execute();
        $stmt->store_result();
        return $this->doOldMagic($stmt);
    }
    public function readSingle($id){
        $stmt = $this->prepare($this->readSingleSql()); //prepare query
        $stmt->bind_param('i', $id); //bind param for id
        return $this->doMagic($stmt);
    }
    public function readAll(){
        $stmt = $this->prepare($this->readAllSql()); //define mysqli_stmt-object
        return $this->doMagic($stmt); //Array with car objects
    }
    public function readSingleCar($id){
        $stmt = $this->prepare($this->readSingleSql()); //prepare query
        $stmt->bind_param('i', $id); //bind param for id
        $carArray=$this->doMagic($stmt);
        $car=$carArray[0];
        return $car;
    }
    public function create(Car $car){
        //getting the sql query for writing into nefz table
        $stmt = $this->prepare($this->createNefzSql()); //prepare query, store in stmt obj.        
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
        //get SQL-String for INSERT INTO wltp
        $stmt = $this->prepare($this->createWltpSql()); //prepare query, store in stmt
        $stmt->bind_param(              //binding the supplied values from Car object
            'idddd',
            $car->id,
            $car->sehrs,
            $car->schnell,
            $car->langsam,
            $car->co2komb
        );
        if ($stmt->execute() == false) { //exec
            printf("Error while inserting in %s %s. \n", $this->wltp, $stmt->error); //error
        }
        //get SQL-String for INSER INTO schein
        $stmt = $this->prepare($this->createScheinSql()); //prepare query, store in stmt
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
    public function close()
    {
        mysqli_close($this->dbhandle);
    }

    function fetchAssocStatement($stmt)
    {
        if ($stmt->num_rows > 0) {
            $result = array(); //instantiierung Ergebnis Array
            $md = $stmt->result_metadata();
            $params = array();
            while ($field = $md->fetch_field()) {
                $params[] = &$result[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $params);
            if ($stmt->fetch())
                return $result;
        }

        return null;
    }
    public function handleResult($result)
    {
        $num = $result->num_rows;
        if ($num > 0) {
            $car_arr = array();

            while ($row = $this->fetchAssocStatement($result)) {
                extract($row);
                $car_item = array(
                    'id' => $id,
                    'name' => $name,
                    'b21' => $b21,
                    'b22' => $b22,
                    'j' => $j,
                    'vier' => $vier,
                    'd1' => $d1,
                    'd2' => $d2,
                    'zwei' => $zwei,
                    'fuenf' => $fuenf,
                    'v9' => $v9,
                    'vierzehn' => $vierzehn,
                    'p3' => $p3,
                    'verbin' => $verbin,
                    'verbau' => $verbau,
                    'verbko' => $verbko,
                    'co2kom' => $co2kom,
                    'sehrs' => $sehrs,
                    'schnell' => $schnell,
                    'langsam' => $langsam,
                    'co2komb' => $co2komb
                );
                array_push($car_arr, $car_item);
            }
            return json_encode($car_arr);
        } else {
            return json_encode(array('message' => 'No cars found.'));
        }
    }
    public function createNefzSql()
    {
        $query = 'INSERT INTO ' . $this->nefz . " (
            id,
            verbin,
            verbau,
            verbko,
            co2kom)
            VALUES(?, ?, ?, ?, ?)";
        return $query;
    }
    public function createWltpSql()
    {
        $query = 'INSERT INTO ' . $this->wltp . " (
            id,
            sehrs,
            schnell,
            langsam,
            co2komb)
            VALUES(?, ?, ?, ?, ?)";
        return $query;
    }
    public function createScheinSql()
    {

        $query = 'INSERT INTO ' . $this->table . " (
            id,
            name,
            b21,
            b22,
            j,
            vier,
            d1,
            d2,
            zwei,
            fuenf,
            v9,
            vierzehn,
            p3) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //prepare syntax from query
        return $query;
    }
    public function readFilterSql($filter, $theta, $value) //read lines with filter
    {
        //$this->filterCheck(); //check if table is not supplied and add if missing
        //$this->likeCheck(); //if theta is LIKE then surround value with %
        $query = 'SELECT 
        s.id,
        s.name,
        s.b21,
        s.b22,
        s.j,
        s.vier,
        s.d1,
        s.d2,
        s.zwei,
        s.fuenf,
        s.v9,
        s.vierzehn,
        s.p3,
        n.verbin,
        n.verbau,
        n.verbko,
        n.co2kom,
        w.sehrs,
        w.schnell,
        w.langsam,
        w.co2komb
        FROM `schein` s, `nefz` n, `wltp` w WHERE s.id=n.id AND s.id=w.id 
        AND ' . $filter . ' ' . $theta . " '" . $value . "'" . ' ;'; //prepare syntax from query
        return $query;
    }
    public function readAllSql() //read all lines and return stmt
    {
        $query = 'SELECT 
        s.id,
        s.name,
        s.b21,
        s.b22,
        s.j,
        s.vier,
        s.d1,
        s.d2,
        s.zwei,
        s.fuenf,
        s.v9,
        s.vierzehn,
        s.p3,
        n.verbin,
        n.verbau,
        n.verbko,
        n.co2kom,
        w.sehrs,
        w.schnell,
        w.langsam,
        w.co2komb
        FROM ' . $this->table . ' s 
        LEFT JOIN '
            . $this->nefz . ' n ON s.id=n.id
        LEFT JOIN '
            . $this->wltp . ' w ON s.id=w.id;
        ';
        return $query;
    }
    public function readSingleSql() //read single line and return stmt
    {
        $query = 'SELECT 
        s.id,
        s.name,
        s.b21,
        s.b22,
        s.j,
        s.vier,
        s.d1,
        s.d2,
        s.zwei,
        s.fuenf,
        s.v9,
        s.vierzehn,
        s.p3,
        n.verbin,
        n.verbau,
        n.verbko,
        n.co2kom,
        w.sehrs,
        w.schnell,
        w.langsam,
        w.co2komb
        FROM ' . $this->table . ' s 
        LEFT JOIN 
            nefz n ON s.id=n.id
        LEFT JOIN
            wltp w ON s.id=w.id
        WHERE s.id = ? LIMIT 1'; //prepare syntax from query
        return $query;
    }
}
