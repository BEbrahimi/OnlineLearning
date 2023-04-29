<?php

//create poll
function createPoll($question = null,$items = null){
    global $connect,$tbl_poll,$tbl_poll_item;
    $question = sanitize($question);
    $items = sanitizeArray($items);

    $sql = ("INSERT `$tbl_poll` SET `question`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$question);
    $result->execute();
    if ($result){
        $lastQuestionID = $connect->lastInsertId();
        foreach ($items as $key=>$value){
             $item = $value;
             $sql =("INSERT `$tbl_poll_item` SET `poll_id`=?, `item_title`=?");
             $result = $connect->prepare($sql);
             $result->bindValue(1,$lastQuestionID);
             $result->bindValue(2,$item);
             $result->execute();

        }
        if ($result){
            return $result;
        }
        return false;

    }
    return false;

}

//poll duplicate
function isPollExist($question){
    global $connect,$tbl_poll;
    $question = sanitize($question);
    $sql = ("SELECT `question` FROM `$tbl_poll` WHERE `question`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$question);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }else{
        return false;
    }
}

//find poll by id
function findPoll(){
    global $connect,$tbl_poll;
    $sql = ("SELECT * FROM `$tbl_poll`");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}

//Find poll item
function findPollItem(){
    global $connect,$tbl_poll,$tbl_poll_item;
    $sql = ("SELECT `$tbl_poll`.poll_id,`$tbl_poll`.question, `$tbl_poll_item`.item_title,`$tbl_poll_item`.item_id FROM `$tbl_poll` INNER JOIN `$tbl_poll_item` ON  `$tbl_poll`.poll_id = `$tbl_poll_item`.poll_id ");
    $result = $connect->query($sql);
    $result->execute();
//    var_dump($result);
    if ($result){
        return $result;

    }
    return false;
}

//is user voted?
function isUserVoted($user_ip = null){
    global $connect,$tbl_poll_item_choice;
    $user_ip = sanitize($user_ip);
    $sql = ("SELECT * FROM `$tbl_poll_item_choice` WHERE `user_ip`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$user_ip);
    $result->execute();
    if ($result){
        return $result;
    }
}

//vote result percentage
function voteResultPercentage(){
    global $connect,$tbl_poll_item_choice, $tbl_poll_item;

    $sql=("SELECT `$tbl_poll_item`.item_title, COUNT(`$tbl_poll_item_choice`.id)*100/(
    SELECT COUNT(*) FROM `$tbl_poll_item_choice` WHERE `$tbl_poll_item_choice`.poll_id = 1) AS percentage
    FROM `$tbl_poll_item` INNER JOIN `$tbl_poll_item_choice` ON `$tbl_poll_item`.item_id = `$tbl_poll_item_choice`.item_id
     WHERE `$tbl_poll_item_choice`.poll_id = 1 GROUP BY `$tbl_poll_item`.item_id;
    ");
    $result = $connect->prepare($sql);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;

}