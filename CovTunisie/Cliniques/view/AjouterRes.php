<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$con = mysqli_connect('localhost',"root","") ;
mysqli_select_db($con,'multi') ;
       $nom =$_POST['nom'];
		$prenom =$_POST['prenom'];
		$dateDeTest=$_POST['dateDeTest'] ;
		$clinique =$_POST['clinique'];
		$datecreation = date(DATE_RFC2822) ;

		$reg="insert into reservation (nom,prenom,dateDeTest,clinique,datecreation) values('$nom','$prenom','$dateDeTest','$clinique','$datecreation')";
		mysqli_query($con,$reg) ;
		header('location:index.html') ;
         
	



?>