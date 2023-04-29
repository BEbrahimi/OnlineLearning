<?php
if(isset($_GET['page'])){
    $pageNum = $_GET['page'];
}else{
    $pageNum =null;
}
if (isset($_GET['searchTitle'])){
    $searchTitle = $_GET['searchTitle'];
}else{
    header('location:index.php');
}


?>

<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="content-header">Search result:  <span style="color: #3135af;"><?php echo $_GET['searchTitle'];?></span>...</div>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            $searchPosts =null;
            $searchPosts = searchPosts($searchTitle);
            if ($searchPosts){
                $rows = $searchPosts->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row):?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden" style="height: 270px;">
                                <img class="img-fluid" src="../panel/uploads/<?php echo $row['post_img'];?>" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px; cursor: not-allowed; "><i class="fa fa-eye"></i> <?php echo $row['post_views']; ?></a>
                                    <a href="single.php?postId=<?php echo $row['post_id'];?>" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;"><?php echo mb_substr($row['post_title'],0,30,'utf-8').'...'; ?></a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">Free</h3>


                                <?php
                                $findAuthorById = null;
                                //                            var_dump($row['post_id']);
                                $findAuthorById = findAuthorById($row['post_id']);
                                //                            var_dump($findAuthorById);
                                $rows = $findAuthorById->fetch(PDO::FETCH_ASSOC);
                                //                            var_dump($row);
                                ?>

                                <div class="mb-3">
                                    <p>Teacher:<?php echo ' ' .$rows['first_name'].' '.$rows['last_name'];?></p>
                                </div>
                                <h5 class="mb-4"><?php echo mb_substr($row['post_content'],0,30,'utf-8').'...'; ?></h5>
                            </div>
                            <div class="d-flex border-top">

                                <small class="flex-fill text-center border-end py-2">
                                    <i data-id="<?php echo $row['post_id'];?>" style="cursor: pointer"
                                        <?php if (isUserLogin()){
                                            echo 'data-u_id='.$_SESSION['userInfo']['id'];
                                            if (userLiked($row['post_id'], $_SESSION['userInfo']['id'])):?>
                                                class="fas fa-heart text-primary me-2 likes-btn"
                                            <?php else: ?>
                                                class="far fa-heart text-primary me-2 likes-btn"
                                            <?php endif;} ?>
                                       class="far fa-heart text-primary me-2 likes-btn"
                                    >
                                    </i>

                                    <span class="likes-results"><?php getLikes($row['post_id']); ?></span>
                                </small>

                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar text-primary me-2"></i><?php echo dateToShort($row['create_time']); ?></small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-comment text-primary me-3"></i>30</small>
                            </div>
                        </div>
                    </div>

                <?php endforeach;} ?>
        </div>
        <hr>
<!--        <nav class="text-center">-->
<!--            <ul class="pagination list-inline page">-->
<!---->
<!--                --><?php // pagination() ?>
<!--            </ul>-->
<!--        </nav>-->
    </div>
</div>
<!-- Courses End -->
<script>

    $(document).ready(function () {
        // get like result in ajax
        $('.likes-btn').on('click',function () {
            var post_id = $(this).data('id');
            var user_id = $(this).data('u_id');
            // var user_filter = $(this).data('filter');
            $cliked_btn = $(this);
            if ($cliked_btn.hasClass('far')){
                action = 'like';
                console.log (action);

            }else if ($cliked_btn.hasClass('fas')){
                action = 'unlike';
                console.log (action);
            }
            $.ajax({
                url:'model/posts.php',
                type:'POST',
                data:{
                    'action':action,
                    'post_id':post_id,
                    'user_id':user_id,
                },
                beforeSend: function () {
                    <?php
                    if (!isUserLogin()): ?>
                    swal({
                        title: "Dear user!",
                        text: "Please login to the site first",
                        icon: "warning",
                        button:false,
                        timer:5000,

                    });
                    return false;
                    <?php endif; ?>
                },
                success:function (data) {
                    result = JSON.parse(data);
                    if (action == "like") {
                        $cliked_btn.removeClass('far');
                        $cliked_btn.addClass('fas');
                    }else if (action == "unlike"){
                        $cliked_btn.removeClass('fas');
                        $cliked_btn.addClass('far');
                    }
                    $cliked_btn.siblings('span.likes-results').text(result.likes);
                    $cliked_btn.siblings('span.dislikes-results').text(result.dislikes);
                    $cliked_btn.siblings('i.disLikes-btn').removeClass('fas').addClass('far');
                }

            })
        });


        //get dislike result in ajax
        $('.disLikes-btn').on('click',function () {
            var post_id = $(this).data('id');
            var user_id = $(this).data('u_id');
            // var user_filter = $(this).data('filter');
            $cliked_btn = $(this);
            if ($cliked_btn.hasClass('far')){
                action = 'dislike';
                console.log (action);

            }else if ($cliked_btn.hasClass('fas')){
                action = 'undislike';
                console.log (action);
            }
            $.ajax({
                url:'model/posts.php',
                type:'POST',
                data:{
                    'action':action,
                    'post_id':post_id,
                    'user_id':user_id,
                },
                beforeSend: function () {
                    <?php
                    if (!isUserLogin()): ?>
                    swal({
                        title: "Dear user!",
                        text: "Please login to the site first",
                        icon: "warning",
                        button:false,
                        timer:5000,

                    });
                    return false;
                    <?php endif; ?>
                },
                success:function (data) {
                    result = JSON.parse(data);
                    if (action == "dislike") {
                        $cliked_btn.removeClass('far');
                        $cliked_btn.addClass('fas');
                    }else if (action == "undislike"){
                        $cliked_btn.removeClass('fas');
                        $cliked_btn.addClass('far');
                    }
                    $cliked_btn.siblings('span.likes-results').text(result.likes);
                    $cliked_btn.siblings('span.dislikes-results').text(result.dislikes);
                    $cliked_btn.siblings('.likes-btn').removeClass('fas').addClass('far');
                }

            })
        });
    });

</script>