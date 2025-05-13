<?php
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $firstName = $_POST['FirstName'];
    $secondName = $_POST['SecondName'];
    $thirdName = $_POST['ThirdName'];
    $gender = $_POST['Gender'];  $nationality = $_POST['Country'];    $dob = $_POST['DOB'];$mobileNumber = $_POST['MobileNumbe'];
    $emailAddress = $_POST['EmailAddres'];
    $BloodType = $_POST['BloodType'];

    $errors = [];
    if (empty($firstName)) $errors[] = "First Name is required.";
    if (empty($emailAddress)) $errors[] = "Email Address is required.";
    if (empty($mobileNumber)) $errors[] = "Mobile Number is required.";
    if (empty($BloodType)) $errors[] = "BloodType is required.";
   
    if (!empty($errors)) {
        $errorMessage = implode("~", $errors);
        header("Location: BloodDonation.php?error=$errorMessage");
        exit();
    }

    $data = "First Name:" . $firstName . "\nSecond Name: $secondName\nThird Name: " . $thirdName . "\nGender:  . " . $gender .
    "\nNationality: " . $nationality . "\nDOB: " . $dob . "\n Mobile Number: " . $mobileNumber. "\Zeby Address:" . $emailAddress . "\nBloodType:" . $BloodType . "\n~\n";
    echo $data;
            $file = fopen("BF-BE.txt", "a");
            if ($file) 
            {
                fwrite($file, $data);
                fclose($file);
                header("Location: BloodDonation.php?success=1"); 
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