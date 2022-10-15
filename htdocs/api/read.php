<?php
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: appclication/json');//header for json

include_once('../core/initialize.php');//init

$user = new User ($db);

$result = $user->read();

$num = $result->num_rows;
function fetchAssocStatement($stmt)
{
    if($stmt->num_rows>0){
        $result = array();
        $md = $stmt->result_metadata();
        $params = array();
        while($field = $md->fetch_field()) {
            $params[] = &$result[$field->name];
        }
        call_user_func_array(array($stmt, 'bind_result'), $params);
        if($stmt->fetch())
            return $result;
    }

    return null;
}

if($num>0){
    $user_arr = array();
    $user_arr['data']= array();

    while($row=fetchAssocStatement($result)){
            extract($row);
            $user_item=array(
                'id'=>$id,
                'username'=>$username,
                'password'=>$password,
                'firstname'=>$firstname,
                'lastname'=> $lastname,
                'timestamp'=> $timestamp
            );
            array_push($user_arr['data'],$user_item);
    }
    echo json_encode($user_arr);
    }else{
        echo json_encode(array('message'=>'No users found.'));
    }
