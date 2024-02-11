<?php

class Database {
    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "todo";

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

function displayTodos($conn, $username) {
    $data = "SELECT * FROM tasks WHERE username='$username'";
    $result = mysqli_query($conn, $data);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["tasksid"] . " - Task: " . $row["taskname"] . 
                " - Status: " . ($row["completion"] ? "Completed" : "Not Complete") . "<br>";
        }
    } else {
        echo "No todos";
    }
}

function addTodos($conn, $username, $taskname) {
    $data = "INSERT INTO tasks(username, taskname, completion) VALUES ('$username','$taskname','0')";
    mysqli_query($conn, $data);
}

function deleteTodos($conn, $username, $tasksid) {
    $data = "DELETE FROM tasks WHERE tasksid = '$tasksid' AND username = '$username'";
    mysqli_query($conn, $data);
}

function updateTodos($conn, $tasksid, $completion) {
    $data = "UPDATE tasks SET completion = '$completion' WHERE tasksid = '$tasksid'";
    mysqli_query($conn, $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        addTodos($conn, $_POST["username"], $_POST["taskname"]);
    } elseif (isset($_POST["delete"])) {
        deleteTodos($conn, $_POST["username"], $_POST["tasksid"]);
    } elseif (isset($_POST["update"])) {
        updateTodos($conn, $_POST["tasksid"], $_POST["completion"]);
    }
}

?>

<html>
<head>
    <title> TODO Table</title>
</head>
<body>
    <?php
    if (isset($_POST["display"])) {
        displayTodos($conn, $_POST["username"]);
    }
    ?>
    <form method="post">
        <input type="text" name="username" placeholder="username">
        <input type="submit" name="display" value="Display Todos">
    </form>
    <form method="post">
        <input type="test" name="username" placeholder="username">
        <input type="text" name="taskname" placeholder="Task Name">
        <input type="submit" name="add" value="Add Task">
    </form>
    <form method="post">
        <input type="text" name="username" placeholder="username">
        <input type="number" name="tasksid" placeholder="Task ID">
        <input type="submit" name="delete" value="Delete Task">
    </form>
    <form method="post">
        <input type="number" name="tasksid" placeholder="Task ID">
        <input type="number" name="completion" placeholder="Completion">
        <input type="submit" name="update" value="Update Task">
    </form>
</body>
</html>
