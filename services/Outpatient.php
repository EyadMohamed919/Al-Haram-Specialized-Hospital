<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HPH Outpatient services</title>
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
            <h1 id="h1">Outpatient services</h1><br>
            <form method="post" action="forms.php" onsubmit="ValidateForm(event)">
                <input type="hidden" name="formType" value="Outpatient">
                <div class="divs" id="div1">
                    <label>Service type:</label>
                    <select class="input" name="OutService">
                        <option value="AP" selected>Ambulance pick-up</option>
                        <option value="HC">Home check-up</option>
                        <option value="ON">Out-house Nurse</option>
                        <option value="PD">Physically disabled assistance</option>
                        <option value="TC">Telephone consultation</option>
                    </select>
                </div><br>
                <div class="divs">
                    <label>First Name: </label>
                    <input type="text" class="input" name="FirstName" placeholder="John">
                </div><br>
                <div class="divs">
                    <label>Last Name:</label>
                    <input type="text" class="input" name="LastName" placeholder="Doe">
                </div><br>
                <div class="divs">
                    <label>Address:</label>
                    <input type="text" class="input" name="Address" placeholder="New York, queens, ...">
                </div><br>
                <div class="divs">
                    <label>Phone Number:</label>
                    <input type="number" id="pn" class="input" name="PN" placeholder="01234567890">
                </div><br>
                <div class="divs">
                    <label>Email:</label>
                    <input type="email" id="email" class="input" name="Email" placeholder="johndoe@email.com">
                </div><br>
                <div class="divs">
                    <label>Date:</label>
                    <input type="date" class="input" name="Date">
                </div><br>
                <div class="divs">
                    <label>Time:</label>
                    <input type="time" class="input" name="time">
                </div><br>
                <div>
                    <input type="submit" id="submit" class="input" name="submit">
                    <input type="reset" id="reset" class="input" name="reset">
                </div>
            </form>
            <footer id="footer">
                <hr>
                © 2024 Haram Public Hospital, all rights reserved
            </footer>
        </center>
        <script src="services.js"></script>
    </body>
</html>