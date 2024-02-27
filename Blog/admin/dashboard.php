<?php  include('../config.php'); ?>
        <?php include(ROOT_PATH . '/admin/apps/admin_functions.php'); ?>
        <?php include(ROOT_PATH . '/admin/includes/head_part.php'); ?>
        <title>Admin | Dashboard</title>
</head>
<body>
        <div class="header">
                <div class="logo">
                        <a href="<?php echo BASE_URL .'/admin/dashboard.php' ?>">
                                <h1>CengizBlog - Admin</h1>
                        </a>
                </div>
                <?php if (isset($_SESSION['user'])): ?>
                        <div class="user-info">
                                <span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
                                <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
                        </div>
                <?php endif ?>
        </div>
        <div class="container dashboard">
                <h1>Welcome</h1>
                <div class="stats">
                        <a href="users.php" class="first">
                                <span>31</span> <br>
                                <span>Total users</span>
                        </a>
                        <a href="posts.php">
                                <span>31</span> <br>
                                <span>Published posts</span>
                        </a>
                        <a>
                                <span>31</span> <br>
                                <span>Comments/not done</span>
                        </a>
                </div>
                <br><br><br>
                <div class="buttons">
                        <a href="users.php">Add Users</a>
                        <a href="posts.php">Add Posts</a>
                </div>
        </div>
</body>
</html>