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
    $file = fopen("MoneyForm.txt", "r+");

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
     <a href="CreateMoneyDonation.php"><button>Add New Donation</button></a><br><br>
    <a href="DeleteMoneyDonation.php"><button>Delete Donation</button></a><br><br>
</div>
</body>
</html>
