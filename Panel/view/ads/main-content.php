<!-- Main-body start -->
<div class="page-body">
    <div class="row">

        <div class="col-sm-12">
            <!-- Tooltips on textbox card start -->
            <div class="card o-visible">
                <div class="card-header">
                    <h5>Create Advertisements</h5>
                </div>
                <?php
                if ($msgError){
                    echo '   <script>
                            swal({
                                title: "Dear user!",
                                text: "You must fill the form",
                                icon: "warning",
                                button:false,
                                timer:3000,

                            });
                        </script>';
                }
                if ($msgSuccess){
                    echo '   <script>
                            swal({
                                title: "Dear user!",
                                text: "Your ads has been successfully created!",
                                icon: "success",
                                button:false,
                                timer:3000,

                            });
                        </script>';

                }



                 ?>



                <form action="" method="post">

                    <div class="card-block tooltip-icon button-list">
                        <div class="input-group">
                            <span class="input-group-prepend"><label class="input-group-text">Title* </label></span>
                            <input type="text" name="ad-title" class="form-control" placeholder="Ads Title" title="Ads Title" data-toggle="tooltip">
                        </div>
                        <div class="input-group">
                            <span class="input-group-prepend"><label class="input-group-text">link*</label></span>
                            <input type="text" name="ad-href" class="form-control" placeholder="Link Title" title="Link Title" data-toggle="tooltip">
                        </div>
                        <div class="input-group">
                            <span class="input-group-prepend"><label class="input-group-text">Start Date*</label></span>
                            <input type="date" name="start_at" class="form-control" placeholder="Starting Date..." title="2023-02-22..." data-toggle="tooltip">
                        </div>

                        <div class="input-group">
                            <span class="input-group-prepend"><label class="input-group-text">End Date*</label></span>
                            <input type="date" name="end_at" class="form-control" placeholder="Ending Date.." title="Ending Date.." data-toggle="tooltip">
                        </div>
                        <div class="input-group">
                            <span class="input-group-prepend"><label class="input-group-text">Ad-Image*</label></span>
                            <input type="text" name="ad-img" class="form-control" placeholder="Insert image name" title="Image Name.." data-toggle="tooltip">
                        </div>

                        <input type="submit" name="ad-submit" class="btn btn-primary waves-effect waves-light m-r-20" data-toggle="tooltip" data-placement="right" title="submit">
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
                                <th>Ads Title.</th>
                                <th>Link</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $findAd = null;
                            $findAd = findAd();
                            if ($findAd):?>
                            <?php $rows = $findAd->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row): ?>
                            <tr>
                                <th><input type="checkbox" class="checkbox" name="checkbox"value=""></th>
                                <th><?php echo $row['ad_title'];?></th>
                                <th><?php echo $row['ad_href'];?></th>
                                <th><?php echo $row['start_ad'];?></th>
                                <th><?php echo $row['end_ad'];?></th>
                                <th>
                                    <a href="#" class="label label-danger"><i class="fa fa-trash"></i></a>
                                    <a href="#" class="label label-success"><i class="fa fa-edit"></i></a>

                                </th>
                            </tr>
                          <?php endforeach; ?>

                            </tbody>

                        </table>
                        <?php else: ?>
                            <div class="alert alert-danger">
                                Empty
                            </div>
                        <?php endif; ?>
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