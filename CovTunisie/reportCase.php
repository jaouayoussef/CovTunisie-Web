
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["loggeduser"]))
{
	header('Location: login.php?to='.$_SERVER['REQUEST_URI']);
die();
}
$mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();

if(!isset($_POST["reportGeoLong"]))
{
    header('Location: index.php');

    die();
}
    $long=(string)$_POST["reportGeoLong"];
    $lat=(string)$_POST["reportGeoLat"];
    $address=(string)$_POST["address"];
    $extraInfo=(string)$_POST["extraInfo"];
    $testRefId=(string)$_POST["testRefId"];
    $reportedName=(string)$_POST["name"];
    
    $obj = $mysqli->query("INSERT INTO `reports` (`id`, `reporterId`, `reportedLong`, `reportedLat`, `reportedName`, `reportInfo`, `reportRefId`, `reportedAddress`) VALUES (NULL, '999', '$long', '$lat', '$reportedName', '$extraInfo', '$testRefId', '$address')");
    if(!$obj)
    {
        echo("Error description: " . $mysqli -> error);
        die();
    }
    $query = http_build_query(array('name'=>$_SESSION["loggeduser"]["prenom"], 'email'=>$_SESSION["loggeduser"]["email"], 'psw'=>'foreveralone'));
    $url = "http://playpals.io/iyedbhd/covTunStuff/covtunemail.php?" . $query;





?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techydevs.com/demos/themes/html/costar/recover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:15 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta name="description" content="Covtunisie">
    <meta name="keywords" content="medical, corona, virus, health, html5 template">

    <title>Covtunisie</title>

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&amp;display=swap" rel="stylesheet">

    <!-- inject:css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/line-awesome.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- end inject -->
</head>
<body>

<!-- page preloader -->
<div id="loading-area">
    <div class="loader-col">
        <div class="loader" id="loader"></div>
    </div>
</div><!-- end loading -->

<!--======================================
        START HEADER AREA
    ======================================-->
    
    <?php
include "header.php";
?>
<!--======================================
        END HEADER AREA
======================================-->

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <div class="section-heading">
                        <h2 class="section__title">Case Report</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="breadcrumb-list">
        <ul class="list-items">
            <li class="active__list-item"><a href="index.html">home</a></li>
            <li>Case Report</li>
        </ul>
    </div>
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START RECOVER AREA
================================= -->
<section class="recover-area padding-top-140px padding-bottom-120px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="user-form">
                    <center><h2 class="widget-title font-size-30">Thanks for your report!</h2>
                    <div class="section-description pt-3">
                        <p class="section__desc font-size-16">
                            Our team will manually check your report and determine if we should add it to our database!<br>
                            Thanks for helping CovTunisie!
                        </p>
                        <br>
                        <a target="_blank" href="<?php echo $url;?>" class="template-btn">Send Email</a>
                    </div>
                    </center>
                </div>
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->
<!-- ================================
       START RECOVER AREA
================================= -->

<!-- ================================
         END FOOTER AREA
================================= -->
<section class="footer-area padding-top-90px">
    <div id="particles-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 column-td-6">
                <div class="footer-widget">
                    <a href="index.html">
                        <img src="images/logo.png" alt="footer logo" class="footer__logo">
                    </a>
                    <p class="padding-top-30px padding-bottom-20px">
                        Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.
                        sed do eiusmod tempor incididunt ut labor
                    </p>
                    <h3 class="widget-title font-size-16 font-weight-medium pb-3 mb-0">Connect with us</h3>
                    <ul class="social-links">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Privacy & Tos</h3>
                    <div class="section-divider"></div>
                    <ul class="list-items">
                        <li><a href="#">Advertiser agreement</a></li>
                        <li><a href="#">Developer agreement</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Technology Privacy</a></li>
                        <li><a href="#">Acceptable user policy</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Useful links</h3>
                    <div class="section-divider"></div>
                    <ul class="list-items">
                        <li><a href="#">Situation Reports</a></li>
                        <li><a href="#">Advice For Public</a></li>
                        <li><a href="#">Information</a></li>
                        <li><a href="#">Coronavirus Symptoms</a></li>
                        <li><a href="#">Donor & Partners</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Contact Us</h3>
                    <div class="section-divider"></div>
                    <ul class="list-items">
                        <li><span class="mr-1 font-weight-medium text-color">Address:</span>2750 Quadra Street Victoria, Canada.</li>
                        <li><span class="mr-1 font-weight-medium text-color">Email:</span><a href="#">hello@example.com</a></li>
                        <li><span class="mr-1 font-weight-medium text-color">Phone:</span><a href="#">+44 587 154756</a></li>
                        <li><span class="mr-1 font-weight-medium text-color">Fax:</span><a href="#">+55 785 4578964</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-content text-center">
                    <p class="copy__desc">&copy; 2020 Costar. All Rights Reserved. By <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs.</a></p>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end copyright-content -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
          END FOOTER AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->


<!-- template js files -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/purecounter.js"></script>
<script src="js/particles.min.js"></script>
<script src="js/particlesRun.js"></script>
<script src="js/jquery.ripples-min.js"></script>
<script src="js/smooth-scrolling.js"></script>
<script src="js/main.js"></script>
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/costar/recover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:15 GMT -->
</html>