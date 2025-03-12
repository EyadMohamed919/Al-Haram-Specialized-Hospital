<html lang="en">
    <head>
        <title>HPH Dentistry</title>
        <?php
            include_once("repeated.php");
            servicesSEO();
        ?>
    </head>
    <body>
        <?php
            include_once("repeated.php");
            navBar();
        ?>
        <center>
            <div id="div2">
                <img src="CSS Sheets/Images/ServicesImages/istockphoto-1277540215-1024x1024.jpg" id="img1"><br>
                <!-- Image source: https://www.istockphoto.com/photo/portrait-of-a-caucasian-female-dentist-in-her-office-gm1277540215-376717852 -->
                <p><big>HPH's Dental department is specialized in various aspects of dentistry including:</big></p><br>
                <ul id="ul1">
                    <li>Dental Surgery</li>
                    <li>Endodontics</li>
                    <li>Prosthetic appliances</li>
                    <li>Cosmetic rehabilitation</li>
                    <li>Orthodontics</li>
                </ul>
                <p><big>Every procedure is performed under the supervision of highly qualified consultants at fully equipped dental clinics.</big></p><br>
            </div><br>
            <h1 id="h1">Dentist appointment booking</h1><br>
            <form method="get" onsubmit="ValidateForm(event)">
                <div class="divs" id="div1">
                    <label>First Name: </label>
                    <input type="text" class="input" name="FirstName" placeholder="John">
                </div><br>
                <div class="divs">
                    <label>Last Name:</label>
                    <input type="text" class="input" name="LastName" placeholder="Doe">
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
                <div class="divs">
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