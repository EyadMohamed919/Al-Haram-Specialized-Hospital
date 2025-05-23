<html>
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
    <title>Backend Blood Donations</title>
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/BEstylesheet1.css">
    <script src="OrganDonBE.js" type="text/javascript"></script>
</head>
<body>
    <a href="DonationsBE-Homepage.php"><input class="inputs" type="submit" value="Return🔙"></a><hr>
    <p>Donations<p>
    <table border="1" id="Donationtable">
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Gender</td>
            <td>Nationality</td>
            <td>DOB</td>
            <td>Organ Type</td>
        </tr>
        <tr>
            <?php
    $file = fopen("OrganFile.txt", "r+");
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
        </tr>
    </table>
    <div style="text-align: center;">
     <a href="OrganCreateButton.php"><input class="inputs" type="submit" value="Create Donation"></a><br><br>
    <a href="OrganDeleteButton.php"><input class="inputs" type="submit" value="Delete Donation"></a><br><br>
</div>
</body>
</html>
