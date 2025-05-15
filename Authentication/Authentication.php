<?php
include("GlobalFunctions.php");
$email = $_POST["email"];
$password = $_POST["password"];

if(str_contains($email, "@hospital.com")) 
{
    $file = fopen("AdminUserTextFile.txt", "r");
    $checker = checkUser($file, $email, $password);
    if($checker[0] == true)
    {
        echo "Admin and Logged in";
        session_start();
        $_SESSION["Logged"] = true;
        $_SESSION["UserName"] = $checker[1];
        $_SESSION["Admin"] = true;
        header("location: ../Admin/AdminMain.php");
    }
    else
    {
        echo "Admin but not correct";
        session_start();
        $_SESSION["Logged"] = false;
        header("location: ../Login.php");
    }
}
else
{
    $file = fopen("UserTextFile.txt", "r");
    $checker = checkUser($file, $email, $password);
    if($checker[0] == true)
    {
        echo "User and logged in";
        session_start();
        $_SESSION["Logged"] = true;
        $_SESSION["UserName"] = $checker[1];
        $_SESSION["Admin"] = false;
        header("location: ../index.php");
    }
    else
    {
        echo "User but not correct";
        session_start();
        $_SESSION["Logged"] = false;
        header("location: ../Login.php");
    }
}

 ?>
