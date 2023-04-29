<!--new topic and random topic Start -->
<div class="container-xxl py-5 category main-wrapper wrapper-free-styles">
    <div class="container" style="padding: 35px;">
        <div class="row g-3">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <p class="lesson-title"><i class="fa fa-book"></i>Latest Educational Content</p>
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <div class="post-publish">
                            <ul class="list-group post-publish-list">
                                <?php
                                $findNewPostPublish = null;
                                $findNewPostPublish = findNewPostPublish();
                                if ($findNewPostPublish){
                                $rows = $findNewPostPublish->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row):?>

                                <li>
                                    <span class="list-icon"></span>
                                    <div><a href="./<?php echo $row['post_id'];?>/<?php echo $row['slug'];?>"><?php echo  $row['post_title'];?></a></div>
                                    <div class="post-publish-date">
                            <span>
                              <i class="fa fa-calendar"></i>  <?php echo  $row['create_time'];?>
<!--                            </span>-->
<!--                                        <span style="margin-right:40px;"><i class="fa fa-clock"></i>32-->
<!--                                        </span>-->
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <?php }
                                else{
                                    echo '<div class="alert alert-danger">Empty...</div>';

                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">

<!--                POST RANDOM-->


                <p class="random-title"> <i class="fa fa-retweet"></i>Random Content</p>
                <div class="post-random">
                    <ul class="list-group" id="vertical-ticker">
                        <?php
                        $randomPost =null;
                        $randomPost = randomPost();
                        if ($randomPost){
                        $rows = $randomPost->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row):?>

                        <li>
                            <a href="./<?php echo $row['post_id'];?>/<?php echo $row['slug'];?>" style="font-size: 10.5pt"><span><img class="img-thumbnail" src="../panel/uploads/<?php echo $row['post_img'];?>" width="70" height="70"  alt="img"/></span>
                                <?php echo ' '. $row['post_title'];?>
                            </a>
                        </li>

                        <?php endforeach; ?>
                        <?php }
                        else{
                            echo '<div class="alert alert-danger">Empty...</div>';

                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- new topic and random topic End -->