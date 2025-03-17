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
    $firstName = $_POST["FirstName"] ?? '';
    $secondName = $_POST["SecondName"] ?? '';
    $thirdName = $_POST["ThirdName"] ?? '';
    $gender = $_POST["Gender"] ?? '';
    $nationality = $_POST["Country"] ?? '';
    $dob = $_POST["DOB"] ?? '';
    $mobileNumber = $_POST["MobileNumber"] ?? '';
    $emailAddress = $_POST["EmailAddress"] ?? '';
    
    $medicalKnowledge = is_array($_POST["MedicalKnowledge"] ?? null) ? implode(", ", $_POST["MedicalKnowledge"]) : $_POST["MedicalKnowledge"] ?? '';
    $interpersonalSkills = is_array($_POST["InterpersonalSkills"] ?? null) ? implode(", ", $_POST["InterpersonalSkills"]) : $_POST["InterpersonalSkills"] ?? '';
    $practicalSkills = is_array($_POST["PracticalSkills"] ?? null) ? implode(", ", $_POST["PracticalSkills"]) : $_POST["PracticalSkills"] ?? '';

    $startDate = $_POST["startDate"] ?? '';

    $data = "First Name: $firstName | Second Name: $secondName | Third Name: $thirdName | Gender: $gender | Nationality: $nationality | DOB: $dob | Mobile: $mobileNumber | Email: $emailAddress | Medical Knowledge: $medicalKnowledge | Interpersonal Skills: $interpersonalSkills | Practical Skills: $practicalSkills | Start Date: $startDate";

    if (saveFormData($data)) {
        echo "Data saved successfully!";
    } else {
        echo "Error saving data.";
    }
} else {
    echo "Invalid request.";
}
?>