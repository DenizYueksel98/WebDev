<?php
//set vars for db connection
$host = "mariadb"; 
$username = "root";
$password = "wwi2021a"; //insert wwi2021a for docker
$database = "wwi2021a";


$db = new mysqli($host, $username, $password, $database);//connect to db
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error()); //exit if error
}
define('APP_NAME','Kraftfahrzeug-Datenbank');
