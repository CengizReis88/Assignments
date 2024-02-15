<?php

include 'create.php';

if($_SERVER("REQUEST_METHOD") == $_POST){
  
  if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['email'])){

    function addUser($conn, $username, $email, $password){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqladd = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn,$sqladd);

    } 
    } 
}

addUser($conn, $username, $email, $password);