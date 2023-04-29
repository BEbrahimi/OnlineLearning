<?php
if (isset($_GET['courseID']) && !empty($_GET['courseID'])){
    $courseId = intval($_GET['courseID']);

}else{
    header('location:index.php');
}

?>

<?php
$findCourseById = null;
$findCourseById = findCourseById($courseId);
if ($findCourseById) {
    $row = $findCourseById->fetch(PDO::FETCH_ASSOC);
}else{
    header('location:index.php');
}
?>



<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown" style="color: #0fbbcc!important;">
                    <i class="fa fa-book me-3" style="color: #06bbcc"></i>
                    <?php
                    echo $row['course_title'];
                    ?>
                </h1>
            </div>
        </div>
    </div>
</div>