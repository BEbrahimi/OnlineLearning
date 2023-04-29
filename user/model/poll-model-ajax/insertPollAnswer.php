<?php
include '../dataBase.php';
$msg = null;
$item_id = null;
if (empty($_POST['item_id'])){
    $msg = 'Select one option';
} else{
    $item_id = intval($_POST['item_id']);
}
if (empty($msg)){
    $i =0;
    $item_id = intval($item_id);
    $poll_id  = intval($_POST['poll_id']);

    global $connect,$tbl_poll_item_choice;
    $sql =("SELECT * FROM `$tbl_poll_item_choice`");
    $result = $connect->query($sql);
    $result->execute();
    if ($result){
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            if($row['user_ip']== $_SERVER['REMOTE_ADDR']){
                $i=$i+1;
            }
        }
        if ($i>=1){
            $msg ='You are already voted ';
        }else{
            $sql = ("INSERT `$tbl_poll_item_choice` SET `poll_id`=?, `item_id`=?, `user_ip`=?");
            $result = $connect->prepare($sql);
            $result->bindValue(1,$poll_id );
            $result->bindValue(2,$item_id );
            $result->bindValue(3,$_SERVER['REMOTE_ADDR']);
            $result->execute();
            if ($result){
//                return $result;
                $msg = 'Your vote has been saved';

            }else{
                $msg = 'System Error';

            }
        }

    }else{
        $msg ='System Error';
    }
}
echo Json_encode($msg);
