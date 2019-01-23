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
    <!-- 404 error -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopr">
                    <div class="error-img"><img src="./images/404.jpg" alt="" class="img-responsive"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopl">
                    <div class="error-section">
                        <h2 class="text-primary">Oooooppppssss!!!</h2>
                        <h3 class="error-title">404</h3>
                        <span class="error-small-title">Error</span>
                        <p>The page you are looking for does not exist. Please go to back home.</p>
                        <a href="index.php" class="btn btn-primary btn-lg">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.404 error -->
    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>

</html>