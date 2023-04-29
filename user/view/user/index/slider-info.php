<!-- Info section Start -->
<div class="search-box align-items-center">
    <div class="search">
        <form action="search.php" method="get">
            <input type="text" placeholder="Do you want to Search? click here" name="searchTitle">
            <button>
                <i class="fa fa-search"
                   style="font-size: 18px;">
                </i>
            </button>
        </form>
    </div>
</div>
<br>
<div class="container-xxl py-5">




    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7 wow fadeInUp " data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <div class="slideshow-container1 carousel-inner">

                        <?php echo sliderImageIndicators(); ?>
                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>

                    </div>
                    <br>

                </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s" style="position: relative;">
                <h6 class="section-title bg-white text-start text-primary pe-3">NEW NEWS</h6>
                <h3 class="mb-4">Welcome to ONLINELEARNING</h3>
                <div class="row gy-2 gx-4 mb-4">
                    <?php
                    $findInfo = null;
                    $findInfo = findInfo();
                    if ($findInfo):
                        $rows = $findInfo->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row):
                            ?>
                            <div class="col-sm-12 news_details">
                                <p class="mb-0"><i
                                            class="fa fa-arrow-right text-primary me-2"></i><?php echo mb_substr($row['info_body'], 0, 55, 'utf-8') . '...'; ?>
                                </p>
                                <i class="fa fa-calendar-alt"
                                   style="color: #0cbde187; margin-right: 100px; position: absolute;right: 60px;margin-top: 12px">_<?php echo dateToShort($row['create_at']); ?></i>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info">Empty</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info section End -->
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active1", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active1";
    }
</script>