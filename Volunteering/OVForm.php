<?php
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = sanitizeInput($_POST['FirstName'] ?? '');
    $secondName = sanitizeInput($_POST['SecondName'] ?? '');
    $thirdName = sanitizeInput($_POST['ThirdName'] ?? '');
    $gender = sanitizeInput($_POST['Gender'] ?? '');
    $nationality = sanitizeInput($_POST['Country'] ?? '');
    $dob = sanitizeInput($_POST['DOB'] ?? '');
    $mobileNumber = sanitizeInput($_POST['MobileNumber'] ?? '');
    $emailAddress = sanitizeInput($_POST['EmailAddress'] ?? '');
    $startDate = sanitizeInput($_POST['startDate'] ?? '');

    if (empty($firstName) || empty($emailAddress) || empty($mobileNumber) || empty($startDate)) {
        die("Error: All required fields must be filled.");
    }

    $data = 
        "First Name: $firstName\n" .
        "Second Name: $secondName\n" .
        "Third Name: $thirdName\n" .
        "Gender: $gender\n" .
        "Nationality: $nationality\n" .
        "DOB: $dob\n" .
        "Mobile Number: $mobileNumber\n" .
        "Email Address: $emailAddress\n" .
        "Start Date: $startDate\n" .
        "-------------------------\n";

    $filePath = __DIR__ . "/OfcVol.txt"; 

    $file = fopen($filePath, "a");
    if (!$file) {
        die("Error: Unable to open file for writing.");
    }

    fwrite($file, $data);
    fclose($file);

    header("Location: OfficeVolunteering.php");
    exit(); 
    echo "Invalid request.";
}
?>
