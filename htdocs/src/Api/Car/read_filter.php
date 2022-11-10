<?php

namespace Api\Car;

use Framework\CarDatabase;
use Framework\CarRepository;

header('Access-Control-Allow-Origin: *'); //cross-origin resource sharing header
header('Content-Type: application/json'); //header for json

include_once(dirname(__FILE__) . '.' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '/core/initialize.php');

$filter = isset($_GET['filter']) ? $_GET['filter'] : die();
$theta = isset($_GET['theta']) ? $_GET['theta'] : die();
$value = isset($_GET['value']) ? $_GET['value'] : "";
if (isset($filter) && isset($value) && isset($theta)) {
    if (str_contains(strtoupper($theta), 'LIKE')) {
        $value = '%' . $value . '%';
    }
}

$result = $repo->readFilter($filter, $theta, $value);
$json= json_encode($result);
$db->close();
echo $json;
