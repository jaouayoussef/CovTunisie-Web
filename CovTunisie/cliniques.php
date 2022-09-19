<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include "Cliniques/controller/cliniqueeC.php";
include "controller/mysqliHelper.php";

if(!isset($_SESSION["loggeduser"]))
{
	header('Location: login.php?to='.$_SERVER['REQUEST_URI']);
die();
}

//$mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();



$clinicstable = $mysqli->query("SELECT * FROM `liste_clinique`") or die("db error");

				//include "../config.php";

				$req="select * from liste_clinique";
				//$db=config::getConnexion();
				$listC=$mysqli->query($req) ;

?>






<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techydevs.com/demos/themes/html/costar/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:14 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta name="description" content="CovTunisie - Coronavirus Medical">
    <meta name="keywords" content="medical, corona, virus, health, html5 template">

    <title>Costar - Coronavirus Medical Prevention HTML Template</title>

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
                        <h2 class="section__title">Reservez votre test</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="breadcrumb-list">
        <ul class="list-items">
            <li class="active__list-item"><a href="index.html">home</a></li>
            <li>Cliniques</li>
        </ul>
    </div>
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->

<section class="team-area padding-top-140px padding-bottom-90px">
    <div class="container">
		<div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h5 class="section__meta">Voir</h5>
                    <h2 class="section__title padding-bottom-15px">Nos cliniques</h2>
                    <div class="section-divider"></div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div>
        <br>
        
        <?php


    while($row = $clinicstable->fetch_assoc()) {
            


    echo '<div class="row">
    <div class="col-lg-6">
        <div class="team-item">
            <div class="team-avatar">
                <img src="images/cliniques/'. $row["photo"] . '" alt="">
                
            </div>
            <div class="team-detail">
                <h3 class="team__title">' . $row["nom_clinique"] . '</h3>
                <p class="team__meta">Clinique locale</p>
                <div class="section-block"></div>
                <p class="team__meta pt-3">' . $row["description"] . '</p>
                
            </div>
        </div><!-- end team-item -->
    </div><!-- end col-lg-6 -->';

    }


?>

        
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end team-area -->

<section class="contact-area padding-bottom-120px">
    <div class="container">
		<div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h5 class="section__meta">Inquiet?</h5>
                    <h2 class="section__title padding-bottom-15px">Reservez un test</h2>
                    <div class="section-divider"></div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div>
		<br>
        <div class="row">
            <div class="col-lg-7">
                <div class="user-form-wrap">
                    <div class="user-form">
                        <div class="section-heading">
                            <h5 class="section__meta">get in touch</h5>
                            <h2 class="section__title font-size-28">Remplir la fiche médicale</h2>
                        </div><!-- end section-heading -->
                        <div class="contact-form-action mt-4">
                        <form class="contact-form" method="POST" name="contactform" action="AjouterRes.php">

                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nom" placeholder="Nom">
                                        <span class="la la-user input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="prenom" placeholder="Prenom">
                                        <span class="la la-user input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                
                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dateDeTest" placeholder="Date test">
                                        <span class="la la-book input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="input-box">
                                    <div class="form-group">



                                    <select class="form-control" id="gender1" name="categ">
                                    <option>Choisissez un Clinique</option>
                                    <?php
                                        foreach ($listC as $cat) 
                                        {
                                        echo('<option> '.$cat['nom_clinique'].' </option>'); 
                                        }

                                        ?>
                                    </select>

                                        <span class="la la-pencil input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                <a>Mode de paiement</a>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sur place" required>
                                    <label class="form-check-label" for="exampleCheck1">Sur place</label>
                                </div>
                                <br>
                                <br>
                                <div class="btn-box">
                                    <div class="form-group text-center mb-0">
                                        <button class="template-btn border-0 w-100">Reserver</button>
                                    </div><!-- end form-group -->
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="contact-content pl-4">
                    <div class="contact-item mb-4">
                        <h3 class="widget-title font-size-20">Besoin d'aide? contactez nous</h3>
                        <ul class="list-items mt-3">
                            <li><span class="mr-1 font-weight-medium text-color">Addresse:</span>05 Rue de cobalte</li>
                            <li><span class="mr-1 font-weight-medium text-color">Phone:</span><a href="#">+216 94338745</a></li>
                        </ul>
                    </div>
                    <div class="section-block"></div>
                    <div class="contact-item mt-4 mb-4">
                        <h3 class="widget-title font-size-20">Horaires de disponibilité</h3>
                        <ul class="list-items mt-3">
                            <li><span class="mr-1 font-weight-medium text-color">Lundi:</span>8AM - 6AM</li>
                            <li><span class="mr-1 font-weight-medium text-color">Mardi:</span><a href="#">8AM - 6AM</a></li>
                            <li><span class="mr-1 font-weight-medium text-color">Mercredi:</span><a href="#">8AM - 6AM</a></li>
                            <li><span class="mr-1 font-weight-medium text-color">Jeudi:</span><a href="#">8AM - 6AM</a></li>
                            <li><span class="mr-1 font-weight-medium text-color">Vendredi - Dimanche:</span><a href="#">Fermé</a></li>
                        </ul>
                    </div>
                     <div class="section-block"></div>
                    <div class="contact-item mt-4">
                        <h3 class="widget-title font-size-20">Social Profile</h3>
                        <ul class="social-links mt-3">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       START CONTACT AREA
================================= -->

<!-- ================================
       START GOOGLE MAP
================================= -->
<div class="map-container">
    <div id="map"></div><!-- end map -->
</div>
<!-- ================================
       END GOOGLE MAP
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
                        CovTunisie website is a web project
                        made for esprit 2020/2021
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
                        <li><a href="index.php">Situation Reports</a></li>
                        <li><a href="index.php">Advice For Public</a></li>
                        <li><a href="index.php">Information</a></li>
                        <li><a href="produits.php">Products</a></li>
                        <li><a href="index.php">Infected users map</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Contact Us</h3>
                    <div class="section-divider"></div>
                    <ul class="list-items">
                        <li><span class="mr-1 font-weight-medium text-color">Address:</span>05 Rue de cobalte.</li>
                        <li><span class="mr-1 font-weight-medium text-color">Email:</span><a href="#">iyedbhd@gmail.com</a></li>
                        <li><span class="mr-1 font-weight-medium text-color">Phone:</span><a href="#">+216 94338745</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-content text-center">
                    <p class="copy__desc">&copy; 2020. All Rights Reserved.</a></p>
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
<script src="js/smooth-scrolling.js"></script>
<script src="js/custom-map.js"></script>
<script src="js/jquery.ripples-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzby4yYDVaXPmtu4jZAGR258K6IYwjIY&amp;libraries"></script>
<script src="js/main.js"></script>
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/costar/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:15 GMT -->
</html>