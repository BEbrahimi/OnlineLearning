<!-- Main-body start -->
<div class="pcoded-inner-content">

    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <!-- Material statustic card start -->
                    <div class="col-xl-12 col-md-12 col-lg-12">

                        <div class="card mat-stat-card">
                            <h5 style="margin: 20px 15px 0px">Dashboard</h5>
                            <hr>
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 col-md-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-user text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5><?php countAllUsers(); ?></h5>
                                                <p class="text-muted m-b-0">User</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-book text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5><?php countAllTopics(); ?></h5>
                                                <p class="text-muted m-b-0">All Topics</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-6 p-b-20 p-t-20 b-r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-comment text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>20+</h5>
                                                <p class="text-muted m-b-0">All Comments</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fa fa-eye text-c-blue f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <?php $countAllUsersVisit = null;
                                                $countAllUsersVisit = countAllUsersVisit();
                                                $row = $countAllUsersVisit->fetch(PDO::FETCH_ASSOC);

                                                if ($row == true){
                                                    $counter = $row['visit_counter'];
                                                }
                                                else{
                                                    $counter =0;
                                                }

                                                ?>
                                                <h5><?php echo $counter;?></h5>
                                                <p class="text-muted m-b-0">Views</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- Material statustic card end -->

                    <!-- order-visitor start -->


                    <!-- order-visitor end -->

                    <!--  sale analytics start -->




                    <!--Member’s Start-->
                    <div class="col-xl-12 col-md-12">

                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Member’s performance</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-trash close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0 without-header">
                                        <tbody>
                                        <?php
                                        $findLastUsers = null;
                                        $findLastUsers = findLastUsers();
                                        if ($findLastUsers):
                                        $rows = $findLastUsers->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row):
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="<?php echo get_gravatar($row['email']) ?>" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    <div class="d-inline-block">
                                                        <h6><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h6>
                                                        <p class="text-muted m-b-0">PHP Instructor</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <h6 class="f-w-700"><?php echo dateToShort($row['create_at']); ?></h6>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>

                                        <?php endif; ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Member’s End-->






                    <!-- Project statustic start -->
                    <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h5 style="margin: 20px 15px 0px">Survey Chart</h5>

                                <div class="box-tools pull-right">

                                    <a data-toggle="collapse" href="#topic-chart"><i class="fa fa-list" style="position: relative; top: -28px;left: -16px;"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div  id="topic-chart" class="collapse in box-body no-padding alert " style="padding: 0;
    margin-bottom: 0;">
                                <div class="row">

                                    <canvas id="myChart"   width="1024"  min-height="325px"></canvas>

                                    <script>
                                        var ctx = document.getElementById("myChart");
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {

                                                labels: ["اسکریپت نویسی PHP", "برنامه نویسی پایتون", "طراحی قالب وردپرس", "پلاگین نویسی وردپرس", "اصول طراحی قالب در فتوشاپ"],
                                                datasets: [{
                                                    label: 'تاکنون 24 رای ثبت شده',
                                                    data: [45, 33, 22, 15, 20, 11],

                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 2
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero:true,
                                                            fontSize: 14,
                                                        }
                                                    }],
                                                    xAxes: [{
                                                        barThickness:40,
                                                        ticks: {
                                                            beginAtZero:true,
                                                            fontSize: 14,
                                                            fontFamily:'IRANSans',
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>





                    <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h5 style="margin: 20px 15px 0px">Publish Post Chart</h5>

                                <div class="box-tools pull-right">
                                    <?php
                                    $postPublishChart = null;
                                    $postPublishChart = postPublishChart();
                                    $data =[];
                                    $rows = $postPublishChart->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $row) {
                                        $data['post_counts'][] = $row['post_count'];
                                        $data['post_dates'][] = $row['post_date'];
                                    }
//                                    var_dump($data['post_dates']);


                                    ?>
                                    <a   data-toggle="collapse" href="#min-topic-bar"><i class="fa fa-list" style="position: relative; top: -28px;left: -16px;"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div  id="min-topic-bar" class="collapse box-body no-padding alert " style="padding: 0;
    margin-bottom: 0;">
                                <div class="row">

                                    <canvas id="buyers" width="960"  min-height="325px"></canvas>

                                    <script>
                                        var ctx = document.getElementById('buyers').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            // The type of chart we want to create
                                            type: 'line',

                                            // The data for our dataset
                                            data: {
                                                labels: <?php echo json_encode($data['post_dates']); ?>,
                                                datasets: [{
                                                    label: "Publish posts",
                                                    backgroundColor: 'rgba(68, 138, 255,.5)',
                                                    borderColor: 'rgb(68, 138, 255)',
                                                    fill:true,
                                                    tension: 0.4,
                                                    data: <?php echo json_encode($data['post_counts']); ?>,
                                                }]
                                            },

                                            // Configuration options go here
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero:true,
                                                        }
                                                    }],
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>

                    <!-- Project statustic end -->
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"></div>
    </div>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>

