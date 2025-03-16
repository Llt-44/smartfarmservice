<?php
class Database{
 
    // specify your own database credentials
    private $host = "mysql-10b39cbf-sau-f69a.h.aivencloud.com:16839";
    private $db_name = "smart_farm_db";
    private $username = "avnadmin";
    private $password = "AVNS_RiL2oOft5Cxik8LP3wB";
    private $conn;
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
 
 
