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
                        <h1 class="page-title">Contact Us</h1>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Contact Us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- contact us -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-4 col-sm-4 col-xs-12 mb60">
                    <h2>Drop Us a Message So That We Can Hear From You</h2>
                    <p>Contact us about anything related to our company or services. We’ll do our best to get back to you as soon as possible.</p>
                </div>
                <div class="col-lg-8 col-lg-8 col-sm-8 col-xs-12">
                    <div class="box bg-light">
                        <h5 class="export-form-title">Fill The Below Form</h5>
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopr">
                                    <div class="form-group">
                                        <label class="control-label sr-only "></label>
                                        <input name="name" type="text" placeholder="NAME" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopl">
                                    <div class="form-group">
                                        <label class="control-label sr-only"></label>
                                        <input name="email" type="text" placeholder="EMAIL" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only "></label>
                                        <input name="subject" type="text" placeholder="SUBJECT" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only"></label>
                                        <textarea class="form-control" id="textarea" name="message" rows="4" placeholder="MESSAGE" required></textarea>
                                    </div>
                                    <button type="submit" name="emailSubmit" class="btn btn-default btn-block ">Submit</button>
                                </div>
                                <!-- /.form-section -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        require 'vendor/autoload.php';
        if(isset($_POST['emailSubmit'])) {
 
            $email_from = "cindercapital@gmail.com";
         
            function died($error) {
                include 'footer.php';
                echo "<script>";
                echo "alert('".$error."')";
                echo "</script>";
                die();
            }
            // validation expected data exists
            if(!isset($_POST['name']) ||
                !isset($_POST['email']) ||
                !isset($_POST['subject']) ||
                !isset($_POST['message'])) {
                died('We are sorry, but there appears to be a problem with the form you submitted.');       
            } 

            $name = $_POST['name']; // required
            $email = $_POST['email']; // required
            $subject = $_POST['subject']; // required
            $message = $_POST['message']; // required

            $error_message = "";
            $email_exp = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

            if(!preg_match($email_exp,$email)) {
                $error_message .= 'The email address you entered does not appear to be valid.\n';
            }

            $string_exp = "/^[A-Za-z .'-]+$/";

            if(strlen($message) < 2) {
                $error_message .= 'The message you entered do not appear to be valid.\n';
            }

            if(strlen($error_message) > 0) {
                $error_message .= 'Please correct the problem(s) above.\n';
                died($error_message);
            }

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($email_from, "Cinder Capital, LLC.");
            $email->setSubject($subject);
            $email->addTo($email, $name);
            $email->addContent("text/plain", $message);
            $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);
                echo "<script>";
                echo "alert('Thank you contacting us!');";
                echo "</script>";
            } catch (Exception $e) {
                echo "<script>";
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                echo "</script>";
            }
        }
    ?>

    <!-- footer -->
    <?php include 'footer.php';?>
    <!-- /.footer -->
</body>
</html>