<?php
class livreurr
{
	private $cin;
	private $login;
	private $nom;
    private $prenom;
    private $dispo;
    private $secteur;
    private $tel;
    private $date_naiss;
    private $mail;
    private $adresse;
    private $num_permis;
 

    public function getcin()
	{
		return  $this->cin ;
	}
	public function getlogin()
	{
		return  $this->login ;
	}
		public function getnom()
	{
		return  $this->nom ;
	}
		public function getprenom()
	{
		return  $this->prenom ;
	}
	public function getdispo()
	{
		return $this->dispo ;
	}
	public function getsecteur ()
	{
		return $this->secteur ;
	}
	public function gettel ()
	{
		return $this->tel ;
	}
    public function getdate_naiss()
	{
		return  $this->date_naiss ;
	}
	public function getmail()
	{
		return  $this->mail ;
	}
	public function getadresse()
	{
		return  $this->adresse ;
	}
	public function getnum_permis()
	{
		return  $this->num_permis ;
	}
	




	

    public function setcin ($cin)
	{
		 $this->cin=$cin ;
	}
	public function setlogin($login)
	{
		$this->login=$login ;
	}
	public function setnom ($nom)
	{
		 $this->nom=$nom ;
	}
	public function setprenom ($prenom )
	{
		 $this->prenom =$prenom  ;
	}
	public function setdispo ($dispo)
	{
		 $this->dispo=$dispo ;
	}
	public function setsecteur ($secteur )
	{
		$this->secteur =$secteur  ;
	}
	 
	public function settel($tel)
	{
		$this->tel=$tel ;
	}
    public function setdate_naiss($date_naiss)
	{
		$this->date_naiss=$date_naiss ;
	}
	public function setmail($mail)
	{
		$this->mail=$mail ;
	}
	public function setadresse($adresse)
	{
		$this->adresse=$adresse ;
	}
	public function setnum_permis($num_permis)
	{
		$this->num_permis=$num_permis ;
	}



	public function __construct($cin,$login,$nom,$prenom,$dispo,$secteur,$tel,$date_naiss,$mail,$adresse,$num_permis)
	{
		$this->cin=$cin ;
		$this->login=$login ;
		$this->nom=$nom ;
		$this->prenom=$prenom ;
		$this->dispo=$dispo ;
		$this->secteur=$secteur ;
		$this->tel=$tel ;
		$this->date_naiss=$date_naiss ;
		$this->mail=$mail ;
		$this->adresse=$adresse ;
		$this->num_permis=$num_permis ;
	}
}
?>