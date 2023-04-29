<?php
//find ticket by Email
function findTicketByEmail($userEmail = null){
    global $connect,$tbl_user_ticket;
    $userEmail = sanitize($userEmail);
// * is used for user mode if your php version is more the 5.4.36 you must to change your php mode to none or user mode
    $sql =("SELECT * FROM `$tbl_user_ticket` WHERE `user_email`=? GROUP BY `ticket_num`");
    $result = $connect ->prepare($sql);
    $result->bindValue(1,$userEmail);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;

}

//find tickets by ticket number
function findTicketDetailsByTicketNum($ticketNum = null){
    global $connect,$tbl_user_ticket;
    $ticketNum = sanitize($ticketNum);

    $sql =("SELECT * FROM `$tbl_user_ticket` WHERE `ticket_num`=? ORDER BY `create_at` DESC ");
    $result = $connect ->prepare($sql);
    $result->bindValue(1,$ticketNum);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;
}

//find ticket by Email
function findAllTickets(){
    global $connect,$tbl_user_ticket;
// * is used for user mode if your php version is more the 5.4.36 you must to change your php mode to none or user mode
    $sql =("SELECT * FROM `$tbl_user_ticket`  GROUP BY `ticket_num`");
    $result = $connect ->query($sql);

    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;

}