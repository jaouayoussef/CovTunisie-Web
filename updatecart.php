
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["loggeduser"]))
{
die();
}
$mysqli = include "controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();


$cartdata = $_GET["cartdata"];
$userid = $_SESSION["loggeduser"]["id"];
$cartdata =  $mysqli->real_escape_string($cartdata);

$obj = $mysqli->query("INSERT INTO `cart` (`userid`, `cartdata`) VALUES ('$userid', '$cartdata') ON DUPLICATE KEY UPDATE cartdata = '$cartdata';");
if(!$obj)
    {
        echo("Error description: " . $mysqli -> error);
        die();
    }
echo "1";





?>