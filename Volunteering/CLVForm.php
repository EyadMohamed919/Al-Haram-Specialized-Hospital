<?php
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = sanitizeInput($_POST['FirstName'] ?? 'N/A');
    $secondName = sanitizeInput($_POST['SecondName'] ?? 'N/A');
    $thirdName = sanitizeInput($_POST['ThirdName'] ?? 'N/A');
    $gender = sanitizeInput($_POST['Gender'] ?? 'N/A');
    $nationality = sanitizeInput($_POST['Country'] ?? 'N/A');
    $dob = sanitizeInput($_POST['DOB'] ?? 'N/A');
    $mobileNumber = sanitizeInput($_POST['MobileNumber'] ?? 'N/A');
    $emailAddress = sanitizeInput($_POST['EmailAddress'] ?? 'N/A');
    $startDate = sanitizeInput($_POST['startDate'] ?? 'N/A');

    if (empty($firstName) || empty($emailAddress) || empty($mobileNumber) || empty($startDate)) {
        die("Error: All required fields must be filled.");
    }

    $data = "$firstName~$secondName~$thirdName~$gender~$nationality~$dob~$mobileNumber~$emailAddress~$startDate\n";

    $filePath = __DIR__ . "/ClVol.txt";
    $file = fopen($filePath, "a");
    if (!$file) {
        die("Error: Unable to open file for writing.");
    }

    fwrite($file, $data);
    fclose($file);
    header("Location: ChildLifeVolunteering.php");
    exit();
}
?>