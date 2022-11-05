<?php

namespace Api\Car;

use Framework\CarDatabase;
use Framework\CarRepository;

header('Access-Control-Allow-Origin: *'); //cross-origin resource sharing header
header('Content-Type: application/json'); //header for json

include_once(dirname(__FILE__) . '.' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '/core/initialize.php');
include_once(FRAMEWORK_PATH . DS . "CarDatabase.php");
include_once(FRAMEWORK_PATH . DS . 'CarRepository.php');
$filter = isset($_GET['filter']) ? $_GET['filter'] : die();
$theta = isset($_GET['theta']) ? $_GET['theta'] : die();
$value = isset($_GET['value']) ? $_GET['value'] : die();
if (isset($filter) && isset($value) && isset($theta)) {
    if (str_contains(strtoupper($theta), 'LIKE')) {
        $value = '%' . $value . '%';
    }
    if    (str_contains(strtolower($filter),'id'))      $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'name'))    $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'b21'))     $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'b22'))     $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'j'))       $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'vier'))    $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'d1'))      $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'d2'))      $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'zwei'))    $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'fuenf'))   $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'v9'))      $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'vierzehn'))$filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'p3'))      $filter='s.'.$filter;
    elseif(str_contains(strtolower($filter),'verbin'))  $filter='n.'.$filter;
    elseif(str_contains(strtolower($filter),'verbau'))  $filter='n.'.$filter;
    elseif(str_contains(strtolower($filter),'verbko'))  $filter='n.'.$filter;
    elseif(str_contains(strtolower($filter),'co2kom'))  $filter='n.'.$filter;
    elseif(str_contains(strtolower($filter),'sehrs'))   $filter='w.'.$filter;
    elseif(str_contains(strtolower($filter),'schnell')) $filter='w.'.$filter;
    elseif(str_contains(strtolower($filter),'langsam')) $filter='w.'.$filter;
    elseif(str_contains(strtolower($filter),'co2komb')) $filter='w.'.$filter;
}
$db = new CarDatabase("127.0.0.1", "root", "", "cars");
$repo = new CarRepository($db);
$result = $repo->readFilter($filter, $theta, $value);
$json= json_encode($result);
$db->close();
echo $json;
