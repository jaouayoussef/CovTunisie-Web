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
    $urlcaptcha = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => "6LdqXCMaAAAAAFqc9zM_Gl08lvyUX3QyPGBHagoc",
        'response' => $_POST['g-recaptcha-response'],
        // 'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $response = file_get_contents($urlcaptcha, false, $context);

    $resCaptcha = json_decode($response, true);
    if($resCaptcha['success'] == true) {

        $mysqli = include "controller/mysqliHelper.php";

        $mysqli = mysqliHelper::getCon();


        $email =  $mysqli->real_escape_string($_POST["email"]);
        $psw =  $mysqli->real_escape_string($_POST["psw"]);

        $user = $mysqli->query("SELECT * FROM `users` WHERE email='$email' AND psw='$psw' LIMIT 1");
        $theaccount = mysqli_fetch_assoc($user);

        if($theaccount)
        {
            $_SESSION["loggeduser"] = $theaccount;
            if(isset($_GET["to"]))
            {
                header('Location: '. $_GET["to"]);
            }
            else
            {
            header('Location: index.php?aaa');
            }

        }
        else
        {
            $errors[]="Wrong credentials!";

        }
    }
    else
    {
        $errors[]="Please complete the challenge!";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techydevs.com/demos/themes/html/costar/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:19 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta name="description" content="CovTunisie - Coronavirus Medical">
    <meta name="keywords" content="medical, corona, virus, health, html5 template">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Costar - Coronavirus Medical Prevention HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

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
                        <h2 class="section__title">Login</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="breadcrumb-list">
        <ul class="list-items">
            <li class="active__list-item"><a href="index.html">home</a></li>
            <li>Login</li>
        </ul>
    </div>
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="contact-area padding-top-140px padding-bottom-120px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="login-form">
                    <div class="user-form">
                        <div class="section-heading text-center">
                            <h5 class="section__meta">login account</h5>
                            <h2 class="section__title font-size-30">Login to Your Account</h2>
                            <p class="font-size-16 mt-2">
                                Login to your account to use all the features
                            </p>
                        </div><!-- end section-heading -->
                        <div class="contact-form-action mt-4">
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="account-assist mt-4 mb-4 text-center">
                                            <p class="account__desc">Log in</p>
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
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="text-align: center;">
                                    
                                    
                                    
                                    <div class="g-recaptcha" data-sitekey="6LdqXCMaAAAAAMi27Cps0zD0_2bOJqYy8aXZdKok" style="position: relative;display: inline-block;"></div></center>
</div>
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <div class="form-group text-center mb-0">
                                                <button class="template-btn border-0 w-100" type="submit">login my account</button>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
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
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

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

</script>

<script type="text/javascript">
  var onloadCallback = function() {
    //alert("grecaptcha is ready!");
  };
</script>
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/costar/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:19 GMT -->
</html>