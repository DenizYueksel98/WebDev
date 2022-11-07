<?php
namespace Api\Car;
use Framework\CarDatabase;
use Framework\CarRepository;

header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json

include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');//init

$result = $repo->readAll();
$json=json_encode($result);
$db->close();
echo $json;