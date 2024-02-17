<?php

require "connect.php";

class Update{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function updateUser($newusername, $newemail, $newpassword, $userid){
        
        if(!empty($newusername) && !empty($newemail) && !empty($newpassword) && $this->validateID($userid)){
            $sqlupdate = "UPDATE users SET username = '$newusername' email ='$newemail' password='$newpassword'WHERE user_id ?  ";
            $result = $this->conn->query($sqlupdate);
        
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

    
        
