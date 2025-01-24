<?php
class DB{

private $conn;
private $servername = "localhost";
private $username = "root";
private $password = "";
private $db = "photo_gallery";


public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
    }    
    

 public function getConnection(){
        return $this->conn;
    }
}
