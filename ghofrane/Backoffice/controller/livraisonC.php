<?PHP
include "config.php" ;
class livraisonC
{
	function Ajouterlivraison($livraison)
	{
		$sql = "insert into livraison (nom,prenom,Pays,tel,date_livraison,email,adresse) values(:nom,:prenom,:Pays,:tel,:date_livraison,:email,:adresse)";
		$db = config::getConnexion() ;
		try
		{
			$req = $db->prepare($sql) ;
			$req->BindValue(':nom',$livraison->getnom()) ;
			$req->BindValue(':prenom',$livraison->getprenom()) ;
			$req->BindValue(':Pays',$livraison->getPays());
			$req->BindValue(':tel',$livraison->gettel());
			$req->BindValue(':date_livraison',$livraison->getdate_livraison()) ;
			$req->BindValue(':email',$livraison->getemail());
			$req->BindValue(':adresse',$livraison->getadresse());
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
	function Afficherlivraison()
	{
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierlivraison($livraison,$id)
{
		$sql="UPDATE livraison SET nom=:nom, prenom=:prenom,Pays=:Pays, tel=:tel, date_livraison=:date_livraison, email=:email, adresse=:adresse WHERE id=:id";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
		 $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $Pays=$livraison->getPays();
		$tel=$livraison->gettel();
		$date_livraison=$livraison->getdate_livraison();
		$email=$livraison->getemail();
		$adresse=$livraison->getadresse();



$datas = array( ':nom'=>$nom, ':prenom'=>$prenom,':Pays'=>$Pays,':tel'=>$tel,':date_livraison'=>$date_livraison, ':email'=>$email, ':adresse'=>$adresse);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':Pays',$Pays);
		$req->bindValue(':tel',$tel);
		$req->bindValue(':date_livraison',$date_livraison);
		$req->bindValue(':email',$email);
		$req->bindValue(':adresse',$adresse);




            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}

	function supprimerlivraison($id)
	{
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererlivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercherListelivraison($id){
		$sql="SELECT * from livraison where id=$id";
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
