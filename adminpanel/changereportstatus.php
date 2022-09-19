
<?php

$mysqli = include "../controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$reportId = $_GET["reportid"];
$newStatus = $_GET["status"];
if($newStatus == "0" || $newStatus == "1")
{
    $obj = $mysqli->query("UPDATE `reports` SET `status` = '$newStatus' WHERE `reports`.`id` = $reportId;") or die("0");
}
else if($newStatus == "-1")
{
    $obj2 = $mysqli->query("DELETE FROM `reports` WHERE `reports`.`id` = $reportId") or die("0");
    $obj = $mysqli->query("UPDATE `infos` SET `value` = `value` + 1 WHERE `infos`.`fieldName` = 'reportsDeleted';") or die("0");
}


echo "1";





?>