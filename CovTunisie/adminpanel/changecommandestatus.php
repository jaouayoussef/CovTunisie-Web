
<?php

$mysqli = include "../controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$ID = $_GET["id"];
$newStatus = $_GET["status"];
if($newStatus == "0" || $newStatus == "1")
{
    $obj = $mysqli->query("UPDATE `commandes` SET `etat` = '$newStatus' WHERE `commandes`.`id` = $ID;") or die("0");
}
else if($newStatus == "-1")
{
    $obj2 = $mysqli->query("DELETE FROM `commandes` WHERE `commandes`.`id` = $ID") or die("0");
}


echo "1";





?>