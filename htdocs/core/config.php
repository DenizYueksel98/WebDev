<?php
//set vars for db connection

use Framework\CarDatabase;
use Repository\CarRepository;
use Framework\DotEnv;
include_once(__DIR__."/../src/Framework/DotEnv.php");
(new DotEnv(__DIR__ . '/../core/.env'))->load();
defined('APP_NAME')			? null: define('APP_NAME','Kraftfahrzeug-Datenbank');//Define APP_NAME -> bestPractice
$host= getenv('DATABASE_HOST');
$username= getenv('DATABASE_USER');
$password= getenv('DATABASE_PASSWORD');
$cardatabase= getenv('DATABASE_TABLE');
include_once(__DIR__."/../src/Framework/CarDatabase.php");
include_once(__DIR__.'/../src/Repository/CarRepository.php');
global $db; 
$db=new CarDatabase($host, $username, $password, $cardatabase);
global $repo;
$repo= 	new CarRepository($db);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error()); //exit if error
}
