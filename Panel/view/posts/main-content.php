<!-- Main-body start -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body breadcrumb-page">
                <!-- Simple Breadcrumb card start -->
                <!--PAGE CONTENT -->
                <div id="content">
                    <div class="inner">

                        <div class="row">
                            <div class="col-lg-12 card o-visible">
                                <div class="card-header">
                                    <h5>Student Course List </h5>
                                </div>
                                <div class="panel box box-info">
                                    <div class="panel-heading">
                                        <ul class="list-inline user-page-admin" style="position: relative">
                                            <li>
                                                <form class="navbar-form" method="get" action="post_search.php">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" name="txt_search" class="form-control" placeholder="Search..."/>
                                                        <button type="submit" name="search" class="btn btn-info" style="position: absolute;top: 0;left:88%; height: 36px;line-height: 10px">Search</button>
                                                    </div>

                                                </form>
                                            </li>


                                            <form method="post">
                                                <li style="float: right;position: absolute;top: 0px;right: 50px;">
                                                    <a href="#" class="label label-danger">Delete All</a>
                                                </li>
                                                <li style="float: right;position: absolute;top: 0px;right: 0px;">
                                                    <a href="#" class="label label-info">Print</a>
                                                </li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" class="select-all"></th>
                                                    <th>Title</th>
                                                    <th>writer</th>
                                                    <th>CategoriesCategories</th>

                                                    <th>Date</th>
                                                    <th>Operation</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $findPost = null;
                                                $findPost =findPost();
                                                if ($findPost){
                                                $rows = $findPost->fetchAll(PDO::FETCH_ASSOC);
                                                //                                    var_dump($rows);
                                                //                                    exit();
                                                foreach ($rows as $row):?>

                                                <tr style="height: 100px">
                                                    <th><input type="checkbox" class="checkbox" name="checkbox"value=""></th>
                                                    <th><?php echo $row['post_title'];?></th>
                                                    <th>Bashir Ebrahimi</th>
                                                    <th>PHP</th>

                                                    <th><?php echo dateToShort($row['create_time']);?></th>
                                                    <th>
                                                        <a href="#" class="label label-danger"><i class="fa fa-trash"></i></a>
                                                        <a href="#" class="label label-success"><i class="fa fa-edit"></i></a>
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
                                    </form>
                                </div>
                            </div>
                        </div>

<!--                        <div class="container">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-12" style="text-align: center; ">-->
<!--                                    <ul class="pagination" style="display: inline-block; width:200px;height: 20px;background: #00c0ef">-->
<!--                                        <li class="active"><a href="#">1</a></li>-->
<!--                                        <li ><a href="#">2</a></li>-->
<!--                                        <li ><a href="#">3</a></li>-->
<!--                                        <li ><a href="#">4</a></li>-->
<!--                                        <li ><a href="#">5</a></li>-->
<!--                                        <li ><a href="#">6</a></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>

                </div>

            </div>
            <!-- Page-body start -->
        </div>
    </div>


    <div id="styleSelector">

    </div>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>
