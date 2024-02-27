<?php

function getPublishedContents($conn){

    $sqlshowpublishedcontent = "SELECT * FROM contents WHERE published = 1";
    $result = mysqli_query($conn, $sqlshowpublishedcontent);

    $contents = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_contents = array();
    foreach($contents as $content){
        $content['topic'] = getContentTopic($content['id'],$conn);
        array_push($final_contents, $content);
    }
    return $final_contents;
}

function getContentTopic($contentid,$conn){
    $sqlshowcontenttopic = "SELECT * FROM topics WHERE id= (SELECT topic_id FROM content_topic WHERE content_id=$contentid) LIMIT 1";

    $result = mysqli_query($conn,$sqlshowcontenttopic);
    $topic = mysqli_fetch_assoc($result);

    return $topic;
}

function getPublishedContentsByTopic($topic_id,$conn){

    $sqlshowpublishedcontentsbytopic = "SELECT * FROM contents WHERE content_id IN (SELECT content_id FROM content_topic WHERE topic_id=$topic_id GROUP BY content_id HAVING COUNT(1) = 1)";

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

    $sqlshowtopicnamebyid = "SELECT contentname FROM topics WHERE content_id=$id";

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
