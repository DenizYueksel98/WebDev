<?php
namespace Api\Car;
use Model\Car\Car;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json
header('Access-Control-Allow-Methods: POST');//allow POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');//allow some other useful headers

include_once(__DIR__.'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');//init
//include_once(MODEL_PATH.DS.'Car/car.php');
$data = json_decode(file_get_contents("php://input"));//decode data from recieved json
$car = new Car();
$car->setid($repo->real_escape_string($data->id));//define fields from json in car constructor
$car->setname($repo->real_escape_string($data->name));
$car->setb21($repo->real_escape_string($data->b21));
$car->setb22($repo->real_escape_string($data->b22));
$car->setj($repo->real_escape_string($data->j));
$car->setvier($repo->real_escape_string($data->vier));
$car->setd1($repo->real_escape_string($data->d1));
$car->setd21($repo->real_escape_string($data->d21));
$car->setd22($repo->real_escape_string($data->d22));
$car->setd23($repo->real_escape_string($data->d23));
$car->setzwei($repo->real_escape_string($data->zwei));
$car->setfuenf1($repo->real_escape_string($data->fuenf1));
$car->setfuenf2($repo->real_escape_string($data->fuenf2));
$car->setv9($repo->real_escape_string($data->v9));
$car->setvierzehn($repo->real_escape_string($data->vierzehn));
$car->setp3($repo->real_escape_string($data->p3));
$car->setverbin($repo->real_escape_string($data->verbin));
$car->setverbau($repo->real_escape_string($data->verbau));
$car->setverbko($repo->real_escape_string($data->verbko));
$car->setco2komN($repo->real_escape_string($data->co2komN));
$car->setsehrs($repo->real_escape_string($data->sehrs));
$car->setschnell($repo->real_escape_string($data->schnell));
$car->setlangsam($repo->real_escape_string($data->langsam));
$car->setco2komW($repo->real_escape_string($data->co2komW));
$car->setverb_unit('l/100km');
$car->setco2_unit('g/km');

if ($repo->create($car)) {
    echo json_encode(
        array('message' => 'Car created.')
    );
} else {
    echo json_encode(
        array('message' => 'Car not created'));
}
$db->close();


