<?php
//include "Cliniques/controller/cliniqueeC.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["loggeduser"]))
{
	header('Location: login.php?to='.$_SERVER['REQUEST_URI']);
die();
}


include 'Products/produit_c.php';
require_once 'Products/produit.php';
$produit_c=new produitC();
$list=$produit_c->retrieveAllproducts();
$cart=$produit_c->retrieveCart($_SESSION["loggeduser"]["id"]);

if($cart)
{
    $cart = $cart["cartdata"];

}
else
{
    $cart = "{}";

}

$search = "";
if(isset($_GET["search"]))
{
    $search = $_GET["search"];
}







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
                        <h2 class="section__title">Achetez des produits</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="breadcrumb-list">
        <ul class="list-items">
            <li class="active__list-item"><a href="index.html">home</a></li>
            <li>Products</li>
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
                    <h2 class="section__title padding-bottom-15px">Nos produits</h2>
                    <div class="section-divider"></div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div>
        <br>
        
        







        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card-sm" style="boder:none;">
                                <div class="card-body row no-gutters align-items-center" style="boder:none;">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input  name="search" class="form-control  form-control-borderless" value="<?php echo $search ?>" type="search" placeholder="Search topics or keywords">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>






<br>





<div class="row">

        <?php 
					$list=$produit_c->retrieveAllproducts();
					foreach($list as $u) { 
                        if($search == "" || strpos(strtolower($u["type"]), strtolower($search)) !== false)
                        {
					?>
                
                

                <div class="col-lg-6">
                    <div class="team-item">
                        <div id="pic" class="team-avatar">
                            <img id="pic" src="images/produits/<?php echo $u['img']?>" alt="">
                            
                        </div>
                        <div class="team-detail">
                            <input type="hidden" id="id" value="<?php echo $u['id']?>">
                            <h3 class="team__title" id="type"><?php echo $u['type']?></h3>
                            <p class="team__meta">-<?php echo $u['id']?>-</p>
                            <div class="section-block"></div>
                            <p class="team__meta pt-3" id="notice"><?php echo $u['notice'] ?></p>
                            <p class="team__meta pt-3" id="rest" ><?php echo $u['nbr'] ?> Reste</p>
                        
                            <p class="team__meta pt-3" id="prix"><?php echo $u['prix'] ?> TND</p>
                            <button class="buybtn template-btn border-0">Acheter</button>
                        </div>
                    </div><!-- end team-item -->
                </div><!-- end col-lg-6 -->




            <?php }} ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end team-area -->


<!-- ================================
       START order details AREA
================================= -->


<div class="container">
<br>  <p class="text-center">See your cart below</a></p>
<hr>



<div class="card">
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




</div> <!-- card.// -->



</div> 
<br><br>
<!-- ================================
       START GOOGLE MAP
================================= -->
<center>
<div class="btn-box" style="width:30%">
                                    <div class="form-group text-center mb-0">
                                        <button onclick="window.location.href='commander.php'" class="template-btn border-0 w-100" id="passercommande">Passer commande</button>
                                    </div><!-- end form-group -->
                                </div>
                    </center>
                    <br>
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
<script src="js/bootstrap-number-input.js" ></script>
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
            for(var s in cart)
            {
                $("#orderbody").append('<tr> <td> <figure class="media"> <div class="img-wrap" style=" width: 100px; "><img src="' + cart[s].img + '" class="img-thumbnail img-sm"></div> <figcaption class="media-body" style=" padding-left: 15px; "> <h6 class="title text-truncate">' + cart[s].type + '</h6> <dl class="param param-inline small"> ' + cart[s].notice + ' </figcaption> </figure> </td> <td> ' + cart[s].quantity + ' </td> <td> <div class="price-wrap"> <b>' + cart[s].prix + '</b> <small class="text-muted">(each)</small> </div> <!-- price-wrap .// --> </td> <td class="text-right"> <button itemId="'+s+'" class="removebtn btn btn-danger"><i class="fas fa-times"></i> Remove</button> </td> </tr>');
                total++;
            }

            if(total == 0)
            {
                $("#orderbody").html('<br><br><br>');

                //$("#orderbody").html('<center><br><a style="color=#6c757d; font-family: "Roboto",sans-serif;">Empty</a><br><br></center>');
            }
            $('#passercommande').prop('disabled', total == 0);

            setDeleteFunc();




            $.get( "updatecart.php?cartdata="+JSON.stringify(cart), function( data ) {



            });

}

  $('.buybtn').each(function(btn){
        $(this).click(function(){
            console.log("1");
            if(!cart.hasOwnProperty($(this).parent().children("#id").val()))
            {
                cart[$(this).parent().children("#id").val()] = {"type":$(this).parent().children("#type").text(),"quantity":1,"notice" : $(this).parent().children("#notice").text(), "prix" : $(this).parent().children("#prix").text(), "img":$(this).parent().siblings("#pic").children("#pic").attr('src')};
            }
            else
            {
                if(cart[$(this).parent().children("#id").val()]["quantity"] < parseInt($(this).parent().children("#rest").text().replace(" Reste", "")))
                {
                cart[$(this).parent().children("#id").val()]["quantity"]++;
                notyf.open({
								type:"success",
								message:"Item added to cart!",
								duration:"2000",
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
                    notyf.open({
								type:"error",
								message:"No more stock!",
								duration:"2000",
								ripple:true,
								dismissible:false,
								position: {
									x: "right",
									y: "bottom"
								}
							});
                }
            }
            updateCart();
        

        });
    });
  //[{"id":2,"name":"huile d'olive","summary":"summary 2","price":"10.990","quantity":"4","image":"images/of1.png"},
  //{"id":3,"name":"Nouaser","summary":"summary 3","price":"0.850","quantity":"2","image":"images/of2.png"}]
 /* $('.amountinput').each(function(btn){

    $( this ).bootstrapNumber({
	upClass: 'success',
	downClass: 'danger'
});*/




</script>
</body>

<!-- Mirrored from techydevs.com/demos/themes/html/costar/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 23:03:15 GMT -->
</html>