<?php
session_start();
include_once(__DIR__ . '/../encrypt.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required = ['FirstName', 'EmailAddress', 'MobileNumber', 'startDate'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $_SESSION['error'] = "Required fields missing";
            header("Location: MedicalVolunteering.php");
            exit();
        }
    }

    $data = [
        encrypt($_POST['FirstName'], $key),
        encrypt($_POST['SecondName'] ?? 'N/A', $key),
        encrypt($_POST['ThirdName'] ?? 'N/A', $key),
        encrypt($_POST['Gender'] ?? 'N/A', $key),
        encrypt($_POST['Country'] ?? 'N/A', $key),
        encrypt($_POST['DOB'] ?? 'N/A', $key),
        encrypt($_POST['MobileNumber'], $key),
        encrypt($_POST['EmailAddress'], $key),
        encrypt($_POST['startDate'], $key)
    ];

    file_put_contents(__DIR__ . "/MedVol.txt", implode("~", $data) . "\n", FILE_APPEND);
    $_SESSION['message'] = "Thank you for volunteering!";
    header("Location: MedicalVolunteering.php");
    exit();
}