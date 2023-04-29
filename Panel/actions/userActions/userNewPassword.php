<?php
$isResetPasswordKeyExist = null;
$resetUserPassword = null;
$msg = '';
$msgError = false;
$msgSuccess = false;

if (isset($_GET['reset_password_key']) && !empty($_GET['reset_password_key'])){
    $isResetPasswordKeyExist = isResetPasswordKeyExist($_GET['reset_password_key']);
    if ($isResetPasswordKeyExist){
        if (isset($_POST['btn_update_password'])){
            if (!empty($_POST['password']) && $_POST['password'] ==$_POST['re_password']){
                $resetUserPassword = resetUserPassword($_POST['password'],$_GET['reset_password_key']);
                if ($resetUserPassword){
                    echo '
                         <script>
                            swal({
                                title: "Dear user!",
                                text: "Your password has been updated successfully, now you can enter the site",
                                icon: "success",
                                button:false,
                                timer:3000,

                            });
                        </script>
                        
                        ';
                }else{
                    echo '
                         <script>
                            swal({
                                title: "Error!",
                                text: "An error has occurred in my system, please try again",
                                icon: "danger",
                                button:false,
                                timer:3000,

                            });
                        </script>
                        
                        ';
                }
            }else{
                if (empty($_POST['password'])){
                    $msgError = true;
                    $msg = 'Your password is empty';
                }
                if ($_POST['password'] != $_POST['re_password']){
                    $msgError = true;
                    $msg = 'Your password does not match';
                }
            }
        }

    }else{
        $msgError = true;
        $msg = 'Your account reset password key is not valid!!! If you want, contact the management ';
    }
}else{
    header('location:index.php');
}

?>