<?php
namespace Model\User;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json

include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');

$user = new User($userdb);
$user->id = isset($_GET['id']) ? $_GET['id'] : die();

$result = $user->read_single();
$num = $result->num_rows;
function fetchAssocStatement($stmt)
{
    if ($stmt->num_rows > 0) {
        $result = array();
        $md = $stmt->result_metadata();
        $params = array();
        while ($field = $md->fetch_field()) {
            $params[] = &$result[$field->name];
        }
        call_user_func_array(array($stmt, 'bind_result'), $params);
        if ($stmt->fetch())
            return $result;
    }

    return null;
}

if ($num === 1) {
    $user_arr = array();
    $user_arr['data'] = array();

    if ($row = fetchAssocStatement($result)) {
        extract($row);
        $user_item = array(
            'id'        => $id,
            'username'  => $username,
            'password'  => $password,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'timestamp' => $timestamp
            );
        array_push($user_arr['data'], $user_item);
    }
    echo json_encode($user_arr);
} else {
    echo json_encode(array('message' => 'No user with this id found.'));
}
