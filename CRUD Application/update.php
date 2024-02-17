<?php

require "connect.php";

if($_SERVER["REQUEST_METHOD"] == 'PUT'){

    parse_str(file_get_contents('create.php'), $data);
    
    $userid = $data['user_id'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    
    $sqlupdate = $conn->prepare('UPDATE users SET username=?, email=?, password=? WHERE user_id = ?');
    $sqlupdate->bind_param("sss", $username, $email, $password);
    $sqlupdate->execute([$username, $email, $password]);

}
?>