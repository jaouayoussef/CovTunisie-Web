<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//include "Cliniques/controller/cliniqueeC.php";
if(!isset($_SESSION["loggeduser"]))
{
	header('Location: login.php?to='.$_SERVER['REQUEST_URI']);
die();
}

include 'Products/produit_c.php';
require_once 'Products/produit.php';
$produit_c=new produitC();
$cart=$produit_c->retrieveCart($_SESSION["loggeduser"]["id"]);

if($cart)
{
    $cart = $cart["cartdata"];

}
else
{
    $cart = "{}";
}
if($cart == "{}")
{
    header('Location: produits.php');
    die();
}


//$mysqli = include "controller/mysqliHelper.php";

//$mysqli = mysqliHelper::getCon();


include "controller/mysqliHelper.php";
$mysqli = mysqliHelper::getCon();



$req="select * from livreurr WHERE dispo=1";
//$db=config::getConnexion();
$listLiv=$mysqli->query($req) ;



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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

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
                        <h2 class="section__title">Passer commande</h2>
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

<br><br>
<br>

<section class="contact-area padding-bottom-120px">
    <div class="container">
		<div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h5 class="section__meta">Inquiet?</h5>
                    <h2 class="section__title padding-bottom-15px">Passez votre commande</h2>
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
                            <h2 class="section__title font-size-28">Remplir vos information</h2>
                        </div><!-- end section-heading -->
                        <div class="contact-form-action mt-4">
                        <form class="contact-form" method="POST" name="contactform" id="contactform" action="confirmCommande.php">

                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nom" placeholder="Nom" value="<?php echo $_SESSION["loggeduser"]["nom"]?>">
                                        <span class="la la-user input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="prenom" placeholder="Prenom" value="<?php echo $_SESSION["loggeduser"]["prenom"]?>">
                                        <span class="la la-user input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                
             



                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="Addresse" placeholder="Addresse" value="<?php echo $_SESSION["loggeduser"]["adresse"]?>">
                                        <span class="la la-map-pin input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>

                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $_SESSION["loggeduser"]["email"]?>">
                                        <span class="la la-envelope input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>


                                <div class="input-box">
                                    <div class="form-group">



                                    <select class="form-control" id="chooselivreur" name="categ">
                                    <option>Choisissez un Livreur</option>
                                    <?php
                                            foreach ($listLiv as $cat) 
                                            {
                                            echo('<option>'.$cat["id"] . '- '.$cat['prenom'] .  ' ' . $cat['nom'] . ' </option>'); 
                                            }
                                    ?>
                                    </select>

                                        <span class="la la-pencil input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>


                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="dateliv" placeholder="Date Livraison" required>
                                        <span class="la la-user input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                
                                <div class="input-box">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="Tel" placeholder="Tel" required>
                                        <span class="la la-phone input-icon"></span>
                                    </div><!-- end form-group -->
                                </div>
                                

                                <br>
                                <div class="btn-box">
                                    <div class="form-group text-center mb-0">
                                        <button class="template-btn border-0 w-100" type="button" onclick="commander()" id="createbtn">Commander</button>
                                    </div><!-- end form-group -->
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                <th scope="col">Product</th>
                <th scope="col" width="120">Quantity</th>
                <th scope="col" width="120">Price</th>
                <th scope="col" width="200" class="text-right">Action</th>
                </tr>
                </thead>
                <tbody id="orderbody">














                </tbody>
                </table>
                Prix total: <p id="totalPrix"><b>500 TND</b></p>
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
                        <li><a href="#">Prevention</a></li>
                        <li><a href="#">Coronavirus Symptoms</a></li>
                        <li><a href="#">Donor & Partners</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Cliniques</h3>
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
<script src="js/smooth-scrolling.js"></script>
<script src="js/custom-map.js"></script>
<script src="js/jquery.ripples-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzby4yYDVaXPmtu4jZAGR258K6IYwjIY&amp;libraries"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script src="js/main.js"></script>
<script>


var notyf = new Notyf();

var cart = <?php echo $cart; ?>;
if(cart == null)
{
    cart = {};
}



updateCart();

function setDeleteFunc()
{
    $('.removebtn').each(function(btn){
        $(this).unbind().click(function(){
            notyf.open({
                type:"error",
                message:"Item removed!",
                duration:"2000",
                ripple:true,
                dismissible:false,
                position: {
                    x: "right",
                    y: "bottom"
                }
            });
                            
            if(cart.hasOwnProperty($(this).attr('itemId')))
            delete cart[$(this).attr('itemId')];
            updateCart();

        });



    });





}

function updateCart()
{
    $("#orderbody").empty();

    var total = 0;
    var prix = 0;
            for(var s in cart)
            {
                $("#orderbody").append('<tr> <td> <figure class="media"> <div class="img-wrap" style=" width: 100px; "><img src="' + cart[s].img + '" class="img-thumbnail img-sm"></div> <figcaption class="media-body" style=" padding-left: 15px; "> <h6 class="title text-truncate">' + cart[s].type + '</h6> <dl class="param param-inline small"> ' + cart[s].notice + ' </figcaption> </figure> </td> <td> ' + cart[s].quantity + ' </td> <td> <div class="price-wrap"> <b>' + cart[s].prix + '</b> <small class="text-muted">(each)</small> </div> <!-- price-wrap .// --> </td> <td class="text-right"> <button itemId="'+s+'" class="removebtn btn btn-danger"><i class="fas fa-times"></i> Remove</button> </td> </tr>');
                total++;
                prix += parseInt(cart[s].prix.split(" TND")) * parseInt(cart[s].quantity);
            }
            document.getElementById("totalPrix").innerHTML = "<b>" + prix + " TND</b>";

            if(total == 0)
            {
                $("#orderbody").html('<br><br><br>');

                //$("#orderbody").html('<center><br><a style="color=#6c757d; font-family: "Roboto",sans-serif;">Empty</a><br><br></center>');
            }
            $('#passercommande').prop('disabled', total == 0);

            setDeleteFunc();




            $.get( "updatecart.php?cartdata="+JSON.stringify(cart) + "&userid=1", function( data ) {



            });

}



function commander() {
        //e.preventDefault();
        console.log("a");
    if(document.getElementById("chooselivreur").value == "Choisissez un Livreur")
    {
        notyf.open({
                type:"error",
                message:"Veuiller choisissez un livreur!",
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
        document.getElementById("contactform").submit();

    }
        





    }



</script>
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/costar/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:15 GMT -->
</html>