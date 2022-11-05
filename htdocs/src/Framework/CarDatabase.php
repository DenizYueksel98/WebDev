<?php

namespace Framework;

use Model\Car\Car;
use Directory;

//Braucht DB Verbindung
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Database.php');
include_once(dirname(__FILE__).DS."..".DS."Model".DS."Car".DS."car.php");
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
    public function execute($sql)
    {

        $result = mysqli_query($this->dbhandle, $sql);
        return $result->fetch_all(MYSQLI_ASSOC);
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
