<?php
function postPublishChart(){
    global $connect,$tbl_posts;
    $sql =("SELECT COUNT(`post_id`) AS post_count, DATE(`create_time`) AS post_date FROM `$tbl_posts` GROUP BY DATE(`create_time`)");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}