<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HPH Appointments</title>
        <?php
            include_once(__DIR__ . '/../repeated.php');
            servicesSEO();
        ?>
    </head>
    <body>
        <?php
            include_once(__DIR__ . '/../repeated.php');
            navBar();
        ?>
        <center>
            <h1 id="h1">Book an appointment with a specialist today!</h1><br>
            <form method="post" action="forms.php" onsubmit="ValidateForm(event)">
            <input type="hidden" name="formType" value="Appointments">
                <table id="table1">
                    <tr>
                        <td class="td">Specialization:</td>
                        <td class="td">
                            <select class="input" name="Doctor">
                                <option value="IM" selected>Internal Medicine</option>
                                <option value="P">Pediatric</option>
                                <option value="GS">General Surgery</option>
                                <option value="OBGYN">Obstetrics and Gynecology</option>
                                <option value="OS">Orthopedic Surgery</option>
                                <option value="C">Cardiology</option>
                                <option value="D">Dermatology</option>
                                <option value="OPH">Ophthalmology</option>
                                <option value="ENT">ENT (Ear, Nose, and Throat)</option>
                                <option value="PSY">Psychiatry</option>
                                <option value="N">Neurology</option>
                                <option value="GAS">Gastroenterology</option>
                                <option value="U">Urology</option>
                                <option value="ON">Oncology</option>
                                <option value="RAD">Radiology</option>
                                <option value="ANES">Anesthesiology</option>
                                <option value="PATH">Pathology</option>
                                <option value="END">Endocrinology</option>
                                <option value="PUL">Pulmonology</option>
                                <option value="HEM">Hematology</option>
                                <option value="NEPH">Nephrology</option>
                                <option value="REHAB">Rehabilitation Medicine</option>
                                <option value="FM">Family Medicine</option>
                                <option value="FOM">Forensic Medicine</option>
                                <option value="PS">Plastic Surgery</option>
                                <option value="VS">Vascular Surgery</option>
                                <option value="EM">Emergency Medicine</option>
                                <option value="OM">Occupational Medicine</option>
                                <option value="PH">Public Health</option>
                                <option value="SM">Sports Medicine</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">First Name:</td>
                        <td class="td"><input type="text" class="input" name="FirstName" placeholder="John"></td>
                    </tr>
                    <tr>
                        <td class="td">Last Name:</td>
                        <td class="td"><input type="text" class="input" name="LastName" placeholder="Doe"></td>
                    </tr>
                    <tr>
                        <td class="td">Sex:</td>
                        <td class="td">
                            <label><input type="radio" class="input" name="Sex" value="Male">Male</label>
                            <label><input type="radio" class="input" name="Sex" value="Female">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Phone number:</td>
                        <td class="td"><input type="number" id="pn" class="input" name="PN" placeholder="01234567890"></td>
                    </tr>
                    <tr>
                        <td class="td">Email:</td>
                        <td class="td"><input type="email" id="email" class="input" name="Email" placeholder="johndoe@email.com"></td>
                    </tr>
                    <tr>
                        <td class="td">Date:</td>
                        <td class="td"><input type="date" class="input" name="Date"></td>
                    </tr>
                    <tr>
                        <td class="td">Time:</td>
                        <td class="td"><input type="time" class="input" name="Time"></td>
                    </tr>
                    <tr>
                        <td class="td" align="right"><input type="submit" id="submit" class="input" name="submit"></td>
                        <td class="td"><input type="reset" id="reset" class="input" name="reset"></td>
                    </tr>
                </table>
            </form>
            <footer id="footer">
                <hr>
                © 2024 Haram Public Hospital, all rights reserved
            </footer>
        </center>
        <script src="services.js"></script>
    </body>
</html>