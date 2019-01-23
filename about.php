<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php'?>
</head>

<body>
    <!-- header-section-->
    <?php include 'navBar.php';?>
    <!-- /. header-section-->
    <!-- page-header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title">About Cinder</h1>
                        <p class="mb40">An Austin-based hedge fund</P>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>About Cinder</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- about -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="about-section">
                        <h2>About Cinder Capital</h2>
                        <p class="lead">Cinder Capital is a hedge fund created by two students at the
                        University of Texas at Austin. We invest through fundamentals, technical analysis, and
                        quantitative methods to deliver consistent returns for our investors</p>
                        <a href="partners.php" class="btn-link mb30">Meet investment partners</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="./images/about_img_1.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>

</html>