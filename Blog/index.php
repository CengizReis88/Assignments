<?php
include_once('config.php');
include_once(ROOT_PATH . '/apps/user_functions.php');
include_once(ROOT_PATH . '/includes/head_part.php');




?>


<html>
<head>
    <title>CengizBlog</title>
</head>
<body>
<div class="container">
    <?php include(ROOT_PATH . '/includes/navbar.php') ?>
    <?php include(ROOT_PATH . '/includes/banner.php') ?>
    <div class="title">
        <h2 class="content-title">Contents</h2>
    </div>
    <div class="flex-nedir">
        <div class="content">
            <?php foreach ($contents as $content): ?>
                <div class="post" style="margin-left: 0px;">
                    <a href="single_content.php?content-slug=<?php echo $content['slug']; ?>">
                        <img src="<?php echo BASE_URL . '/images/' . $content['image']; ?>" class="content_image" alt="">
                        <?php if (isset($content['topic']['name'])): ?>
                            <a href="<?php echo BASE_URL . 'filtered_contents.php?topic=' . $content['topic']['id'] ?>"
                               class="btn category">
                                <?php echo $content['topic']['name'] ?>
                            </a>
                        <?php endif ?>
                        <div class="content_info">
                            <h3><?php echo $content['title'] ?></h3>
                            <div class="info">
                                <span><?php echo date("F j, Y", strtotime($content["created_at"])); ?></span>
                                <span class="read_more">| Read more</span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            <!-- Pagination links -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>"> Previous| </a>
                <?php endif ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" <?php if ($i === $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor ?>
                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>"> |Next </a>
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
                        <a href="<?php echo BASE_URL . '/filtered_posts.php?topic=' . $topic['id'] ?>"><?php echo $topic['name']; ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(ROOT_PATH . '/includes/footer.php') ?>
</body>
</html>