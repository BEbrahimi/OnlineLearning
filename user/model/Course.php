<?php
function createCourse($courseTitle = null, $courseDemo = null, $courseLength = null, $courseStartAt = null, $courseStatus = null, $coursePrice = null, $courseDiscount = null, $courseTeacher = null, $courseTeacherEmail = null, $courseImage = null, $teacherResume = null, $coursePre = null, $courseReference = null)
{
    global $connect, $tbl_course;
    $courseTitle = sanitize($courseTitle);
    $courseReference = sanitize($courseReference);
    $courseDemo = sanitize($courseDemo);
    $courseLength = sanitize($courseLength);
    $courseStatus = sanitize($courseStatus);
    $courseStartAt = sanitize($courseStartAt);
    $coursePrice = intval($coursePrice);
    $courseDiscount = intval($courseDiscount);
    $courseTeacher = sanitize($courseTeacher);
    $courseTeacherEmail = sanitize($courseTeacherEmail);
    $courseImage = sanitize($courseImage);
    $teacherResume = sanitize($teacherResume);
    $coursePre = sanitize($coursePre);


    $sql = "INSERT INTO $tbl_course(`course_title`, `course_reference`, `course_demo`, `course_lenght`, `course_status`, `course_start_at`, `course_price`, `course_discount`, `course_teacher`, `course_teacher_email`, `course_teacher_resume`, `course_pre`, `course_image`) VALUES ('$courseTitle','$courseReference','$courseDemo','$courseLength','$courseStatus','$courseStartAt','$coursePrice','$courseDiscount','$courseTeacher','$courseTeacherEmail','$teacherResume','$coursePre','$courseImage')";

    $result = $connect->prepare($sql);
    $result->execute();
    if ($result) {
        return $result;
    } else {
        return false;
    }


}

function findCourse()
{
    global $connect, $tbl_course;
    $sql = ("SELECT * FROM `$tbl_course` ORDER BY `course_id` DESC");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function findCourseById($courseId = null)
{
    global $connect, $tbl_course;
    $courseId = $courseId;
    $sql = ("SELECT * FROM `$tbl_course` WHERE `course_Id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $courseId);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function finalPrice($price, $discount)
{
    if ($discount === 0) {
        return $price;
    }
    $discount = 100 - $discount;
    return ($price * $discount) / 100;
}

function createTransaction($userID = null, $courseID = null, $refNumber = null, $orderNumber = null)
{
    global $connect, $tbl_transaction;
    $userID = intval($userID);
    $courseID = intval($courseID);
    $refNumber = sanitize($refNumber);
    $orderNumber = sanitize($orderNumber);

    $sql = ("INSERT `$tbl_transaction` SET `user_id`=?, `course_id`=?, `ref_number`=?,`order_number`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $userID);
    $result->bindValue(2, $courseID);
    $result->bindValue(3, $refNumber);
    $result->bindValue(4, $orderNumber);
    $result->execute();
    if ($result) {
        return $result;
    }
    return false;

}

function updateTransaction($refNumber = null, $orerNumber = null, $coursePrice = null)
{
    global $connect, $tbl_transaction;
    $refNumber = sanitize($refNumber);
    $orerNumber = sanitize($orerNumber);
    $coursePrice = sanitize($coursePrice);
    $transactionSatus = 2;


    $sql = ("UPDATE  `$tbl_transaction` SET `ref_number`=?,`transaction_status`=?,`course_price`=? WHERE `order_number`=? ");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $refNumber);
    $result->bindValue(2, $transactionSatus);
    $result->bindValue(3, $coursePrice);
    $result->bindValue(4, $orerNumber);
    $result->execute();
    if ($result) {
        return $result;
    }
    return false;

}

function userTransactionFindByID($userId = null)
{
    global $connect, $tbl_transaction;
    $sql = ("SELECT * FROM `$tbl_transaction` WHERE `user_id`=? ORDER BY `transaction_id` DESC");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $userId);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function userTransactionFindAll()
{
    global $connect, $tbl_transaction;
    $sql = ("SELECT * FROM `$tbl_transaction` ORDER BY `transaction_id` DESC");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function activeCourseForUser($userID = null, $courseID = null, $userName = null)
{
    global $connect, $tbl_user_course;
    $userID = intval($userID);
    $courseID = intval($courseID);
    $userName = sanitize($userName);
    $status = 1;
    $sql = "INSERT INTO $tbl_course(`user_name`, `user_id`, `course_id`, `status`) VALUES ('$userName','$userID','$courseID','$status')";
    $result = $connect->prepare($sql);
    $result->execute();
    if ($result) {
        return $result;
    } else {
        return false;
    }


}

function findCourseStudents($courseID = null)
{
    $courseID = intval($courseID);
    global $connect, $tbl_user_course;
    $sql = ("SELECT * FROM `$tbl_user_course` WHERE `course_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $courseID);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function isUserAccessToCourse($userID = null, $courseID=null)
{
    $userID = intval($userID);
    $courseID = intval($courseID);
    global $connect, $tbl_user_course;
    $sql = ("SELECT * FROM `$tbl_user_course` WHERE `user_id`=? AND `course_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1, $userID);
    $result->bindValue(2, $courseID);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function findCourseUsers()
{

    global $connect, $tbl_user_course;
    $sql = ("SELECT * FROM `$tbl_user_course`");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

function addUserCourse($userName = null, $userID = null, $userCourseID = null)
{
    global $connect, $tbl_user_course;

    $userName = sanitize($userName);
    $userID = intval($userID);
    $userCourseID = intval($userCourseID);
    $status = 1;
    $sql = ("INSERT `$tbl_user_course` SET `user_name`=?,`user_id`=?,`course_id`=?,`status`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$userName);
    $result->bindValue(2,$userID);
    $result->bindValue(3,$userCourseID);
    $result->bindValue(4,$status);
    $result->execute();
    if ($result) {
        return $result;
    }
    return false;
}

function findUserAllCourse($userID = null){
    global $connect,$tbl_user_course,$tbl_course;
    $userID = intval($userID);
    $sql = ("SELECT `$tbl_user_course`.course_id,`$tbl_user_course`.user_id, `$tbl_course`.course_id, `$tbl_course`.course_title FROM `$tbl_user_course` INNER JOIN `$tbl_course` ON `$tbl_user_course`.course_id = `$tbl_course`.course_id WHERE `user_id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$userID);
    $result->execute();
    if ($result){
        return $result;
    }
    return false;

}

function findOtherPartOfCourse($courseID=null){
    global $connect, $tbl_posts;
    $sql = ("SELECT * FROM `$tbl_posts` WHERE `course_id`=? ORDER BY `post_id` DESC");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$courseID);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}
