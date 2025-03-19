<?php
 $DonationID = $_POST['DonationID'];
 $DonatorsName=$_POST['DonatorsName'];
 $DonationAmount=$_POST['DonationAmount'];
 $DonationDate=$_POST['DonationDate'];
 $DonationCountry=$_POST['DonationCountry'];



 $data = "DonationID : $DonationID\n" .
         "DonatorsName :  $DonatorsName\n" .
         "DonationAmount: $DonationAmount\n" .
         "DonationDate: $DonationDate\n" .
         "DonationCountry: $DonationCountry\n";

$file = fopen("MBE.txt","a");
fwrite($file,$data);
fclose($file);
echo"Record Have been added!!";
?>