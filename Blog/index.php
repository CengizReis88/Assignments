<?php 
include_once('config.php');

include_once(ROOT_PATH . '/apps/user_functions.php');
include_once(ROOT_PATH . '/includes/head_part.php'); 

$contents = getPublishedContents($conn);
?>


        <title>CengizBlog</title>
</head>
<body>
        <!-- container -->
        <div class="container">
                <!-- navbar -->
                <?php include(ROOT_PATH . '/includes/navbar.php') ?>
                
                <?php include(ROOT_PATH . '/includes/banner.php') ?>
                <!-- Page content -->
                <div class="content">
                        <h2 class="content-title">Contents</h2>
                        
                        <?php foreach ($contents as $content): ?>
                                <div class="content" style="margin-left: 0px;">
                                        <img src="<?php echo BASE_URL . '/images/' . $content['image']; ?>" class="content_image" alt="">

                                        <?php if (isset($content['topic']['name'])): ?>
                                                <a href="<?php echo BASE_URL . 'filtered_contents.php?topic=' . $content['topic']['id'] ?>"class="btn category">
                                                        <?php echo $content['topic']['name'] ?>
                                                </a>
                                        <?php endif ?>
                                        
                                        <a href="single_content.php?content-slug=<?php echo $content['slug']; ?>">
                                        <div class="content_info">
                                                <h3><?php echo $content['title'] ?></h3>
                                                        <div class="info">
                                                                <span><?php echo date("F j, Y ", strtotime($content["created_at"])); ?></span>
                                                                <span class="read_more">Read more</span>
                                                        </div>
                                        </div>   
                                </div>
                        <?php endforeach ?>
                </div>
                

                <!-- footer -->
                <?php include(ROOT_PATH . '/includes/footer.php') ?>
