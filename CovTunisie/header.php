
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<section class="header-menu-area header-menu-area-2">
    <div class="header-menu-fluid">
        <div class="container ">
            <div class="main-menu-content-2">
                <div class="row align-items-center h-100">
                    <div class="col-lg-3">
                        <div class="logo-box">
                            <a href="index.php" class="logo"><img src="images/logo2.png" alt="logo"></a>
                        </div>
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-9">
                        <div class="menu-wrapper">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li><a href="produits.php">Produits</a></li>
                                    
                                    <li><a href="cliniques.php">Cliniques</a></li>
                                    <?php 
                                    if(!isset($_SESSION["loggeduser"]))
                                    {
                                     ?>



                                    <li>
                                        <a href="login.php">log in</a>
                                        <span class="ml-1 mr-1">/</span>
                                        <a href="signup.php">Sign in</a>
                                    </li>


                                        

                                        <?php 
                                    }
                                    else
                                    {
?>


                                    <li>
                                        <a>Logged in as <?php echo $_SESSION["loggeduser"]["prenom"]; ?></a>
                                        <span class="ml-1 mr-1">/</span>
                                        <a href="logout.php">Logout</a>
                                    </li>


                                     
                                        

                                        <?php 
                                    }
?>
                                    
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                            <div class="logo-right-button logo-right-button-2">
                                <ul>
                                    <li><a href="index.php" class="template-btn">Home</a></li>
                                </ul>
                                <div class="side-menu-open">
                                    <i class="la la-bars"></i>
                                </div>
                            </div><!-- end logo-right-button -->
                            <div class="side-nav-container">
                                <div class="humburger-menu">
                                    <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                </div><!-- end humburger-menu -->
                                <div class="side-menu-wrap">
                                    <ul class="side-menu-ul">
                                        <li class="sidenav__item">
                                            <a href="index.html">home</a>
                                            <span class="menu-plus-icon"></span>
                                            <ul class="side-sub-menu">
                                                <li><a href="index.html">Home 01</a></li>
                                                <li><a href="home-2.html">Home 02</a></li>
                                                <li><a href="home-3.html">Home 03</a></li>
                                                <li><a href="home-4.html">Home 04 <span class="new-page-badge">new</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="sidenav__item"><a href="about.html">about</a></li>
                                        <li class="sidenav__item">
                                            <a href="#">pages</a>
                                            <span class="menu-plus-icon"></span>
                                            <ul class="side-sub-menu">
                                                <li><a href="doctors.html">Our doctors</a></li>
                                                <li><a href="doctor-single.html">Doctor detail</a></li>
                                                <li><a href="contact.html">Contact us</a></li>
                                                <li><a href="faq.html">Faqs</a></li>
                                                <li><a href="error.html">Error page</a></li>
                                                <li><a href="recover.html">Recover pass</a></li>
                                            </ul>
                                        </li>
                                        <li class="sidenav__item"><a href="index.php">Information</a></li>
                                        <li class="sidenav__item">
                                            <a href="blog-grid.html">blog</a>
                                            <span class="menu-plus-icon"></span>
                                            <ul class="side-sub-menu">
                                                <li><a href="blog-grid.html">blog grid</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                <li><a href="blog-single.html">blog detail</a></li>
                                            </ul>
                                        </li>
                                        <li class="sidenav__item">
                                            <a href="contact.html">contact</a>
                                        </li>
                                    </ul>
                                    <div class="side-btn-box">
                                        <a href="login.html">log in</a>
                                        <span class="ml-1 mr-1">/</span>
                                        <a href="sign-up.html">Sign in</a>
                                    </div>
                                </div><!-- end side-menu-wrap -->
                            </div><!-- end side-nav-container -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-9 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container -->
    </div><!-- end header-menu-fluid-->
</section><!-- end header-menu-area -->