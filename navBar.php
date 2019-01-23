<?php
print <<<TOP
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-12">
                    <div class="logo">
                        <a href="index.php"><img src="./images/logo.png" alt=""> </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                    <!-- navigations-->
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="index.php">Home</a></li>
                                <li class="has-sub"><a href="about.php">About Us</a>
                                    <ul>
                                        <li><a href="about.php">About Cinder</a></li>
                                        <li><a href="partners.php">Partners</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="investments.php">Portfolio</a>
                                    <ul>
                                        <li><a href="investments.php">Investments</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="opinions.php">Opinions</a></li>
                                <li class="active"><a href="contact-us.php">Contact Us</a></li>
TOP;
                                if($_SESSION["admin"] && $_COOKIE["loggedIn"]) {
                                    print <<<ADMIN
                                    <li class="has-sub"><a href="#">Admin</a>
                                        <ul>
                                            <li><a href="addPost.php">Add a Post</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
ADMIN;
                                } else if ($_COOKIE["loggedIn"]) {
                                    print <<<USER
                                    <li class="has-sub"><a href="#">Profile</a>
                                        <ul>
                                            <li><a href="addPost.php">Add a Post</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
USER;
                                } else {
                                    print <<<LOGGEDOUT
                                    <li><a href="login.php">Login</a></li>
LOGGEDOUT;
                                }
                                print <<<BOTTOM
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- /.navigations-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
BOTTOM;
?>