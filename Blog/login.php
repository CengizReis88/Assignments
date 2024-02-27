
<?php  include('config.php'); ?>
<?php  include(ROOT_PATH . '/apps/register_login.php'); ?>
<?php  include('includes/head_part.php'); ?>
        

        <title>CengizBlog | Sign in </title>
</head>
<body>
<div class="container">
        <!-- Navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>

        <div style="width: 40%; margin: 20px auto;">
                <form method="post" action="login.php" >
                        <h2>Login</h2>
                        <?php include(ROOT_PATH . '/includes/errors.php') ?>
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" class="btn" name="loginbuton">Login</button>
                        <p>
                                Not yet a member? <a href="register.php">Sign up</a>
                        </p>
                </form>
        </div>
</div>

<!-- Footer -->
        <?php include( ROOT_PATH . '/includes/footer.php'); ?>