<?php
$userExists = null;
$sendResetPasswordToken = null;
$msg ='';
$msgError = false;
$msgSuccess = false;
if (isset($_POST['btn_change_password'])){
    if (!empty($_POST['user_email'])){
        $userExists = isUserExist($_POST['user_email']);
        if ($userExists){
            $current_time = round(microtime(true));
            $token = md5($_POST['user_email']. $current_time);
            $reset_password_key = $token;
            $mail_subject ='Reset Password key ';
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
                                        Please click on the link below, for reset password</p>
                                    <p><a href="localhost/bashir/project/user/new-password.php?reset_password_key='.$reset_password_key.'" style="background: #a7a7a7; border-radius: 30px;color: #ffffff; padding: 10px 15px; text-decoration: none;">Reset Password Link</a></p>
                                     <p style="font-size: 21px;"> 
                                     If this message was sent to you by mistake, ignore it
                                     </p>
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
            sendMail($_POST['user_email'],$mail_subject,$mail_body);
            addResetPasswordKey($_POST['user_email'],$reset_password_key);

            $msgSuccess = true;
            $msg = 'An email containing a password link has been sent to your email';
        }else{
            $msgError = true;
            $msg = 'Your desired email could not be found';

        }
    }else{
        $msgError = true;
        $msg = 'Please insert your email ID';

    }
}
?>
