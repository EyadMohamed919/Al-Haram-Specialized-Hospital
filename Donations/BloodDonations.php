<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Blood Donations</title>
        <link rel="stylesheet" href="FormStyle1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/FormStyle2.css">
        <script src="BloodDon.js"></script>
    </head>
    <body>
    <?php
            include_once(__DIR__ . '/../repeated.php');
            navBar();
        ?>
        <h1 id="title">Blood Donations</h1><hr>
        <form method="post" action="BloodForm.php" onclick="validationForm()">
    <table align="center" width="100%">
        <tr>
            <td class="td_names">First Name</td>
            <td><input class="inputs" type="text" id="FirstName" name="FirstName" placeholder="Enter First Name" required></td>
        </tr>
        <tr>
            <td class="td_names"> Last Name</td>
            <td><input class="inputs" type="text" id="LastName" name="LastName" placeholder="Enter Last Name" required></td>
        </tr>
        <tr>
            <td class="td_names">Gender</td>
            <td>
                <input  class="inputs" type="radio" id="GenderMale" name="Gender" value="Male"required> Male<br>
                <input class="inputs" type="radio" id="GenderFemale" name="Gender" value="Female"required> Female
            </td>
        </tr>
        <tr>
            <td class="td_names">Nationality</td>
            <td>
                <select class="inputs" id="Country" name="Country"required>
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
            <td class="td_names">Select your birth day</td>
            <td><input class="inputs" type="date" id="DOB" name="DOB"required></td>
        </tr>
        <tr>
            <td class="td_names">Blood Type</td>
            <td>
                <table>
                    <tr>
                        <td>Type A</td>
                        <td><input class="inputs" type="radio" id="TypeA" value="A" name="BloodType" required></td>
                    </tr>
                    <tr>
                        <td>Type B</td>
                        <td><input class="inputs" type="radio" id="TypeB" value="B" name="BloodType" required></td>
                    </tr>
                    <tr>
                        <td>Type O</td>
                        <td><input class="inputs" type="radio" id="TypeO" value="O" name="BloodType" required></td>
                    </tr>
                    <tr>
                        <td>Type AB</td>
                        <td><input class="inputs" type="radio" id="TypeAB" value="AB" name="BloodType" required></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button class="inputs" type="submit">Proceed With Donation</button>
                <input class="inputs"type="reset" value="Recede Donation Process">
            </td>
        </tr>
    </table>
</form>
    </body>
</html>
