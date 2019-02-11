<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'?>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder.js"></script>
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
                        <h1 class="page-title">Add a Post</h1>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Add a Post</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- add post -->
    <div class="content">
        <div class="container">
            <div class="col-lg-12">
                <div class="box bg-light">
                    <h5 class="export-form-title">Add Opinion Post</h5>
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only"></label>
                                    <input id="title" name="title" type="text" placeholder="Title" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select id="select" name="picture_source" class="form-control" required>
                                        <option value="" disabled selected>Select sector</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Financials">Financials</option>
                                        <option value="Services">Services</option>
                                        <option value="Consumer Goods">Consumer Goods</option>
                                        <option value="Materials">Materials</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Industrials">Industrials</option>
                                        <option value="Utilities">Utilities</option>
                                        <option value="Macroeconomics">Macroeconomics</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="content" id="editor" class="form-control"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopl">
                                    <div class="form-group">
                                        <button type="submit" name="save" class="btn btn-default btn-block ">Save</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopr">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block ">Post</button>
                                    </div>
                                </div>
                                    <script type="text/javascript">
                                     ClassicEditor
                                        .create( document.querySelector( '#editor' ), {
                                            ckfinder: {
                                                 uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                                            },
                                        } )
                                        .catch( function( error ) {
                                             console.error( error );
                                         } );
                                    </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.add post -->
    <?php
        include 'connectDB.php';
        if(isset($_POST["save"])) {
            extract($_POST);
            $table = "opinions";
            $username = $_SESSION["username"];
            $title = $_POST["title"];
            $sector = $_POST["picture_source"];
            $editor_content = $_POST["content"];
            $date = date("Y-m-d h:i:s"); // date time post request was made 
            $month = date("F"); // month time post request was made 
            $unique_id = md5($title.$sector.$date);
            $posted = 0; // false not posted yet

            $stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param ($stmt, 'sssssssi', $unique_id, $username, $title, $sector, $content, $date, $month, $posted);
            mysqli_stmt_execute($stmt);
            if(mysqli_affected_rows($connect) == 0 || mysqli_affected_rows($connect) == -1) {
                echo '<script>';
                echo 'alert("There is a problem. Try again later.")';
                echo '</script>';
            }
            else {
                echo '<script>';
                echo 'alert("Saved post!")';
                echo '</script>';
            }
            mysqli_stmt_close($stmt);
            // Close connection to the database
            mysqli_close($connect);
        } else if (isset($_POST["submit"])) {
            extract($_POST);
            $table = "opinions";
            $username = $_SESSION["username"];
            $title = $_POST["title"];
            $sector = $_POST["picture_source"];
            $editor_content = $_POST["content"];
            $date = date("Y-m-d h:i:s"); // date time post request was made 
            $month = date("F"); // month time post request was made 
            $unique_id = md5($title.$sector.$date);
            $posted = 1; // true posted now

            $stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param ($stmt, 'sssssssi', $unique_id, $username, $title, $sector, $content, $date, $month, $posted);
            mysqli_stmt_execute($stmt);
            if(mysqli_affected_rows($connect) == 0 || mysqli_affected_rows($connect) == -1) {
                echo '<script>';
                echo 'alert("There is a problem. Try again later.")';
                echo '</script>';
            }
            else {
                echo '<script>';
                echo 'alert("Posted to opinions!")';
                echo '</script>';
            }
            mysqli_stmt_close($stmt);
            // Close connection to the database
            mysqli_close($connect);
        }
    ?>
    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>
</html>