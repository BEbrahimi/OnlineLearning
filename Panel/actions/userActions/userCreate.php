<?php

$query = null;
$query_exist = null;
$errors = [];
$haserror = false;
if (isset($_POST['btn_reg_submit'])) {
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['mobile'] && strlen($_POST['userName']) > 8) && ctype_digit($_POST['mobile']) && $_POST['password'] == $_POST['r_password'] && $_POST['email']== $_POST['r_email']){

        $query_exist = isUserExist($_POST['email']);
        if ($query_exist){
        $haserror = true;
        $errors[] = 'Your email already exist';
        }else{
//            if (empty($_POST['role'])){
//                $_POST['role'] = 1;
//            }
            if (empty($_POST['role'])) $_POST['role'] = 1;
            $current_time = round(microtime(true));
            $token = md5($_POST['email']. $current_time);
            $activation_key = $token;
            $query = createUser($_POST['firstName'],$_POST['lastName'],$_POST['userName'],$_POST['password'],$_POST['email'],$_POST['mobile'],$_POST['role'],$activation_key);

            $mail_subject ='Account activation key';
            $mail_body = '

 <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

            <tr>
                <td valign="middle" class="hero" style="background :#448aff; background-size: cover; height: 400px;">
                    <table>
                        <tr>
                            <td>
                                <div class="text" style="padding: 0 3em; text-align: center;margin-bottom: 0; color: #ffffff;">
                                    <h2 style="font-size: 30px; color: #fff;">We offer excellent &amp; best lessons.</h2>
                                    <p style="font-size: 21px;">The users of the online Learning website are proud to help you in the field of education.
                                        Please click on the link below, thank you</p>
                                    <p><a href="localhost/bashir/project/user/login-registration.php?activation_key='.$activation_key.'" style="background: #a7a7a7; border-radius: 30px;color: #ffffff; padding: 10px 15px; text-decoration: none;">Activation key click here!</a></p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr><!-- end tr -->

            <!-- 1 Column Text + Button : END -->
        </table>

    </div>

';

            sendMail($_POST['email'],$mail_subject,$mail_body);

        }
    }else{
        if (empty($_POST['firstName'])){
            $haserror = true;
            $errors[]= 'First name is empty';
        }

        if (empty($_POST['lastName'])){
            $haserror = true;
            $errors[]= 'last name is empty';
        }

        if (strlen($_POST['userName'])<8){
            $haserror = true;
            $errors[]= 'Your username should be more than 8 characters';
        }
        if (empty($_POST['password'])){
            $haserror = true;
            $errors[]= 'password is empty';
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
//        if (empty($_POST['role'])){
//            $haserror = true;
//            $errors[]= 'role is empty';
//        }

        if ($_POST['password'] != $_POST['r_password']){
            $haserror = true;
            $errors[]= 'Your password and confirm password do not match';
        }

        if ($_POST['email']!= $_POST['r_email']){
            $haserror = true;
            $errors[]= 'Your email and confirm email do not match';
        }
    }


}
?>


