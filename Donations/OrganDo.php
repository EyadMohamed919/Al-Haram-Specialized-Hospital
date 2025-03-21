<?php
$FirstName=$_POST['FirstName'];
$SecondName=$_POST['SecondName'];
$ThirdName=$_POST['ThirdName'];
$Gender = $_POST['Gender'];
$Country=$_POST['Country'];
$DOB = $_POST['DOB'];
$MobileNumber=$_POST['MobileNumber'];
$EmailAddress=$_POST['EmailAddress'];
$OrganDonated0=$_POST['organSelection'];
$SurgeryDate=$_POST['SurgeryDate'];
$DonationMethod=$_POST['DonationMethod'];
$PostOffice=$_POST['PostOffice'];
$PackageTrackingNumber=$_POST['PackageTrackingNumber'];

$data = 
"FirstName:$FirstName \n".
"SecondName:$SecondName \n".
"ThirdName:$ThirdName \n".
"Gender:$Gender \n".
"Country:$Gender\n".
"DOB:$DOB \n".
"MobileNumber:$MobileNumber\n".
"EmailAddress:$EmailAddress\n".

"OrganDonated0:$OrganDonated0\n".
"SurgeryDate:$SurgeryDate\n".
"DonationMethod:$DonationMethod\n".
"PostOffice:$PostOffice\n". 
"PackageTrackingNumber=$PackageTrackingNumber";

$file=fopen("OrganFile.txt","a");
fwrite($file,$data);
fclose($file);

echo "Thank you, the form have been sumbmitted successfully"
?>
