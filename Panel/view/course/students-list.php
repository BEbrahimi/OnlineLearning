

<!-- Main-body start -->
<div class="page-body">
    <div class="row">

        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible" style="margin: 50px">
                <div class="card-header">
                    <h5>Student Course List </h5>
                </div>

                <form method="post">
                    <div class="panel-body">
                        <div class="table-responsive" style="padding: 10px;">
                            <table class="table table-hover text-center" style="border: 1px solid #efefef;">
                                <thead>
                                <tr style="background: #0cbde1;color: #fff;">
                                    <th><input type="checkbox" class="select-all"></th>
                                    <th>Full Name</th>
                                    <th>User_ID</th>
                                    <th>Transaction_ID</th>
                                    <th>Create_At</th>
                                    <th>Status</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>

                                <tbody style="background: #9fe4fb">
                                <?php
                                $findCourseUsers= null;
                                $findCourseUsers = findCourseUsers();
                                if ($findCourseUsers):
                                $rows = $findCourseUsers->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):
                                ?>

                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkbox" name="checkbox"value="">
                                    </th>
                                    <th> <?php echo $row['user_name'];?></th>
                                    <th><?php echo $row['user_id'];?></th>
                                    <th><?php echo $row['course_id'];?></th>
                                    <th><?php echo $row['access_create_at'];?></th>
                                    <th><?php
                                        switch ($row['status']){
                                            case 1:
                                                echo '<span style="color:green;">Active</span>';
                                                break;
                                            case 0:
                                                echo '<span style="color:red;">Not Active</span>';
                                                break;
                                        }
                                        ?></th>
                                    <th>
                                        <a href="#"class="label label-danger"><i class="fa fa-trash"></i></a>
                                        <a href="#"class="label label-success"><i class="fa fa-edit"></i></a>
                                    </th>
                                </tr>

                                <?php endforeach; ?>
                                <?php else: ?>
                                <div>Right now we don't have any student</div>
                                <?php endif; ?>
                                </tbody>

                            </table>
                            <ul class="list-inline user-page-admin" style=" margin-right:50%;">
                                <li style="float: right;">
                                    <a href="#"class="label label-danger">Delete selected rows</a>
                                </li>
                            </ul>
                        </div>
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