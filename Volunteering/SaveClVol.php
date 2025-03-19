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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["FirstName"] ?? '');
    $secondName = trim($_POST["SecondName"] ?? '');
    $thirdName = trim($_POST["ThirdName"] ?? '');
    $gender = $_POST["Gender"] ?? '';
    $nationality = $_POST["Country"] ?? '';
    $dob = $_POST["DOB"] ?? '';
    $mobileNumber = trim($_POST["MobileNumber"] ?? '');
    $emailAddress = trim($_POST["EmailAddress"] ?? '');
    $understandChildDevelopment = $_POST["understandChildDevelopment"] ?? '';
    $prepareChildrenForMedicalProcedures = $_POST["preparechildrenformedicalprocedures"] ?? '';
    $communicateWithChildren = $_POST["communicatewithchildren"] ?? '';
    $startDate = $_POST["startDate"] ?? '';

    if (empty($firstName) || empty($secondName) || empty($thirdName) || empty($gender) || empty($nationality) || empty($dob) || empty($mobileNumber) || empty($emailAddress) || empty($understandChildDevelopment) || empty($prepareChildrenForMedicalProcedures) || empty($communicateWithChildren) || empty($startDate)) {
        echo "All fields are required.";
        exit();
    }

    $data = "$firstName | $secondName | $thirdName | $gender | $nationality | $dob | $mobileNumber | $emailAddress | $understandChildDevelopment | $prepareChildrenForMedicalProcedures | $communicateWithChildren | $startDate";

    if (saveFormData($data)) {
        echo "Data saved successfully!";
        header("Location: ChildLifeVolunteering.php?success=1"); 
        exit();
    } else {
        echo "Error saving data.";
    }
} else {
    echo "Invalid request.";
}
?>