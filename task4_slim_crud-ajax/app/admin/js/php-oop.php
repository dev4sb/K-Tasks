<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','php_oop');

class DatabaseConnection{

    public function __construct(){
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        
        if($conn->connect_error){
            die("<h4>Database connection failed</h4>");
        }
        // echo "Database connected successfully";
        return $this->conn = $conn;
    }
}

?>