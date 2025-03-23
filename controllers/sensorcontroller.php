<?php
require_once "./../config/database.php"; //จัดการติดต่อกับฐานข้อมูล
require_once "./../models/sensor.php"; //จัดการการทำงาน CRUD กับตารางฐานข้อมูล
require_once "./../core/response.php";
class SensorController {
    private $db;
    private $sensor;

    public function __construct() {
        $this->db = new Database();
        $this->sensor = new Sensor($this->db->connect());
    }

    public function getSensorAll() {
        $result = $this->sensor->getSensorAll();
        $this->sendResponseFromResult($result);
    
    }
    public function getSensorAllByDate($date) {
        $result = $this->sensor->getSensorAllByDate($date);
        $this->sendResponseFromResult($result);
    }
    public function getSensorAllByDateAndBetweenTime($date,$start_time,$end_time) {
        $result = $this->sensor->getSensorAllByDateAndBetweenTime($date,$start_time,$end_time);
        $this->sendResponseFromResult($result);
    }
    
    public function getSensorAllByBetweenDate($start_date,$end_date) {
        $result = $this->sensor->getSensorAllByBetweenDate($start_date,$end_date);
        $this->sendResponseFromResult($result);
    }
    
    public function getSensorAllTempByDate($date) {
        $result = $this->sensor->getSensorAllTempByDate($date);
        $this->sendResponseFromResult($result);
    }

    private function sendResponseFromResult($result) {
        $num = $result->rowCount();
        if ($num > 0) {
            $sensors_arr = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $sensors_arr[] = $row;
            }
            Response::sendResponse(200, $sensors_arr);
        } else {
            Response::sendResponse(404, ["message" => "No data found"]);
        }
    }
}
?>