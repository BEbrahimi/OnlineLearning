
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">

                    <div class="col-sm-12">
                        <!-- Tooltips on textbox card start -->
                        <div class="card o-visible">
                            <div class="card-header">
                                <h5>Create User</h5>
                            </div>
                            <form action="" method="post">

                                <?php if (count($errors) > 0):?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error):?>
                                            <p><?php echo $error;?> </p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($query):?>

                                    <script>
                                        swal({
                                            title: "Dear user!",
                                            text: "Your user successfuly inserted",
                                            icon: "success",
                                            button:false,
                                            timer:3000,

                                        });
                                    </script>
                                <?php endif; ?>
                                <?php if ($query_exist):?>
                                    <div class="alert alert-danger">
                                        <p>Your email already exist</p>
                                    </div>
                                <?php endif; ?>

                                <div class="card-block tooltip-icon button-list">
                                    <!--firstName-->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="firstName"><label class="input-group-text"><i class="icofont icofont-user-alt-3"></i></label></span>
                                        <input type="text" class="form-control" name="firstName" placeholder="Enter your name" title="Enter your name" data-toggle="tooltip">
                                    </div>

                                    <!--lastName  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="lastName"><label class="input-group-text"><i class="icofont icofont-user-alt-3"></i></label></span>
                                        <input type="text" class="form-control" name="lastName" placeholder="Enter your Last name" title="Enter your Last name" data-toggle="tooltip">
                                    </div>

                                    <!--userName  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="userName"><label class="input-group-text"><i class="icofont icofont-user-alt-3"></i></label></span>
                                        <input type="text" class="form-control" name="userName" placeholder="Enter your user name" title="Enter your user name" data-toggle="tooltip">
                                    </div>

                                    <!--password-->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="password"><label class="input-group-text"><i class="icofont icofont-lock"></i></label></span>
                                        <input type="password" class="form-control" name="password" placeholder="Enter your password" title="Enter your password" data-toggle="tooltip">
                                    </div>

                                    <!--r_password  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="password"><label class="input-group-text"><i class="icofont icofont-lock"></i></label></span>
                                        <input type="password" class="form-control" name="r_password" placeholder="Confirm your password" title="Confirm your password" data-toggle="tooltip">
                                    </div>

                                    <!--email  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="name"><label class="input-group-text"><i class="icofont icofont-ui-email"></i></label></span>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email" title="Enter your email" data-toggle="tooltip">
                                    </div>

                                    <!--r_email  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="phone"><label class="input-group-text"><i class="icofont icofont-ui-email"></i></label></span>
                                        <input type="email" class="form-control" name="r_email" placeholder="Confirm your Email" title="Confirm your Email" data-toggle="tooltip">
                                    </div>

                                    <!--mobile  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="phone"><label class="input-group-text"><i class="icofont icofont-phone"></i></label></span>
                                        <input type="text" class="form-control" name="mobile" placeholder="Enter your phone number" title="Enter your phone number" data-toggle="tooltip">
                                    </div>
                                    <!--role  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="role"><label class="input-group-text"><i class="icofont icofont-tools-bag"></i></label></span>
                                        <select name="role" class="form-control" title="Select Option"data-toggle="tooltip">
                                            <option value="">Select Option</option>
                                            <option value="1">User</option>
                                            <option value="2">Author</option>
                                            <option value="3">Senior Author</option>
                                            <option value="4">Manager</option>
                                        </select>
                                    </div>

                                    <input type="submit" name="btn_reg_submit" class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit">
                                    </input>
                                </div>
                            </form>
                        </div>
                        <!-- Tooltips on text box card end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>
</div>
<!-- Main-body end -->
<div id="styleSelector">

</div>
</div>
</div>
</div>
</div>
