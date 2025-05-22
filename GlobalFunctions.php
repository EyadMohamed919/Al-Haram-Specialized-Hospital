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
else if(isset($_POST["updateAdmin"]))
{
    updateAdmin();
}
else if(isset($_POST["deleteAdmin"]))
{
    foreach($_POST["delArray"] as $idArray)
    {
        deleteAdmin($idArray);
    }
}

function checkAdminUser($file, $email, $password)
{
    $result = [];
    while(!feof($file))
    {
        
        $line = fgets($file);
        $userLine = explode("~", $line);
        if($email == $userLine[2] && $password == trim($userLine[4]))
        {   
            $result[0] = true;
            $result[1] = $userLine[1]; 
            $result[2] = $userLine[3];
            return $result;
        }
        
    }
    $result[0] = false;
    return $result;
}

function checkUser($file, $email, $password)
{
    $result = [];
    while(!feof($file))
    {
        
        $line = fgets($file);
        $userLine = explode("~", $line);
        if($email == $userLine[2] && $password == trim($userLine[3]))
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
   
    $fileArray = [];
    $i = 0;
    while(!feof($file))
    {
        $line = trim(fgets($file));
        $ArrayLine = explode("~", $line);
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
        $file = fopen("Database/AdminUserTextFile.txt", "r+");
        $checker = checkAdminUser($file, $email, $password);
        var_dump($checker);
        if($checker[0] == true)
        {
            echo "Admin and Logged in";
            session_start();
            $_SESSION["Logged"] = true;
            $_SESSION["UserName"] = $checker[1];
            $_SESSION["UserEmail"] = $email;
            $_SESSION["Admin"] = true;
            $_SESSION["Access"] = $checker[2];

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
        $file = fopen("Database/UserTextFile.txt", "r+");
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
    $file = fopen("Database/AdminUserTextFile.txt", "a+");
    $lastID = lastID($file) + 1;
    $newAdmin = "\n" . $lastID . "~" . $name . "~" . $email . "~" . $access . "~". md5("123");
    fwrite($file, $newAdmin);
    fclose($file);
    header("location:Admin/AdminUsers.php");
}

function sendAdminUsers()
{
    $file = fopen("../Database/AdminUserTextFile.txt", "r+");
    $fileArray = [];
    $i = 0;
    while(!feof($file))
    {
        $line = trim(fgets($file));
        $ArrayLine = explode("~", $line);

        $fileArray[$i] = array(
            "id"=>$ArrayLine[0], 
            "name"=>$ArrayLine[1],
            "email"=>$ArrayLine[2],
            "access"=>$ArrayLine[3]);
        $i++;
    }

    fclose($file); 
    return $fileArray;
}

function updateRecord($file, $newRecord, $oldRecord)
{
    $contents = file_get_contents($file);
    $contents = str_replace($oldRecord, $newRecord, $contents);
    file_put_contents($file, trim($contents));
}

function deleteRecord($file, $record)
{
    $contents = file_get_contents($file);
    $contents = str_replace($record, "", $contents);
    file_put_contents($file, trim($contents));
}

function updateAdmin()
{   
    $file = fopen("Database/AdminUserTextFile.txt", "r+");
    $id  = $_POST["id"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $access = $_POST["access"];
    $contents = "";
    while(!feof($file))
    {
        $line = fgets($file);
        $ArrayLine = explode("~", $line);
        if($id == $ArrayLine[0]) // if name matched
        {
            echo "true";
            $NewRecord = $id . "~" . $name . "~" . $email . "~" . $access . "~" . $ArrayLine[4];
            $OldRecord = implode("~", $ArrayLine);
            updateRecord("Database/AdminUserTextFile.txt", $NewRecord, $OldRecord);
            break;
        }
    }
    header("location: Admin/AdminUsers.php");
    fclose($file);
}

function deleteAdmin($idArray)
{
    $file = fopen("Database/AdminUserTextFile.txt", "r+");
    $i = 0;
    while(!feof($file))
    {
        $line = fgets($file);
        $ArrayLine = explode("~", $line);
        if($idArray[$i] == $ArrayLine[0]) // if name matched
        {
            $record = implode("~", $ArrayLine);
            deleteRecord("Database/AdminUserTextFile.txt", $record);
            break;
        }
    }
    header("location: Admin/AdminUsers.php");
    fclose($file);
}

?>