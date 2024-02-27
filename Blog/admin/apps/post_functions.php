<?php 
// Post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$image = "";
$post_topic = "";



/*  Post actions */

if (isset($_POST['create_post'])) {
        echo "as";
        createPost($_POST); 
}

if (isset($_GET['edit-post'])) {
        $isEditingPost = true;
        $post_id = $_GET['edit-post'];
        editPost($post_id);
}

if (isset($_POST['update_post'])) {
        updatePost($_POST);
}

if (isset($_GET['delete-post'])) {
        $post_id = $_GET['delete-post'];
        deletePost($post_id);
}

/* Post functions */

function createPost($request_values){

        global $conn, $errors, $title, $image, $topic_id, $body, $published;
        $title = validString($request_values['title']) ? $request_values['title'] : '';
        $body = validString($request_values['body']) ? $request_values['body'] : '';

        if (isset($request_values['topic_id'])) {
                $topic_id = $request_values['topic_id'];
        }
        if (isset($request_values['publish'])) {
                $published = $request_values['publish'];
        }
                
        $post_slug = makeSlug($title);
         
        if (empty($title)) {
                array_push($errors, "Post title is required"); 
        }
        if (empty($body)) {
                array_push($errors, "Post body is required"); 
        }
        if (empty($topic_id)) {
                array_push($errors, "Post topic is required"); 
        }
                
        $image = $_FILES['image']['name'];
        
        if (empty($image)) {
                array_push($errors, "Image required");
        }
                
        $target = "../images/" . basename($image);
        
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
                
        $post_check_query = "SELECT * FROM contents WHERE slug='$post_slug' LIMIT 1";
        $result = mysqli_query($conn, $post_check_query);

        if (mysqli_num_rows($result) > 0) {
                array_push($errors, "A post already exists with that title.");
        }
                
        if (count($errors) == 0) {
                $query = "INSERT INTO contents (user_id, title, slug, image, body, published, created_at, updated_at) VALUES(1, '$title', '$post_slug', '$image', '$body', $published, now(), now())";
                
                if(mysqli_query($conn, $query)){ 
                        $inserted_post_id = mysqli_insert_id($conn);
                                
                        $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
                        mysqli_query($conn, $sql);

                        $_SESSION['message'] = "Post created successfully";
                        header('Location: posts.php');
                        exit();
                }
        }
}

function editPost($role_id){
        
        global $conn, $title, $post_slug, $body, $published, $isEditingPost, $post_id;
        $sql = "SELECT * FROM contents WHERE id=$role_id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $post = mysqli_fetch_assoc($result);
                
        $title = $post['title'];
        $body = $post['body'];
        $published = $post['published'];
}

function updatePost($request_values){
                
        global $conn, $errors, $post_id, $title, $image, $topic_id, $body, $published;

        $title = validString($request_values['title']) ? $request_values['title'] : '';
        $body = validString($request_values['body']) ? $request_values['body'] : '';
        $post_id = validString($request_values['content_id']) ? $request_values['content_id'] : '';
        
        if (isset($request_values['topic_id'])) {
                $topic_id = validString($request_values['topic_id']) ? $request_values['topic_id'] : '';
        }
                
        $post_slug = makeSlug($title);

        if (empty($title)) {
                array_push($errors, "Post title is required"); 
        }

        if (empty($body)){ 
                array_push($errors, "Post body is required"); 
        }
               
        if (isset($_POST['image'])) {
                        
                $image = $_FILES['image']['name'];
                        
                $target = "../images/" . basename($image);
                
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        array_push($errors, "Failed to upload image. Please check file settings for your server");
                }
        }

        
        if (count($errors) == 0) {
                $query = "UPDATE contents SET title='$title', slug='$post_slug', image='$image', body='$body', published=$published, updated_at=now() WHERE id=$post_id";
                        
                if(mysqli_query($conn, $query)){ 
                        if (isset($topic_id)) {
                                $inserted_post_id = mysqli_insert_id($conn);
                                        
                                $sql = "INSERT INTO content_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
                                mysqli_query($conn, $sql);
                                $_SESSION['message'] = "Post created successfully";
                                header('location: contents.php');
                                exit(0);
                        }
                }

                $_SESSION['message'] = "Post updated successfully";
                header('location: contents.php');
                exit(0);
        }
}
        
function deletePost($post_id){

        global $conn;
        $sql = "DELETE FROM contents WHERE id=$post_id";
        
        if (mysqli_query($conn, $sql)) {
               $_SESSION['message'] = "Post successfully deleted";
                header("location: contents.php");
                exit(0);
        }
}

/* Post functions */

// get all contents from DB
function getAllPosts(){

        global $conn;
        
        // Admin can view all posts
        
        if ($_SESSION['user']['admin'] == "Admin") {
                $sql = "SELECT * FROM contents";
        } elseif ($_SESSION['user']['admin'] == "User") {
                $user_id = $_SESSION['user']['id'];
                $sql = "SELECT * FROM contents WHERE user_id=$user_id";
        }
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $final_posts = array();
        foreach ($posts as $post) {
                $post['author'] = getPostAuthorById($post['user_id']);
                array_push($final_posts, $post);
        }
        return $final_posts;
}
// get the author/username of a post
function getPostAuthorById($user_id)
{
        global $conn;
        $sql = "SELECT username FROM users WHERE id=$user_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
                return mysqli_fetch_assoc($result)['username'];
        } 
        else {
                return null;
        }
}

?>
