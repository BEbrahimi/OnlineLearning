<!--<script>-->
<!--    window.oncontextmenu = function () {-->
<!--        return false;-->
<!--    }-->
<!--</script>-->
<?php
include "helper/sessionHelper.php";
include "helper/dateHelper.php";
include "helper/gravararGetImage.php";
include "config/config.php";
include "config/defines.php";
include "model/dataBase.php";
include "function.php";
include "model/User.php";
include "model/posts.php";
include "model/Cats.php";
include "model/Logs.php";
include "model/blackList.php";
include "model/statistics.php";
include "model/progressCourse.php";
include "model/poll.php";
include "model/ads.php";
include "model/tickets.php";
include "model/information.php";
include "model/slider.php";
include "model/menu.php";
include "model/search.php";
include "model/public.php";
include "model/Charts.php";
include "model/Course.php";
include "model/exam.php";

include "../panel/actions/postAction/createPost.php";
include "../panel/actions/userActions/userCreate.php";
include "../panel/actions/userActions/userResetPassword.php";
include "../panel/actions/userActions/userActivation.php";
include "../panel/actions/postAction/progressActions/createCourseProgress.php";
include "../panel/actions/pollActions/createPoll.php";
include "../panel/actions/adsAction/createAd.php";
include "../panel/actions/menuActions/menuActions.php";
include "../panel/actions/menuActions/createSubMenu.php";
include "../panel/actions/courseAction/createCourse.php";
include "../panel/actions/courseAction/addUserAction.php";
include "../panel/actions/examActions/examAction.php";

switch (basename($_SERVER['PHP_SELF'])){
    case "update_user.php":
        include "../panel/actions/userActions/updateUser.php";
        break;
    case "new-password.php":
        include "../panel/actions/userActions/userNewPassword.php";
        break;
    case "profile-page.php":
        include "../panel/actions/userActions/userProfileUpdate.php";
        break;
        case "update_exam.php":
            include "../panel/actions/examActions/updateExam.php";
        break;
}
