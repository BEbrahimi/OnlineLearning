<?php
if (isset($_GET['deleteLogsSuccessfully']) && !empty($_GET['deleteLogsSuccessfully'])){
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
}elseif(isset($_GET['deleteUserFail'])&& !empty($_GET['deleteLogsFail'])){
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
                <h3 style="margin: 10px">Logs</h3>
            </div>
        </div>
        <hr />

        <div class="row" style="margin: 10px;">
            <div class="col-lg-12">
                <div class="panel box box-warning">

                    <form method="post" action="">

                        <div class="panel-body">
                            <h4 style="text-align: left;background: #efefef;padding: 10px;">User LogIn Information</h4>
                            <a href="#" class="label label-info" style="position: absolute;right: 88px;top: 10px;width: 100px;height: 30px;font-size: 10pt;text-align: center;padding: 10px;">
                               Delete All
                            </a>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" class="select-all" name="checkbox[]" value=""></th>

                                        <th>User Name</th>
                                        <th>User IP</th>
                                        <th>E-Mail</th>
                                        <th>Event Date</th>
                                        <th>Browser</th>
                                        <th>Details</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $findLogs = null;
                                    $findLogs = findUsersLogs();
                                    if ($findLogs){
                                        $rows = $findLogs->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row):
                                    ?>
                                    <tr>
                                        <th><input type="checkbox" class="checkbox" name="checkbox[]"value="<?php echo $row['id'];?>"></th>

                                        <th><?php echo $row['user_name'];?></th>
                                        <th><?php echo $row['ip'];?></th>
                                        <th><?php echo $row['email'];?></th>
                                        <th><?php echo $row['time'];?></th>
                                        <th><?php echo $row['browser'];?></th>
                                        <th><?php echo $row['detail'];?></th>
                                        <th>
                                            <a href="actions/userActions/deletLogs.php?id=<?php echo $row['id']; ?>" class="label label-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </th>
                                    </tr>
                                        <?php endforeach; ?>
                                    <?php }else{
                                      echo '<div class="alert alert-warning">sdfsadf</div>';
                                    } ?>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </form>
                </div>
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