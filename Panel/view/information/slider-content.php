<?php
$hasSuccess= false;
$hasError = false;
$createSlider = null;
if (isset($_POST['slider-submit'])){
    if (!empty($_POST['slider-img']) && !empty($_POST['slider-href'])){
        $createSlider = createSlider($_POST['slider-img'],$_POST['slider-href']);
        $hasSuccess = true;
    }else{
        $hasError = true;
    }
}

?>

<div class="page-body">
    <div class="row">
<?php
if ($hasSuccess){
    echo '<script>
                        sweetAlert({
                        title:"Dear User",
                        text:"Your Slider has been successfully created!",
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
        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <div class="card-header">
                    <h3>Create Slider</h3>
                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list">
                        <div class="input-group">
                            <input type="text" name="slider-img" class="form-control" placeholder="Slider Name" title="Slider Name" data-toggle="tooltip">
                        </div>
                        <div class="input-group">
                            <input type="text" name="slider-href" class="form-control" placeholder="Link Slider" title="Link Slider" data-toggle="tooltip">
                        </div>
                        <input type="submit" name="slider-submit" class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit">
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
                                <th>Slider Name.</th>
                                <th>Address</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $findSlider =null;
                            $findSlider = findSlider();
                            if ($findSlider):
                            $rows = $findSlider->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row):
                            ?>

                            <tr>
                                <th><input type="checkbox" class="checkbox" name="checkbox"value=""></th>

                                <th><?php echo $row['slider_img'];?></th>
                                <th><?php echo $row['slider_url'];?></th>
                                <th>
                                    <a href="delete-info.php?id=<?php echo $row['slider_id']; ?>" class="label label-danger"><i class="fa fa-trash"></i></a>
                                    <a href="update-info.php?id=<?php echo $row['slider_id']; ?>" class="label label-success"><i class="fa fa-edit"></i></a>
                                </th>

                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <div class="alert alert-warning">Empty</div>
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