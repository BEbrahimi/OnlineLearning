<?php
$error = null;
$success = null;
$msg = null;
$addUserCourse = null;
if (isset($_POST['btn-add-user'])){
    if (!empty($_POST['fullName']) && !empty($_POST['usersList']) && !empty($_POST['allCourse'])){
        $addUserCourse = addUserCourse($_POST['fullName'],$_POST['usersList'],$_POST['allCourse']);
        if ($addUserCourse){
            $success = true;
            $msg = 'User add in course successfully';
        }else{
            $error = true;
            $msg = 'System Error';
        }
    }else{
        $error = true;
        $msg = 'Fill the form';

    }

}