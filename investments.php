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
                        <h1 class="page-title">Investments</h1>
                        <p class="mb40">Current and Past Investments</P>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Investments</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
  <!-- investments -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="partner-logo">
                        <div class="logo">
                            <a href="https://micron.com" target="_blank">
                                <img src="./images/micron.png" alt="">
                            </a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="partner-logo">
                        <div class="logo">
                            <a href="https://www.celgene.com" target="_blank">
                                <img src="./images/celgene.png" alt="">
                            </a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="partner-logo">
                        <div class="logo">
                            <a href="https://microsoft.com" target="_blank">
                                <img src="./images/microsoft.png" alt="">
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="partner-logo">
                        <div class="logo">
                            <a href="http://www.berkshirehathaway.com/" target="_blank">
                                <img src="./images/berkshire-hathaway.png" alt="">
                            </a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="partner-logo">
                        <div class="logo">
                            <a href="https://www.goldmansachs.com" target="_blank">
                                <img src="./images/goldman.png" alt="">
                            </a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="partner-logo">
                        <div class="logo">
                            <a href="https://www.appliedmaterials.com" target="_blank">
                                <img src="./images/amat.png" alt="">
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.investments-->
    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>

</html>