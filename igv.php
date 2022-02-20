<!DOCTYPE html>
<html lang="en">
<head>
    <title>INFINITY Hub - AIESEC Sri Lanka</title>
    <meta charset="UTF-8">
    <meta name="description" content="The knowledge Cornerstone of AIESEC Sri Lanka">
    <meta name="keywords" content="event, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/ico.png" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/themify-icons.css"/>
    <link rel="stylesheet" href="css/magnific-popup.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body>
<?php
require 'common.php';
renderNavbar("", "", "", "active", "")
?>
<div class="site-breadcrumb">
    <div class="container">
        <a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <a href="Functional-knowledge.php"><i></i> Functional Knowledge</a> <i class="fa fa-angle-right"></i>
        <span>Incoming Global Volunteer</span>
    </div>
</div>
<h2 class="hs-title" align="center">Incoming Global Volunteer</h2>
<br>
<section class="enroll-section spad set-bg" data-setbg="img/blog/5bg.png">
    <div class="container">
        <div class="row">
            <style>
                a {
                    margin: 0px;
                    -webkit-transition: color 1s;
                    transition: color 1s;
                }

                a:hover {
                    color: #f6783a;
                }
            </style>
            <?php
            include __DIR__ . '/getFunctions.php';

            echo getTopics(406525878081);
            ?>

        </div>
    </div>
</section>
<br> <br>
<?php
renderFooter();
?>

<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>