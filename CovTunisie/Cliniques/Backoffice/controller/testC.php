<?PHP
include "config.php";
class testC
{
 
	function ajoutertest($test)
	{
		 $sql = "INSERT INTO reservation (nom,prenom,datecreation,dateDeTest,clinique) values (:nom, :prenom, :datecreation, :dateDeTest,:clinique) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);
			$req->bindValue(':nom', $test->getnom());
            $req->bindValue(':prenom', $test->getprenom());
			$req->bindValue(':datecreation', $test->getdatecreation());
			$req->bindValue(':dateDeTest', $test->getdateDeTest());
			$req->bindValue(':clinique', $test->getclinique());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function modifieretat($id,$etat)
   {  
		$sql = "UPDATE reservation SET etat='$etat' WHERE id=:id ";
	
	$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
                       header('Location: test.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	
 }
	
	function rechercheTest($key)
	{
		$sql = "SELECT * FROM reservation WHERE prenom LIKE '%$key%' OR nom LIKE '%$key%' OR datecreation LIKE '%$key%' OR dateDeTest LIKE '%$key%'";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function affichertest()
	{
		$sql = " SELECT * FROM reservation ";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimertest($nom)
	{
		$sql = "DELETE FROM reservation where nom= :nom";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':nom', $nom);
		try {
			$req->execute();
			 header('Location: test.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
