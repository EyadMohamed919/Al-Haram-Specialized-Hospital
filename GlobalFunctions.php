<?php

// Routing requests
if(isset($_POST["contactUsSubmit"]))
{
    contactUsReciever();
}
else if(isset($_POST["login"]))
{
    authentication();
}
else if(isset($_POST["addAdmin"]))
{
    addAdmin();
}

function checkUser($file, $email, $password)
{
    $result = [];
    while(!feof($file))
    {
        $line = fgets($file);
        $userLine = explode("~", $line);
        if($email == $userLine[2] && $password == $userLine[3])
        {   
            $result[0] = true;
            $result[1] = $userLine[1];
            return $result;
        }
        
    }
    $result[0] = false;
    return $result;
}

function lastID($file)
{
    $id = 0;
    while(!feof($file))
    {
        $line = fgets($file);
        $Arrayline = explode("~", $line);
        if($Arrayline[0] != "")
        {
            $id = $Arrayline[0];
        }
    }
    echo var_dump($id);
    return $id;
}

function contactUsReciever()
{
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $Gaddress = $_POST["Gaddress"];
    $Caddress = $_POST["Caddress"];
    $type = $_POST["type"];
    $message = $_POST["message"];

    $file = fopen("Database/Messages.txt", "a+");
    $lastID = lastID($file) + 1;

    if($lastID == 1)
    {
        $newMessage = $lastID . "~" . $Fname . "~" 
    . $Lname . "~" . $email . "~" . $phone . "~" . $Gaddress . "~"
    . $Caddress . "~" . $type . "~" . $message;
    }
    else
    {
        $newMessage = "\n" . $lastID . "~" . $Fname . "~" 
    . $Lname . "~" . $email . "~" . $phone . "~" . $Gaddress . "~"
    . $Caddress . "~" . $type . "~" . $message . "\n";
    }
    
    fwrite($file, $newMessage);
    fclose($file);
    header("location:index.php");
}

function sendContactUsMessages()
{
    $file = fopen("../Database/Messages.txt", "r+");
    echo "Hello world";
    $fileArray = [];
    $i = 0;
    while(!feof($file))
    {
        $line = trim(fgets($file));
        $ArrayLine = explode("~", $line);
        echo $ArrayLine[3];
        echo "MOZA";
        $fileArray[$i] = array(
            "id"=>$ArrayLine[0], 
            "fname"=>$ArrayLine[1],
            "lname"=>$ArrayLine[2], 
            "email"=>$ArrayLine[3],
            "phone"=>$ArrayLine[4], 
            "Gaddress"=>$ArrayLine[5],
            "Caddress"=>$ArrayLine[6], 
            "type"=>$ArrayLine[7], 
            "message"=>$ArrayLine[8]);
        $i++;
    }

    fclose($file); 
    return $fileArray;
}


function authentication()
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = md5($password);

    if(str_contains($email, "@hospital.com")) 
    {
        $file = fopen("Database/AdminUserTextFile.txt", "r");
        $checker = checkUser($file, $email, $password);
        if($checker[0] == true)
        {
            echo "Admin and Logged in";
            session_start();
            $_SESSION["Logged"] = true;
            $_SESSION["UserName"] = $checker[1];
            $_SESSION["UserEmail"] = $email;
            $_SESSION["Admin"] = true;

            if($checker[1] == "hamada")
            {
                $_SESSION["TopAdmin"] = true;
            }
            else
            {
                $_SESSION["TopAdmin"] = true;
            }
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
        $file = fopen("Database/UserTextFile.txt", "r");
        $checker = checkUser($file, $email, $password);
        if($checker[0] == true)
        {
            echo "User and logged in";
            session_start();
            $_SESSION["Logged"] = true;
            $_SESSION["UserName"] = $checker[1];
            $_SESSION["UserEmail"] = $email;
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
}

function addAdmin()
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $access = $_POST["access"];
    $file = fopen("Database/AdminUserTextFile.php", "a+");
    $lastID = lastID($file);
    $newAdmin = "\n" . $lastID . "~" . $name . "~" . $email . "~" . md5("123");
    fwrite($file, $newAdmin);
    fclose($file);
    header("location:Admin/AdminUsers.php");
}

?>