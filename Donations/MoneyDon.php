<?php
include_once (__DIR__ . '/../encrypt.php');
 $ID = $_POST['ID'];
 $FirstName = $_POST['FirstName'];
 $LastName=$_POST['LastName'];
 $Gender=$_POST['Gender'];
 $Country=$_POST['Country'];
 $DonationAmount=$_POST['DonationAmount'];




        $lastID = 0;
                $lines = file("MoneyForm.txt");
                foreach ($lines as $line) {
                $arrayLine = explode("~", $line);
                if (isset($arrayLine[0])) {
                $lastID = max($lastID,$arrayLine[0]);
                }
                }
                $newID = $lastID + 1;
                $ID = $newID;



 $data =$ID . "~" . 
        encrypt($FirstName, $key) . "~" .
        encrypt($LastName, $key) . "~" .
        encrypt($Gender, $key) . "~" .
        encrypt($Country, $key) . "~" .
        encrypt($DonationAmount,$key). "\n";

$file = fopen("MoneyForm.txt","a");
fwrite($file,$data);
fclose($file);
header("location:MoneyDonBE.php");
?>