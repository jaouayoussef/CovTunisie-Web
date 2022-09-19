
<?php

$mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$cartdata = $_GET["cartdata"];
$price = $_GET["price"];
$nom = "Jaoua";
$prenom = "Youssef";
$address = "Narjes 2";
$cartdata =  $mysqli->real_escape_string($cartdata);
$address =  $mysqli->real_escape_string($address);

$obj = $mysqli->query("INSERT INTO `commandes` (`id`, `cart`, `price`, `time`, `nom`, `prenom`, `adresse`) VALUES (NULL, '$cartdata', '$price', current_timestamp(), '$nom', '$prenom', '$address');");
if(!$obj)
    {
        echo("Error description: " . $mysqli -> error);
        die();
    }
echo "1";





?>