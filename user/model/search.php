<?php
/**
 * Created by PhpStorm.
 * User: BEZ
 * Date: 3/20/2023
 * Time: 1:47 PM
 */

function searchPosts($searchTitle = null)
{
    global $connect, $tbl_posts;
    $searchTitle = sanitize($searchTitle);
    $sql = ("SELECT * FROM `$tbl_posts` WHERE `post_title`  LIKE ? OR  `post_content` LIKE ?");
    $result = $connect->prepare($sql);
    $result ->bindValue(1,"%".$searchTitle."%");
    $result ->bindValue(2,"%".$searchTitle."%");
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;

    }
    return false;


}