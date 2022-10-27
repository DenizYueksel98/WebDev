<?php
namespace Model\User;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json
header('Access-Control-Allow-Methods: POST');//allow POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');//allow some other useful headers

include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');

$user = new User($userdb);
$data = json_decode(file_get_contents("php://input"));//decode data from recieved json

$user->username  = $userdb->real_escape_string($data->username);//define fields from json
$user->password  = $userdb->real_escape_string($data->password);
$user->firstname = $userdb->real_escape_string($data->firstname);
$user->lastname  = $userdb->real_escape_string($data->lastname);

if ($user->create()) {
    echo json_encode(
        array('message' => 'User created.')
    );
} else {
    echo array('message' => 'User not created');
}
