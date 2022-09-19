
<?php

$mysqli = include "../controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$theid = $_GET["id"];

$obj2 = $mysqli->query("DELETE FROM `livreurr` WHERE `livreurr`.`id` = $theid") or die("0");

echo "1";





?>