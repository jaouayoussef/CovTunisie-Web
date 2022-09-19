<?PHP
class cliniquee
{
    public $nom_clinique;
    public $description;
    public $photo;
    function __construct($nom_clinique,$description,$photo)
    {   $this->nom_clinique = $nom_clinique; 
        $this->description = $description;
		$this->photo = $photo;
    }
    // getter 
    function getnom_clinique()
    {
        return $this->nom_clinique;
    }
    function getdescription()
    {
        return $this->description;
    }
    function getphoto()
    {
        return $this->photo;
    }
    // setter 
     function setnom_clinique($nom_clinique)
    {
        return $this->nom_clinique= $nom_clinique;
    }
    function setdescription($description)
    {
        return $this->description= $description;
    }
    function setphoto($photo)
    {
        return $this->photo= $photo;
    }

}
  ?>
