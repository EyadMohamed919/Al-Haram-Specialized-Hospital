<!DOCTYPE html>
<html lang="en">
    <head>
    <title>HPH PrevMed™</title>
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
                <img src="CSS Sheets/Images/ServicesImages/Our-London-Health-Treatments.jpg" id="img1" width="15%" height="15%">
                <!-- Image source: https://www.optimisehealth.com/what-we-treat/london-health -->
                <p><big>Join PrevMed™ today!</big><br>This is our preventive medicine course that will help teach you how to lead a healthy lifestyle that maintains and prevents your body from developing long-term health issues. In this preventive medicine course, we’ll explore key strategies for promoting your overall well-being. You’ll learn about nutrition, physical activity, stress management, and the importance of regular health screenings. We’ll also delve into the impact of lifestyle choices on chronic diseases and provide practical tips for incorporating healthier habits into your daily routine. By the end of the course, you’ll be equipped with the knowledge and tools to take proactive steps toward a healthier future, empowering you to make informed decisions that support your long-term health and vitality. Let’s embark on this journey together to cultivate a lifestyle that prioritizes prevention and wellness!</p>
            </div><br>
            <h1 id="h1">Sign up for our course here!</h1><br>
            <form method="get" onsubmit="ValidateForm(event)">
                <div class="divs" id="div1">
                    <label>Course time:</label>
                    <select class="input" name="SelectTime">
                        <option value="S" selected>Sunday 9:00 - 11:00 AM</option>
                        <option value="M">Monday 9:00 - 11:00 AM</option>
                        <option value="T">Tuesday 9:00 - 11:00 AM</option>
                        <option value="W">Wedenesday 9:00 - 11:00 AM</option>
                        <option value="TH">Thursday 9:00 - 11:00 AM</option>
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
                    <label>Phone Number:</label>
                    <input type="number" id="pn" class="input" name="PN" placeholder="01234567890">
                </div><br>
                <div class="divs">
                    <label>National ID:</label>
                    <input type="number" id="NID" class="input" name="NID" placeholder="30000000000000">
                </div><br>
                <div class="divs">
                    <label>Email:</label>
                    <input type="email" id="email" class="input" name="Email" placeholder="johndoe@email.com">
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