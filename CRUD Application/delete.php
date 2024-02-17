<?php

include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

    $id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

    if($id > 0){
    
    $sqldelete = $conn->prepare('DELETE FROM users WHERE user_id=?');
    $sqldelete->bind_param("i",$id);
    $sqldelete->execute([$id]);
    }
}

?>