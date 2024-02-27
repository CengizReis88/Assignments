<?php

class Database {
    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "blog";

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
$conn = Database::Connect();

