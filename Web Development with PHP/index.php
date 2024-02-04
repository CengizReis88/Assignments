<!DOCTYPE html>
<?php

session_start();

if (!isset($_COOKIE['theme'])) {
    if (isset($_SESSION['theme'])) {
        $theme = $_SESSION['theme'];
    } else {
        $theme = 'light';
    }
    setcookie('theme', $theme, time() + (60 * 60), '/'); 
} else {
    $theme = $_COOKIE['theme'];
}

?>
<html>    <style>
        body {
            background-color: <?php echo ($theme == 'light') ? 'white' : 'black'; ?>;
            color: <?php echo ($theme == 'light') ? 'black' : 'white'; ?>;
        }
    </style>
<body>
    <form action="" method="post">
        <label for="theme">Choose a theme:</label>
        <select name="theme" id="theme">
            <option value="light" <?php echo ($theme == 'light') ? 'selected' : ''; ?>>Light</option>
            <option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>Dark</option>
        </select>
        <input type="submit" value="Apply Theme">
    </form>
</body>
</html>


<?php
if (isset($_POST['theme'])) {
    setcookie('theme', $_POST['theme'], time() + (60 * 60), '/');
    header($_SERVER['PHP_SELF']);
}
?>

<html>

    <link rel="stylesheet" href="' . $preferredTheme . '.css">';

</html>

<html>
    <body>
        <form action="index.php" method="get">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name"><br><br>

            <label for="age"> Age : </label> &nbsp;
            <input type="text" name="age" id="age"><br><br>

            <label for="email">Email: </label>
            <input type="email" name="email" id="email"><br><br>
            <input type="submit" name="Submit">
            <?php echo "<br>" ?>
            
            <a href="page2.php" target="_blank" onclick="closeCurrentPage()";>Sayfa 2</a>
            <a href="filehandling.php" target="_blank" onclick="closeCurrentPage()";>File Handling</a>
            <script>
                function closeCurrentPage() {
                    window.close();
            }
            </script>

            
        </form>
    </body>
</html>

<?php

$name = $_GET['name'];

if(empty($name) || !preg_match("/^[a-zA-Z-' ]*$/",$name)){
    echo " Name cannot be empty or contain non alphabetic characters. <br>";
}
else{
    echo $name ."<br>";
}

$email = $_GET['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
    echo $email . "<br>";
} 
else {
    echo "Invalid email address. <br>";
}

$age = $_GET['age'];

if($age>0){
    echo floor($age) ."<br>";
}
else{
    echo "Invalid age <br>";
}


$_SESSION["name"] = $name;

print_r($_SESSION);
?>
