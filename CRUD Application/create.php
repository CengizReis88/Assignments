
<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="create.php" method="POST">
        <label for="username">Username : </label>
        <input type="text" id="username" name="username" placeholder="Username" class="form_field"><br>
        <label for="email">Email : </label>
        <input type="email" id="email" name="email" placeholder="Email" class="form_field"><br>
        <label for="password">Password : </label>
        <input type="password" id="password" name="password" placeholder="Password" class="form_field"><br>
        <input type="submit" value="Submit" class="submitbutton">
    </form>
    
</body>
</html>

<?php

class Database {
    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "web_dev_crud";

    public static function Connect() {
        $servername = self::$servername;
        $username = self::$username;
        $password = self::$password;
        $database = self::$database;

        $conn = new mysqli($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
}

