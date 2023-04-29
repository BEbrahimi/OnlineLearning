<?php
$uploadDir = 'uploads/';
$hasError = false;
$msgSuccess = false;
$error = '';
$success = false;
//if (isset($_POST['btn-file-send'])) {
//    Check if file was uploaded without error
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $allowedFiles = array(
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
            "png" => "image/png",
            "mp4" => "video/mp4",
        );
        $fileName = strtolower($_FILES['file']['name']);
        $fileType = $_FILES['file']['type'];
        $fileSize = $_FILES['file']['size'];
        $fileTmp = $_FILES['file']['tmp_name'];


// Verify file extension
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!array_key_exists($extension, $allowedFiles)) {
            $hasError = true;
           echo $error = 'You can not upload this file select anther file!';
           return false;


        }
        // Verify File Size
        $maxSize = 5 * 1024 * 1024;
        if ($fileSize > $maxSize) {
            $hasError = true;
            echo $error = 'Your file size more the 5 MB';

        }
        else {

            //  Check is file exists before uploading
            if (file_exists($uploadDir . $fileName)) {
                $hasError = true;
                echo $error = 'Your file name is already exist please change your file name!';
            } else {
                move_uploaded_file($fileTmp, $uploadDir . $fileName);
                $msgSuccess = true;
                echo '<img width="200px" src="'.$uploadDir.$fileName.'">';
                echo '<br>';
                echo $fileName;
                echo '<br>';
                echo $error = 'Upload successful';
            }
//        }else
//            {
//            $hasError = true;
//            $error ='Error uploading';
        }


    }
//}
?>
