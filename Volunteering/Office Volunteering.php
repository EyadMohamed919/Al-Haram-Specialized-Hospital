<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>\
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Office Volunteering</title>
        <link rel="stylesheet" href="../CSS Sheets/FormStyle2.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
        <script src="OfficeVol.js" defer></script>
        </head>
    <body>
        <?php
            include_once("../repeated.php");
            navBar();
        ?>
        <h1 id="title">Office Volunteering</h1><hr>
        <center>
        <form method="post" action="SaveOfcVol.php" method="get" onsubmit="return validateForm();">
        <table border="1">
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" id="FirstName" name="FirstName" placeholder="Enter First Name"></td>
                    </tr>
                    <tr>
                        <td>Second Name</td>
                        <td><input type="text" id="SecondName" name="SecondName" placeholder="Enter Second Name"></td>
                    </tr>
                    <tr>
                        <td>Third Name</td>
                        <td><input type="text" id="ThirdName" name="ThirdName" placeholder="Enter Third Name"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" id="GenderMale" name="Gender" value="M"> Male<br>
                            <input type="radio" id="GenderFemale" name="Gender" value="F"> Female
                        </td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td>
                            <select id="Country" name="Country">
                                <option value="EG" selected>Egypt</option>
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
                        <td><input type="date" id="DOB" name="DOB"></td>
                    </tr>
                    <tr>
                        <td>Mobile Number</td>
                        <td><input type="tel" id="MobileNumber" name="MobileNumber" placeholder="Enter Mobile Number"></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="email" id="EmailAddress" name="EmailAddress" placeholder="Enter Email Address"></td>
                    </tr>
                <tr>
                    <td><label for="ComputerSkills">Are you familiar with basic computer skills?</label></td>
                    <td>
                        <input type="radio" id="yes" name="ComputerSkills" value="YES"><label for="Yes" required>Yes</label><br>
                        <input type="radio" id="No" name="ComputerSkills" value="NO"><label for="NO">No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="OrganizationSkills">Are you an organized person?</label></td>
                    <td>
                        <input type="radio" id="yes" name="OrganizationSkills" value="YES"><label for="Yes" required>Yes</label><br>
                        <input type="radio" id="no" name="OrganizationSkills" value="NO"><label for="NO">No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="AttentionToDetails">Do you pay attention to details?</label></td>
                    <td>
                        <input type="radio" id="yes" name="AttentionToDetails" value="YES"><label for="Yes" required>Yes</label><br>
                        <input type="radio" id="no" name="AttentionToDetails" value="NO"><label for="NO">No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="PositiveAttitude">Do you possess a positive attitude?</label></td>
                    <td>
                        <input type="radio" id="yes" name="PositiveAttitude" value="YES"><label for="Yes" required>Yes</label><br>
                        <input type="radio" id="no" name="PositiveAttitude" value="NO"><label for="NO">No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="Confidence">Are you confident enough to believe that you will do your utmost best as a volunteer at our hospital?</label></td>
                    <td>
                        <input type="radio" name="Confidence" value="YES"><label for="Yes" required>Yes</label><br>
                        <input type="radio" name="Confidence" value="NO"><label for="NO">No</label>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><label for="startDate">When are you going to start volunteering at our hospital?</label></td>
                    <td><input type="date" id="startDate" name="startDate" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="button" onclick="validateForm()">Proceed with the volunteering process</button>
                    <input type="reset" value="Stop the Volunteering Process">
                    </td>
                </tr>
            </table>
        </form>
        </center>
    </body>
</html>