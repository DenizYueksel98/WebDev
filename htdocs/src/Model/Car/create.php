<?php
namespace Model\Car;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json
header('Access-Control-Allow-Methods: POST');//allow POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');//allow some other useful headers

include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');

$car = new Car($cardb);

$data = json_decode(file_get_contents("php://input"));//decode data from recieved json

$car->id        =$cardb->real_escape_string($data->id);//define fields from json
$car->name      =$cardb->real_escape_string($data->name);
$car->b21       =$cardb->real_escape_string($data->b21);
$car->b22       =$cardb->real_escape_string($data->b22);
$car->j         =$cardb->real_escape_string($data->j);
$car->vier      =$cardb->real_escape_string($data->vier);
$car->d1        =$cardb->real_escape_string($data->d1);
$car->d2        =$cardb->real_escape_string($data->d2);
$car->zwei      =$cardb->real_escape_string($data->zwei);
$car->fuenf     =$cardb->real_escape_string($data->fuenf);
$car->v9        =$cardb->real_escape_string($data->v9);
$car->vierzehn  =$cardb->real_escape_string($data->vierzehn);
$car->p3        =$cardb->real_escape_string($data->p3);
$car->nid       =$cardb->real_escape_string($car->id);
$car->verbin    =$cardb->real_escape_string($data->verbin);
$car->verbau    =$cardb->real_escape_string($data->verbau);
$car->verbko    =$cardb->real_escape_string($data->verbko);
$car->co2kom    =$cardb->real_escape_string($data->co2kom);
$car->wid       =$cardb->real_escape_string($car->id);
$car->sehrs     =$cardb->real_escape_string($data->sehrs);
$car->schnell   =$cardb->real_escape_string($data->schnell);
$car->langsam   =$cardb->real_escape_string($data->langsam);
$car->co2komb   =$cardb->real_escape_string($data->co2komb);

if ($car->create()) {
    echo json_encode(
        array('message' => 'Car created.')
    );
} else {
    echo array('message' => 'Car not created');
}
