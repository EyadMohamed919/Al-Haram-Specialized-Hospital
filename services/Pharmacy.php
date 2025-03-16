<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Al Haram Hospital Pharmacy</title>
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
            <h1 id="h1">Order your medicine from home!</h1><br>
            <form method="post" action="forms.php" onsubmit="return ValidateForm(event)">
                <input type="hidden" name="formType" value="Pharmacy">
                <table id="table1">
                    <tr>
                        <td class="td">Medicine:</td>
                        <td class="td">
                            <select class="input" name="Medicine">
                                <option value="PA" selected>Panadol (Paracetamol)</option>
                                <option value="BR">Brufen (Ibuprofen)</option>
                                <option value="AS">Aspirin</option>
                                <option value="AU">Augmentin  (Amoxicillin and Clavulanic Acid)</option>
                                <option value="CA">Cataflam (Diclofenac Potassium)</option>
                                <option value="AM">Amoxicilin</option>
                                <option value="FL">Flagyl (Metronidazole)</option>
                                <option value="PR">Paracetamol</option>
                                <option value="OM">Omeprazole</option>
                                <option value="VO">Voltaren (Diclofenac Sodium)</option>
                                <option value="NE">Nexium (Esomeprazole)</option>
                                <option value="ST">Strepsils</option>
                                <option value="AMO">Amoclan</option>
                                <option value="PACU">Panadol Cold and Flu</option>
                                <option value="SD">Spasmo-Digestin</option>
                                <option value="CI">Ciprosin (Ciprofloxacin)</option>
                                <option value="VE">Ventolin (Salbutamol)</option>
                                <option value="CE">Cetrizine</option>
                                <option value="AN">Antinal (Nifuroxazide)</option>
                                <option value="XI">Xithrone (Azithromycin)</option>
                                <option value="CO">Concor (Bisoprolol)</option>
                                <option value="EN">Enalapril</option>
                                <option value="AT">Ator (Atorvastatin)</option>
                                <option value="LA">Lasix (Furosemide)</option>
                                <option value="ZI">Zithromax (Azithromycin)</option>
                                <option value="CL">Claritin (Loratadine)</option>
                                <option value="COL">Colona</option>
                                <option value="NEU">Neuroton</option>
                                <option value="DE">Depakine (Valproic Acid)</option>
                                <option value="NO">Norgesic</option>
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
                        <td class="td">Address:</td>
                        <td class="td"><input type="text" class="input" name="Address" placeholder="New York, queens, ..."></td>
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