<?php
$link = mysqli_connect("localhost", "root","", "covtun"); 
$id=$_GET['id'];
$photo=$_GET['photo']; 
$nom_clinique=$_GET['nom_clinique'];
$description=$_GET['description'];
echo($id);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE liste_clinique SET photo='$photo',nom_clinique='$nom_clinique',description='$description' WHERE id='$id' "; 
if(mysqli_query($link, $sql)){ 
    header('location:AfficherC.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 