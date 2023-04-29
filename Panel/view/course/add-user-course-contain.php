<!-- Main-body start -->
<div class="page-body">
    <div class="row">

        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible" style="margin: 50px">
                <div class="card-header">
                    <h5>Add student to course</h5>
                </div>
                <?php if ($success):?>
                    <div class="alert alert-success"><?php echo $msg;?></div>
                <?php endif;?>
                <?php if ($error):?>
                    <div class="alert alert-danger"><?php echo $msg;?></div>
                <?php endif;?>
                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list col-sm-3" style="float: left;">
                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label
                                    class="input-group-text">Full Name*</label></span>
                            <input type="text" class="form-control" name="fullName" placeholder="Enter Your Full Name..."
                                   title="Enter Your Full Name" data-toggle="tooltip">
                        </div>

                    </div>

                    <div class="card-block tooltip-icon button-list col-sm-3" style="float:left;">

                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label
                                    class="input-group-text">Type*</label></span>
                            <select name="usersList" class="form-control" title="Select your email"
                                    data-toggle="tooltip">
                                <option selected>Select one of these</option>
                                <?php
                                $findUsers = null;
                                $findUsers = findUsers();
                                if ($findUsers):
                                $rows =$findUsers->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):
                                ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['email'];?></option>

                                <?php endforeach;  ?>
                                <?php else:  ?>
                                    <option>No User</option>
                                <?php endif;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-block tooltip-icon button-list col-sm-6" style="float:left;">

                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label
                                        class="input-group-text">Type*</label></span>
                            <select name="allCourse" class="form-control" title="Select your course"
                                    data-toggle="tooltip">
                                <option selected>Select one of these</option>
                                <?php
                                $findCourse = null;
                                $findCourse = findCourse();
                                if ($findCourse):
                                    $rows =$findCourse->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row):
                                        ?>
                                        <option value="<?php echo $row['course_id']?>"><?php echo $row['course_title'];?></option>

                                    <?php endforeach;  ?>
                                <?php else:  ?>
                                    <option>No User</option>
                                <?php endif;  ?>

                            </select>
                        </div>
                    </div>

                    <div class="card-block tooltip-icon button-list col-sm-12 text-center" style="float:left;">
                        <input type="submit" name="btn-add-user" class="btn btn-success" value="Add"
                               data-toggle="tooltip" data-placement="top" title="Sent Data">
                    </div>

                </form>
            </div>
            <!-- Tooltips on textbox card end -->
        </div>
    </div>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>