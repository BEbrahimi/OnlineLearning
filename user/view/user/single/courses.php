<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-6">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s"
                 style="min-height: 400px; float: right;clear: both;">
                <div class="position-relative h-100">
                    <div class="title-single-left">
                        <div class="teacher">
                            <span><i class="fa fa-user-astronaut"></i><?php echo $rows['first_name'] . ' ' . $rows['last_name'] ?></span>
                            <span><i class="fa fa-calendar"></i> <?php echo dateToShort($row['create_time']); ?> </span>
                            <span><i class="fa fa-eye"></i><?php echo $row['post_views']; ?></span>
                            <span><i class="fa fa-comment"></i>12</span>
                        </div>
                        <div class="course-details">
                            <h5><?php echo $row['post_title']; ?></h5>
                            <p>
                                <?php echo $row['post_content']; ?>
                            </p>
                            <?php if ($row['post_type'] == 0): ?>

                                <?php if ($row['video_url'] != null): ?>
                                    <div class="video-frame">
                                        <video src="<?php echo $row['video_url']; ?>" type="video/mp4"
                                               poster="assets/img/POSTER.jpg" controls>
                                        </video>
                                    </div>


                                <?php endif; ?>
                                <div class="text-center download-btn">
                                    <?php if ($row['video_url'] != null): ?>
                                        <a href="<?php echo $row['video_url']; ?>"> Download Video</a>
                                    <?php endif; ?>

                                </div>
                            <?php else:$row['post_type'] == 1 ?>

                                <?php if (isUserAccessToCourse($_SESSION['userInfo']['id'], $row['course_id'])): ?>
                                    <?php if ($row['video_url'] != null): ?>
                                        <div class="video-frame">
                                            <video src="<?php echo $row['video_url']; ?>" type="video/mp4"
                                                   poster="assets/img/POSTER.jpg" controls>
                                            </video>
                                        </div>


                                    <?php endif; ?>
                                    <div class="text-center download-btn">
                                        <?php if ($row['video_url'] != null): ?>
                                            <a href="<?php echo $row['video_url']; ?>"> Download Video</a>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>

                                    <div class="alert alert-info">

                                        <a href="course.php?courseID=<?php echo $row['course_id']; ?>">
                                            To view this training course, you must first register.
                                        </a>
                                    </div>

                                <?php endif; ?>
                            <?php endif; ?>


                            <div class="single_tags">
                                <ul>
                                    <?php
                                    $tags = null;
                                    $tags = explode(",", $row['tags']);
                                    foreach ($tags as $tag):
                                        ?>
                                        <?php echo '   <li>
                                        <a href="#">' . $tag . '</a>
                                    </li>' ?>

                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="single-courses">
                        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.2s" style="padding: 0;">
                            <div class="container">
                                <div class="voting">
                                    <span style="font-size: 14.5pt;">Related posts</span>
                                </div>

                                <div class="owl-carousel testimonial-carousel position-relative">
                                    <?php
                                    $relatedPostByCat = null;
                                    $relatedPostByCat = relatedPostByCat($row['cat_id']);
                                    //                                    var_dump($relatedPostByCat);
                                    $relatedRows = $relatedPostByCat->fetchAll(PDO::FETCH_ASSOC);
                                    //                                    var_dump($relatedRows);
                                    ?>

                                    <?php foreach ($relatedRows as $relatedRow): ?>
                                        <div class="testimonial-item text-center" style="margin-top: 20px">
                                            <a href="single.php?postId=<?php echo $relatedRow['post_id']; ?>">
                                                <img class="border p-2 mx-auto mb-3"
                                                     src="../panel/uploads/<?php echo $relatedRow['post_img']; ?>"
                                                     style="width: 80px; height: 80px;">

                                            </a>
                                            <div class="testimonial-text bg-light text-center p-4"
                                                 style="text-align: left!important;">
                                                <p class="mb-0">Web Design & Development Course for Beginners.</p>
                                                <p class="mb-0"><?php echo htmlspecialchars_decode(mb_substr($relatedRow['post_content'], 0, 50, 'utf-8')) . '...'; ?></p>

                                                <p class="mb-0">Viwes: <?php echo $relatedRow['post_views']; ?></p>
                                                <p class="mb-0">Date: <?php echo $relatedRow['create_time']; ?></p>
                                            </div>

                                        </div>

                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--poll-->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s" style="position: relative;">
                <div class="voting">
                    <span>Survey</span>
                </div>
                <div class="voting-details">

                    <?php
                    $isUserVoted = null;
                    $userVoted = null;
                    $isUserVoted = isUserVoted($_SERVER['REMOTE_ADDR']);
                    $rows = $isUserVoted->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
//                        if ($row['user_ip'] == $_SERVER['REMOTE_ADDR']){
//                            $isUserVoted = true;
//                            return $isUserVoted;
//                        }else{
//                            $isUserVoted = false;
//                            return $isUserVoted;
//                        }

                        $userVoted = ($row['user_ip'] == $_SERVER['REMOTE_ADDR']) ? true : false;
                    }
                    ?>

                    <?php if ($userVoted): ?>
                        <!--voting Start-->
                        <div class="tasks-progressbar">

                            <?php
                            $voteResultPercentage = null;
                            $voteResultPercentage = voteResultPercentage();
                            $rows = $voteResultPercentage->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row): ?>
                                <p><?php echo $row['item_title'] ?></p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                         role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                         style="width:<?php echo number_format($row['percentage'], 0) ?>%; border-radius: 5px">
                                        <?php echo number_format($row['percentage'], 0) ?>%
                                    </div>
                                </div>
                                <br>
                            <?php endforeach; ?>

                        </div>
                        <!--voting End-->
                    <?php else: ?>

                        <form class="list-group">
                            <?php
                            if (isset($_SESSION['poll_question'])):
                                ?>
                                <p class="course-progress" style="height:auto!important;">
                                    <?php echo $_SESSION['poll_question']; ?></p>
                            <?php endif; ?>
                            <?php
                            $findPollItem = null;
                            $findPollItem = findPollItem();
                            $rows = $findPollItem->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row):
                                $_SESSION['poll_question'] = $row['question'];
                                ?>


                                <label for="" class="label-container">
                                    <input type="radio" class="item_id" name="poll_item"
                                           value="<?php echo $row['item_id']; ?>">
                                    <label style="margin-left: 10px; margin-bottom: 10px"> <?php echo $row['item_title'] ?></label>

                                </label>
                            <?php endforeach; ?>

                            <div class="text-center" style="position: relative">
                                <input type="button"
                                       style="position: absolute;right: 43%; border: none;border-radius: 5px;color: #fff;"
                                       class="btn-primary btn-poll" value="Save">
                                <input type="hidden" class="poll_id" value="<?php echo $row['poll_id'] ?>">

                            </div>
                        </form>
                    <?php endif; ?>

                    <br>
                    <br>


                    <script>

                        $(document).ready(function () {
                            $('.btn-poll').on('click', function (e) {
                                e.preventDefault();
                                var item_id = $('.item_id:checked').val();
                                var poll_id = $('.poll_id').val();
                                //
                                // console.log(item_id);
                                // console.log(poll_id);

                                $.ajax({

                                    url: '<?php echo BASE_URL ?>user/model/poll-model-ajax/insertPollAnswer.php',
                                    type: 'POST',
                                    data: {
                                        'item_id': item_id,
                                        'poll_id': poll_id,
                                    },
                                    dataType: 'JSON',
                                    success: function (data) {
                                        alert(data);

                                    }
                                });


                            });
                        });

                    </script>


                    <!--Tasks section -->


                    <p class="course-progress">Course progress</p>
                    <?php
                    $progressQuery = null;
                    $progressQuery = findCourseProgress();
                    $rows = $progressQuery->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row): ?>
                        <div class="tasks-progressbar">
                            <p><?php echo $row['title']; ?></p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-<?php echo $row['color']; ?>"
                                     role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                     style="width:<?php echo $row['percentage']; ?>%; border-radius: 5px">
                                    <?php echo $row['percentage']; ?>%
                                </div>
                            </div>
                            <br>


                        </div>
                    <?php endforeach; ?>


                    <br>
                    <br>

                    <p class="course-progress"><b>Advertisements</b></p>

                    <?php
                    $findAdByDate = null;
                    $findAdByDate = findAdByDate();
                    if ($findAdByDate):?>
                        <?php
                        $rows = $findAdByDate->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row):
                            ?>


                            <div class="ads-image" style="width: 100%;">
                                <a href="<?php echo $row['ad_href']; ?>" target="_blank"> <img
                                            style="width: 100%;margin-top:10px;margin: 5px"
                                            src="<?php echo BASE_URL; ?>Panel/uploads/<?php echo $row['ad_img']; ?>"
                                            alt="<?php echo $row['ad_img']; ?>"></a>
                            </div>
                        <?php endforeach; ?>


                    <?php else: ?>
                        <div class="ads-image" style="width: 100%;margin: 10px">
                            <a href="#"> <img style="margin-left: -17px;"
                                              src="<?php echo BASE_URL; ?>Panel/uploads/ads1.jpg" alt=""></a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>