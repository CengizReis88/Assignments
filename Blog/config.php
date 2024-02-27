<?php
    
    define('ROOT_PATH', realpath(dirname(__FILE__)));
    
    include(ROOT_PATH .'/apps/connect.php');

    session_start();

    $conn = Database::Connect();

    if(!$conn){
        die("Cannot reach database." . mysqli_connect_error());
    }

    define('BASE_URL','http://localhost/Blog');
    
