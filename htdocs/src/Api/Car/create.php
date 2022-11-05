<?php
namespace Api\Car;
use Framework\CarDatabase;
use Framework\CarRepository;
use Model\Car\Car;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json
header('Access-Control-Allow-Methods: POST');//allow POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');//allow some other useful headers

include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');//init
include_once(FRAMEWORK_PATH.DS."CarDatabase.php");
include_once(FRAMEWORK_PATH.DS.'CarRepository.php');
$db=new CarDatabase("127.0.0.1","root","","cars");
$repo=new CarRepository($db);

$data = json_decode(file_get_contents("php://input"));//decode data from recieved json
$car = new Car(
$repo->real_escape_string($data->id),//define fields from json in car constructor
$repo->real_escape_string($data->name),
$repo->real_escape_string($data->b21),
$repo->real_escape_string($data->b22),
$repo->real_escape_string($data->j),
$repo->real_escape_string($data->vier),
$repo->real_escape_string($data->d1),
$repo->real_escape_string($data->d2),
$repo->real_escape_string($data->zwei),
$repo->real_escape_string($data->fuenf),
$repo->real_escape_string($data->v9),
$repo->real_escape_string($data->vierzehn),
$repo->real_escape_string($data->p3),
$repo->real_escape_string($data->verbin),
$repo->real_escape_string($data->verbau),
$repo->real_escape_string($data->verbko),
$repo->real_escape_string($data->co2kom),
$repo->real_escape_string($data->sehrs),
$repo->real_escape_string($data->schnell),
$repo->real_escape_string($data->langsam),
$repo->real_escape_string($data->co2komb));

if ($repo->create($car)) {
    echo json_encode(
        array('message' => 'Car created.')
    );
} else {
    echo json_encode(
        array('message' => 'Car not created'));
}
$db->close();


