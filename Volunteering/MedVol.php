<?php
// Function to save form data to a file
function saveFormData($data) {
    $file = fopen("MedVol.txt", "a"); // Open file in append mode
    if ($file) {
        fwrite($file, $data . PHP_EOL); // Write data to the file
        fclose($file); // Close the file
        return true;
    } else {
        return false;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST["FirstName"];
    $secondName = $_POST["SecondName"];
    $thirdName = $_POST["ThirdName"];
    $gender = $_POST["Gender"];
    $nationality = $_POST["Country"];
    $dob = $_POST["DOB"];
    $mobileNumber = $_POST["MobileNumber"];
    $emailAddress = $_POST["EmailAddress"];
    $medicalKnowledge = implode(", ", $_POST["MedicalKnowledge"] ?? []); // Handle checkboxes
    $interpersonalSkills = implode(", ", $_POST["InterpersonalSkills"] ?? []); // Handle checkboxes
    $practicalSkills = implode(", ", $_POST["PracticalSkills"] ?? []); // Handle checkboxes
    $startDate = $_POST["startDate"];

    // Format the data as a string
    $data = "First Name: $firstName | Second Name: $secondName | Third Name: $thirdName | Gender: $gender | Nationality: $nationality | DOB: $dob | Mobile: $mobileNumber | Email: $emailAddress | Medical Knowledge: $medicalKnowledge | Interpersonal Skills: $interpersonalSkills | Practical Skills: $practicalSkills | Start Date: $startDate";

    // Save the data to the file
    if (saveFormData($data)) {
        echo "Data saved successfully!";
    } else {
        echo "Error saving data.";
    }
} else {
    echo "Invalid request.";
}
?>