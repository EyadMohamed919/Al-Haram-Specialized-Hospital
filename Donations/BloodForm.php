<?php
    $firstName = $_POST['FirstName'];
    $SecondName = $_POST['SecondName'];
    $ThirdName = $_POST['ThirdName'];
    $Gender = $_POST['Gender'];
    $Country = $_POST['Country'];
    $DOB = $_POST['DOB'];
    $MobileNumber = $_POST['MobileNumber'];
    $EmailAddress = $_POST['EmailAddress'];
    $BloodType = $_POST['BloodType'];
    $BloodDonationDate = $_POST['BloodDonationDate'];
    $DonationMethod = $_POST['DonationMethod'];
    $PostOffice = $_POST['PostOffice'];
    $PackageTrackingNumber = $_POST['PackageTrackingNumber'];

    $data = "FirstName: $FirstName\n" .
            "SecondName: $SecondName\n" .
            "ThirdName: $ThirdName\n" .
            "Gender: $Gender\n" .
            "Country: $Country\n" .
            "DOB: $DOB\n" .
            "MobileNumber: $MobileNumber\n" .
            "EmailAddress: $EmailAddress\n" .
            "BloodType: $BloodType\n" .
            "BloodDonationDate: $BloodDonationDate\n" .
            "DonationMethod: $DonationMethod\n" .
            "PostOffice: $PostOffice\n" .
            "PackageTrackingNumber: $PackageTrackingNumber\n";

    $file = fopen("BF-BE.txt", "a");
    fwrite($file, $data);
    fclose($file);

    echo "Form has been submitted, thank you very much";

?>