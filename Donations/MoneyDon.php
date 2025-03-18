<?php
 $firstName = $_POST['FirstName'];
 $SecondName=$_POST['SecondName'];
 $ThirdName=$_POST['ThirdName'];
 $Gender=$_POST['Gender'];
 $Country=$_POST['Country'];
 $DOB=$_POST['DOB'];
 $MobileNumber=$_POST['MobileNumber'];
 $EmailAddress=$_POST['EmailAddress'];
 $PaymentMethod=$_POST['PaymentMethod'];
 $DonationAmount=$_POST['Amount'];



 $data = "FisrtName : $firstName\n" .
         "SecondName :  $SecondName\n" .
         "ThirdName: $ThirdName\n" .
         "Gender: $Gender\n" .
         "Country: $Country\n" .
         "DOB: $DOB\n" .
         "MobileNumber: $MobileNumber\n" .
         "EmailAddress: $EmailAddress\n" .
         "PaymentMethod: $PaymentMethod\n" .
         "DonationAmount: $DonationAmount\n" ;

$file = fopen("MoneyForm.txt","a");
fwrite($file,$data);
fclose($file);


echo "Your Form have been recieved, Thank you";




?>