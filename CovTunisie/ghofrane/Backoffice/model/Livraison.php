<?php
class livraison
{
	private $nom ;
	private $prenom ;
	private $Pays ;
	private $tel ;
	private $date_livraison;
	private $email ;
	private $adresse ;

	public function getnom()
	{
		return $this->nom ;
	}
	public function getprenom()
	{
		return  $this->prenom ;
	}
	public function getPays()
	{
		return $this->Pays ;
	}
	public function gettel()
	{
		return $this->tel ;
	}
	public function getdate_livraison()
	{
		return $this->date_livraison ;
	}
    public function getemail()
	{
		return $this->email ;
	}
	public function getadresse()
	{
		return $this->adresse ;
	}




	public function setnom($nom)
	{
		$this->nom=$nom ;
	}
	public function setprenom($prenom)
	{
		 $this->prenom=$prenom ;
	}
	public function setPays($Pays)
	{
		$this->Pays=$Pays ;
	}
	public function settel($tel)
	{
		$this->tel=$tel  ;
	}
	public function setdate_livraison($date_livraison)
	{
		$this->date_livraison=$date_livraison ;
	}
    public function setemail($email)
	{
		$this->email=$email  ;
	}
	public function setadresse($adresse)
	{
		$this->adresse=$adresse  ;
	}



	public function __construct($nom,$prenom,$Pays,$tel,$date_livraison,$email,$adresse)
	{ 
		$this->nom=$nom ;
		$this->prenom=$prenom ;
		$this->Pays=$Pays ;
		$this->tel=$tel;
		$this->date_livraison=$date_livraison;
		$this->email=$email;
		$this->adresse=$adresse;
	}
}
?>
