<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HPH Tests</title>
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
            <h1 id="h1">Book a test!</h1><br>
            <form method="post" action="forms.php" onsubmit="ValidateForm(event)">
                <input type="hidden" name="formType" value="Tests">
                <table id="table1">
                    <tr>
                        <td class="td">Test type:</td>
                        <td class="td">
                            <select class="input" name="Test">
                                <option value="CBC" selected>Complete Blood Count (CBC)</option>
                                <option value="BGC">Blood Glucose Test</option>
                                <option value="LFT">Liver Function Tests</option>
                                <option value="KFT">Kidney Function Tests</option>
                                <option value="CLP">Cholesterol and Lipid Profile</option>
                                <option value="U">Urinalysis</option>
                                <option value="HH">Hematocrit and Hemoglobin Tests</option>
                                <option value="TFT">Thyroid Function Tests</option>
                                <option value="ECG">Electrocardiogram (ECG)</option>
                                <option value="XR">X-Ray</option>
                                <option value="US">Ultrasound</option>
                                <option value="MRI">MRI Scan</option>
                                <option value="CT">CT Scan</option>
                                <option value="PS">Pap Smear</option>
                                <option value="PSA">Prostate-Specific Antigen (PSA)</option>
                                <option value="HIV">HIV Test</option>
                                <option value="HBC">Hepatitis B and C Tests</option>
                                <option value="S">Stool Tests</option>
                                <option value="A">Allergy Tests</option>
                                <option value="BC">Blood Culture</option>
                                <option value="P">Pregnancy Test</option>
                                <option value="BDT">Bone Density Test</option>
                                <option value="DLT">Vitamin D Level Test</option>
                                <option value="SE">Serum Electrolytes</option>
                                <option value="COT">Coagulation Tests</option>
                                <option value="CRET">Creatinine Test</option>
                                <option value="CRP">C-Reactive Protein (CRP)</option>
                                <option value="BNP">B-type Natriuretic Peptide (BNP)</option>
                                <option value="GT">Genetic Testing</option>
                                <option value="ST">Serological Tests</option>
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