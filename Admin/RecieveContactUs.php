<?php
session_start();
?>

<html lang="en">
<?php
    if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: ../index.php");
      }
      else
      {
        if($_SESSION["Access"] == "pharmacist")
        {
            header("location: AdminMain.php");
        }
      }
    }
    else
    {
        header("location: ../index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://classless.de/classless.css">
    <title>Al Harama Specialized Hospital</title>
</head>
<body>
    
    <h1>Messages</h1>
    <table>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>First Name</strong></td>
        <td><strong>Last Name</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>Governorate</strong></td>
        <td><strong>City</strong></td>
        <td><strong>Type</strong></td>
    </tr>
    <?php
        include("../GlobalFunctions.php");

        $array = sendContactUsMessages();
        foreach($array as $line)
        {
            echo "<tr>";
            echo "<td>" . $line["id"] . "</td>";
            echo "<td>" . $line["fname"] . "</td>";
            echo "<td>" . $line["lname"] . "</td>";
            echo "<td>" . $line["email"] . "</td>";
            echo "<td>" . $line["phone"] . "</td>";
            echo "<td>" . $line["Gaddress"] . "</td>";
            echo "<td>" . $line["Caddress"] . "</td>";
            echo "<td>" . $line["type"] . "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td><strong>Message:</strong></td>";
            echo "<td colspan=7><strong>" . $line["message"] . "</strong></td>";
            echo "</tr>";
        }
    ?>

</table>

<?php include("../repeated.php"); adminNav(); ?>
</body>
</html>