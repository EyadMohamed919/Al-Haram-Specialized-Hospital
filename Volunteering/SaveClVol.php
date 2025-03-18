<?php
function saveFormData($data) {
    $file = fopen("ClVol.txt", "a"); 
    if ($file) {
        fwrite($file, $data . PHP_EOL); 
        fclose($file); 
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $firstName = trim($_GET["FirstName"] ?? '');
    $secondName = trim($_GET["SecondName"] ?? '');
    $thirdName = trim($_GET["ThirdName"] ?? '');
    $gender = $_GET["Gender"] ?? '';
    $nationality = $_GET["Country"] ?? '';
    $dob = $_GET["DOB"] ?? '';
    $mobileNumber = trim($_GET["MobileNumber"] ?? '');
    $emailAddress = trim($_GET["EmailAddress"] ?? '');
    $understandChildDevelopment = $_GET["understandChildDevelopment"] ?? '';
    $prepareChildrenForMedicalProcedures = $_GET["preparechildrenformedicalprocedures"] ?? '';
    $communicateWithChildren = $_GET["communicatewithchildren"] ?? '';
    $startDate = $_GET["startDate"] ?? '';

    $data = "$firstName | $secondName | $thirdName | $gender | $nationality | $dob | $mobileNumber | $emailAddress | $understandChildDevelopment | $prepareChildrenForMedicalProcedures | $communicateWithChildren | $startDate";

    if (saveFormData($data)) {
        echo "Data saved successfully!";
        header("Location: ChildLifeVolForm.html?success=1"); 
        exit();
    } else {
        echo "Error saving data.";
    }
} else {
    echo "Invalid request.";
}
?>