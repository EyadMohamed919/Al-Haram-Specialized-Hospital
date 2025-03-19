<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>\
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Medical Volunteering</title>
        <link rel="stylesheet" href="../CSS Sheets/FormStyle2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
        <script src="MedicalVol.js" defer></script>
    </head>
    <body>
        <?php
            include_once("../repeated.php");
            navBar();
        ?>
        <h1 id="title">Medical Volunteering</h1><hr>
        <center>
        <form method="post" action="SaveMedVol.php" onsubmit="event.preventDefault(); validateForm();">
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
                    <td>Which 2 of the following Medical Knowledges are you familiar with the most?</td>
                    <td>
                        <table>
                            <tr><td>Basic Human Anatomy And Physiology</td><td><input type="checkbox" id="BHAAP" value="BHAAP" name="MedicalKnowledge"></td></tr>
                            <tr><td>Understanding Of Common Medical Conditions And Illnesses</td><td><input type="checkbox" id="UOCMCAI" value="UOCMCAI" name="MedicalKnowledge"></td></tr>
                            <tr><td>Knowledge Of Basic First Aid And CPR</td><td><input type="checkbox" id="KOBFAAC" value="KOBFAAC" name="MedicalKnowledge"></td></tr>
                            <tr><td>Familiarity With Medical Terminology And Procedures</td><td><input type="checkbox" id="FWMTAP" value="FWMTAP" name="MedicalKnowledge"></td></tr>
                        </table>
                        <p id="MedicalKnowledgeError"></p>
                    </td>
                </tr>
                    <tr>
                    <td>Pick at least 2 of the following interpersonal skills that you truly possess:</td>
                    <td>
                        <table>
                            <tr><td>Empathy And Compassion</td><td><input type="checkbox" id="EAC" value="EAC" name="InterpersonalSkills"></td></tr>
                            <tr><td>Effective Communication Skills</td><td><input type="checkbox" id="ECS" value="ECS" name="InterpersonalSkills"></td></tr>
                            <tr><td>Patience And Understanding</td><td><input type="checkbox" id="PAU" value="PAU" name="InterpersonalSkills"></td></tr>
                            <tr><td>Ability To Work Well With People From Diverse Backgrounds</td><td><input type="checkbox" id="ATWWWPfDB" value="ATWWWPfDB" name="InterpersonalSkills"></td></tr>
                        </table>
                        <p id="InterpersonalSkillsError"></p>
                    </td>
                </tr>
                    <tr>
                    <td>Pick at least 2 of the following practical skills that you truly possess:</td>
                    <td>
                        <table>
                            <tr><td>Ability To Follow Instructions And Protocols</td><td><input type="checkbox" id="ATFIAP" value="ATFIAP" name="PracticalSkills"></td></tr>
                            <tr><td>Attention to Details</td><td><input type="checkbox" id="ATD" value="ATD" name="PracticalSkills"></td></tr>
                            <tr><td>Time Management Skills</td><td><input type="checkbox" id="TMS" value="TMS" name="PracticalSkills"></td></tr>
                            <tr><td>Basic Computer Skills</td><td><input type="checkbox" id="BCS" value="BCS" name="PracticalSkills"></td></tr>
                        </table>
                        <p id="PracticalSkillsError"></p>
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