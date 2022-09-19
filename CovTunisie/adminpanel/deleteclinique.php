
<?php

$mysqli = include "../controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$theid = $_GET["id"];

$obj2 = $mysqli->query("DELETE FROM `liste_clinique` WHERE `liste_clinique`.`id` = $theid") or die("0");

echo "1";





?>