<?php
 $FirstName = $_POST['FirstName'];
 $LastName=$_POST['LastName'];
 $Gender=$_POST['Gender'];
 $Country=$_POST['Country'];
 $DonationAmount=$_POST['Amount'];



 $data =$FirstName."~".
        $LastName."~".
        $Gender."~".
        $Country."~".
        $DonationAmount."\n";

$file = fopen("MoneyForm.txt","a");
fwrite($file,$data);
fclose($file);
echo "Your Form have been recieved, Thank you";
?>