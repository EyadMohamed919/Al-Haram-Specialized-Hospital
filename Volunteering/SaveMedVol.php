<?php
function saveFormData($data) {
    $file = fopen("MedVol.txt", "a"); 
    if ($file) {
        fwrite($file, $data . PHP_EOL); 
        fclose($file); 
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["FirstName"] ?? '');
    $secondName = trim($_POST["SecondName"] ?? '');
    $thirdName = trim($_POST["ThirdName"] ?? '');
    $gender = $_POST["Gender"] ?? '';
    $nationality = $_POST["Country"] ?? '';
    $dob = $_POST["DOB"] ?? '';
    $mobileNumber = trim($_POST["MobileNumber"] ?? '');
    $emailAddress = trim($_POST["EmailAddress"] ?? '');

    $medicalKnowledge = isset($_POST["MedicalKnowledge"]) && is_array($_POST["MedicalKnowledge"]) 
                        ? implode(", ", $_POST["MedicalKnowledge"]) : "None";
    $interpersonalSkills = isset($_POST["InterpersonalSkills"]) && is_array($_POST["InterpersonalSkills"]) 
                           ? implode(", ", $_POST["InterpersonalSkills"]) : "None";
    $practicalSkills = isset($_POST["PracticalSkills"]) && is_array($_POST["PracticalSkills"]) 
                       ? implode(", ", $_POST["PracticalSkills"]) : "None";

    $startDate = $_POST["startDate"] ?? '';

    $data = "$firstName | $secondName | $thirdName | $gender | $nationality | $dob | $mobileNumber | $emailAddress | $medicalKnowledge | $interpersonalSkills | $practicalSkills | $startDate";

    if (saveFormData($data)) {
        echo "Data saved successfully!";
        header("Location: Medical Volunteering.php?success=1"); 
        exit();
    } else {
        echo "Error saving data.";
    }
} else {
    echo "Invalid request.";
}
?>