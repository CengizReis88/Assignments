<?php

Class Logout{

    public function logoutUser(){
        
        session_start();

        $_SESSION = array();

        session_destroy();

        header("index.php");
        exit;
    }
}
?>


<html>
<head>
    <title>Logged in</title>
</head>
<body>
    <form action="loggedin.php" method="post"> 
        <button type="submit" name="logout" id="logoutbutton">Logout</button>
    </form>
</body>
</html>


<?php
    if (isset($_POST['logout'])) { 
        require_once('Logout.php'); 

        $logout = new Logout();
        $logout->logoutUser(); 
    }
?>