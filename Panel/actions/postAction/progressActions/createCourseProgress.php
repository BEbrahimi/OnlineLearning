<?php
$query = null;
$query_exist = null;
$errors = [];
$hasError = false;
$successMsg = false;
$msg = null;
if (isset($_POST['btn-progress'])){
    if (!empty($_POST['title']) && !empty($_POST['percent']) && !empty($_POST['color'])){

        $query_exist = isCourseProgressExist($_POST['title']);
        if ($query_exist){
            $hasError = true;
            $errors[]='The title is repetitive';
        }else{
            $query = createCourseProgress($_POST['title'],$_POST['percent'],$_POST['color']);
            if ($query){
                $successMsg = true;
//                $msg = 'Course progress has been successfully created';
            }
        }

    }else{
        if (empty($_POST['title'])){
            $hasError = true;
            $errors[]= 'Title is empty';
        }

        if (empty($_POST['percent'])){
            $hasError = true;
            $errors[]= 'percentage is empty';
        }

        if (empty($_POST['color'])){
            $hasError = true;
            $errors[]= 'Select one color for progress';
        }
    }
}