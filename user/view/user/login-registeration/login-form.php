<?php
$random_numbers = rand(1000,9999);
//echo $random_numbers;

?>
<!--Login form start-->
<div class="container-fluid">
    <div class="container py-5">
        <div class="row justify-content-center">
            <form action="" method="post">
                <?php
                if ($msgError):?>
                    <div class="alert alert-danger">
                        <?php echo $msg;?>
                    </div>
                <?php endif; ?>
                <?php
                if ($msgSuccess):?>


                        <script>
                            swal({
                                title: "Dear user!",
                                text: "your account has been successfully activated! Now you can login to the site",
                                icon: "success",
                                button:false,
                                timer:3000,

                            });
                        </script>

                <?php endif; ?>

                <?php
                $isUserInBlackList = null;
                $doLogin = null;
                $msgError = false;
                $msg = '';
                if (isset($_POST['btn_login_submit'])){
                    if (!empty($_POST['emailL']) && !empty($_POST['passwordL'])){
                        $isUserInBlackList = isUserInBlackList($_POST['emailL']);
                        if ($isUserInBlackList){
                            $msgError = true;
                            $msg = 'Your access to your account is currently blocked,
Contact the manager for more information';
                        }else{
                            if (empty($_POST['remember-me'])){
                                $_POST['remember-me'] = null;
                            $doLogin = doLogin($_POST['emailL'],$_POST['passwordL'],$_POST['remember-me']);
                            }
                            if ($doLogin){

//                            echo 'Successfully login';
                                header('location:index.php');
                            }else{
                                $msgError = true;
                                $msg = 'Your username or password is incorrect!';
                            }
                        }

                    }else{

                        $msgError = true;
                        $msg = 'Enter your email or password';
                    }
                }

                ?>

                <div class="row g-3">
                    <?php if ($msgError): ?>
                    <div class="alert alert-warning">
                        <?php echo $msg;?>
                    </div>
                    <?php endif; ?>
                    <h3>Login:</h3>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="email" name="emailL" value="<?php if (isset($_COOKIE['userEmail'])){echo $_COOKIE['userEmail'];} ?>" class="form-control" id="LoginEmail" placeholder="Your Email_ID">
                            <label for="name">Your Email_ID</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="password" name="passwordL" value="<?php if (isset($_COOKIE['userEmail'])){echo $_COOKIE['userPassword'];} ?>" class="form-control" id="Login_password" placeholder="Your Password">
                            <label for="name">Your Password</label>
                        </div>
                    </div>
                    <br>
                    
<!--                    Captcha code-->
                    <div class="col-md-3">
                        <div class="form-floating captcha-code">
                            <span>Captcha Code:</span>
                            <img  src="assets/img/captcha.png" alt="">
                        </div>
                    </div>
<!--                    Captcha code end -->

<!--                    Captcha input aria -->
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="captcha-code" class="form-control" id="Login_password" placeholder="Enter your captcha code">
                            <label for="name">Enter your captcha code</label>
                        </div>
                    </div>
<!--                    Captcha input aria -->

                    <div class="col-12">
                        <input type="checkbox" name="remember-me"
                            <?php if (isset($_COOKIE['userEmail'])){?>
                                checked
                            <?php } ?>
                        id="checkbox" style="margin: 20px">  Save your password
                        <a href="reset-password.php" style="margin: 20px"><i class="fa fa-lock" style="margin-right: 20px"></i>Forgot password?</a>
                    </div>


                    <div class="col-12">
                        <button class="btn btn-primary w-25 py-3" type="submit" name="btn_login_submit" style="float: left;margin-right: 10px">Log IN</button>
                    </div>
                    <div class="line_section"></div>


                    <?php if (count($errors) > 0):?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error):?>
                                <p><?php echo $error;?> </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($query):?>
                        <div class="alert alert-success">
                            <p>successful! The activation link will be sent to your email
                                Please check your email </p>
                        </div>
                    <?php endif; ?>
                    <?php if ($query_exist):?>
                        <div class="alert alert-danger">
                            <p>Your email already exist</p>
                        </div>
                    <?php endif; ?>


<!--                    Login and registration -->

                    <h3>Register:</h3>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="firstName" id="name" placeholder="Your Name">
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Your Last Name">
                            <label for="name">Your Last Name</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" name="userName" class="form-control" id="userName" placeholder="Your User Name">
                            <label for="name">Your User Name</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="r_email" id="r_email" placeholder="Your Email">
                            <label for="email">Your R_Email</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password"  id="password" placeholder="Your Email">
                            <label for="password">Your Password</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="r_password" id="r_password" placeholder="Your Email">
                            <label for="password">Your R_password</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your Phone number">
                            <label for="Phone">Your Phone number</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button name="btn_reg_submit" class="btn btn-primary w-25 py-3" type="submit" style="float: left;margin-right: 10px">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Login form End-->