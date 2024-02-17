<?php

include 'connect.php';

class Delete{
private $conn;

public function _Construct($conn) {
    $this->conn = $conn;
}
    public function deleteUser($userid){
        
        if($this->validateID($userid)){
            $sqldelete = 'DELETE FROM users WHERE user_id='.$userid;
            $result = $this->conn->query($sqldelete);

            if($result){
                $this->conn->commit();
            }
            else{
                $this->conn->rollback();
            }
        }
    }   
    
    private function validateID($userid){
        if($userid > 0){
            return true;
        }
        else{
            throw new Exception("ID must be higher than 0");
        }




    }
}