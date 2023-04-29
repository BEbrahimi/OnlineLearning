<?php
include "../../init.php";
//include "../../function.php";
$msg = null;
$ticket_subject = null;
$ticket_priority = null;
$ticket_body = null;
if (empty($_POST['ticket_subject'])|| empty($_POST['ticket_priority'])||empty($_POST['ticket_body'])){
    $msg = 'Fields with stars are required to be completed';
}
if (empty($msg)){
    global $connect,$tbl_user_ticket;
    $ticket_subject = sanitize($_POST['ticket_subject']);
    $ticket_priority = sanitize($_POST['ticket_priority']);
    $ticket_body = sanitize($_POST['ticket_body']);
    $userEmail = $_SESSION['userInfo']['userEmail'];
    $teckit_num = date('YmdHis');

   $sql=("INSERT `$tbl_user_ticket` SET `ticket_num`=?,`ticket_subject`=?,`ticket_body`=?,`priority`=?,`user_email`=?");
            $result = $connect ->prepare($sql);
            $result->bindValue(1,$teckit_num);
            $result->bindValue(2,$ticket_subject);
            $result->bindValue(3,$ticket_body);
            $result->bindValue(4,$ticket_priority);
            $result->bindValue(5,$userEmail);
            $result->execute();

    if ($result){
        $msg='Your ticket has been successfully sent.';
    }else{
        $msg='Ticket Error';
    }

}
echo json_encode($msg);