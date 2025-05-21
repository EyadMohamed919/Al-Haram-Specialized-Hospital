<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/FormStyle2.css">
    <title>Add Donation</title>
</head>
<body>
    <h2 align="center" >Add New Donation</h2>
    <form method="POST" action="OrganDo.php">
        <table border="1" align="center" width="100%"> 
            <tr>
            <td>ID</td>
            <td><input type="text" id="ID" name="ID" placeholder="Automatically Added" readonly></td>
        <tr>
                <td>First Name:</td>
                <td><input type="text" name="FirstName" required></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="LastName" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="text" name="Gender" required></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input type="text" name="Country" required></td>
            </tr>
            <tr>
                <td>DOB:</td>
                <td><input type="date" name="DOB" required max=2005-12-31></td>
            </tr>
            <tr>
                <td>Organ:</td>
                <td><input type="text" name="OrganDonated" required></td>
        
    </form>
</table><br>
<div style="text-align: center;">
    <input class="inputs" type="submit" value="Add Donation">
</div>
</body>
</html>
