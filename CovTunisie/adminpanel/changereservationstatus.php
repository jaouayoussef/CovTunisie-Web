
<?php

$mysqli = include "../controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$reportId = $_GET["reportid"];
$newStatus = $_GET["status"];
if($newStatus == "delete")
{
    $obj2 = $mysqli->query("DELETE FROM `reservation` WHERE `reservation`.`id` = $reportId") or die("0");
}
else
{
    $obj = $mysqli->query("UPDATE `reservation` SET `etat` = '$newStatus' WHERE `reservation`.`id` = $reportId;") or die("0");
}


echo "1";





?>