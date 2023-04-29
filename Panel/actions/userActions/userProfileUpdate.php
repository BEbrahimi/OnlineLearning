
<?php
$updateUserProfileById = null;
$errors = [];
$haserror = false;
$userID = $_SESSION['userInfo']['id'];
//echo $userID;
if (isset($_POST['btn-update-profile'])) {
    if (!empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['user-name']) && !empty($_POST['email'])){

//            if (empty($_POST['role'])) $_POST['role'] = 1;
    $updateUserProfileById = updateUserProfileById($userID,$_POST['first-name'],$_POST['last-name'],$_POST['user-name'],$_POST['email']);
    if ($updateUserProfileById){

        echo '<script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Your desired user has been successfully updated",
                        icon:"success",
                        timer:4000,
                        button:false,
                        });</script>';

        global $connect,$tbl_logs;
        $user_id = $_SESSION['userInfo']['id'];
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $user_borwser = getUserBrowser($_SERVER['HTTP_USER_AGENT']);
        $user_email = $_SESSION['userInfo']['userEmail'];
        $user_name = $_SESSION['userInfo']['userName'];
        $detail = 'logOut for update';
        $sql=("INSERT `$tbl_logs` SET `user_id`=?,`ip`=?,`browser`=?,`email`=?,`user_name`=?,`detail`=?");
        $result = $connect->prepare($sql);
        $result->bindValue(1,$user_id);
        $result->bindValue(2,$user_ip);
        $result->bindValue(3,$user_borwser);
        $result->bindValue(4,$user_email);
        $result->bindValue(5,$user_name);
        $result->bindValue(6,$detail);
        $result->execute();
        session_unset();
        session_destroy();
        header('location:login-registration.php');
        exit();

    }else{
        echo '<script>
                        sweetAlert({
                        title:"Error!",
                        text:"The desired update was not accepted",
                        icon:"warning",
                        timer:4000,
                        button: false,
                        });
                        </script>
               
                        ';

    }


    }else{
        if (empty($_POST['name'])){
            $haserror = true;
            $errors[]= 'Frist name is empty';
        }

        if (empty($_POST['last_name'])){
            $haserror = true;
            $errors[]= 'last name is empty';
        }

        if (strlen($_POST['user-name'])<8){
            $haserror = true;
            $errors[]= 'Your username should be more than 8 characters';
        }

        if (empty($_POST['email'])){
            $haserror = true;
            $errors[]= 'email is empty';
        }
    }


}
?>



