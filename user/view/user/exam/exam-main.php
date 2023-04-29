<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 text-center">

        <!--        start editing-->

        <br>

        <div class="row">
            <br>
            <h6 id="countdowntimer"></h6>
            <div class="col-lg-2" >
                <div id="current_que" style="float: left;">0</div>
                <div style="float: left;">0</div>
                <div id="total_que" style="float: left;">0</div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-lg-10" style="min-height: 300px;background: white;" id="load_questions">
                        12
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-6" style="min-height: 50px;">
                    <div class="col-lg-12 text-center">
                        <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">
                        <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<script type="text/javascript">
    function load_total_que() {
        var xmlhttp =new XMLHttpRequest();
        xmlhttp.onreadystatechange =function () {
            if (xmlhttp.readyState == 4  && xmlhttp.readyState == 200){
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }


</script>
<script>

    setInterval(function () {
        timer();
    },1000);
    function timer(exam_category) {
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("countdowntimer").innerHTML =  minutes + " : " + seconds ;

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdowntimer").innerHTML = "EXPIRED";
            }
        }, 1000);


        var xmlhttp =new XMLHttpRequest();
        xmlhttp.onreadystatechange =function () {
            if (xmlhttp.readyState == 4  && xmlhttp.readyState == 200){
                if (xmlhttp.responseText =="00:00:01")
                {
                    window.location ="result.php";
                }
                document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET", "forajax/load_timer.php",true);
        xmlhttp.send(null);
    }

</script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>