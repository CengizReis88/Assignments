<?php 
include ('../apps/register_login.php');


$admin_id = 0;
$isEditingUser = false;
$username = "";
$admin = "";
$email = "";


$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

$errors = [];

/* Admin actions */

if (isset($_POST['create_admin'])) {
        createAdmin($_POST);
}

if (isset($_GET['edit-admin'])) {
        $isEditingUser = true;
        $admin_id = $_GET['edit-admin'];
        editAdmin($admin_id);
}

if (isset($_POST['update_admin'])) {
        updateAdmin($_POST);
}

if (isset($_GET['delete-admin'])) {
        $admin_id = $_GET['delete-admin'];
        deleteAdmin($admin_id);
}

/* Topic actions */

if (isset($_POST['create_topic'])) {    
        createTopic($_POST); 
}

if (isset($_GET['edit-topic'])) {
        $isEditingTopic = true;
        $topic_id = $_GET['edit-topic'];
        editTopic($topic_id);
}

if (isset($_POST['update_topic'])) {
        updateTopic($_POST);
}

if (isset($_GET['delete-topic'])) {
        $topic_id = $_GET['delete-topic'];
        deleteTopic($topic_id);
}


/* Admin functions */

function createAdmin($request_values){

        global $conn, $errors, $admin, $username, $email;

        $username = validateUsername($request_values['username']) ? $request_values['username'] : '';
        $email = validateEmail($request_values['email']) ? $request_values['email'] : '';
        $password = validatePassword($request_values['password']) ? $request_values['password'] : ''; 
        $passwordConfirmation = $request_values['passwordConfirmation'];

        if(isset($request_values['admin'])){
                $admin = $request_values['admin'];
        }
    
        if (empty($username)) {
                array_push($errors, "Empty username."); 
        }
        if (empty($email)) {
                array_push($errors, "Empty email.");
        }
        if (empty($admin)) {
                array_push($errors, "Empty Role");
        }
        if (empty($password)) {
                array_push($errors, "Empty Password"); 
        }
        if ($password != $passwordConfirmation) {
                array_push($errors, "Passwords doesn't match"); 
        }
    

        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { 
                if ($user['username'] === $username) {
                        array_push($errors, "Username already exists");
                }
                if ($user['email'] === $email) {
                        array_push($errors, "Email already exists");
                }
        }
    
        if (count($errors) == 0) {
                
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO users (username, email, admin, password, created_at) VALUES('$username', '$email', '$admin', '$hashed_password', now())";
                mysqli_query($conn, $query);

                $_SESSION['message'] = "Admin user created successfully";
                header('Location: users.php');
                exit();
        }
}


function editAdmin($admin_id){
    
        global $conn, $username, $admin, $isEditingUser, $admin_id, $email;

        $sql = "SELECT * FROM users WHERE id=$admin_id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_assoc($result);

        $username = $admin['username'];
        $email = $admin['email'];
}

function updateAdmin($request_values){

        global $conn, $errors, $admin, $username, $isEditingUser, $admin_id, $email;
   
        $admin_id = $request_values['admin_id'];/* */
        
        $isEditingUser = false;


        $username = validateUsername($request_values['username']) ? $request_values['username'] : '';
        $email = validateEmail($request_values['email']) ? $request_values['email'] : '';
        $password = validatePassword($request_values['password']) ? $request_values['password'] : ''; 
        $passwordconfirm = $request_values['passwordConfirmation'];
    
        if(isset($request_values['admin'])){
                $admin = $request_values['admin'];
        }
    
        if (count($errors) == 0) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $query = "UPDATE users SET username='$username', email='$email', admin='$admin', password='$hashed_password' WHERE id=$admin_id";
                mysqli_query($conn, $query);

                $_SESSION['message'] = "Admin user updated successfully";
                header('Location: users.php');
                exit();
        }
}
 
function deleteAdmin($admin_id) {
    
        global $conn;

        $sql = "DELETE FROM users WHERE id=$admin_id";
        
        if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "User successfully deleted";
                header("location: users.php");
                exit();
        }
}

/* Topic functions */

function getAllTopics() {
        global $conn;
        
        $sql = "SELECT * FROM topics";
        $result = mysqli_query($conn, $sql);
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $topics;
}

function createTopic($request_values){
    
        global $conn, $errors, $topic_name;

        $topic_name = $request_values['topic_name'];
    
        $topic_slug = makeSlug($topic_name);
    
        if (empty($topic_name)) { 
                array_push($errors, "Topic name required"); 
        }

        $topic_check_query = "SELECT * FROM topics WHERE slug='$topic_slug' LIMIT 1";
        $result = mysqli_query($conn, $topic_check_query);
    
        if (mysqli_num_rows($result) > 0) { 
                array_push($errors, "Topic already exists");
        }
    
        if (count($errors) == 0) {
                $query = "INSERT INTO topics (name, slug) VALUES('$topic_name', '$topic_slug')";

                mysqli_query($conn, $query);

                $_SESSION['message'] = "Topic created successfully";
                header('Location: topics.php');
                exit();
        }
}

function editTopic($topic_id) {
        
        global $conn, $topic_name, $isEditingTopic, $topic_id;
        $sql = "SELECT * FROM topics WHERE id=$topic_id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $topic = mysqli_fetch_assoc($result);
    
        $topic_name = $topic['name'];
}

function updateTopic($request_values) {
        
        global $conn, $errors, $topic_name, $topic_id;

        $topic_name = $request_values['topic_name'];
        $topic_id = $request_values['topic_id'] ;
    
        $topic_slug = makeSlug($topic_name);
    
        if (empty($topic_name)) { 
                array_push($errors, "Topic name required"); 
        }
    
        if (count($errors) == 0) {
                
                $query = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
                mysqli_query($conn, $query);

                $_SESSION['message'] = "Topic updated successfully";
                header('Location: topics.php');
                exit();
        }
}

function deleteTopic($topic_id) {
        
        global $conn;
        
        $sql = "DELETE FROM topics WHERE id=$topic_id";
        
        if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "Topic successfully deleted";
                header("Location: topics.php");
                exit();
        }
}


/* General functions */

function getAdminUsers(){
        global $conn, $admins;
        
        $sql = "SELECT * FROM users WHERE admin = 1";
        $result = mysqli_query($conn, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $users;
}

function makeSlug(String $string){
        $string = strtolower($string);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
}

function validString($string){

        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $string)){
            return false;
        } 
        else{
            return true;
        }
    }

?>