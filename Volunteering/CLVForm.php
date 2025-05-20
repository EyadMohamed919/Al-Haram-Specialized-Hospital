<?php
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName     = isset($_POST['FirstName'])     ? sanitizeInput($_POST['FirstName'])     : 'N/A';
    $secondName    = isset($_POST['SecondName'])    ? sanitizeInput($_POST['SecondName'])    : 'N/A';
    $thirdName     = isset($_POST['ThirdName'])     ? sanitizeInput($_POST['ThirdName'])     : 'N/A';
    $gender        = isset($_POST['Gender'])        ? sanitizeInput($_POST['Gender'])        : 'N/A';
    $nationality   = isset($_POST['Country'])       ? sanitizeInput($_POST['Country'])       : 'N/A';
    $dob           = isset($_POST['DOB'])           ? sanitizeInput($_POST['DOB'])           : 'N/A';
    $mobileNumber  = isset($_POST['MobileNumber'])  ? sanitizeInput($_POST['MobileNumber'])  : 'N/A';
    $emailAddress  = isset($_POST['EmailAddress'])  ? sanitizeInput($_POST['EmailAddress'])  : 'N/A';
    $startDate     = isset($_POST['startDate'])     ? sanitizeInput($_POST['startDate'])     : 'N/A';
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