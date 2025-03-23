<?php
class Sensor {
    private $conn;
    private $table = "sensor_tb";

    public $id;
    public $temperature;
    public $humidity;
    public $light;
    public $pm_value;
    public $recorded_date;
    public $recorded_time;
    
    public function __construct($db) {
        $this->conn = $db;
}

    //ฟัังก์ชันการทำงาน (CRUD) กับฝั่ง Client (Web/Mobile/IoT)
    //ฟังก์ชันดึงข้อมูล Sensor  ทั้งหมดไปแสดงที่ client
    public function getSensorAll() {
        $query = "SELECT * FROM  $this->table ORDER BY recorded_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
     public function getSensorAllByDate($date) {
        $query = "SELECT * FROM  $this->table  WHERE recorded_date = '$date'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
     }
     public function getSensorAllByDateAndBetweenTime($date,$start_time,$end_time) {
        $query = "SELECT * FROM  $this->table WHERE recorded_date = '$date' AND recorded_time BETWEEN '$start_time' AND '$end_time'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
     }
     public function getSensorAllByBetweenDate($start_date,$end_date) {
        $query = "SELECT * FROM  $this->table WHERE recorded_date BETWEEN '$start_date' AND '$end_date'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
     }
     public function getSensorAllTempByDate($date) {
        $query = "SELECT temperature FROM  $this->table WHERE recorded_date='$date'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
     }
}