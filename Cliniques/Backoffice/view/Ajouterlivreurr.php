<?PHP
include "../model/livreurr.php" ;
include "../controller/livreurrC.php" ;
	if (isset($_GET['cin']) and isset($_GET['login']) and isset ($_GET['nom']) and isset($_GET['prenom']) and
	isset($_GET['dispo']) and isset($_GET['secteur']) and isset($_GET['tel']) and isset($_GET['date_naiss']) and isset($_GET['mail'])and isset($_GET['adresse']) and isset($_GET['num_permis']) )
{
$livreurr=new livreurr($_GET['cin'],$_GET['login'],$_GET['nom'],$_GET['prenom'],$_GET['dispo'],$_GET['secteur'],$_GET['tel'],$_GET['date_naiss'],$_GET['mail'],$_GET['adresse'],$_GET['num_permis']);
$livreurrC=new livreurrC() ;
$livreurrC->Ajouterlivreurr($livreurr);
$livreurrC->Afficherlivreurr($livreurr);
}
else
	{
		echo "vérifier les champs";
	}


?>
