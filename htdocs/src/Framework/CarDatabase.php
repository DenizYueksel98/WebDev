<?php

namespace Framework;

//use Framework\Database;
use Model\Car\Car;
use Directory;

//Braucht DB Verbindung
include_once(__DIR__ . DS . 'Database.php');
include_once(__DIR__ . DS . ".." . DS . "Model" . DS . "Car" . DS . "car.php");
//DB-Type: MariaDB
class CarDatabase implements Database
{
    private $host;
    private $username;
    private $password; 
    private $userdatabase;
    private $dbhandle;
    private $table = 'cars'; //define table cars for inserting into query-strings

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
    public function getdbhandle()
    {
        return $this->dbhandle;
    }
    //set dbhandle
    public function connect()
    {
        $this->dbhandle = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->userdatabase
        ) or die("error");
    }
    //prepare sql string and return stmt-object
    public function prepare($sql)
    {
        $stmt = mysqli_prepare(
            $this->dbhandle,
            $sql
        );
        return $stmt;
    }
    //hand over real esc, sql injection prevention
    public function real_escape_string($str)
    {
        return $this->dbhandle->real_escape_string($str);
    }
    
    //return result for sql-string without fetch_all
    public function query($str)
    {
        $result = mysqli_query(
            $this->dbhandle,
            $str
        ); //fetch_all(MYSQLI_ASSOC)
        return $result;
    }
    public function truncateTable($table)
    {
        $sql = "TRUNCATE " . $table;
        $result = mysqli_query($this->dbhandle, $sql);
        return $result;
    }
    public function readFilter($filter, $theta, $value)
    {
        $stmt = $this->prepare($this->readFilterSql($filter, $theta, $value));
        $stmt->execute();
        $stmt->store_result();
        return $this->handleResult($stmt);
    }
    public function readAll()
    {
        $stmt = $this->prepare($this->readAllSql()); //define mysqli_stmt-object
        $stmt->execute(); //do query
        $result = mysqli_stmt_get_result($stmt);
        $result->fetch_all(MYSQLI_ASSOC);
        return $result; //Array with car objects
    }
    public function readSingleCar($id)
    {
        $stmt = $this->prepare($this->readSingleSql()); //prepare query
        $stmt->bind_param('i', $id); //bind param for id
        $stmt->execute(); //do query
        $result = mysqli_stmt_get_result($stmt);
        $result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    
    public function create(Car $car)
    {
        //getting the sql query for writing into nefz table
        $stmt = $this->prepare($this->createSql()); //prepare query, store in stmt obj.        
        $stmt->bind_param(              //binding the supplied values from Car object
            'isiissssssssssssddddddddss',
            $car->id,
            $car->name,
            $car->b21,
            $car->b22,
            $car->j,
            $car->vier,
            $car->d1,
            $car->d21,
            $car->d22,
            $car->d23,
            $car->zwei,
            $car->fuenf1,
            $car->fuenf2,
            $car->v9,
            $car->vierzehn,
            $car->p3,
            $car->verbin,
            $car->verbau,
            $car->verbko,
            $car->co2komN,
            $car->sehrs,
            $car->schnell,
            $car->langsam,
            $car->co2komW,
            $car->verb_unit,
            $car->co2_unit
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
                    'd21' => $d21,
                    'd22' => $d22,
                    'd23' => $d23,
                    'zwei' => $zwei,
                    'fuenf1' => $fuenf1,
                    'fuenf2' => $fuenf2,
                    'v9' => $v9,
                    'vierzehn' => $vierzehn,
                    'p3' => $p3,
                    'verbin' => $verbin,
                    'verbau' => $verbau,
                    'verbko' => $verbko,
                    'co2komN' => $co2komN,
                    'sehrs' => $sehrs,
                    'schnell' => $schnell,
                    'langsam' => $langsam,
                    'co2komW' => $co2komW,
                    'verb_unit' => $verb_unit,
                    'co2_unit' => $co2_unit
                );
                array_push($car_arr, $car_item);
            }
            return $car_arr;
        } else {
            return false;
        }
    }
    public function createSql()
    {
        $query = 'INSERT INTO `'.$this->table.'` (
            id,
            name,
            b21,
            b22,
            j,
            vier,
            d1,
            d21,
            d22,
            d23,
            zwei,
            fuenf1,
            fuenf2,
            v9,
            vierzehn,
            p3,
            verbin,
            verbau,
            verbko,
            co2komN,
            sehrs,
            schnell,
            langsam,
            co2komW,
            verb_unit,
            co2_unit)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        return $query;
    }
    public function readFilterSql($filter, $theta, $value) //read lines with filter
    {
        //$this->filterCheck(); //check if table is not supplied and add if missing
        //$this->likeCheck(); //if theta is LIKE then surround value with %
        $query = 'SELECT 
        * FROM `'.$this->table.'` WHERE ' . $filter . ' ' . $theta . " '" . $value . "'" . ' ;'; //prepare syntax from query
        return $query;
    }
    public function readAllSql() //read all lines and return stmt
    {
        $query = 'SELECT 
        * FROM `'.$this->table.'`;';
        return $query;
    }
    public function readSingleSql() //read single line and return stmt
    {
        $query = 'SELECT 
        * FROM `'.$this->table.'`
        WHERE id = ? LIMIT 1'; //prepare syntax from query
        return $query;
    }
}
