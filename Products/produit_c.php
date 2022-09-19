<?php
    require_once 'PDO.php';
    require_once 'produit.php';

    class produitC{
        public function retrieveAllproducts() {//affocher tout les produits
            $sql='select * from produit'; // Select * (all) el utilisateur el id mte3ou 1
            $db=config::getConnexion(); //amalna el connection bin Code ou Base de donnee
            $list=$db->query($sql);
            return $list;
        }

        public function retrieveproducts($id) {
            $sql='select * from produit where id=:id'; // Select * (all) el utilisateur el id mte3ou 1
            $db=config::getConnexion(); // madhebik t3awedhom nafshom
            $query=$db->prepare($sql); // madhebik t3awedhom nafshom
            $query->execute(['id' => $id]); // madhebik t3awedhom nafshom
            return $query->fetch(PDO::FETCH_ASSOC); // madhebik t3awedhom nafshom
        }

        public function retrieveCart($id) {
            $sql='select * from cart where userid=:id'; // Select * (all) el utilisateur el id mte3ou 1
            $db=config::getConnexion(); // madhebik t3awedhom nafshom
            $query=$db->prepare($sql); // madhebik t3awedhom nafshom
            $query->execute(['id' => $id]); // madhebik t3awedhom nafshom
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result; // madhebik t3awedhom nafshom
        }
        public function addproducts($produit, $img) {
            $sql='INSERT INTO produit(type, prix,notice,nbr,img) values(:type, :prix, :notice,:nbr,:img)';
            $db=config::getConnexion();
            $query=$db->prepare($sql);
            $query->execute([
                'type' => $produit->getType(),
                'prix' => $produit->getPrix(),
                'notice' => $produit->getNotice(),
                'nbr' => $produit->getNbr(),
                'img' => $img
                ]);
                //mysqli_query($query);
        }

        public function deleteproducts($id) {
            $sql='delete from produit where id=:id';
            $db=config::getConnexion();
            $query=$db->prepare($sql);
            $query->execute(['id' => $id]);
        }

        public function updateproducts($produit, $id) {
            $sql='UPDATE produit SET 
                type = :type,
                prix = :prix, 
                notice = :notice, 
                nbr=:nbr
                WHERE id = :id';
            $db=config::getConnexion();
            $query=$db->prepare($sql);
            $query->execute([
                'type' => $produit->getType(),
                'prix' => $produit->getPrix(),
                'notice'=>$produit->getNotice(),
                'nbr'=>$produit->getNbr(),
                'id' => $id
            ]);
        }

        public function addcategorie($categorie) {
            $sql='INSERT INTO categorie (id_produit,categorie) VALUES (LAST_INSERT_ID(), :categorie)'; 
            $db=config::getConnexion();
            $query=$db->prepare($sql);
            $query->execute([ 
                'categorie' => $categorie
            ]);
        }

        public function retrieveAllcatFievre() {//affocher tout les produits
            $sql='select * from categorie'; // Select * (all) el utilisateur el id mte3ou 1
            $db=config::getConnexion(); //amalna el connection bin Code ou Base de donnee
            $list=$db->query($sql);
            return $list;
        }

        public function retrieveCatFievre() {
            $sql='select p.* from produit p JOIN categorie c ON p.id=c.id_produit WHERE c.categorie=1;'; 
            $db=config::getConnexion(); //amalna el connection bin Code ou Base de donnee
            $list=$db->query($sql);
            return $list;
        }

        public function retrieveCatInflamatoire() {
            $sql='select p.* from produit p JOIN categorie c ON p.id=c.id_produit WHERE c.categorie=2;'; 
            $db=config::getConnexion(); //amalna el connection bin Code ou Base de donnee
            $list=$db->query($sql);
            return $list;
        }

        public function retrieveCatGorge() {
            $sql='select p.* from produit p JOIN categorie c ON p.id=c.id_produit WHERE c.categorie=3;'; 
            $db=config::getConnexion(); //amalna el connection bin Code ou Base de donnee
            $list=$db->query($sql);
            return $list;
        }
    }

?>