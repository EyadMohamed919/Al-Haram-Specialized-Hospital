<?php

include_once (__DIR__ . '/../encrypt.php');
    $encID = Encrypt($_POST['ID'], $key);
    $encFirstName = Encrypt($_POST['FirstName'],$key);
    $encLastName = Encrypt($_POST['LastName'],$key);
    $encGender = Encrypt($_POST['Gender'],$key);
    $encCountry = Encrypt($_POST['Country'],$key);
    $encDOB = Encrypt($_POST['DOB'],$key);
    $encBloodType = Encrypt($_POST['BloodType'],$key);




        $FirstName = Decrypt($encFirstName, $key);
        $LastName = Decrypt($encLastName, $key);
        $Gender = Decrypt($encGender, $key);
        $Country = Decrypt($encCountry, $key);
        $DOB = Decrypt($encDOB, $key);
        $BloodType = Decrypt($encBloodType, $key);


        $lastID = 0;
        $lines = file("BF.txt");
        foreach ($lines as $line) {
        $arrayLine = explode("~", $line);
        if (isset($arrayLine[0])) {
        $lastID = max($lastID,$arrayLine[0]);
        }
        }
        $newID = $lastID + 1;
        $ID = $newID;


    $data = "\n".$ID ."~".
            $FirstName."~".
            $LastName."~".
            $Gender."~".
            $Country."~".
            $DOB."~".
            $BloodType;

    $file = fopen("BF.txt", "a");
    fwrite($file, $data);
    fclose($file);
    

    header("location:BloodDonBE.php") ?>