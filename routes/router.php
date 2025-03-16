<?php


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once "./../core/Request.php";
require_once "./../controllers/SensorController.php";

$sensorController = new SensorController();


Request::handleRequest("GET","/smartfarmservice/sensors", function () use ($sensorController){
    $sensorController->getSensorAll();
});

?>