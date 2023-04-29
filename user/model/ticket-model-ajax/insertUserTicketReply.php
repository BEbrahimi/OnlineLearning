<?php
include "../dataBase.php";
include "../../function.php";
$msg = null;
$ticket_subject = null;
$ticket_priority = null;
$ticket_reply_body = null;
$ticket_num = null;
$user_email = null;
if (empty($_POST['ticket_reply_body'])){
    $msg = 'You must fill the form';
}
if (empty($msg)){
    global $connect,$tbl_user_ticket;

    $ticket_subject = sanitize($_POST['ticket_subject']);
    $ticket_priority = sanitize($_POST['ticket_priority']);
    $ticket_reply_body = sanitize($_POST['ticket_reply_body']);
    $user_email = sanitize($_POST['ticket_email']);
    $ticket_num = sanitize($_POST['ticket_num']);

    $sql=("INSERT `$tbl_user_ticket` SET `ticket_num`=?,`ticket_subject`=?,`ticket_body`=?,`priority`=?,`user_email`=?");
    $result = $connect ->prepare($sql);
    $result->bindValue(1,$ticket_num);
    $result->bindValue(2,$ticket_subject);
    $result->bindValue(3,$ticket_reply_body);
    $result->bindValue(4,$ticket_priority);
    $result->bindValue(5,$user_email);
    $result->execute();

    if ($result){
        $msg='Your ticket has been successfully sent.';
    }else{
        $msg='Ticket Error';
    }

}
echo json_encode($msg);