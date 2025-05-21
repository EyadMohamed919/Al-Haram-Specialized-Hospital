<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Blood Donations</title>
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/BEstylesheet1.css">
</head>
<body>
    <a href="DonationsBE-Homepage.php"><input class="inputs" type="submit" value="Return🔙"></a><hr>
    <p>Donations</p>
    <table border="1" id="Donationtable">
        <tr>
            <td>ID</td>
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
<div style="text-align: center;">
     <a href="CreateBloodDonationAP.php"><input class="inputs" type="submit" value="Create Donation"></button></a><br><br>
    <a href="DeleteBloodDonation.php"><input class="inputs" type="submit" value="Delete Donation"></button></a><br><br>
</div>

   

    

    
</body>
</html>
