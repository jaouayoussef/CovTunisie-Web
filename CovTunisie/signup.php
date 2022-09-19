<?php 


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if(isset($_SESSION["loggeduser"]))
{
	header('Location: index.php');
}
$errors= array();
if(isset($_POST["psw"]))
{

    $mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


    $email =  $mysqli->real_escape_string($_POST["email"]);
    $user = $mysqli->query("SELECT id FROM `users` WHERE email='$email' LIMIT 1");
    $theaccount = mysqli_fetch_assoc($user);

	if($theaccount)
	{
        $errors[]="Email already registered!";
    }
    else
    {
        $GeoLong =  $mysqli->real_escape_string($_POST["GeoLong"]);
        $GeoLat =  $mysqli->real_escape_string($_POST["GeoLat"]);
        $prenom =  $mysqli->real_escape_string($_POST["prenom"]);
        $nom =  $mysqli->real_escape_string($_POST["nom"]);
        $psw =  $mysqli->real_escape_string($_POST["psw"]);
        $address =  $mysqli->real_escape_string($_POST["address"]);
        
        $obj = $mysqli->query("INSERT INTO `users` (`id`, `nom`, `prenom`, `adresse`, `health`, `geo_lat`, `geo_long`, `email`, `psw`) VALUES (NULL, '$nom', '$prenom', '$address', '0', '$GeoLat', '$GeoLong','$email', '$psw');");
        if(!$obj)
        {
            echo("Error description: " . $mysqli -> error);
            die();
        }
        else
        {
            $user = $mysqli->query("SELECT * FROM `users` WHERE email='$email' LIMIT 1");
            $theaccount = mysqli_fetch_assoc($user);        
            if($theaccount){
                $_SESSION["loggeduser"] = $theaccount;
                header('Location: index.php');
            }
        }
    }
    
}




?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techydevs.com/demos/themes/html/costar/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:19 GMT -->
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

    <!-- inject:css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

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
                        <h2 class="section__title">Sign In</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="breadcrumb-list">
        <ul class="list-items">
            <li class="active__list-item"><a href="index.html">home</a></li>
            <li>Sign In</li>
        </ul>
    </div>
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->







<section class="map-area overflow-hidden section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">Create a CovTunisie Account!</h5>
                    <h2 class="section__title padding-bottom-15px">Create an account to access all features!</h2>
                    <div class="section-divider"></div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-7">
            <div id="reportmap" style="height:100%;width:100%"></div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
            <div class="login-form">
                    <div class="user-form">
                        <div class="section-heading text-center">
                            <h5 class="section__meta">Build account</h5>
                            <h2 class="section__title font-size-30">Create Your Account!</h2>
                            <p class="font-size-16 mt-2">
                                Create an account to access all the features in CovTunisie!
                            </p>
                        </div><!-- end section-heading -->
                        <div class="contact-form-action mt-4">
                            <form id="signupform" method="post">
                                <div class="row">
                                <input type="hidden" id="GeoLong" name="GeoLong" value="">
                                <input type="hidden" id="GeoLat" name="GeoLat" value="">

                                    <div class="col-lg-12">
                                        <div class="account-assist mt-4 mb-4 text-center">
                                            <p class="account__desc">Fill in the form</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="prenom" placeholder="First name">
                                                <span class="la la-envelope-o input-icon"></span>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nom" placeholder="Last name">
                                                <span class="la la-user input-icon"></span>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                                                <span class="la la-envelope-o input-icon"></span>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="psw" placeholder="Password">
                                                <span class="la la-lock input-icon"></span>
                                                <span class="mt-1 font-size-14">Must use 8-15 characters and one number or symbol.</span>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group" data-validate = "Please select a location on the map">
                                                <input class="form-control" type="text" id="addressinput" name="address" placeholder="Address"  readonly="readonly" >
                                                <span class="la la-map-marker input-icon"></span>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <div class="custom-checkbox d-block mr-0">
                                                    <input type="checkbox" id="chb3" required>
                                                    <label for="chb3">I Agree to CovTunisie's <a href="#" class="color-text">Privacy Policy</a></label>
                                                </div><!-- end custom-checkbox -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <div class="form-group text-center mb-0">
                                                <button class="template-btn border-0 w-100" type="button" onclick="signUp()" id="createbtn" disabled>Create my account</button>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end accordion-area -->










<!-- ================================
       START CONTACT AREA
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
<script src="js/jquery.ripples-min.js"></script>
<script src="js/smooth-scrolling.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script src="js/main.js"></script>


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>





   <script>
var notyf = new Notyf();
var errors = <?php echo json_encode($errors); ?>;
for(var s=0;s<errors.length;s++)
{
    notyf.open({
                type:"error",
                message:errors[s],
                duration:"7000",
                ripple:true,
                dismissible:false,
                position: {
                    x: "right",
                    y: "bottom"
                }
            });
}
//var mymap = L.map('mapid').setView([33.8869, 9.5375], 6);
var bounds = new L.LatLngBounds(new L.LatLng(38.352693, 6.682708), new L.LatLng(28.878755, 12.508503));


var reportmap = new L.Map('reportmap', {
  center: [33.8869, 9.5375],
  zoom: 7,
  minZoom: 7,
  maxBounds: bounds,
  maxBoundsViscosity: 0.5
});



var marker;
reportmap.on('click', function(e) {
    if(marker)
    reportmap.removeLayer(marker);
    console.log(e.latlng); // e is an event object (MouseEvent in this case)
    marker = L.marker(e.latlng).addTo(reportmap);
    
    


//marker.getLatLng()
$('#createbtn').prop('disabled', true);

$.ajax({
            url: "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat="+ e.latlng.lat +"&lon="+e.latlng.lng,
            type: 'GET',
            dataType: 'json',
            headers: {
                'accept-language': 'fr'
            },
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                document.getElementById("addressinput").value = data["display_name"];
                document.getElementById("GeoLong").value = data["lon"];
                document.getElementById("GeoLat").value = data["lat"];
                $('#createbtn').prop('disabled', false);

            },
            error: function (error) {

            }
        });



});

//https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=35.523285&lon=9.774529



L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiaXllZGJoZCIsImEiOiJja2k3cDZneTAxa25qMnRxc245ZjVid3RiIn0.s-1nkknLeUOcJwGG-lfuZA'
}).addTo(reportmap);






function signUp() {
        //e.preventDefault();
        console.log("a");
    if(document.getElementById("GeoLong").value == "" || document.getElementById("GeoLat").value == "")
    {
        notyf.open({
                type:"error",
                message:"Please select a location!",
                duration:"4000",
                ripple:true,
                dismissible:false,
                position: {
                    x: "right",
                    y: "bottom"
                }
            });
    }
    else
    {
        document.getElementById("signupform").submit();

    }
        





    }



</script>
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/costar/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:19 GMT -->
</html>