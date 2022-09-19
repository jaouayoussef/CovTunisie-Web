<?php
    class produit {
        private $id;
        private $type;
        private $prix;
        private $gramme;
        private $notice;
        private $nbr;


        public function __construct($type, $prix,$notice,$nbr) {
            $this->type=$type;
            $this->prix=$prix;
            $this->notice=$notice;
            $this->nbr=$nbr;
        }

        public function getId() {
            return $this->id;
        }

        public function setType($type) {
            $this->type=$type;
        }
        public function getType() {
            return $this->type;
        }

        public function setPrix($prix) {
            $this->prix=$prix;
        }
        public function getPrix() {
            return $this->prix;
        }
        public function setNotice($notice) {
            $this->notice=$notice;
        }
        public function getNotice() {
            return $this->notice;
        }
        public function setNbr($nbr) {
            $this->nbr=$nbr;
        }
        public function getNbr() {
            return $this->nbr;
        }
    }
?>