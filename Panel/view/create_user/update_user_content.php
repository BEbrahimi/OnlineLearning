
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
                                <h5>Update User</h5>
                            </div>
                            <?php
                            $findUserById = null;
                            $findUserById =findUserById($id);
                            if ($findUserById){
                                $row = $findUserById->fetch(PDO::FETCH_ASSOC);
//                                var_dump($row);
                            }


                            ?>

                            <form action="" method="post">

                                <?php if (count($errors) > 0):?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error):?>
                                            <p><?php echo $error;?> </p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($query):?>
                                    <div class="alert alert-success">
                                            <p>Your user successfuly inserted</p>
                                    </div>
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
                                        <input type="text" class="form-control" name="firstName" placeholder="Enter your name" title="Enter your name" data-toggle="tooltip" value="<?php echo $row['first_name']?>">
                                    </div>

                                    <!--lastName  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="lastName"><label class="input-group-text"><i class="icofont icofont-user-alt-3"></i></label></span>
                                        <input type="text" class="form-control" name="lastName" placeholder="Enter your Last name" title="Enter your Last name" data-toggle="tooltip" value="<?php echo $row['last_name']?>">
                                    </div>

                                    <!--userName  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="userName"><label class="input-group-text"><i class="icofont icofont-user-alt-3"></i></label></span>
                                        <input type="text" class="form-control" name="userName" placeholder="Enter your user name" title="Enter your user name" data-toggle="tooltip" value="<?php echo $row['user_name']?>">
                                    </div>

                                    <!--email  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="name"><label class="input-group-text"><i class="icofont icofont-ui-email"></i></label></span>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email" title="Enter your email" data-toggle="tooltip" value="<?php echo $row['email']?>">
                                    </div>

                                    <!--r_email  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="phone"><label class="input-group-text"><i class="icofont icofont-ui-email"></i></label></span>
                                        <input type="email" class="form-control" name="r_email" placeholder="Confirm your Email" title="Confirm your Email" data-toggle="tooltip" value="<?php echo $row['email']?>">
                                    </div>

                                    <!--mobile  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="phone"><label class="input-group-text"><i class="icofont icofont-phone"></i></label></span>
                                        <input type="text" class="form-control" name="mobile" placeholder="Enter your phone number" title="Enter your phone number" data-toggle="tooltip" value="<?php echo $row['mobile']?>">
                                    </div>
                                    <!--role  -->
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="role"><label class="input-group-text"><i class="icofont icofont-tools-bag"></i></label></span>
                                        <select name="role" class="form-control" title="Select Option"data-toggle="tooltip">
                                            <option>Select Option</option>
                                            <option value="1"<?php if ($row['role']==1) echo "selected"?>>User</option>
                                            <option value="2"<?php if ($row['role']==2) echo "selected"?>>Author</option>
                                            <option value="3"<?php if ($row['role']==3) echo "selected"?>>Senior Author</option>
                                            <option value="4"<?php if ($row['role']==4) echo "selected"?>>Manager</option>
                                        </select>
                                    </div>
                                    <span class="label label-info">Your access level :<?php
                                        switch ($row['role']){
                                            case 1:
                                                echo 'SimpleUser';
                                                break;
                                            case 2:
                                                echo 'Author';
                                                break;
                                            case 3:
                                                echo 'Senior Author';
                                                break;
                                            case 4:
                                                echo 'Manager';
                                                break;

                                        }

                                        ?></span>
                                    <br>
                                    <br>

                                    <input type="submit" name="btn_user_update_submit" class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit" value="Update">
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
