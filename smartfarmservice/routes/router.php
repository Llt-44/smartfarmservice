<?php
//ไฟล์นี้กำหนดตัว endpoint ในการทำงาน CRUD กับตารางฐานข้อมูลจากฝั่ง Client (Web/Mobile/IoT)
//ดึงข้อมูลทั้งหมด GET domain/smarthomeservice/sensor

header("Contenet-Type:application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once "./../core/request.php";
require_once "./../controllers/sensorcontroller.php";

$sensorController = new SensorController();

Request:: handleRequest("GET","/smartfarmservice/sensors",function() use ($sensorController){
    $sensorController->getSensorAll();
});

Request:: handleRequest("GET","/smartfarmservice/sensors/date",function() use ($sensorController){
    $sensorController->getSensorAllByDate($_GET['date']);
}); 
Request:: handleRequest("GET","/smartfarmservice/sensors/dateandtime",function() use ($sensorController){
    $sensorController->getSensorAllByDateAndBetweenTime($_GET['date'] , $_GET['start_time'],$_GET['end_time']);
}); 

Request:: handleRequest("GET","/smartfarmservice/sensors/dateanddate",function() use ($sensorController){
    $sensorController->getSensorAllByBetweenDate($_GET['start_date'],$_GET['end_date']);
}); 

Request:: handleRequest("GET","/smartfarmservice/sensors/datetemp",function() use ($sensorController){
    $sensorController->getSensorAllTempByDate($_GET['date']);
});
 ?>