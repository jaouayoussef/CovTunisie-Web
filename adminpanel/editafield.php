
<?php

$mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$fieldName = $_GET["fieldName"];
$value = $_GET["value"];
$action = $_GET["action"];

$orgField = "null";
if(isset($_GET["orgFieldName"]))
{
    $orgField = $_GET["orgFieldName"];

}


switch($action)
{
    case "save":
        if($orgField == "null")
        {
            $obj = $mysqli->query("INSERT INTO `infos` (`fieldName`, `value`) VALUES ('$fieldName', '$value') ON DUPLICATE KEY UPDATE `fieldName` = '$fieldName';");
        }
        else
        {
            $obj = $mysqli->query("UPDATE `infos` SET `fieldName` = '$fieldName',`value` = '$value' WHERE `infos`.`fieldName` = '$orgField';");
            if(!$obj)
            {
                echo("Error description: " . $mysqli -> error);
                die();
            }
        
        }
    break;
    case "del":
        $obj = $mysqli->query("DELETE FROM `infos` WHERE `infos`.`fieldName` = $fieldName") or die("err2");
    break;
}

echo "1";





?>