<?php

$firstName = $_POST['FirstName'];
$secondName = $_POST['SecondName'];
$thirdName = $_POST['ThirdName'];
$gender = $_POST['Gender'];
$nationality = $_POST['Country'];
$dob = $_POST['DOB'];
$mobileNumber = $_POST['MobileNumber'];
$emailAddress = $_POST['EmailAddress'];
$medicalKnowledge = implode(", ", $_POST['MedicalKnowledge']);
$interpersonalSkills = implode(", ", $_POST['InterpersonalSkills']);
$practicalSkills = implode(", ", $_POST['PracticalSkills']);
$startDate = $_POST['startDate'];

$data = "First Name: $firstName\n" .
        "Second Name: $secondName\n" .
        "Third Name: $thirdName\n" .
        "Gender: $gender\n" .
        "Nationality: $nationality\n" .
        "Date of Birth: $dob\n" .
        "Mobile Number: $mobileNumber\n" .
        "Email Address: $emailAddress\n" .
        "Medical Knowledge: $medicalKnowledge\n" .
        "Interpersonal Skills: $interpersonalSkills\n" .
        "Practical Skills: $practicalSkills\n" .
        "Start Date: $startDate\n\n";

$file = fopen("MedVol.txt", "a"); 
fwrite($file, $data);
fclose($file);

echo "Thank you for submitting the form!";
?>