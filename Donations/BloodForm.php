<?php
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Gender = $_POST['Gender'];
    $Country = $_POST['Country'];
    $DOB = $_POST['DOB'];
    $BloodType = $_POST['BloodType'];

    $data = "\n".$FirstName."~".
            $LastName."~".
            $Gender."~".
            $Country."~".
            $DOB."~".
            $BloodType;

    $file = fopen("BF.txt", "a");
    fwrite($file, $data);
    fclose($file);
    

    echo "Form has been submitted, thank you very much";?>