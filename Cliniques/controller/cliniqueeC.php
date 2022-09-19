<?PHP
include "config.php";

class cliniqueeC
{
	function ajoutercliniquee($cliniquee)
	{
		include "../config.php";
		require_once('../model/product.php');
		 $sql = "INSERT INTO liste_clinique (nom_clinique,description,photo) values (:nom_clinique, :description, :photo) ";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':nom_clinique', $cliniquee->getnom_clinique());
            $req->bindValue(':description', $cliniquee->getdescription());
			$req->bindValue(':photo', $cliniquee->getphoto());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
		function recherchecliniquee($key)
	{
			
		$sql = "SELECT * FROM liste_clinique WHERE description LIKE '%$key%' OR categ LIKE '%$key%' OR nom_clinique LIKE '%$key%' or id LIKE '%$key'";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function affichercliniquee()
	{
		$sql = "SELECT * FROM liste_clinique";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimercliniquee($nom_clinique)
	{
		include "../config.php";
		$sql = "DELETE FROM liste_clinique where nom_clinique= :nom_clinique";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':nom_clinique', $nom_clinique);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
