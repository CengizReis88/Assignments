<?
/*
 * 
 * 
 * 
 *  UZUN BİR ARADAN SONRA BURAYA İHTİYACIM OLMADIĞINI FARKETTİM 
 *
 * 
 * 
 *


<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="container">
        <h2>Create User</h2>
        <form action="create.php" method="POST">
            <label for="username">Username : </label>
            <input type="text" id="username" name="username" placeholder="Username" class="form_field"><br>
            <label for="email">Email : </label>
            <input type="email" id="email" name="email" placeholder="Email" class="form_field"><br>
            <label for="password">Password : </label>
            <input type="password" id="password" name="password" placeholder="Password" class="form_field"><br><br>
            <input type="submit" value="Create" class="submitbutton" id="submitbutton">
        </form>
    </div>
    <div class="container" id="container">
        <h2>Update User</h2>
        <form action="update.php" method="PUT">
            <label for="user_id">User ID:</label><br>
            <input type="text" id="user_id" name="user_id" placeholder="ID" class="form_field"><br>
            <label for="username">Username:</label><br>
            <input type="text" id="newusername" name="newusername" placeholder="Username" class="form_field"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="newemail" name="newemail" placeholder="Email" class="form_field"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="newpassword" name="newpassword" placeholder="Password" class="form_field"><br><br>
            <input type="submit" value="Update" class="submitbutton" id="submitbutton">
            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>
    <div class="container" id="container">
        <h2>Delete User</h2>
        <form action="delete.php" method="DELETE">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" class="form_field"><br><br>
            <button type="submit" value="Delete" class="submitbutton" id="submitbutton">Delete</button>
        </form>
    </div>
</body>
</html>



*/