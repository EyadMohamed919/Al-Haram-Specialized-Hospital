<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>\
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Child Life Volunteering</title>
        <link rel="stylesheet" href="../CSS Sheets/FormStyle2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
        <script src="ChildLifeVol.js" defer></script>
    </head>
    <body>
        <?php
            include_once("../repeated.php");
            navBar();
        ?>
        <h1 id="title">Child Life Volunteering</h1><hr>
        <form method="get" onsubmit="event.preventDefault(); validateForm();">
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
                    <td><label for="understandChildDevelopment">Do you understand what child development is?</label></td>
                    <td>
                        <input type="radio" id="yes" name="understandChildDevelopment" value="YES"><label for="yes" required>Yes</label><br>
                        <input type="radio" id="no" name="understandChildDevelopment" value="NO"><label for="no">No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="preparechildrenformedicalprocedures">Are you able to prepare children for medical procedures?</label></td>
                    <td>
                        <input type="radio" id="yes" name="preparechildrenformedicalprocedures" value="YES"><label for="yes" required>Yes</label><br>
                        <input type="radio" id="no" name="preparechildrenformedicalprocedures" value="NO"><label for="no">No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="communicatewithchildren">Can you communicate with children?</label></td>
                    <td>
                        <input type="radio" id="yes" name="communicatewithchildren" value="YES"><label for="yes" required>Yes</label><br>
                        <input type="radio" id="no" name="communicatewithchildren" value="NO"><label for="no">No</label>
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
    </body>
</html>