<?php 
include('config.php'); 
include(ROOT_PATH . '/apps/user_functions.php');
include(ROOT_PATH . '/includes/head_part.php');  
        
$topic_id = '';


        
        // Get posts under a particular topic
if (isset($_GET['topic'])) {
        $topic_id = $_GET['topic'];
        $contents = getPublishedContentsByTopic($topic_id,$conn);
}
?>



        <title>CengizBlog</title>
</head>
<body>
<div class="container">
<!-- Navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>

<!-- content -->
<div class="content">
        <h2 class="content-title">
                Content on <u><?php echo getTopicNameById($topic_id,$conn); ?></u>
        </h2>
        <hr>
        <?php foreach ($contents as $content): ?>
                <div class="post" style="margin-left: 0px;">
                        <img src="<?php echo BASE_URL . '/images/' . $post['image']; ?>" class="post_image" alt="">
                        <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                <div class="post_info">
                                        <h3><?php echo $post['title'] ?></h3>
                                        <div class="info">
                                                <span><?php echo date("F j, Y ", strtotime($post["publish_date"])); ?></span>
                                                <span class="read_more">Read more...</span>
                                        </div>
                                </div>
                        </a>
                </div>
        <?php endforeach ?>
</div>

</div>


<!-- Footer -->
        <?php include( ROOT_PATH . '/includes/footer.php'); ?>
