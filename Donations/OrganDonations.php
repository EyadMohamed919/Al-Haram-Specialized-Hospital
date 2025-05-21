<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>\
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Organ Donations</title>
        <link rel="stylesheet" href="../FormStyle1.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/FormStyle1.css">
        <link rel="stylesheet" href="../CSS Sheets/FormStyle2.css">
        <script src="OrganDon.js" defer></script>
    </head>
    <body>
        <?php
            include_once(__DIR__ . '/../repeated.php');
            navBar();
        ?>
        <h1 id="title">Organ Donations</h1><hr>
        <form action="OrganDo.php" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>ID</td>
                    <td>
                        <input type="text" id="ID" name="ID" placeholder="Automatically Added" readonly>
                </td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" id="FirstName" name="FirstName" placeholder="Enter First Name" required></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" id="LastName" name="LastName" placeholder="Enter Last Name" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" id="Male" name="Gender" value="M" required> Male<br>
                        <input type="radio" id="Female" name="Gender" value="F" required> Female
                    </td>
                </tr>
                <tr>
                    <td>Nationality</td>
                    <td>
                        <select id="Country" name="Country" required>
                            <option value="EG">Egypt</option>
                            <option value="GE">Germany</option>
                            <option value="SR">Turkey</option>
                            <option value="UAE">United Arab Emirates</option>
                            <option value="SAR">Saudi Arabia</option>
                            <option value="QTR">Qatar</option>
                            <option value="ENG">England</option>
                            <option value="FR">France</option>
                            <option value="USA">United States of America</option>
                            <option value="SK">South Korea</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select your birth day</td>
                    <td><input type="date" id="DOB" name="DOB" required></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><input type="tel" id="MobileNumber" name="MobileNumber" placeholder="Enter Mobile Number" required></td>
                </tr>
                <tr>
                    <td>Organ Type</td>
                    <td>
                        <input type="Radio" Value="Kidney" name="OrganDonated" required>Kidney
                        <input type="Radio" value="Heart" name="OrganDonated"required>Heart
                        <input type="Radio" value="Lung" name="OrganDonated"required>Lung
                        <input type="Radio" value="Other" name="OrganDonated"required>Other Organ
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input class="inputs" type="submit" value="Add Donation">
                </td>
                </tr>
            </table>
        </form>
    </body>
</html>
