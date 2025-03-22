<html lang="en">
<?php
session_start();


if (!isset($_SESSION["user_email"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: ../index.php"); // Redirect non-admins
    exit();
}

?>
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
        <td><strong>First Name</strong></td>
        <td><strong>Last Name</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>Governorate</strong></td>
        <td><strong>City</strong></td>
        <td><strong>Type</strong></td>
        <td><strong>Message</strong></td>
    </tr>
    <?php
    
    $servername = "sql312.infinityfree.com"; 
$username = "if0_38545498"; 
$password = "oNcWcXZM3fR"; 
$database = "if0_38545498_hospital"; 

    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, fname, lname, email, phone, gov, city, type, message FROM contact";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["fname"] ."</td>
            <td>" . $row["lname"] ."</td>
            <td>" . $row["email"] ."</td>
            <td>" . $row["phone"] ."</td>
            <td>" . $row["gov"] ."</td>
            <td>" . $row["city"] ."</td>
            <td>" . $row["type"] ."</td>
            <td>" . $row["message"] ."</td>";
            echo "</tr>";
        }
    }
    $conn->close();
    ?>

</table>

<?php include("../repeated.php"); adminNav(); ?>
</body>
</html>