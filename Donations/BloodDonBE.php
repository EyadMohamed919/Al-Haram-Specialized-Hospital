<!DOCTYPE html>
<html lang="en">
<?php
session_start();


if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: index.php");
      }
    }

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Blood Donations</title>
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/BEstylesheet1.css">
</head>
<body>
    <a href="DonationsBE-Homepage.php">DonationsBE-HomePage</a><hr>
    <p>Donations</p>
    <table border="1" id="Donationtable">
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Gender</td>
            <td>Country</td>
            <td>Date</td>
            <td>BloodType</td>
    <?php
    $file = fopen("BF.txt", "r+");

    while(!feof($file)){
                 echo "<tr>" ;
                  $line= fgets($file);
                  $ArrayLine=explode("~",$line);

        foreach ($ArrayLine as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }

        echo "</tr>";
    }

    fclose($file);
    ?>
    
            </td>
        </tr>
    </table>

    
</body>
</html>
