<?php
namespace Api\Car;
use Framework\CarRepository;
use Framework\CarDatabase;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json


include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');//init

$id = isset($_GET['id']) ? $_GET['id'] : die();
$result = $repo->readSingleCar($id);
$db->close();
echo json_encode($result);