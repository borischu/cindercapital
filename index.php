<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php'?>

    <meta property="og:url" content="http://cindercapital.com"/>
    <meta property="og:title" content="Cinder Capital"/>
    <meta property="og:image" content="http://cindercapital.com/images/CINDEREMBLEM.png"/>
    <meta property="og:description" content="Cinder Capital is a hedge fund created by two students at the University of Texas at Austin.
    We invest through fundamentals, technical analysis, and quantitative methods to deliver consistent returns for our investors."/>
    <meta name="og:keywords" content="Cinder Capital, investment fund, UT Austin, Boris Chu, Nima Faegh"/>

</head>

<body>
    <!-- header-section-->
    <?php include 'navBar.php';?>
    <!-- /. header-section-->
    <!-- slider -->
    <div class="slider">
        <div class="owl-carousel owl-one owl-theme">
            <div class="item">
                <div class="slider-img"> <img src="./images/austin.png" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                            <div class="slider-captions">
                                <h1 class="slider-title">Cinder Capital</h1>
                                <ul class="hidden-sm hidden-xs">
                                    <li>Driven by innovation and transparency.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.slider -->
    <!-- service -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-icon">
                            <img src="./images/investment.svg" alt="">
                        </div>
                        <div class="service-content">
                             <h4><a class="title">
                               Short-Long Equity Portfolio </a></h4>
                            <p>We maintain a short/long-biased portfolio exposed to US asset classes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-icon">
                            <img src="./images/piggybank.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h4> <a class="title">
                               Cinder Fund </a></h4>
                            <p>The Cinder fund is actively managed with an emphasis on fundamentals-based investing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-icon">
                            <img src="./images/umbrella.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h4><a class="title">
                                Risk Aware </a></h4>
                            <p>We remain aware of market risks by keeping our investments diversified.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-icon">
                            <img src="./images/dollar.svg" alt="">
                        </div>
                        <div class="service-content">
                             <h4><a class="title">
                               Consistent Returns </a></h4>
                            <p>Cinder Capital is committed to delivering consistent returns to investors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.service -->
    <!--about -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="about-section">
                        <h2>Investing through innovation and transparency</h2>
                        <p class="lead">We are driven to deliver consistent returns to our investors while
                            still maintaining a unique market perspective and a high level of transparency.</p>
                        <!--<div class="row">-->
                            <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb30">-->
                                <!--<h4>Our Mission</h4>-->
                                <!--<p></p>-->
                            <!--</div>-->
                            <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb30">-->
                                <!--<h4>Our Vision</h4>-->
                                <!--<p></p>-->
                            <!--</div>-->
                        <!--</div>-->
                        <a href="about.php" class="btn btn-default mb30">More About Cinder</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="./images/about_img_1.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <!--/.about -->
    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>

</html>