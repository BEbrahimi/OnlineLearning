<?php
function findCats(){
    global $connect, $tbl_cats;
    $sql = ("SELECT * FROM `$tbl_cats` ORDER BY `cat_id` DESC ");

    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    else{
        return false;
    }

}