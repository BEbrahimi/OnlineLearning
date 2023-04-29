<?php
$error = false;
$success = false;
$createExam = null;
if (isset($_POST['btn_exam_test'])) {
    if (!empty($_POST['examCategory']) && !empty($_POST['examTime'])) {
        $createExam = createExam($_POST['examCategory'], $_POST['examTime']);
        if ($createExam) {
            $success = true;
        } else {
            $error = true;
        }
    } else {
        echo 'file the form';
    }
}
