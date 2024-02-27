<?php

function validateUsername($username){

    if(!preg_match('/^[a-zA-Z0-9]+$/', $username)){
        return false;
    } 
    else{
        return true;
    }
}
function validateEmail($email){

    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
        return false;
    }
    else{
        return true;
    }
}
function validatePassword($password){
    
    /*   at least one lowercase char
     *   at least one uppercase char
     *   at least one digit
     *   between 8-64 characters  
     */
    
     if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,64}$/', $password)){
        return false;
     }
     else{
        return true;
     }
}

//--------Register---------//

$username = '';
$password = '';
$errors = [];

if (isset($_POST['registerbutton'])) {
    
    $username = validateUsername($_POST['username']) ? $_POST['username'] : '';
    $email = validateEmail($_POST['email']) ? $_POST['email'] : '';
    $password = validatePassword($_POST['password']) ? $_POST['password'] : ''; 
    $passwordconfirm = $_POST['passwordconfirm'];

if (empty($username)) {  
    array_push($errors, "Empty username"); 
}
if (empty($email)){
    array_push($errors, "Empty email");
}
if (empty($password)){
    array_push($errors, "Empty password");
}

$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user && isset($user['username']) && $user['username'] == $username && !empty($username)) {
    array_push($errors, "Username already exists.");
}
if ($user && isset($user['email']) && $user['email'] == $email && !empty($email)) {
    array_push($errors, "Email already exists.");
}

if (empty($errors)){
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, email, password, created_at) VALUES('$username', '$email', '$password', now())";
    
    mysqli_query($conn, $query);

    $user_id = mysqli_insert_id($conn);

    $_SESSION['user'] = getUserById($user_id);
    header("Location: index.php");
    exit();
}
}

//------------Login-----------//


if(isset($_POST['loginbuton'])) {
    
    $username = validateUsername($_POST['username']) ? $_POST['username'] : '';
    
    $password = validatePassword($_POST['password']) ? $_POST['password'] : '';

    if (empty($username)) {  
        array_push($errors, "Empty username"); 
    }
    if (empty($password)){
        array_push($errors, "Empty password");
    }


    if (empty($errors)){
        
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sqlcheckuservalid = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

        $result = mysqli_query($conn,$sqlcheckuservalid);

        if (mysqli_num_rows($result) > 0) {
            
            $user_id = mysqli_fetch_assoc($result)['id']; 
 
            $_SESSION['user'] = getUserById($user_id);
            $_SESSION['message'] = "You are now logged in";
        
            header("Location: index.php");                          
            exit();
    
    
        } 
        else {
            array_push($errors, 'Wrong username or password.');
        }
    }


}


function getUserById($user_id){
    global $conn;
    $sqlgetuserid = "SELECT * FROM users WHERE id=$user_id LIMIT 1";

    $result = mysqli_query($conn, $sqlgetuserid);
    $user = mysqli_fetch_assoc($result);

    return $user; 
}