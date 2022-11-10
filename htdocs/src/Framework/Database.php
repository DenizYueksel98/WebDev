<?php

namespace Framework;
use Model\Car\Car;
//Braucht DB Verbindung
interface Database
{
    public function connect();
    public function query($str);
    public function real_escape_string($str);
    public function truncateTable($table);
    public function readFilter($filter, $theta, $value);
    public function readAll();
    public function readSingleCar($id);
    public function create(Car $car);
    public function close();

}