<?php
$queryExist = null;
$queryCreate = null;

$hasError = false;
$success = false;
$msg = null;
if (isset($_POST['btn-poll'])){
    if (!empty($_POST['question']) && !empty($_POST['item'])){
        $queryExist = isPollExist($_POST['question']);
            if ($queryExist){
                $hasError = true;
                $msg = 'Your question is duplicate';
            }else{
                $queryCreate = createPoll($_POST['question'],$_POST['item']);
                if ($queryCreate){
                    $success = true;
//                    $msg = 'your Survey is has been successfully created  ';
                }else{
                    $hasError = true;
                    $msg = 'your Survey is not create!!!';
                }
            }
    }else{
        $hasError = true;
        $msg ='The field cannot be empty';
    }

}