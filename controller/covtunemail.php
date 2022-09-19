<?php


if($_GET["psw"]!="foreveralone")
{
    die("no");

}

$email = $_GET["email"];
$to = $email;
$subject = "Report Submitted";

$htmlContent = file_get_contents("reportcovtun.html");




$variablestoreplace = array("Iyed Ben Hadj Dahmen");
$whattoreplacewith   = array($_GET["name"]);

$htmlContent = str_replace($variablestoreplace, $whattoreplacewith, $htmlContent);






$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: no-reply@playpals.io" . "\r\n";
mail($to, $subject, $htmlContent, $headers);
//header('location: pending.php?email=' . $email);

die("yes");



?>
