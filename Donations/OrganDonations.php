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
        <form action="OrganDo.php" method="post">
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
                    <td>Organ Type</td>
                    <td>
                        <table>
                            <tr>
                                <td>Heart</td>
                                <td><input type="checkbox" id="Heart" value="Heart" name="organSelection"></td>
                            </tr>
                            <tr>
                                <td>Kidneys</td>
                                <td><input type="checkbox" id="Kidneys" value="Kidneys" name="organSelection"></td>
                            </tr>
                            <tr>
                                <td>Liver</td>
                                <td><input type="checkbox" id="Liver" value="Liver" name="organSelection"></td>
                            </tr>
                            <tr>
                                <td>Other Organ</td>
                                <td><input type="checkbox" id="OtherOrgan" value="OO" name="organSelection"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>When is your organ removal surgery scheduled in the hospital?</td>
                    <td><input type="date" id="SurgeryDate" name="SurgeryDate" required></td>
                </tr>
                <tr>
                    <td>Which post office are you going to use to send the donated organ?</td>
                    <td>
                        <input type="radio" id="DonationMethodPost" name="DonationMethod" value="Post">UPS<br>
                        <input type="radio" id="DonationMethodPost" name="DonationMethod" value="Post">DHL<br>
                        <input type="radio" id="DonationMethodPost" name="DonationMethod" value="Post">Egypt Post<br>
                    </td>
                </tr>
                <tr>
                    <td>Post Office Location</td>
                    <td><input type="text" id="PostOffice" name="PostOffice"></td>
                </tr>
                <tr>
                    <td>Package Tracking Number</td>
                    <td><input type="text" id="PackageTrackingNumber" name="PackageTrackingNumber"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="button" onclick="validateForm()">Proceed With Donation</button>
                        <input type="reset" value="Recede Donation Process">
                </td>
                </tr>
            </table>
        </form>
    </body>
</html>
