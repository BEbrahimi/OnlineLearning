<?php
function findExamCat()
{
    global $connect, $tbl_exam_cat;
    $sql = ("SELECT * FROM `$tbl_exam_cat`");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount() >= 1) {
        return $result;
    }
    return false;
}

?>


<div class="col-sm-12 col-md-12 col-lg-12" id="profile-content">
    <h3>User Profile</h3>
    <style>
        .main-content input {
            text-align: center;
            margin-top: 15px;
            margin-left: 15px;
            background: #06bbcc;
            width: 500px;
            height: 35px;
            line-height: 38px;
            font-size: 12pt;
            color: #fff;
            border-radius: 5px;
            border: none;

        }

    </style>
    <div class="col-sm-10 col-md-10 col-lg-10 align-items-center">
        <div class="main-content">
            <h6 id="countdowntimer" style="margin: 15px;">Counter:</h6>
            <?php
            $findExamCat = null;
            $findExamCat = findExamCat();
            if ($findExamCat):
                $rows = $findExamCat->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row):?>
                    <input type="button"  value="<?php echo $row['category']; ?>" onclick="set_exam_type_sesstion(this.value)">

                <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    function set_exam_type_sesstion(exam_category) {
        var xmlhttp =new XMLHttpRequest();
        xmlhttp.onreadystatechange =function () {
            if (xmlhttp.readyState == 4  && xmlhttp.readyState == 200){

                window.location ="exam.php";
            }
        };
        xmlhttp.open("GET", "forajax/load_total_que.php?exam_category="+ exam_category, true);
        xmlhttp.send(null);
    }

</script>

