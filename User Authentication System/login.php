<?php

include 'connect.php';
include 'index.php';

class Login{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function loginUser($username, $password){
    
        $username = $_POST['loginusername'];
        $password = $_POST['loginpassword'];
    
        if(isset($username) && isset($password)){
            $sqlcheck = "SELECT id, username, password FROM users WHERE username = ?";
        
            if($stmt = mysqli_prepare($this->conn, $sqlcheck)){
                mysqli_stmt_bind_param($stmt, "s", $username);
            
                if(mysqli_stmt_execute($stmt)){            
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $id, $username,$hashed_password);
                        
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                
                                session_start();

                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;

                                header("loggedin.php");
                                exit;
                            }
                            else{
                                echo "Wrong username or password.";
                            }

                        }
                    }    
                    else{
                        echo "Wrong username or password.";
                    }    
                }
            }
        }
    }
}
