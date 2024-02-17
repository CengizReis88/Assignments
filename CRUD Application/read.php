<?php  

include "connect.php";

class Display {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayUser(){

        $sqldisplay = "SELECT * FROM users";
        $result = $this->conn->query($sqldisplay);

        if($result){
            echo json_encode($result);
        }
        



    }

}