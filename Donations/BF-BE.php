<?php
$DonationID=$_POST["DonationID"];
$DonatorsName= $_POST["DonatorsName"];
$BloodType =$_POST["BloodType"];
$DonationDate = $_POST["DonationDate"];
$DonationCountry = $_POST["DonationCountry"];



 $data = "DonationID : $DonationID\n" .
         "DonatorsName :  $DonatorsName\n" .
         "BloodType: $BloodType\n" .
         "DonationDate: $DonationDate\n" .
         "DonationCountry: $DonationCountry\n";

$file = fopen("BF.txt","a");
fwrite($file,$data);
fclose($file);
header("Location: BloodDonBE.php"); // Reload the page
    exit();
?>