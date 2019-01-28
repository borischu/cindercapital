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
                        <h1 class="page-title">Opinions</h1>
                        <p class="mb40">Active Forum maintained by Cinder Capital</p>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li>Opinions</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- blog default -->
    <?php
        include 'connectDB.php';
        $_SESSION["page"] = $_GET["page"];
        if ($_SESSION["page"]) {
            $page = $_SESSION["page"];
        } else {
            $page = 1;
        }
    ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <?php
                            $qry = "SELECT uniqueID, firstName, lastName, title, sector, content, date, month, DAY(date), YEAR(date) FROM opinions LEFT JOIN users ON opinions.userName = users.userName WHERE posted = 1 ORDER BY date DESC LIMIT 3 OFFSET ".($page*3-3);
                            $result = mysqli_query($connect, $qry);
                            while ($row = $result -> fetch_row()) {
                                print <<<TOP
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="post-block">
                                        <div class="post-content">
                                            <div class="meta">
TOP;
                                print "<span class=\"meta-admin\">By <a href=\"#\" class=\"meta-link\">".$row[1]." ".$row[2]."</a></span><span>/ </span>&nbsp";
                                print "<span class=\"meta-date\">".$row[8]." ".$row[7].", ".$row[9]."</span>";
                                print "<span class=\"meta-comments\"><a href=\"sector.php?sector=".$row[4]."\" class=\"meta-link\">".$row[4]."</a></span></div>";
                                print "<h2 class=\"mb20\"><a href=\"opinion.php?id=".$row[0]."\" class=\"title\">".$row[3]."</a></h2>";
                                print "<p>".(substr($row[5], 0, 200))."</p>";
                                print "     <div class=\"post-btn\">
                                                <a href=\"opinion.php?id=".$row[0]."\" class=\"btn btn-default\">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                        ?>
                        <!-- pagination start -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="st-pagination">
                                <ul class="pagination">
                                    <?php
                                        $qry = "SELECT uniqueID FROM opinions WHERE posted = 1 ORDER BY date DESC LIMIT 9 OFFSET ".($page*3-3);
                                        $result = mysqli_query($connect, $qry);
                                        $rows = 0;
                                        while ($row = $result -> fetch_row()) {
                                            $rows += 1;
                                        }
                                        if ($page == 1) { // first page
                                            $count = 1;
                                            for ($x=1; $x<=$rows; $x+=3) {
                                                if ($x % 3 == 1) {
                                                    if ($count <= 3) {
                                                        if ($count == $page) {
                                                            print "<li class=\"active\"><a href=\"?page=".$count."\">1</a></li>";
                                                        } else {
                                                            print "<li><a href=\"?page=".$count."\">".$count."</a></li>";   
                                                        }
                                                        $count += 1;
                                                    } else {
                                                        break;
                                                    }
                                                }
                                            }
                                            if ($count > $page) {
                                                print "<li><a href=\"?page=".($page+1)."\" aria-label=\"Next\"><span aria-hidden=\"true\">Next</span></a></li>";   
                                            }
                                        } else if ($pages * 3 <= $rows && $pages * 3 >= $rows - 3) { // last page
                                            print "<li><a href=\"?page=".($page-1)."\" aria-label=\"Previous\"><span aria-hidden=\"true\">Previous</span></a></li>";
                                            $count = $page;
                                            for ($x=1; $x<=$rows; $x+=3) {
                                                if ($x % 3 == 1) {
                                                    if ($count <= $page+1) {
                                                        if ($count == $page) {
                                                            print "<li><a href=\"?page=".($count-2)."\">".($count-2)."</a></li>";
                                                            print "<li><a href=\"?page=".($count-1)."\">".($count-1)."</a></li>";
                                                            print "<li class=\"active\"><a href=\"#\">".$count."</a></li>";
                                                        } else {
                                                            print "<li><a href=\"?page=".$count."\">".$count."</a></li>";
                                                        }
                                                        $count += 1;
                                                    } else {
                                                        break;
                                                    }
                                                }
                                            }
                                        } else { // middle pages
                                            print "<li><a href=\"?page=".($page-1)."\" aria-label=\"Previous\"><span aria-hidden=\"true\">Previous</span></a></li>";
                                            $count = $page;
                                            for ($x=1; $x<=$rows; $x+=3) {
                                                if ($x % 3 == 1) {
                                                    if ($count <= $page+1) {
                                                        if ($count == $page) {
                                                            print "<li><a href=\"?page=".($count-1)."\">".($count-1)."</a></li>";
                                                            print "<li class=\"active\"><a href=\"?page=".$count."\">".$count."</a></li>";
                                                        } else {
                                                            print "<li><a href=\"?page=".$count."\">".$count."</a></li>";
                                                        }
                                                        $count += 1;
                                                    } else {
                                                        break;
                                                    }
                                                }
                                            }
                                            if ($count > $page) {
                                                print "<li><a href=\"?page=".($page+1)."\" aria-label=\"Next\"><span aria-hidden=\"true\">Next</span></a></li>";   
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- pagination close -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <!-- widget-search -->
                    <div class=" widget widget-search">
                        <form>
                            <div class="search-form autocomplete">
                                <input type="text" class="form-control" placeholder="SEARCH HERE" list="opinionsList" onchange="window.location.href='opinion.php?id=' + this.id;">
                                <datalist id="opinionsList">
                                    <?php
                                        $qry = "SELECT title, uniqueID FROM opinions ORDER BY date DESC";
                                        $result = mysqli_query($connect, $qry);

                                        while ($row = $result->fetch_row()) {
                                            $opinionsList = $opinionsList."<option id=\"".$row[1]."\" value=\"".$row[0]."\"></option>";
                                        }
                                        print($opinionsList)
                                    ?>
                                </datalist>
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