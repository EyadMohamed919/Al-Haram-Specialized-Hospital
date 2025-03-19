<?php
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $firstName = sanitizeInput($_POST['FirstName'] ?? 'N/A');
    $secondName = sanitizeInput($_POST['SecondName'] ?? 'N/A');
    $thirdName = sanitizeInput($_POST['ThirdName'] ?? 'N/A');
    $gender = sanitizeInput($_POST['Gender'] ?? 'N/A');
    $nationality = sanitizeInput($_POST['Country'] ?? 'N/A');
    $dob = sanitizeInput($_POST['DOB'] ?? 'N/A');
    $mobileNumber = sanitizeInput($_POST['MobileNumber'] ?? 'N/A');
    $emailAddress = sanitizeInput($_POST['EmailAddress'] ?? 'N/A');
    $startDate = sanitizeInput($_POST['startDate'] ?? 'N/A');

    $errors = [];
    if (empty($firstName)) $errors[] = "First Name is required.";
    if (empty($emailAddress)) $errors[] = "Email Address is required.";
    if (empty($mobileNumber)) $errors[] = "Mobile Number is required.";
    if (empty($startDate)) $errors[] = "Start Date is required.";

    if (!empty($errors)) {
        $errorMessage = urlencode(implode(", ", $errors));
        header("Location: ChildLifeVolunteering.php?error=$errorMessage");
        exit();
    }

    $data = "First Name: $firstName\n" .
            "Second Name: $secondName\n" .
            "Third Name: $thirdName\n" .
            "Gender: $gender\n" .
            "Nationality: $nationality\n" .
            "DOB: $dob\n" .
            "Mobile Number: $mobileNumber\n" .
            "Email Address: $emailAddress\n" .
            "Start Date: $startDate\n" .
            "-------------------------\n";

    $file = fopen("ClVol.txt", "a");
    if ($file) 
    {
        fwrite($file, $data);
        fclose($file);
        header("Location: ChildLifeVolunteering.php?success=1"); 
        exit();
    } 
    else 
    {
        echo "<h3>Error: Unable to save your form. Please try again later.</h3>";
    }
} 
else 
{
    echo "<h3>Invalid request.</h3>";
}
?>