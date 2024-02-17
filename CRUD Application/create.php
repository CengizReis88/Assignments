
<?php

include 'connect.php';


if($_SERVER["REQUEST_METHOD"] == 'POST') {

  $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
  $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
  $password = isset($_POST['password']) ? trim($_POST['password']) : '';
  
  if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sqladd = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $sqladd->bind_param("sss", $username, $email, $password_hash);
    
    $sqladd->execute([$username, $email, $password]);
    
    $sqladd->close();
  }
}
?>