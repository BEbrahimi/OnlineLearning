<?php
if (isset($_GET['postId']) && !empty($_GET['postId']) && intval($_GET['postId'])){
    $postId =$_GET['postId'] ;
}else{
    header("location:index.php");
}
countPostViews($postId);
$findPostById = null;
$findPostById = findPostById($postId);
$row = $findPostById->fetch(PDO::FETCH_ASSOC);


$findAuthorById = null;
//                            var_dump($row['post_id']);
$findAuthorById = findAuthorById($postId);
//                            var_dump($findAuthorById);
$rows = $findAuthorById->fetch(PDO::FETCH_ASSOC);
//                            var_dump($row);

?>

<!-- Carousel Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown" style="color: #0fbbcc!important;">
                    <i class="fa fa-book me-3" style="color: #06bbcc;"></i>
                    <?php echo $row['post_title']?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->