<?php
session_start();
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
        $_POST['FirstName'],
        $_POST['SecondName'] ?? 'N/A',
        $_POST['ThirdName'] ?? 'N/A',
        $_POST['Gender'] ?? 'N/A',
        $_POST['Country'] ?? 'N/A',
        $_POST['DOB'] ?? 'N/A',
        $_POST['MobileNumber'],
        $_POST['EmailAddress'],
        $_POST['startDate']
    ];

    file_put_contents(__DIR__."/MedVol.txt", implode("~", $data)."\n", FILE_APPEND);
    $_SESSION['message'] = "Thank you for volunteering!";
    header("Location: MedicalVolunteering.php");
    exit();
}