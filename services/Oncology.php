<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HPH Oncology</title>
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
            <h1 id="h1">Book your treatment session</h1><br>
            <form method="post" action="forms.php" onsubmit="ValidateForm(event)">
                <input type="hidden" name="formType" value="Oncology">
                <table id="table1">
                    <tr>
                        <td class="td">Type of Therapy:</td>
                        <td class="td">
                            <select class="input" name="Treatment">
                                <option value="RT" selected>Radiation Therapy</option>
                                <option value="CT">Chemotherapy</option>
                                <option value="IT">Immunotherapy</option>
                                <option value="TT">Targeted Therapy</option>
                                <option value="HT">Hormone Therapy</option>
                                <option value="SCT">Stem Cell Transplant</option>
                                <option value="PM">Precision Medicine</option>
                                <option value="CLT">Clinical Trials</option>
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