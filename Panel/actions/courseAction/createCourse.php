<?php
$hasError = false;
$hasSuccess = false;
$msg = null;
$createCourse = null;

if (isset($_POST['createCourse'])) {
    if (!empty($_POST['courseTitle']) && !empty($_POST['courseDemoLink']) && !empty($_POST['courseLength']) && !empty($_POST['courseStartAt']) && !empty($_POST['courseStatus']) && !empty($_POST['coursePrice']) && !empty($_POST['courseImg']) && !empty($_POST['teacherResume']) && !empty($_POST['coursePre']) && !empty($_POST['courseReference']) && !empty($_POST['courseTeacher']) &&!empty($_POST['teacherEmail'])) {

        $createCourse = createCourse($_POST['courseTitle'],$_POST['courseDemoLink'],$_POST['courseLength'],$_POST['courseStartAt'],$_POST['courseStatus'],$_POST['coursePrice'],$_POST['courseDiscount'],$_POST['courseTeacher'],$_POST['teacherEmail'],$_POST['courseImg'],$_POST['teacherResume'],$_POST['coursePre'],$_POST['courseReference']);
        if ($createCourse) {
            $hasSuccess = true;
            $msg = 'Your Course has been successfully created';
//            var_dump($createCourse);

        } else {
            $hasError = true;
            $msg = 'Error in you information';
        }

    } else {
        $hasError = True;
        $msg = 'Fill the star from';
    }

}