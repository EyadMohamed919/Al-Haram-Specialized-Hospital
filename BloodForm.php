<?php
$DonationID=$_POST['DonationID'];
$DonatorsName=$_POST['DonatorsName'];
$BloodType=$_POST['BloodType'];
$DonationDate=$_POST['DonationDate'];
$DonationCountry=$_POST['DonationCountry'];


$data = 
"Donation_ID:$DonationID\n" .
"Donator_name : $DonatorsName\n".
"BloodType : $BloodType\n".
"Donation_Date : $DonationData\n".
"Donators_Country : $DonationCountry\n".



$file= fopen("Bloodtype_Form.txt","a");
fwrite($file,$data);
fclose($file);


echo "Form have been submitted, thank you very much"
?>