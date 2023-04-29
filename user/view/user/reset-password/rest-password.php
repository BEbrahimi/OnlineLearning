
<!--Login form start-->
<div class="container-fluid">
    <div class="container py-5">
        <div class="row justify-content-center">
            <?php
            if ($msgError):?>
            <div class="alert alert-warning"><?php echo $msg;?></div>
            <?php endif; ?>
            <?php
            if ($msgSuccess):?>
                <div class="alert alert-success"><?php echo $msg;?></div>
            <?php endif; ?>
            <form action="" method="post">

                <div class="row g-3">

                    <h3 class="text-center form-control" style="background: #06BBCC!important; color: #fff;">Password recovery</h3>
                    <div class="col-md-12">
                        <div class="form-floating">

                            <input type="email" name="user_email" class="form-control " id="LoginEmail" placeholder="Your Email_ID">
                            <label for="name">Enter Your Email_ID</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button name="btn_change_password" class="btn btn-primary w-25 py-3" type="submit" style="float: left;margin-right: 10px">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Login form End-->