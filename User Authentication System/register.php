<?php

include 'connect.php';
include 'index.php';

class Register{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function validateUsername($username){

        if(!preg_match("/^[A-Za-z0-9_-]*$/", $username)){
            throw new Exception("Dont use weird characters.");
        } 
        else{
            return true;
        }
    }
    private function validateEmail($email){

        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
            throw new Exception("Invalid Email.");
        }
        else{
            return true;
        }
    }
    private function validatePassword($password){
        
        /*   at least one lowercase char
         *   at least one uppercase char
         *   at least one digit
         *   at least one special char
         *   between 8-32 characters  */
        
         if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,32}$/", $password)){
            throw new Exception("Prequisitions doesn't match.");
         }
         else{
            return true;
         }
    }


    public function createUser($username, $email, $password){

        $username = $_POST['registerusername'];
        $email = $_POST['registeremail'];
        $password = $_POST['registerpassword'];

        try{
            if($this->validateUsername($username) && $this->validateEmail($email) && $this->validatePassword($password)){
                
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $sqlregister = $this->conn->prepare("INSERT INTO users (username, email,password) VALUES ('?, ?, ?')");
                $sqlregister->bind_param("sss", $username, $email, $hashed_password);
                $sqlregister->execute();
            
            }
        } 
        catch(Exception $e){
            $this->conn->rollback();
        }
    }    
}
