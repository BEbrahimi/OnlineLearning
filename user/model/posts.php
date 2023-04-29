<?php
include 'dataBase.php';
function createPost($postTitle = null, $postContent = null, $videoUrl = null, $postAuthorId = null, $catsId = null, $postTags = null, $postImg = null, $uniquePostKey = null, $slug = null, $topicType = null, $courseID = null,$videoLength=null, &$currentPostId = null)
{
    global $connect, $tbl_posts;
    $postTitle = sanitize($postTitle);
    $postContent = sanitize($postContent);
    $videoUrl = sanitize($videoUrl);
    $postAuthorId = intval($postAuthorId);
    $catsId = intval($catsId);
    $postTags = sanitize($postTags);
    $postImg = sanitize($postImg);
    $uniquePostKey = sanitize($uniquePostKey);
    $slug = sanitize($slug);
    $topicType = intval($topicType);
    $courseID = intval($courseID);
    $videoLength = sanitize($videoLength);
    $sql = ("SELECT `post_id`,`unique_post_key`,`create_time` FROM `$tbl_posts` WHERE `unique_post_key`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $uniquePostKey);
    $result->execute();
    if ($result->rowCount() >= 1) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $currentPostId = $row['post_id'];
//        $createUpdateTime = $row['create_time'];
        $sql = ("UPDATE `$tbl_posts` SET `post_title`=?,`post_content`=?,`video_url`=?,`author_id`=?,`cat_id`=?,`tags`=?,`post_img`=?, `slug`=?, `post_type`=?, `course_id`=?, `video_length`=? WHERE `post_id`=? LIMIT 1");
        $result = $connect->prepare($sql);
        $result->bindParam(1, $postTitle);
        $result->bindParam(2, $postContent);
        $result->bindParam(3, $videoUrl);
        $result->bindParam(4, $postAuthorId);
        $result->bindParam(5, $catsId);
        $result->bindParam(6, $postTags);
        $result->bindParam(7, $postImg);
        $result->bindParam(8, $slug);
        $result->bindParam(9, $topicType);
        $result->bindParam(10, $courseID);
        $result->bindParam(11, $videoLength);
        $result->bindParam(12, $currentPostId);
        $result->execute();
        if ($result) {
            return $result;
        }
    } else {
        $sql = ("INSERT `$tbl_posts` SET `post_title`=?,`post_content`=?,`video_url`=?,`author_id`=?,`cat_id`=?,`tags`=?,`post_img`=?,`unique_post_key`=?,`slug`=?, `post_type`=?, `course_id`=?, `video_length`=?");
        $result = $connect->prepare($sql);
        $result->bindParam(1, $postTitle);
        $result->bindParam(2, $postContent);
        $result->bindParam(3, $videoUrl);
        $result->bindParam(4, $postAuthorId);
        $result->bindParam(5, $catsId);
        $result->bindParam(6, $postTags);
        $result->bindParam(7, $postImg);
        $result->bindParam(8, $uniquePostKey);
        $result->bindParam(9, $slug);
        $result->bindParam(10, $topicType);
        $result->bindParam(11, $courseID);
        $result->bindParam(12, $videoLength);
        if ($result->execute()) {
            return $result;
        }
    }
    return false;

}

function createPostTime($postId = null)
{
    global $connect, $tbl_posts;
    $postId = intval($postId);
    $sql = ("SELECT `create_time` FROM `$tbl_posts` WHERE `post_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->execute();
    if ($result) {
        return $result;
    }
    return false;


}

function postPublish($postId = null)
{
    global $connect, $tbl_posts;
    $postId = intval($postId);
    $sql = ("UPDATE `$tbl_posts` SET `post_status`=? WHERE `post_id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1, 1);
    $result->bindValue(2, $postId);
    $result->execute();
    if ($result) {
        return $result;
    }
    return false;

}

function postId($postUniqeKey = null)
{
    global $connect, $tbl_posts;
    $postUniqeKey = sanitize($postUniqeKey);
    $sql = ("SELECT `post_id` FROM `$tbl_posts` WHERE `unique_post_key`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postUniqeKey);
    $result->execute();
    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['post_id'];

    }
    return false;
}

//select post in user interface
function findPost($page = null)
{
    global $connect, $tbl_posts;

    if (isset($page) && !empty($page) && intval($page)) {
        if ($page == "" || $page == "1") {
            $offsetPage = 0;
        } else {
            $offsetPage = ($page * 6) - 6;
        }
    } else {
//            echo 'error';
        $offsetPage = 0;
    }
    $sql = ("SELECT * FROM `$tbl_posts` WHERE `post_status`= 1 ORDER BY `post_id` DESC LIMIT $offsetPage,6");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

//pagination counter
function pagination()
{
    global $connect, $tbl_posts;

    if (isset($_GET['page'])) {
        $pageNumber = $_GET['page'];
    } else {
        $pageNumber = 1;
    }
    $sql = ("SELECT * FROM `$tbl_posts`");
    $result = $connect->query($sql);
    $result->execute();
//it is count for total posts
    $rowNumbers = $result->rowCount();
//    echo $rowNumbers;
    $totalPages = $rowNumbers / 6;
//    ceil is use for round to integer number
    $totalPages = ceil($totalPages);
//    echo $totalPages;
    for ($currnetPage = 1; $currnetPage <= $totalPages; $currnetPage++):?>
        <!--     ? = if and else = : -->
        <li class="<?php echo($pageNumber == "$currnetPage" ? "active" : ""); ?>">
            <a href="all-post.php?page=<?php echo $currnetPage; ?>"><?php echo $currnetPage; ?></a>
        </li>

    <?php

    endfor;
}

//find post by id for single page
function findPostById($postId = null)
{
    global $connect, $tbl_posts;
    $postId = intval($postId);
    $sql = ("SELECT *FROM `$tbl_posts` WHERE `post_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

//inner join
function findAuthorById($post_id)
{
    global $connect, $tbl_posts, $tbl_users;
    $post_id = intval($post_id);
    $sql = ("SELECT `first_name`,`last_name` FROM `$tbl_users` INNER JOIN `$tbl_posts` ON `id` = `author_id` WHERE `post_id`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $post_id);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;

}

//Random Post
function randomPost()
{
    global $connect, $tbl_posts, $tbl_users;
    $sql = ("SELECT *FROM `$tbl_posts` ORDER BY RAND() LIMIT 4");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

//relatedPost
function relatedPostByCat($cat_id = null)
{
    global $connect, $tbl_posts;
    $cat_id = intval($cat_id);
    $sql = ("SELECT *FROM `$tbl_posts` WHERE `cat_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $cat_id);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

//count post views
function countPostViews($postId = null)
{
    global $connect, $tbl_posts;
    $sql = ("UPDATE `$tbl_posts` SET `post_views` = post_views +1 WHERE `post_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->execute();
    if ($result) {
        return true;
    }
    return false;


}

// New publish post
function findNewPostPublish()
{
    global $connect, $tbl_posts;
    $sql = ("SELECT `post_id`, `post_title`,`slug`, `create_time` FROM `$tbl_posts` ORDER BY `post_id` DESC LIMIT 5");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;

}

//Get likes functions
function getLikes($postId = null)
{
    global $connect, $tbl_postLikes;
    $postId = intval($postId);
    $sql = ("SELECT COUNT(*) FROM `$tbl_postLikes` WHERE `post_id`=? AND `rating_action`=1");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->execute();
    $rowCounts = $result->fetchColumn(0);
    if ($rowCounts > 0) {
        echo $rowCounts;
    } else {
        echo '0';
    }
}

//Get Dislikes function
function getDisLikes($postId = null)
{
    global $connect, $tbl_postLikes;
    $postId = intval($postId);
    $sql = ("SELECT COUNT(*) FROM `$tbl_postLikes` WHERE `post_id`=? AND `rating_action`=0");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->execute();
    $rowCounts = $result->fetchColumn(0);
    if ($rowCounts > 0) {
        echo $rowCounts;
    } else {
        echo '0';
    }
}

//Check cureent user like post or not
function userLiked($postId = null, $userId = null)
{
    global $connect, $tbl_postLikes;
    $postId = intval($postId);
    $userId = intval($userId);
    $sql = ("SELECT * FROM `$tbl_postLikes` WHERE `post_id` =? AND `user_id` =? AND `rating_action` = 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->bindValue(2, $userId);
    $result->execute();
    if ($result->rowCount() > 0) {
        return true;
    } else {
        return false;
    }


}

//Check cureent user dilike post or not
function userDisLiked($postId = null, $userId = null)
{
    global $connect, $tbl_postLikes;
    $postId = intval($postId);
    $userId = intval($userId);
    $sql = ("SELECT * FROM `$tbl_postLikes` WHERE `post_id` =? AND `user_id` =? AND `rating_action`=0");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $postId);
    $result->bindValue(2, $userId);
    $result->execute();
    if ($result->rowCount() > 0) {
        return true;
    } else {
        return false;
    }


}

//insert update like or dislike in to database whit ajax
if (isset($_POST['action']) && !empty($_POST['action'])) {
    global $connect, $tbl_postLikes;
    $post_id = intval($_POST['post_id']);
    $user_id = intval($_POST['user_id']);
    $action = $_POST['action'];
    switch ($action) {
        case 'like':
            $sql = ("INSERT INTO `$tbl_postLikes` SET `user_id`=?, `post_id`=?, `rating_action`=1 ON DUPLICATE KEY UPDATE `rating_action`=1 ");
            $result = $connect->prepare($sql);
            $result->bindValue(1, $user_id);
            $result->bindValue(2, $post_id);

            break;
        case 'dislike':
            $sql = ("INSERT INTO `$tbl_postLikes` SET `user_id`=?, `post_id`=?, `rating_action`=0 ON DUPLICATE KEY UPDATE `rating_action`=0 ");
            $result = $connect->prepare($sql);
            $result->bindValue(1, $user_id);
            $result->bindValue(2, $post_id);
            break;
        case 'unlike':
            $sql = ("DELETE FROM `$tbl_postLikes` WHERE `user_id`=? AND `post_id`=?");
            $result = $connect->prepare($sql);
            $result->bindValue(1, $user_id);
            $result->bindValue(2, $post_id);
            break;
        case 'undislike':
            $sql = ("DELETE FROM `$tbl_postLikes` WHERE `user_id`=? AND `post_id`=?");
            $result = $connect->prepare($sql);
            $result->bindValue(1, $user_id);
            $result->bindValue(2, $post_id);
            break;
        default:
            break;
    }
    $result->execute();
    echo getRatinByAjax($post_id);


}


function getRatinByAjax($post_id = null)
{
    $post_id = $post_id;
    global $connect, $tbl_postLikes;
    $rating = [];
//    count Like
    $like_sql = ("SELECT COUNT(*) FROM `$tbl_postLikes` WHERE `post_id`=? AND `rating_action`=1");
    $result_like = $connect->prepare($like_sql);
    $result_like->bindValue(1, $post_id);
    $result_like->execute();
    $likesCount = $result_like->fetchColumn(0);

//Count dislike
    $dislike_sql = ("SELECT COUNT(*) FROM `$tbl_postLikes` WHERE `post_id`=? AND `rating_action`=0");
    $result_dislike = $connect->prepare($dislike_sql);
    $result_dislike->bindValue(1, $post_id);
    $result_dislike->execute();
    $dislikesCount = $result_dislike->fetchColumn(0);

    $rating = [
        'likes' => $likesCount[0],
        'dislikes' => $dislikesCount[0],

    ];

    return json_encode($rating);


}


