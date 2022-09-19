<?PHP
include "../model/Livraison.php" ;
include "../controller/LivraisonC.php" ;
	if (isset($_GET['nom']) and isset($_GET['prenom']) and isset ($_GET['Pays']) and isset($_GET['tel']) and
	isset($_GET['date_livraison']) and isset($_GET['email']) and isset($_GET['adresse']) )
{
$livraison=new livraison($_GET['nom'],$_GET['prenom'],$_GET['Pays'],$_GET['tel'],$_GET['date_livraison'],$_GET['email'],$_GET['tel'],$_GET['adresse']);
$livraisonC=new livraisonC() ;
$livraisonC->Ajouterlivraison($livraison);
$livraisonC->Afficherlivraison($livraison);
header('Location: Afficherlivraison.php');
}
else
	{
		echo "vérifier les champs";
	}


?>
