<?php
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: appclication/json');//header for json
header('Access-Control-Allow-Methods: POST');//allow POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');//allow some other useful headers

include_once('../core/initialize.php');

$user = new User($userdb);

$data = json_decode(file_get_contents("php://input"));//decode data from recieved json

$user->username  = $data->username;//define fields from json
$user->password  = $data->password;
$user->firstname = $data->firstname;
$user->lastname  = $data->lastname;

if ($user->create()) {
    echo json_encode(
        array('message' => 'User created.')
    );
} else {
    echo array('message' => 'User not created');
}
