
<!--Login form start-->
<div class="container-fluid">
    <div class="container py-5">
        <div class="row justify-content-center">
            <?php
            if ($msgError):?>
                <div class="alert alert-danger"><?php echo $msg;?></div>
            <?php endif; ?>
            <form action="" method="post">

                <div class="row g-3">

                    <h3 class="text-center form-control" style="background: #06BBCC!important; color: #fff;">Enter new password</h3>
                    <div class="col-md-12">
                        <div class="form-floating">

                            <input type="password" name="password" class="form-control " id="LoginEmail" placeholder="Your Email_ID">
                            <label for="name">Enter new password</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">

                            <input type="password" name="re_password" class="form-control " id="LoginEmail" placeholder="Your Email_ID">
                            <label for="name">Confirm your password</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button name="btn_update_password" class="btn btn-primary w-25 py-3" type="submit" style="float: left;margin-right: 10px">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Login form End-->