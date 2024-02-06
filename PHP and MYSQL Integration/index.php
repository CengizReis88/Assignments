<?php


class Database{

    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = "todo";



    public static function Connect(){

        $servername = self::$servername;
        $username = self::$username;            
        $password = self::$password;
        $database = self::$database;


        $conn = new mysqli($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: ");
        }

        echo "Connected successfully";
        header("mainpage.php");
    }

}

Database::Connect();


function displayTodos($conn,$username){

    $conn = Database::Connect();
    $data = "SELECT * FROM tasks";
    $result = mysqli_query($username,$data);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["tasks_id"] . " - Task: " . $row["taskname"] . 
                " - Status: " . ($row["completion"] ? "Completed" : "Not Complete") . "<br>";
        }
    }
    echo "No todos";
}


function addTodos($conn,$username,$taskname){
    
    $conn = Database::Connect();
    $data = "INSERT INTO tasks(username, task, completion) VALUES ('$username','$taskname','0')";
}


function deleteTodos($conn,$username,$taskname,$tasks_id){
    
    $conn = Database::Connect();
    $data = "DELETE FROM tasks WHERE tasks_id = '$tasks_id' OR taskname = '$taskname' AND username = '$username'";

}

function updateTodos($conn,$tasks_id,$completion){

    $conn = Database::Connect();
    $data = "UPDATE tasks SET completion = 1 WHERE task_id = '$tasks_id'"; 
}

?>

<html>
    <head>
        <title>Welcome to TODO Table</title>
    </head>
    <body>
        <?php echo displayTodos($conn,$username); ?>
        <button onclick="addTodos($conn,$username,$taskname)">Add Task</button>
        <button onclick="deleteTodos($conn,$username,$taskname,$tasks_id)">Delete Task</button>
        <button onclick="updateTodos($conn,$tasks_id,$completion)">Update Task</button>
    </body>
</html>