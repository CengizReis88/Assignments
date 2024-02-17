
<?php

include 'connect.php';

class createUser{
  private $conn;
  
  public function _Construct($conn) {
      $this->conn = $conn;
  }

  public function createUser($username, $email, $password) {

    $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
  
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        
      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      $sqladd = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
      $sqladd->bind_param("sss", $username, $email, $password_hash);
    
      $sqladd->execute([$username, $email, $password]);
    
      $sqladd->close();
    }
    else{
      $this->conn->rollback();

    }
  }
}

?>