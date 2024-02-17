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
            <input type="password" id="password" name="password" placeholder="Password" class="form_field"><br>
            <input type="submit" value="create" class="submitbutton">
        </form>
    </div>
    
    <div class="container" id="container">
        <h2>Update User</h2>
        <form action="update.php" method="PUT">
            <label for="user_id">User ID:</label><br>
            <input type="text" id="user_id" name="user_id" placeholder="ID" class="form_field"><br>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username" class="form_field"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email" class="form_field"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Password" class="form_field"><br><br>
            <input type="submit" value="update" class="submitbutton">
        </form>
    </div>
</body>
</html>



