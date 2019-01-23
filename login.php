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
                        <h1 class="page-title">Login</h1>
                        <p class="mb40">Login to Investor Account</P>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Login</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
  <!-- Login -->
    <div class="content">
        <div class="container">
                <form id="loginForm" method="post" action="setLogin.php">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="username" class="control-label sr-only">Username</label>
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control focus" placeholder="Password" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="container">
                        <input type="submit" class="btn btn-primary mb20" value="Login">
                        <input type="reset" class="btn btn-default mb20" value="Clear">
                    </div>
                </form>
        </div>
    </div>
    <!-- /.partner-->
    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>

</html>