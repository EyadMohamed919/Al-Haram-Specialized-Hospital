<html>
<?php
session_start();


if (!isset($_SESSION["user_email"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: ../index.php");
    exit();
}

?>
<head>
    <title>Backend Blood Donations</title>
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/BEstylesheet1.css">
    <script src="BloodDonBE.js" type="text/javascript"></script>
</head>
<body>
    <a href="DonationsBE-Homepage.php">DonationsBE-HomePage</a><hr>
    <p>Donations<p>
    <table border="1" id="Donationtable">
        <tr>
            <th>Donation ID</th>
            <th>Donator's Name</th>
            <th>Blood Type</th>
            <th>Date</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>1</td>
            <td>khaled El Eserry</td>
            <td>A</td>
            <td>2024-12-18</td>
            <td>UAE</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Ira Ontrup</td>
            <td>B</td>
            <td>2024-11-15</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Indila luck</td>
            <td>O</td>
            <td>2024-10-04</td>
            <td>France</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Morgan Freeman</td>
            <td>AB</td>
            <td>2024-08-08</td>
            <td>USA</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kim taehyung</td>
            <td>O</td>
            <td>2024-09-24</td>
            <td>South Korea</td>
        </tr>
    </table>

    <p>Control Donations<p>

    <div>
        <form method="get">

            <b><label for="DonationID">ID:</label></b><br>
            <input type="text" id="DonationID" name="DonationID" required><br><br>
            <b><label for="DonatorsName">Name:</label></b><br>
            <input type="text" id="DonatorsName" name="DonatorsName" required><br><br>
            <b><label for="BloodType">Blood Type:</label></b><br>
            <input type="text" id="BloodType" name="BloodType" required><br><br>
            <b><label for="DonationDate">Date:</label></b><br>
            <input type="date" id="DonationDate" name="DonationDate" required><br><br>
            <b><label for="DonationCountry">Country:</label></b><br>
            <input type="text" id="DonationCountry" name="DonationCountry" required><br><br>

            <button type="button" onclick="AddNewdonationRecord();">Add Record</button><br><br>
            <button type="button" onclick="UpdateDonationRecord();">Update Record</button><br><br>
            <button type="button" onclick="RemoveDonationRecord();">Remove Record</button><br><br>
            <button type="button" onclick="ClearForm();">Clear Form</button><br><br>

        </form>
</body>
</html>
