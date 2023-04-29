<?php
$hasError = false;

$createInfo = null;
$success = false;
if (isset($_POST['info-submit'])){
    if (empty($_POST['info-title'])){
        $hasError = true;
    }else{
        $createInfo = createInfo($_POST['info-title']);
        $success = true;
    }
}

?>
<div class="page-body">
    <div class="row">

        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <div class="card-header">
                    <h3>Create Notification</h3>
                <form action="" method="post">
                    <?php if ($success){
                        echo '<script>
                        sweetAlert({
                        title:"Dear User",
                        text:"Your information has been successfully saved!",
                        icon:"success",
                        timer:4000,
                        button: false,
                        });
                        </script>
               
                        ';
                    }
                    if ($hasError){
                        echo '<script>
                        sweetAlert({
                        title:"Error!",
                        text:"Fill the Form",
                        icon:"warning",
                        timer:4000,
                        button: false,
                        });
                        </script>
               
                        ';
                    }
                     ?>
                    <div class="card-block tooltip-icon button-list">
                        <div class="input-group">
                            <input type="text" name="info-title" class="form-control" placeholder="Add Test" title="Add Test" data-toggle="tooltip">
                        </div>
                        <input type="submit" name="info-submit" class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit">
                    </div>
                </form>

            </div>
            <!-- Tooltips on textbox card end -->

            <div class="panel box box-info" >
                <div class="panel-body" style="margin: 20px">
                    <div class="table-responsive" style="margin: 20px;">
                  <h4>List of registered ads</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><input type="checkbox" class="select-all"></th>
                                <th>Tile.</th>
                                <th>Date</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
$findInfoPanel = null;
$findInfoPanel = findInfoPanel();
if ($findInfoPanel):
$rows = $findInfoPanel->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row):

?>
                            <tr>
                                <th><input type="checkbox" class="checkbox" name="checkbox"value=""></th>

                                <th><?php echo $row['info_body'];?></th>
                                <th><?php echo dateToShort($row['create_at']);?></th>
                                <th>
                                    <a href="delete-info.php?id=<?php echo $row['info_id']; ?>" class="label label-danger"><i class="fa fa-trash"></i></a>
                                    <a href="update-info.php?id=<?php echo $row['info_id']; ?>" class="label label-success"><i class="fa fa-edit"></i></a>
                                </th>

                            </tr>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
                            </tbody>

                        </table>

                        <ul class="list-inline user-page-admin" style=" margin-right:50%;">
                            <li style="float: right;">
                                <a class="label label-danger" href="#" n>Delete All</a>
                            </li>
                            <li style="float: right;">
                                <a class="label label-info" href="#" n>Print</a>
                            </li>
                        </ul>
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