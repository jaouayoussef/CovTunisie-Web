<?PHP
include "config.php" ;
class livreurrC
{
	function Ajouterlivreurr($livreurr)
	{
		$sql = "insert into livreurr (cin,login,nom,prenom,dispo,secteur,tel,date_naiss,mail,adresse,num_permis) values(:cin,:login,:nom,:prenom,:dispo,:secteur,:tel,:date_naiss,:mail,:adresse,:num_permis)";
		$db = config::getConnexion() ;
		try
	{
			$req = $db->prepare($sql) ;
			$req->BindValue(':cin',$livreurr->getcin()) ;
			$req->BindValue(':login',$livreurr->getlogin()) ;
			$req->BindValue(':nom',$livreurr->getnom()) ;
			$req->BindValue(':prenom',$livreurr->getprenom()) ;
			$req->BindValue(':dispo',$livreurr->getdispo()) ;
			$req->BindValue(':secteur',$livreurr->getsecteur()) ;
			$req->BindValue(':tel',$livreurr->gettel()) ;
			$req->BindValue(':date_naiss',$livreurr->getdate_naiss()) ;
			$req->BindValue(':mail',$livreurr->getmail()) ;
			$req->BindValue(':adresse',$livreurr->getadresse()) ;
			$req->BindValue(':num_permis',$livreurr->getnum_permis()) ;
			$req->execute();
			return true ;
		}
		catch (Exception $e)
		{
            echo 'Erreur: '.$e->getMessage();
			return false ;
        }
	}
/*
	function AfficherClients($Criminel)
	{
		echo "Cin: ".$Criminel->getCin()."<br>";
		echo "Nom: ".$Client->getNom()."<br>";
		echo "Prénom: ".$Criminel->getPrenom()."<br>";
		echo "DatedeNaissance: ".$Criminel->getDatedeNaissance()."<br>";
		echo "NombreCrime: ".$Criminel->getNombreCrime()."<br>";
	}
*/
	function Afficherlivreurr()
	{
		$sql="SElECT * From livreurr ORDER BY nom ASC ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierlivreurr($livreurr,$cin)
{
		$sql="UPDATE livreurr SET cin=:cinn, nom=:nom,prenom=:prenom, dispo=:dispo, secteur=:secteur, tel=:tel, date_naiss=:date_naiss, mail=:mail, adresse=:adresse , num_permis=:num_permis WHERE cin=:cin";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
		$cinn=$livreurr->getcin();
        $nom=$livreurr->getnom();
        $prenom=$livreurr->getprenom();
		$dispo=$livreurr->getdispo();
		$secteur=$livreurr->getsecteur();
		$tel=$livreurr->gettel();
		$date_naiss=$livreurr->getdate_naiss();
		$mail=$livreurr->getmail();
		$adresse=$livreurr->getadresse();
		$num_permis=$livreurr->getnum_permis();



$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':dispo'=>$dispo,':secteur'=>$secteur, ':tel'=>$tel, ':date_naiss'=>$date_naiss,':mail'=>$mail,':adresse'=>$adresse,':num_permis'=>$num_permis);
		$req->bindValue(':cinn',$cinn);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':dispo',$dispo);
		$req->bindValue(':secteur',$secteur);
		$req->bindValue(':tel',$tel);
		$req->bindValue(':date_naiss',$date_naiss);
        $req->bindValue(':mail',$mail);
        $req->bindValue(':adresse',$adresse);
        $req->bindValue(':num_permis',$num_permis);



			$s=$req->execute();
			//header('Location: Afficherlivreuur.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}

	function supprimerlivreurr($cin)
	{
		$sql="DELETE FROM livreurr where cin= :cin";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererlivreurr($cin){
		$sql="SELECT * from livreurr where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercherlivreurr($secteur){
		$sql="SELECT * from livreurr where secteur like '%".$secteur."%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>