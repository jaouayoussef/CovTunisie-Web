<?php
    include 'produit_c.php';
    
    $produitC=new produitC();
    if(isset($_GET["id"])) {
        $produitC->deleteproducts($_GET['id']);
		//header('Location:dash_board/table_produit.php');
    }
?>