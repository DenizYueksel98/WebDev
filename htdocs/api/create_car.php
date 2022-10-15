<?php
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: appclication/json');//header for json
header('Access-Control-Allow-Methods: POST');//allow POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');//allow some other useful headers

include_once('../core/initialize.php');

$car = new Car($cardb);

$data = json_decode(file_get_contents("php://input"));//decode data from recieved json

$car->id        =$data->id;//define fields from json
$car->name      =$data->name;
$car->b21       =$data->b21;
$car->b22       =$data->b22;
$car->j         =$data->j;
$car->vier      =$data->vier;
$car->d1        =$data->d1;
$car->d2        =$data->d2;
$car->zwei      =$data->zwei;
$car->fuenf     =$data->fuenf;
$car->v9        =$data->v9;
$car->vierzehn  =$data->vierzehn;
$car->p3        =$data->p3;
$car->nid       =$car->id;
$car->verbin    =$data->verbin;
$car->verbau    =$data->verbau;
$car->verbko    =$data->verbko;
$car->co2kom    =$data->co2kom;
$car->wid       =$car->id;
$car->sehrs     =$data->sehrs;
$car->schnell   =$data->schnell;
$car->langsam   =$data->langsam;
$car->co2komb   =$data->co2komb;

if ($car->create()) {
    echo json_encode(
        array('message' => 'Car created.')
    );
} else {
    echo array('message' => 'Car not created');
}
