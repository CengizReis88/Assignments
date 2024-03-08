<?php

$topics = getAllTopics($conn);

$contentsPerPage = 6;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$start = ($page - 1) * $contentsPerPage;

$contents = getPublishedContents($conn, $start, $contentsPerPage);

$totalPages = ceil(countAllPublishedContents($conn) / $contentsPerPage);

function getPublishedContents($conn, $start, $contentsPerPage){

    $sqlshowpublishedcontent = "SELECT * FROM contents WHERE published = 1 LIMIT $contentsPerPage OFFSET $start;";
    $result = mysqli_query($conn, $sqlshowpublishedcontent);

    $contents = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_contents = array();
    foreach($contents as $content){
        $content['topic'] = getContentTopic($content['id'],$conn);
        array_push($final_contents, $content);
    }
    return $final_contents;
}

function countAllPublishedContents($conn){
    $sqlCount = "SELECT COUNT(*) AS total FROM contents WHERE published = 1";
    $result = mysqli_query($conn, $sqlCount);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}




function getContentTopic($contentid,$conn){
    $sqlshowcontenttopic = "SELECT * FROM topics WHERE id= (SELECT topic_id FROM content_topic WHERE content_id=$contentid) LIMIT 1";

    $result = mysqli_query($conn,$sqlshowcontenttopic);
    $topic = mysqli_fetch_assoc($result);

    return $topic;
}

function getPublishedContentsByTopic($topic_id,$conn){

    $sqlshowpublishedcontentsbytopic = "SELECT * FROM contents WHERE id IN (SELECT id FROM content_topic WHERE topic_id=$topic_id GROUP BY content_id HAVING COUNT(1) = 1)";

    $result = mysqli_query($conn, $sqlshowpublishedcontentsbytopic);

    $contents = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $final_contents = array();

    foreach ($contents as $content) {
        $content['topic'] = getContentTopic($content['content_id'],$conn);
        array_push($final_contents, $content);
    }

    return $final_contents;
}

function getTopicNameById($id,$conn){

    $sqlshowtopicnamebyid = "SELECT name FROM topics WHERE id=$id";

    $result = mysqli_query($conn, $sqlshowtopicnamebyid);
    $topic = mysqli_fetch_assoc($result);

    return $topic['name'];
}

function getContent($slug,$conn){

    $content_slug = $_GET['content-slug'];
    $sqlshowcontent = "SELECT * FROM contents WHERE slug = '$content_slug' AND published = 1";
    $result = mysqli_query($conn,$sqlshowcontent);

    $content = mysqli_fetch_assoc($result);
    
    if($content) {
        $content['topic'] = getContentTopic($content['id'],$conn);
    }

    return $content;
}

function getAllTopics($conn){

    $sqlshowallcontents = "SELECT * FROM topics";
    $result = mysqli_query($conn, $sqlshowallcontents);
    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $topics;
}
