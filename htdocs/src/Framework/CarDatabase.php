<?php

namespace Framework;

use Directory;

//Braucht DB Verbindung
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'Database.php');
//DB-Type: MariaDB
class CarDatabase extends Database
{
    private $host; 
    private $username;
    private $password; //insert wwi2021a for docker
    private $userdatabase;
    private $dbhandle;

    public function __construct(
    $host, 
    $username,
    $password, 
    $userdatabase
    )
    {
        $this->host=$host;
        $this->username=$username;
        $this->password=$password;
        $this->userdatabase=$userdatabase;
    }

    public function connect(){
        $this->dbhandle=mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->userdatabase
        )or die("error"); 
    }
    public function prepare($sql){
        $stmt=mysqli_prepare(
            $this->dbhandle,
            $sql);
        return $stmt;
    }
    public function execute($sql){
        return mysqli_query($this->dbhandle,$sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function real_escape_string($str){
        return $this->dbhandle->real_escape_string($str);
    }
    public function query($sql){
        $result= mysqli_query(
            $this->dbhandle,
            $sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function close(){
        mysqli_close($this->dbhandle);
    }
}