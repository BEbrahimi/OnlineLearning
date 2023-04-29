<?php

$insertInBlackList = null;
if (isset($_POST['btn_black_list'])){
    if (!empty($_POST['userNameBlackList']) && !empty($_POST['userEmailBlackList'])){
        $insertInBlackList = insertInBlackList($_POST['userNameBlackList'],$_POST['userEmailBlackList']);
        if ($insertInBlackList){
//            var_dump($insertInBlackList);
            echo '
                        <script>
                        sweetAlert({
                        title:"Dear Admin!",
                        text:"User Blocked!",
                        icon:"warning",
                        timer:3000,
                        button: false,
                        });
                        </script>
                        
                        ';
//
        }else{
            echo 'false';
        }
    }else{
        echo 'error';
    }
}
?>

<!-- Main-body start -->
<div class="page-body">
    <div class="row" style="margin: 15px;">

        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <div class="card-header">
                    <h5>Block List</h5>
                </div>
                <form action="" method="post">



                    <div class="card-block tooltip-icon button-list">
                        <div class="input-group">
                            <span class="input-group-prepend" id="firstName"><label class="input-group-text">User Name *</label></span>
                            <input type="text" name="userNameBlackList" class="form-control" placeholder="Enter user name" title="Enter user name" data-toggle="tooltip">
                        </div>
                        <div class="input-group">
                            <span class="input-group-prepend" id="lastName"><label class="input-group-text">User Email *</label></span>
                            <input type="email" name="userEmailBlackList" class="form-control" placeholder="Enter User Email" title="Enter User Email" data-toggle="tooltip">
                        </div>

                        <input type="submit" name="btn_black_list" class="btn btn-danger waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit" value="Block">

                    </div>




                    <h4 style="text-align: left;background: #efefef;padding: 10px;">List of blocked users</h4>

                    <div class="table-responsive">


                        <table class="table table-hover" style="width: 100%;">

                            <thead>
                            <tr>
                                <th><input type="checkbox" class="select-all"></th>

                                <th>User Name</th>

                                <th>E-Mail</th>
                                <th>
                                    <a href="#" class="label label-danger">
                                        Delete All
                                    </a>

                                </th>


                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            $findUserInBlackList = null;
                            $findUserInBlackList = findUserInBlackList();
                            if ($findUserInBlackList){
                                $rows = $findUserInBlackList->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):

                                    ?>
                            <tr>
                                <th><input type="checkbox" class="select-all"></th>

                                <th><?php echo $row['userName'];?></th>

                                <th><?php echo $row['userEmail'];?></th>
                                <th>
                                    <a href="#" class="label label-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </th>

                            </tr>

                            <?php endforeach; ?>
                            <?php }else{
                                echo '<div class="alert alert-warning">Sorry!</div>';
                            } ?>

                            </tbody>

                        </table>

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