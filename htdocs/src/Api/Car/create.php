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
$car->__set('id',$repo->real_escape_string($data->id));//define fields from json in car constructor
$car->__set('name',$repo->real_escape_string($data->name));
$car->__set('b21',$repo->real_escape_string($data->b21));
$car->__set('b22',$repo->real_escape_string($data->b22));
$car->__set('j',$repo->real_escape_string($data->j));
$car->__set('vier',$repo->real_escape_string($data->vier));
$car->__set('d1',$repo->real_escape_string($data->d1));
$car->__set('d21',$repo->real_escape_string($data->d21));
$car->__set('d22',$repo->real_escape_string($data->d22));
$car->__set('d23',$repo->real_escape_string($data->d23));
$car->__set('zwei',$repo->real_escape_string($data->zwei));
$car->__set('fuenf1',$repo->real_escape_string($data->fuenf1));
$car->__set('fuenf2',$repo->real_escape_string($data->fuenf2));
$car->__set('v9',$repo->real_escape_string($data->v9));
$car->__set('vierzehn',$repo->real_escape_string($data->vierzehn));
$car->__set('p3',$repo->real_escape_string($data->p3));
$car->__set('verbin',$repo->real_escape_string($data->verbin));
$car->__set('verbau',$repo->real_escape_string($data->verbau));
$car->__set('verbko',$repo->real_escape_string($data->verbko));
$car->__set('co2komN',$repo->real_escape_string($data->co2komN));
$car->__set('sehrs',$repo->real_escape_string($data->sehrs));
$car->__set('schnell',$repo->real_escape_string($data->schnell));
$car->__set('langsam',$repo->real_escape_string($data->langsam));
$car->__set('co2komW',$repo->real_escape_string($data->co2komW));
$car->__set('verb_unit','l/100km');
$car->__set('co2_unit','g/km');

if ($repo->create($car)) {
    echo json_encode(
        array('message' => 'Car created.')
    );
} else {
    echo json_encode(
        array('message' => 'Car not created'));
}
$db->close();


