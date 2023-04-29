<?php
function createCourseProgress($title = null,$percentage =null,$color=null){
    global $connect,$tbl_progress;
    $title = sanitize($title);
    $percentage = sanitize($percentage);
    $color = sanitize($color);

    $sql = "INSERT INTO $tbl_progress(title,percentage,color) VALUES ('$title','$percentage','$color')";
    $result = $connect->query($sql);

    if ($result){
        return $result;
    }
    return false;
}

function findCourseProgress(){
    global $connect,$tbl_progress;
    $sql = ("SELECT * FROM `$tbl_progress` ORDER BY `progress_id`");
    $result = $connect->query($sql);
    $result ->execute();
    if ($result){
        return $result;
    }
    return false;
}

//user duplicate
function isCourseProgressExist($title){
    global $connect,$tbl_progress;
    $title = sanitize($title);
    $sql = ("SELECT `title` FROM `$tbl_progress` WHERE `title`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$title);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }else{
        return false;
    }
}
