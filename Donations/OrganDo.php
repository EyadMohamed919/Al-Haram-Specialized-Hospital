<?php
include_once (__DIR__ . '/../encrypt.php');

$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Gender = $_POST['Gender'];
$Country=$_POST['Country'];
$DOB = $_POST['DOB'];
$OrganDonated=$_POST['OrganDonated'];



$lastID = 0;
$lines = file("OrganFile.txt");
foreach ($lines as $line) {
$arrayLine = explode("~", $line);
if (isset($arrayLine[0])) {
$lastID = max($lastID,$arrayLine[0]);
            }
        }
$newID = $lastID + 1;
$ID = $newID;



$data = 
$ID."~".
encrypt($FirstName, $key)."~".
encrypt($LastName,$key)."~".
encrypt($Gender,$key)."~".
encrypt($Country, $key)."~".
encrypt($DOB,$key)."~".
encrypt($OrganDonated ,$key)."\n";

$file=fopen("OrganFile.txt","a");
fwrite($file,$data);
fclose($file);

header("location:OrganDonBE.php");
?>
