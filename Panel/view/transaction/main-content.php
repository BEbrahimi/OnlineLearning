
<!-- Main-body start -->
<div class="pcoded-inner-content">

    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div id="content">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 style="margin: 20px">List of Transactions</h3>
                        </div>
                    </div>
                    <hr style="background: #ec0003; height: 2px;" />

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel box box-info">
                                <div class="panel-body" style="padding: 20px;">
                                    <a href="#" class="label label-danger" style="margin: 15px">Delete All</a>
                                    <div class="table-responsive" style="margin-top: 15px">

                                        <table class="table table-hover table-bordered text-center">
                                            <thead>
                                            <tr style="background: #448aff; color: #fff; font-weight: bold">
                                                <th><input type="checkbox" class="select-all"></th>
                                                <th>Order Number</th>
                                                <th>Transaction Number</th>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th style="width: 152px;">Operation</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $userTransactionFindAll = null;
                                            $userTransactionFindAll = userTransactionFindAll();
                                            if ($userTransactionFindAll):
                                            $rows = $userTransactionFindAll->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($rows as $row):
                                            ?>
                                                <tr>
                                                    <th><input type="checkbox" class="checkbox" name="checkbox"value=""></th>
                                                    <td><?php echo $row['order_number'];?></td>
                                                    <td><?php
                                                        if ($row['ref_number'] == ''){
                                                            echo 'Unknown';
                                                        }else{
                                                            echo $row['ref_number'];
                                                        }
                                                        ?></td>
                                                    <td><?php echo $row['transaction_create_at'];?></td>
                                                    <td><?php echo $row['course_price'];?> $</td>
                                                    <td><?php
                                                        switch ($row['transaction_status']){
                                                            case 1:
                                                                echo '<span style="color: #fff;padding: 3px 8px;background: #ff0000;border-radius: 3px;">Unpaid</span>';
                                                                break;
                                                            case 2:
                                                                echo '<span style="color: #fff;padding: 3px 8px;background: #008000;border-radius: 3px;">Paid</span>';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <th>
                                                        <a href="#" class="label label-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" class="label label-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </th>
                                                </tr>


                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="alert alert-info">Right now you don't have any transaction!</div>
                                            <?php endif; ?>

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

            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>
<!-- Main-body End -->
</div>
</div>
</div>
</div>
</div>