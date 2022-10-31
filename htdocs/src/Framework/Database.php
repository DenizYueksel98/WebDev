<?php

namespace Framework;
//Braucht DB Verbindung
class Database
{
    private $host; 
    private $username;
    private $password; //insert wwi2021a for docker
    private $userdatabase;
    private $dbhandle;

    public function __construct(
    $host = "127.0.0.1", 
    $username = "root",
    $password = "", //insert wwi2021a for docker
    $userdatabase = "wwi2021a"
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