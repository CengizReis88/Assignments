
<?php  
include('config.php'); 
include(ROOT_PATH . '/apps/user_functions.php'); 

if (isset($_GET['content-slug'])) {
        $content = getContent($_GET['content-slug'], $conn);
}
$topics = getAllTopics($conn);

include(ROOT_PATH . '/includes/head_part.php'); 
?>




<title> <?php echo $content['title'] ?> | bl</title>
</head>
<body>
<div class="container">
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        
        <div class="content" >
                <div class="post-wrapper">
                        <div class="full-post-div">
                                <?php if ($content['published'] == 0): ?>
                                <h2 class="post-title">Sorry... This post has not been published</h2>
                                <?php else: ?>
                                <h2 class="post-title"><?php echo $content['title']; ?></h2>
                                <div class="post-body-div">
                                        <?php echo html_entity_decode($content['body']); ?>
                                </div>
                        <?php endif ?>
                        </div>
                </div>

                <div class="post-sidebar">
                        <div class="card">
                                <div class="card-header">
                                        <h2>Topics</h2>
                                </div>
                                <div class="card-content">
                                        <?php foreach ($topics as $topic): ?>
                                                <a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>"><?php echo $topic['name']; ?></a> 
                                        <?php endforeach ?>
                                </div>
                        </div>
                </div>
        </div>
</div>

<?php include( ROOT_PATH . '/includes/footer.php'); ?>