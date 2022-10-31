<?php

namespace Framework;
//Braucht DB Verbindung
class AbstractRepository
{
    protected $db;

    public function __construct(Database $db){
        $this->db = $db;
        $this->db->connect();
    }
    public function test(){
        $sql="SELECT * FROM cars;";
        $result=$this->db->query($sql);
        print_r($result);
    }    
}