<?php
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

?>