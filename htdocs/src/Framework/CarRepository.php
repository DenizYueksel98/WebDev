<?php

namespace Framework;

use Model\Car\Car;

//Braucht DB Verbindung
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'AbstractRepository.php');
class CarRepository extends AbstractRepository
{
    protected $db; //CarDatabase, muss im Constructor mitgegeben werden
    private $table = 'schein'; //define table schein
    private $wltp = 'wltp'; // define wltp
    private $nefz = 'nefz'; //define nefz
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
    public function execute($sql)
    {
        $this->db->execute($sql);
    }
    public function prepare($sql)
    {
        return $this->db->prepare($sql);
    }

    public function doMagic($stmt)
    {
        $stmt->execute(); //do query
        $stmt->store_result(); //recive information into mysqli_stmt-object
        $result = $this->handleResult($stmt); //Stmt parse into Array & parse into JSON-String
        return $result;
    }
    public function readFilter($filter, $theta, $value)
    {
        $sql = $this->readFilterSql($filter, $theta, $value);
        $stmt = $this->prepare($sql);
        return $this->doMagic($stmt);
    }
    public function readSingle($id)
    {
        $query = $this->readSingleSql();
        $stmt = $this->prepare($query); //prepare query
        $stmt->bind_param('i', $id); //bind param for id
        return $this->doMagic($stmt);
    }
    public function readAll()
    {
        $sql = $this->readAllSql(); //read sql query as string from function
        $stmt = $this->prepare($sql); //define mysqli_stmt-object
        return $this->doMagic($stmt); //result JSON-String
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
    public function create(Car $car) //create new tupel in db
    {
        $sql1 = $this->createNefzSql();
        $stmt = $this->prepare($sql1); //prepare query
        
        $stmt->bind_param(
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
        $sql2 = $this->createWltpSql();
        $stmt = $this->prepare($sql2); //prepare query
        
        $stmt->bind_param(
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
        $sql3 = $this->createScheinSql();
        $stmt = $this->prepare($sql3); //prepare query
        $stmt->bind_param(
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
        FROM ' . $this->table . ' s 
        LEFT JOIN '
            . $this->nefz . ' n ON s.id=n.id
        LEFT JOIN '
            . $this->wltp . ' w ON s.id=w.id
        WHERE ' . $filter . ' ' . $theta . " '" . $value . "'" . ' ;'; //prepare syntax from query
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
