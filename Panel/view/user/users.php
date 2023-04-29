<?php
if (isset($_GET['deleteUserSuccessfully']) && !empty($_GET['deleteUserSuccessfully'])){
    echo '
                        <script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Your desired user has been successfully deleted",
                        icon:"success",
                        timer:4000,
                        button: false,
                        });
                        </script>
                        
                        ';
}elseif(isset($_GET['deleteUserFail'])&& !empty($_GET['deleteUserFail'])){
    echo '
                        <script>
                        sweetAlert({
                        title:"Error!",
                        text:"Your desired user was not deleted",
                        icon:"warning",
                        timer:4000,
                        button: false,
                        });
                        </script>
                        
                        ';

}

?>



<!-- Main-body start -->
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin: 10px">Users</h3>
            </div>
        </div>
        <hr />

        <div class="row"  style="margin: 10px;">
            <div class="col-lg-12">
                <?php
                $deleteAllUsers = null;
                $deleteAllUsers = deleteAllUsers();
                if (isset($_POST['del-all'])){
                    if (!empty($_POST['checkbox'])){
                        if ($deleteAllUsers){
                            echo '
                        <script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Your desired user has been successfully deleted",
                        icon:"success",
                        timer:4000,
                        button: false,
                        });
                        </script>
                        
                        ';

                        }else{
                            echo '
                        <script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"Error in operation",
                        icon:"warning",
                        timer:4000,
                        button: false,
                        });
                        </script>
                        
                        ';

                        }

                    }else{
                        echo '
                        <script>
                        sweetAlert({
                        title:"Dear User!",
                        text:"You must select at least one row",
                        icon:"warning",
                        timer:3000,
                        button: false,
                        });
                        </script>
                        
                        ';
                    }
                }

                ?>
                <form method="post" action="">
                <div class="panel box box-warning">
                    <div class="panel-heading">
                        <h4 style="text-align: left;background: #efefef;padding: 10px;">All User Information</h4>

<script>
    // print page
    $(document).ready(function () {
        $("#printBtn").click(function () {
            window.print();
        })
    })

</script>
                            <ul class="list-inline user-page-admin" style="position: relative;">
                                <li style="display: inline!important; margin-left: 10px;"><a href="users.php">All</a> </li>
                                <li style="display: inline!important; margin-left: 10px;"><a href="?role=4">Manager</a> </li>
                                <li style="display: inline!important; margin-left: 10px;"><a href="?role=3">Senior Authors</a> </li>
                                <li style="display: inline!important; margin-left: 10px;"><a href="?role=2">Authors</a> </li>
                                <li style="display: inline!important; margin-left: 10px;"><a href="?role=1">Simple Users</a> </li>
                                <li style="float: right ;position: absolute;top: 0;right: 0;"><a href="#" id="printBtn" class="label label-info">Print</a></li>
                                <li style="float: right; position: absolute;top: 0;right: 63px;"><button class="label label-danger" type="submit" name="del-all" style="cursor: pointer">Delete All</button> </li>
                            </ul>


                    </div>

                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-hover">
                                    <thead>
                                    <tr style="background: #448aff45">
                                        <th><input type="checkbox" class="select-all"></th>
                                        <th>Full Name</th>
                                        <th>User Name</th>
                                        <th>E-Mail</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $findUser = null;
                                    if (isset($_GET['role'])&& !empty($_GET['role'])){
                                        $findUser = findUserByRole($_GET['role']);
//                                        var_dump($findUser);
                                    }else{
                                        $findUser =findUsers();
//                                        var_dump($findUser);
                                    }


                                    if ($findUser){
                                    $rows = $findUser->fetchAll(PDO::FETCH_ASSOC);
                                    //                                    var_dump($rows);
                                    //                                    exit();
                                    foreach ($rows as $row):?>

                                    <tr>
                                        <th><input type="checkbox" class="checkbox" name="checkbox[]" value="<?php echo $row['id'];?>"></th>
                                        <th><?php echo $row['first_name'].' '.$row['last_name'];?></th>
                                        <th><?php echo $row['user_name'];?></th>
                                        <th><?php echo $row['email'];?></th>
                                        <th><?php echo $row['mobile'];?></th>
                                        <th><?php
                                            switch ($row['status']){
                                                case 0:
                                                    echo '<span class="label label-danger">Deactive</span>';
                                                    break;
                                                case 1:
                                                    echo '<span class="label label-success">Active</span>';
                                                    break;

                                            }

                                            ?></th>
                                        <th><?php
                                            switch ($row['role']){
                                                case 1:
                                                    echo '<b>SimpleUser</b>';
                                                    break;
                                                case 2:
                                                    echo '<b>Author</b>';
                                                    break;
                                                case 3:
                                                    echo '<b>Senior Author</b>';
                                                    break;
                                                case 4:
                                                    echo '<b >Manager</b>';
                                                    break;

                                            }


                                            ?></th>
                                        <th>
                                            <a href="actions/userActions/deleteUser.php?id=<?php echo $row['id']; ?>" class="label label-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="update_user.php?id=<?php echo $row['id'];?>" class="label label-success">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php }
                                    else{
                                         echo '<div class="alert alert-danger text-center" style="margin-left:20px;margin-right: 30px; ">The user has not yet registered on the site</div>';
                                    }
                                    ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>