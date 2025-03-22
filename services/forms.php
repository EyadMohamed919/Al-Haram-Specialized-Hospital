<?php

    include_once(__DIR__ . '/../repeated.php');
    servicesSEO();
    navBar();

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
        // $sex = $_POST["Sex"]; 
        $sex = "Male";
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

    if ($formType == "Appointments") {
        $buildLine = "\n".$newID."~".$doc."~".$firstName."~".$lastName."~".$sex."~".$PN."~".$email."~".$date."~".$time;
    } elseif ($formType == "Dentistry") {
        $buildLine = "\n".$newID."~".$firstName."~".$lastName."~".$PN."~".$email."~".$date."~".$time;
    } elseif ($formType == "Oncology") {
        $buildLine = "\n".$newID."~".$treatment."~".$firstName."~".$lastName."~".$sex."~".$PN."~".$email."~".$date."~".$time;
    } elseif ($formType == "Outpatient") {
        $buildLine = "\n".$newID."~".$service."~".$firstName."~".$lastName."~".$address."~".$PN."~".$email."~".$date."~".$time;
    } elseif ($formType == "Pharmacy") {
        $buildLine = "\n".$newID."~".$medicine."~".$firstName."~".$lastName."~".$address."~".$PN."~".$email;
    } elseif ($formType == "PrevMed") {
        $buildLine = "\n".$newID."~".$time."~".$firstName."~".$lastName."~".$PN."~".$NID."~".$email;
    } elseif ($formType == "Surgery") {
        $buildLine = "\n".$newID."~".$SurgeryType."~".$firstName."~".$lastName."~".$PN."~".$AuthID."~".$email."~".$date."~".$time;
    } elseif ($formType == "Tests") {
        $buildLine = "\n".$newID."~".$test."~".$firstName."~".$lastName."~".$sex."~".$PN."~".$email."~".$date."~".$time;
    }

    $appointFile = fopen($filepath, 'a+');
    fwrite($appointFile, $buildLine);
    fclose($appointFile);
?>
