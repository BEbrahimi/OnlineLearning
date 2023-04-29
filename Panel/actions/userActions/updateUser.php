
<?php
if (isset($_GET['id'])&& !empty($_GET['id']) ){
    $id = intval($_GET['id']);

}else{
    header("Location:index.php");
    exit;
//    echo '<script>
//window.open("index.php");
//</script>';


}
$updateUserById = null;
$errors = [];
$haserror = false;
if (isset($_POST['btn_user_update_submit'])) {
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['userName']) && !empty($_POST['email']) && !empty($_POST['mobile'] && strlen($_POST['userName']) > 8) && ctype_digit($_POST['mobile']) && $_POST['email']== $_POST['r_email']){

//            if (empty($_POST['role'])) $_POST['role'] = 1;

            $updateUserById = updateUserById($id,$_POST['firstName'],$_POST['lastName'],$_POST['userName'],$_POST['email'],$_POST['mobile'],$_POST['role']);
            if ($updateUserById){

                echo '<script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Your desired user has been successfully updated",
                        icon:"success",
                        timer:4000,
                        button:false,
                        });</script>';

            }else{
                echo '
                        <script>
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
        if (empty($_POST['firstName'])){
            $haserror = true;
            $errors[]= 'Frist name is empty';
        }

        if (empty($_POST['lastName'])){
            $haserror = true;
            $errors[]= 'last name is empty';
        }

        if (strlen($_POST['userName'])<8){
            $haserror = true;
            $errors[]= 'Your username should be more than 8 characters';
        }

        if (empty($_POST['email'])){
            $haserror = true;
            $errors[]= 'email is empty';
        }
        if (empty($_POST['mobile'])){
            $haserror = true;
            $errors[]= 'mobile is empty';
        }
        if (strlen($_POST['mobile'])<>10){
            $haserror = true;
            $errors[]= 'Your mobile number should be equal to 10 digits ';
        }

        if (!ctype_digit($_POST['mobile'])){
            $haserror = true;
            $errors[]= 'Your mobile number should be digits ';
        }
        if ($_POST['email']!= $_POST['r_email']){
            $haserror = true;
            $errors[]= 'Your email and confirm email do not match';
        }
    }


}
?>


