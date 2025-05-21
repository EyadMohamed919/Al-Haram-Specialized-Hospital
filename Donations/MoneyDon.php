<?php
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



 $data ="\n".$ID."~".
        $FirstName."~".
        $LastName."~".
        $Gender."~".
        $Country."~".
        $DonationAmount;

$file = fopen("MoneyForm.txt","a");
fwrite($file,$data);
fclose($file);
header("location:MoneyDonBE.php");
?>