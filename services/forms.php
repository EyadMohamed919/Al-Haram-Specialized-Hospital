<?php

    include_once(__DIR__ . '/../repeated.php');
    servicesSEO();
    navBar();

    var_dump($_POST);

?>
<body>
    <center style="margin-top: 10%; font-size: 5rem;">
        Thank you for submitting your form. We will get back to you as soon as possible.
    </center>
</body>
<?php
    $filePath = '';
    $formType = $_POST['formType'];
    
    if ($formType == "Appointments") {
        $filepath = 'txtFiles/appointForm.txt';
        $doc = $_POST["Doctor"];
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $sex = $_POST["Sex"]; 
        $PN = $_POST["PN"];
        $email = $_POST["Email"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
    } elseif ($formType == "Dentistry") {
        $filepath = 'txtFiles/dentForm.txt';
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $PN = $_POST["PN"];
        $email = $_POST["Email"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
    } elseif ($formType == "Oncology") {
        $filepath = 'txtFiles/oncoForm.txt';
        $treatment = $_POST["Treatment"];
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $sex = $_POST["Sex"];
        $PN = $_POST["PN"];
        $email = $_POST["Email"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
    } elseif ($formType == "Outpatient") {
        $filepath = 'txtFiles/outPatForm.txt';
        $service = $_POST["OutService"];
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $address = $_POST["Address"];
        $PN = $_POST["PN"];
        $email = $_POST["Email"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
    } elseif ($formType == "Pharmacy") {
        $filepath = 'txtFiles/pharmaForm.txt';
        $medicine = $_POST["Medicine"];
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $address = $_POST["Address"];
        $PN = $_POST["PN"];
        $email = $_POST["Email"];
    } elseif ($formType == "PrevMed") {
        $filepath = 'txtFiles/prevMedForm.txt';
        $time = $_POST["SelectTime"];
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $PN = $_POST["PN"];
        $NID = $_POST["NID"];
        $email = $_POST["Email"];
    } elseif ($formType == "Surgery") {
        $filepath = 'txtFiles/surgForm.txt';
        $SurgeryType = $_POST["SurgeryType"];
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $PN = $_POST["PN"];
        $AuthID = $_POST["AuthID"];
        $email = $_POST["Email"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
    } elseif ($formType == "Tests") {
        $filepath = 'txtFiles/testsForm.txt';
        $test = $_POST["Test"];
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $sex = $_POST["Sex"];
        $PN = $_POST["PN"];
        $email = $_POST["Email"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
    } else {
        die('Unknown form submitted.');
    }

    function getlastID($filepath)
    {
        $appointFile = fopen($filepath, 'r');
        $lastID = 0;
        while (!feof($appointFile)) {
            $oneline = fgets($appointFile);
            $Arr = explode('~', $oneline);
            if (isset($Arr[0]) && is_numeric($Arr[0])) {
                $lastID = $Arr[0];
            }
        }
        fclose($appointFile);
        return $lastID;
    }

    $lastID = getlastID($filepath);
    $newID = $lastID + 1;

    include_once(__DIR__ . '/../encrypt.php');
    $key = 123;

    date_default_timezone_set("Africa/Cairo");

    switch ($formType) {
        case "Appointments":
            $buildLine = "\n" . $newID . "~" . encrypt($doc, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($sex, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt($date, $key) . "~" . encrypt($time, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "Dentistry":
            $buildLine = "\n" . $newID . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt($date, $key) . "~" . encrypt($time, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "Oncology":
            $buildLine = "\n" . $newID . "~" . encrypt($treatment, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($sex, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt($date, $key) . "~" . encrypt($time, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "Outpatient":
            $buildLine = "\n" . $newID . "~" . encrypt($service, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($address, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt($date, $key) . "~" . encrypt($time, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "Pharmacy":
            $buildLine = "\n" . $newID . "~" . encrypt($medicine, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($address, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "PrevMed":
            $buildLine = "\n" . $newID . "~" . encrypt($time, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($NID, $key) . "~" . encrypt($email, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "Surgery":
            $buildLine = "\n" . $newID . "~" . encrypt($SurgeryType, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($AuthID, $key) . "~" . encrypt($email, $key) . "~" . encrypt($date, $key) . "~" . encrypt($time, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        case "Tests":
            $buildLine = "\n" . $newID . "~" . encrypt($test, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($sex, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt($date, $key) . "~" . encrypt($time, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
            break;
        default:
            die('Unknown form submitted.');
    }

    $appointFile = fopen($filepath, 'a+');
    fwrite($appointFile, $buildLine);
    fclose($appointFile);
?>
