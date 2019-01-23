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
    <!-- blog default -->
    <?php
        include 'connectDB.php';
        $_SESSION["id"] = $_GET["id"];
        $uniqueID = $_SESSION["id"];
    ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                            <?php
                                $qry = "SELECT firstName, lastName, title, sector, content, date, month, DAY(date), YEAR(date) FROM opinions LEFT JOIN users ON opinions.userName = users.userName WHERE uniqueID = '".$uniqueID."'";
                                $result = mysqli_query($connect, $qry);
                                while ($row = $result -> fetch_row()) {
                                    print <<<TOP
                                    <div class="post-holder">
                                        <div class="post-content">
                                            <div class="meta">
TOP;
                                    print "<span class=\"meta-admin\">By <a href=\"#\" class=\"meta-link\">".$row[0]." ".$row[1]."</a></span><span>/ </span>&nbsp";
                                    print "<span class=\"meta-date\">".$row[7]." ".$row[6].", ".$row[8]."</span></div>";
                                    print "<h2 class=\"mb20\"><a href=\"#\" class=\"title\">".$row[2]."</a></h2>";
                                    print "<p>".$row[4]."</p>";
                                    print <<<BOTTOM
                                        </div>
                                    </div>
BOTTOM;
                                }
                            ?>
                            <div class="post-navigation">
                                <!-- post navigation -->
                                <div class="row">
                                    <div class="nav-links">
                                        <?php
                                            $qry = "SET @row_num:=0; SELECT uniqueID, title, date, @row_num:=(@row_num+1) AS row_num FROM opinions WHERE posted = 1 ORDER BY date DESC";
                                            $uniqueDict = array();
                                            $titleDict = array();
                                            /* execute multi query */
                                            if (mysqli_multi_query($connect, $qry)) {
                                                do {
                                                    /* store first result set */
                                                    if ($result = mysqli_store_result($connect)) {
                                                        while ($row = mysqli_fetch_row($result)) {
                                                            $uniqueDict[$row[3]] = $row[0];
                                                            $titleDict[$row[3]] = $row[1];
                                                        }
                                                        mysqli_free_result($result);
                                                    }
                                                } while (mysqli_next_result($connect));
                                            }
                                            foreach ($uniqueDict as $row_num => $uniqueIDs) {
                                                if ($uniqueIDs == $uniqueID) {
                                                    if (is_null($uniqueDict[$row_num-1]) == false) {
                                                        print <<<TOP
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopr">
                                                        <div class="nav-previous">
TOP;
                                                        print "<div class=\"prev-link\"> <a href=\"opinion.php?id=".$uniqueDict[$row_num-1]."\"><i class=\"fa fa-angle-left\"></i>previous</a></div>";
                                                        print "<h4 class=\"previous-next-title\"><a href=\"opinion.php?id=".$uniqueDict[$row_num-1]."\" class=\"title\">".$titleDict[$row_num-1]."</a></h4>";
                                                        print <<<BOTTOM
                                                            </div>
                                                        </div>
BOTTOM;
                                                    } else {
                                                        print <<<TOP
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopr">
                                                        <div class="nav-previous">
TOP;
                                                        print "<div class=\"prev-link\"><a href=\"#\"></a></div>";
                                                        print "<h4 class=\"previous-next-title\"><a href=\"#\" class=\"title\"></a></h4>";
                                                        print <<<BOTTOM
                                                            </div>
                                                        </div>
BOTTOM;
                                                    }
                                                    if (is_null($uniqueDict[$row_num+1]) == false) {
                                                        print <<<TOP
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopl">
                                                        <div class="nav-next text-right">
TOP;
                                                        print "<div class=\"next-link\"><a href=\"opinion.php?id=".$uniqueDict[$row_num+1]."\">next<i class=\"fa fa-angle-right\"></i></a></div>";
                                                        print "<h4 class=\"previous-next-title\"><a href=\"opinion.php?id=".$uniqueDict[$row_num+1]."\" class=\"title\">".$titleDict[$row_num+1]."</a></h4>";
                                                        print <<<BOTTOM
                                                            </div>
                                                        </div>
BOTTOM;
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. post navigation -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <!-- widget-search -->
                    <div class=" widget widget-search">
                        <form>
                            <div class="search-form">
                                <input type="text" class="form-control" placeholder="SEARCH HERE">
                                <button type="Submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.widget-search -->
                    <!-- widget-categories -->
                    <div class=" widget widget-categories">
                        <h2 class="widget-title">Sectors</h2>
                        <ul class="arrow arrow-right">
                            <?php
                                $qry = "SELECT sector, COUNT(sector) from opinions GROUP BY sector ORDER BY sector ASC";
                                $result = mysqli_query($connect, $qry);
                                while ($row = $result -> fetch_row()) {
                                    print "<li><a href=\"sector.php?sector=".$row[0]."\">".$row[0]." (".$row[1].") </a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- /.widget-categories -->
                    <!-- widget-archives -->
                    <div class=" widget widget-archives">
                        <h2 class="widget-title">Month</h2>
                        <ul class="arrow arrow-right">
                            <?php
                                $qry = "SELECT month, YEAR(date) from opinions GROUP BY month, YEAR(date) ORDER BY month, YEAR(date) ASC";
                                $result = mysqli_query($connect, $qry);
                                while ($row = $result -> fetch_row()) {
                                    print "<li><a href=\"month.php?month=".$row[0]."&year=".$row[1]."\">".$row[0]." (".$row[1].") </a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- /.widget-archives -->
                    <!-- widget-recent-post-->
                    <div class=" widget widget-recent-post">
                        <h2 class="widget-title">Recent Posts</h2>
                        <ul>
                            <?php
                                $qry = "SELECT title, YEAR(date), month, DAY(date), uniqueID from opinions ORDER BY date DESC LIMIT 3";
                                $result = mysqli_query($connect, $qry);
                                while ($row = $result -> fetch_row()) {
                                    print <<<TOP
                                    <li>
                                        <div class="recent-post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="recent-post">
                                                        <div class="meta">
TOP;
                                    print "<span class=\"meta-date\">".$row[3]." ".$row[2].", ".$row[1]."</span></div>";
                                    print "<h5 class=\"recent-title\"><a href=\"opinion.php?id=".$row[4]."\" class=\"title\">".$row[0]."</a></h5>";
                                    print <<<BOTTOM
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
BOTTOM;
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- /.widget-recent-post-->
                </div>
            </div>
        </div>
    </div>
    <!-- blog default -->
    <!-- footer -->
    <?php include 'footer.php'; mysqli_close($connect);?>
    <!-- /.footer -->
</body>

</html>