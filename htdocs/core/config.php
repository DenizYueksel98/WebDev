<?php
//set vars for db connection
$host = "127.0.0.1"; 
$username = "root";
$password = ""; //insert wwi2021a for docker
$userdatabase = "wwi2021a";
$cardatabase = "cars";

$cardb =	new mysqli($host, $username, $password, $cardatabase);//connect to car db
$userdb = 	new mysqli($host, $username, $password, $userdatabase);//connect to user db
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error()); //exit if error
}
define('APP_NAME','Kraftfahrzeug-Datenbank');
