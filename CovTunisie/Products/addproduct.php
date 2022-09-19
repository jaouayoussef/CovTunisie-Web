
<?php 
include "produit_c.php";
require_once 'produit.php';
$produitC=new produitC();

if (isset($_POST["type"]) &&
isset($_POST["prix"]) &&
isset($_POST["gramme"]) &&
isset($_POST["notice"])&&
isset($_POST["categorie"])&&
isset($_POST["nbr"])) {
    if(!empty($_POST["type"]) &&
    !empty($_POST["prix"]) &&
    !empty($_POST["gramme"]) &&
    !empty($_POST["notice"])&&
    !empty($_POST["categorie"])&&
    !empty($_POST["nbr"])) {
        $produit= new produit($_POST['type'], $_POST['prix'], $_POST['gramme'], $_POST['notice'],$_POST['nbr']);
        $produitC->addproducts($produit);
        $produitC->addcategorie($_POST['categorie']);
        header('Location:dash_board/table_produit.php');
    }
    else {
        header('Location:dash_board/table_produit.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/Prod.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <p id="erreur"></p>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="type" name="type" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="nombre" name="nbr" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="gramme" name="gramme" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="prix" name="prix" required="">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" id="categorie" type="number" placeholder="categorie(1:fievre / 2:anti inflamatoire/ 3:gorge) " name="categorie" required="">
                        </div>
                        <div class="input-group">
                            <textarea class="form-control" name="notice"  placeholder="notice.." style="width: 100%; height: 80px; resize: none;" required=""></textarea>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" onclick="return verif()">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/condition.js"></script>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
