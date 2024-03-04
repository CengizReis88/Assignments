<?php

include ('connect.php');




function displayTasks($filter){

    global $conn;
     
    if ($filter === 'all'){
            
        $sql = $conn->prepare("SELECT * FROM tasks");
    }
    else{
        $sql = $conn->prepare("SELECT * FROM tasks WHERE completion = (?)");

        $sql->bind_param("s", $filter);           
    }
    $sql->execute();

    $result = $sql->get_result();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["taskid"] . " - Task: " . $row["taskname"] . " - Status: " . ($row["completion"] ? "Done" : "Pending"). "\n";
        }
    } 
    else {
        echo "No todos";
    }

    $sql->close();
}



function addTask($task){

    global $conn;

    if(empty($task)){
        return false;
        
    }
    else{
        var_dump($conn);
        $sql = $conn->prepare("INSERT INTO tasks(taskname) VALUES (?)");
        $sql->bind_param("s", $task);
        $result = $sql->execute();

        $sql->close();
    }  
    
    if($result){
        echo "Task added successfully.". "\n";
    }
    else{
        echo "A problem occured while adding task.". "\n";
    }

}



function deleteTask($conn, $id){

    if(empty($id)){
        return false;
    }
    else{
        $sql = $conn->prepare("DELETE FROM tasks WHERE id = ?");
        $sql->bind_param("i", $id);
        $result = $sql->execute();

        $sql->close();
    }

    if($result){
        echo "Task deleted successfully." . "\n";
    }
    else{
        echo "A problem occured while deleting task." . "\n";
    }
}



function updateTask($conn, $id, $task){

    if(empty($id)){
        return false;
    }
    else{
        $sql = $conn->prepare("UPDATE tasks SET taskname = ? WHERE id = ?");
        $sql->bind_param("si", $task,$id);
        $result = $sql->execute();

        $sql->close();
    }
    
    if($result){
        echo "Task updated successfully." . "\n";
    }
    else{
        echo "A problem occured while updating task." . "\n";
    }

}



function doTask($conn, $id){

    if(empty($id)){
        return false;
    }
    else{
        $sql = $conn->prepare("UPDATE tasks SET completion = 'Done' WHERE id = ?");
        $sql->bind_param("i", $id);
        $result = $sql->execute();

        $sql->close();
    }

    if($result){
        echo "Task completed successfully." . "\n";
    }
    else{
        echo "A problem occured while completing task." . "\n";
    }

}



function undoTask($conn, $id){

    if(empty($id)){
        return false;
    }
    else{
        $sql = $conn->prepare("UPDATE tasks SET completion = 'Pending' WHERE id = ?");
        $sql->bind_param("i", $id);
        $result = $sql->execute();

        $sql->close();
    }

    if($result){
        echo "Task undid successfully." . "\n";
    }
    else{
        echo "A problem occured while undoing task." . "\n";
    }

}

function help(){

echo "For displaying tasks : php todo.php display [filter =(done,pending)]\n";
echo "For adding task : php todo.php add [task]\n";
echo "For deleting task : php todo.php delete [id]\n";
echo "For updating task : php todo.php update [id] [task]\n";
echo "For setting task done : php todo.php done [id]\n";
echo "For setting task undone : php todo.php undo [id]\n";

}


if (isset($argv[1])){
    $command = $argv[1];


    switch ($command){
        case 'display':
            $filter = isset($argv[2]) ? $argv[2] : 'all';
            displayTasks($filter);
            break;


        case 'add':
            if (isset($argv[2])){
                $task = $argv[2];
                addTask($task);
            } 
            else{
                echo "Please delete task for the new task.\n";
            }
            break;


        case 'delete':
            if (isset($argv[2])){
                $id = $argv[2];
                deleteTask($conn, $id);
            } 
            else{
                echo "Please enter the task id to delete.\n";
            }
            break;


        case 'update':
            if (isset($argv[2]) && isset($argv[3])){
                $id = $argv[2];
                $task = $argv[3];
                updateTask($conn, $id, $task);
            }
            else{
            echo "Please enter the task id and task to update.\n";
            }
            break;


        case 'done':
            if (isset($argv[2])){
                $id = $argv[2];
                doTask($conn, $id);
            } 
            else{
            echo "Please enter the task id to set task as done.\n";
            }
            break;


        case 'undo':
            if (isset($argv[2])){
                $id = $argv[2];
                undoTask($conn, $id);
            } 
            else{
                echo "Please enter the task id to set task as undone.\n";
            }
            break;


        case 'help':
            help();
            break;

            
        default:
            echo "Invalid command. For help use 'php todo.php help'\n";
    }

}







