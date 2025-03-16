<?php
require_once "./../config/database.php";
require_once "./../models/Sensor.php";
require_once "./../core/Response.php";  

class SensorController{
    private $db;
    private $sensor;
    public function __construct(){
        $this->db = new Database();
        $this->sensor = new Sensor($this->db->connect());
    }
    public function getSensorAll() {
        $result=$this->sensor->getSensorAll();
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
