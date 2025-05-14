<?php
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Gender = $_POST['Gender'];
$Country=$_POST['Country'];
$DOB = $_POST['DOB'];
$OrganDonated=$_POST['OrganDonated'];

$data = 
"\n".$FirstName."~".
$LastName."~".
$Gender."~".
$Country."~".
$DOB."~".
$OrganDonated;

$file=fopen("OrganFile.txt","a");
fwrite($file,$data);
fclose($file);

echo "Thank you, the form have been sumbmitted successfully"
?>
