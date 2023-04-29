
<style>

*{
    list-style:none;
}

    .social{
        z-index: 99;
        position: fixed;
        width: 100px;
        margin-top: 150px;

    }
    .social li{
        height: 60px;
        position: relative;
    }
    .social li a{
        color: #fff;
        display: block;
        width: 100%;
        height: 100%;
        line-height: 60px;
        padding-left: 25%;
        border-bottom: 1px solid rgba(0,0,0,.4);
        transition: all .3s linear;
    }

    .social li:nth-child(1) a{
        background: #06bbcc;
    }
    .social li:nth-child(2) a{
        background: #06bbcc;
    }
    .social li:nth-child(3) a{
        background: #06bbcc;
    }
    .social li:nth-child(4) a{
        background: #06bbcc;
    }
    .social li:nth-child(5) a{
        background: #06bbcc;
    }
    .social li a i{

        position: absolute;
        top: 17px;
        left: 20px;
        font-size: 27px;
    }
    .social li a span{
        margin-left: 18px;
        display: none;
    }
    .social a:hover{
        z-index: 1;
        width: 215px;
        border-bottom: 1px solid rgba(0,0,0,.5);
        box-shadow: 0 0 1px 1px rgba(0,0,0,.3);
        border-radius: 0 50px 50px 0;
    }
    .social ul li a:hover span{
        display: inline;

    }
</style>
<nav class="social">
    <ul>
        <li>
            <a href="../panel/index.php" target="_blank"><i class="fa fa-home"><span>Dashboard</span></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-user"><span>Profile</span></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-pen"><span>Edit</span></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-book"><span>Courses</span></i></a>
        </li>
        <li>
            <a href="logOut.php"><i class="fa fa-power-off"><span>LogOut</span></i></a>
        </li>

    </ul>
</nav>
