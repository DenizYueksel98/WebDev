<?php
namespace Model\Car;
header('Access-Control-Allow-Origin: *');//cross-origin resource sharing header
header('Content-Type: application/json');//header for json

include_once(dirname(__FILE__).'.'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/core/initialize.php');

$car = new Car($cardb);
$car->id = isset($_GET['id']) ? $_GET['id'] : die();

$result = $car->read_single();
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
    $car_arr = array();
    $car_arr['data'] = array();

    if ($row = fetchAssocStatement($result)) {
        extract($row);
        $car_item=array(
            //'id'=>$id,
            'id'=>$id,
            'name'=>$name,
            'b21'=>$b21,
            'b22'=>$b22,
            'j'=>$j,
            'vier'=>$vier,
            'd1'=>$d1,
            'd2'=>$d2,
            'zwei'=>$zwei,
            'fuenf'=>$fuenf,
            'v9'=>$v9,
            'vierzehn'=>$vierzehn,
            'p3'=>$p3,
            'verbin'=>$verbin,
            'verbau'=>$verbau,
            'verbko'=>$verbko,
            'co2kom'=>$co2kom,
            'sehrs'=>$sehrs,
            'schnell'=>$schnell,
            'langsam'=>$langsam,
            'co2komb'=>$co2komb
        );
        array_push($car_arr['data'], $car_item);
    }
    echo json_encode($car_arr);
} else {
    echo json_encode(array('message' => 'No car with this id found.'));
}
