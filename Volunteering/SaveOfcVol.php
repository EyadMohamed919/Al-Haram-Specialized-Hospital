<?php
function saveFormData($data) {
    $file = fopen("OfcVol.txt", "a"); 
    if ($file) {
        fwrite($file, $data . PHP_EOL); 
        fclose($file); 
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {  
    // Collect form data
    $firstName = $_GET["FirstName"] ?? '';
    $secondName = $_GET["SecondName"] ?? '';
    $thirdName = $_GET["ThirdName"] ?? '';
    $gender = $_GET["Gender"] ?? '';
    $nationality = $_GET["Country"] ?? '';
    $dob = $_GET["DOB"] ?? '';
    $mobileNumber = $_GET["MobileNumber"] ?? '';
    $emailAddress = $_GET["EmailAddress"] ?? '';
    $computerSkills = $_GET["ComputerSkills"] ?? '';
    $organizationSkills = $_GET["OrganizationSkills"] ?? '';
    $attentionToDetails = $_GET["AttentionToDetails"] ?? '';
    $positiveAttitude = $_GET["PositiveAttitude"] ?? '';
    $confidence = $_GET["Confidence"] ?? '';
    $startDate = $_GET["startDate"] ?? '';

    $data = "$firstName | $secondName | $thirdName | $gender | $nationality | $dob | $mobileNumber | $emailAddress | $computerSkills | $organizationSkills | $attentionToDetails | $positiveAttitude | $confidence | $startDate";

    if (saveFormData($data)) {
        echo "Data saved successfully!";
    } else {
        echo "Error saving data.";
    }
} else {
    echo "Invalid request.";
}
?>