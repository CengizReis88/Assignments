
<?php  include('config.php'); ?>
<?php  include(ROOT_PATH . '/apps/register_login.php'); ?>
<?php include(ROOT_PATH . '/includes/head_part.php'); ?>



<title>CengizBlog | Sign up </title>
</head>
    <body>
        <div class="container">
        <!-- Navbar -->
            <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->

            <div style="width: 40%; margin: 20px auto;">
                <form method="post" action="register.php" >
                        <h2>Register on CengizBlog</h2>

                        <?php include(ROOT_PATH . '/includes/errors.php') ?>

                        <input  type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="passwordconfirm" placeholder="Password confirmation">
                        <button type="submit" class="btn" name="registerbutton">Register</button>
                        <p>
                            Already a member? <a href="login.php">Sign in</a>
                        </p>
                </form>
        </div>
</div>
<!-- // container -->
<!-- Footer -->
        <?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->