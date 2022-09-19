
<?php

$mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$theid = $_GET["id"];

$obj2 = $mysqli->query("DELETE FROM `commandes` WHERE `commandes`.`id` = $theid") or die("0");

echo "1";





?>