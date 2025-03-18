<?php


$DonationID = $_POST['DonationID'];
$DonatorsName =$_POST ['DonatorsName'];
$Organ = $_POST['Organ'];
$DonationDate = $_POST['DonationDate'];
$DonationCountry = $_POST['DonationCountry'];


$data = 
        "DonationID : $DonationID\n".
        "DonatorsName : $DonatorsName\n".
        "Organ : $Organ\n".
        "DonationDate : $DonationDate\n".
        "DonationCountry : $DonationCountry\n";

$file = fopen("OBE.txt","a");
fwrite($file, $data);
fclose($file);
?>