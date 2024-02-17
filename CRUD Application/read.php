<?php  

include "connect.php";

if($_SERVER["REQUEST_METHOD"] == 'GET'){

    $sqldisplay = $conn->query('SELECT * FROM users');
    $result = $sqldisplay->fetch_all(PDO::FETCH_ASSOC);
    echo json_encode($result);

}