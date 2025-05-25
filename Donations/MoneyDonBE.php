<?php
session_start();
    if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: ../index.php");
      }
    }
    else
    {
        header("location: ../index.php");
    }
?>
<html>
<head>
    <title>Backend Money Donations</title>
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/BEstylesheet1.css">
    <script src="MoneyDonBE.js" type="text/javascript"></script>
</head>
<body>
    <a href="DonationsBE-Homepage.php">DonationsBE-HomePage</a><hr>
    <p>Donations<p>
    <table border="1" id="Donationtable">
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Gender</td>
            <td>Nationality</td>
            <td>Amount Donated</td>
        </tr>
        <tr>
            <?php
    $key = 0;
    $file = fopen("MoneyForm.txt", "r");
    while (!feof($file)) {
        $line = fgets($file);
        $arrayline = explode("~", $line);

        echo "<tr>";
        echo "<td>" . htmlspecialchars($arrayline[0]) . "</td>";

        for ($i = 1; $i <= 5; $i++) {
            if (isset($arrayline[$i])) {
                echo "<td>" . htmlspecialchars(Decrypt($arrayline[$i], $key)) . "</td>";
            }
        }
        echo "</tr>";
    }
    fclose($file);
    ?>
        </tr>
    </table>
<div style="text-align: center;">
     <a href="CreateMoneyDonation.php"><input class="inputs" type="submit" value="Create Donation"></a><br><br>
    <a href="DeleteMoneyDonation.php"><input class="inputs" type="submit" value="Delete Donation"></a><br><br>
    <a href="DowloadMoneyDonation.php"><input class="inputs" type="submit" value="Download Donation"></a><br><br>
</div>
</body>
</ht>
