<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/c19e8a164c.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS Sheets/aboutNavStyle.css'>
    <link rel='stylesheet' href='../CSS Sheets/aboutAwardStyle.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the official website for Al-Haram specialized hospital. (not really this was created by some college students as a project)">
    <meta name="keywords" content="Al-Haram Specialized Hospital, Al Haram Specialized Hospital, Alharam Specialized Hospital, Al-Hram Specialized Hospital, Al Harm Specialized Hospital, Al-Harem Specialized Hospital, El Haram Specialized Hospital, Alharam Specialised Hospital, Alharam Specailized Hospital, Al-Harram Specialized Hospital, Alhram Specialized Hospital, Al-Heran Specialized Hospital, Alharem Specialized Hospital, Alharan Specialized Hospital, Al-Haram Specalized Hospital, Al Haram Specelized Hospitel, Alharam Specialezed Hospial, Alharan Speshalized Hosptial, El-Haram Specialized Hosptl, Al-Hram Specialised Hospitl, Al-Harem Spechalised Hospitale, El Haram Specailized Hosptel, Alhram Specialised Hosbital, Alharem Specialzed Hosbitel, Al-Haram Specialty Hospital, Alharam Medical Hospital, Al Haram Medical Centre, Specialized Al-Haram Hospital, Al-Haram Hospital Cairo">
    <title>Al Haram Hospital Homepage</title>
    <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
    <meta property="og:title" content="Al-Haram Specialized Hospital">
    <meta property="og:description" content="Al-Haram Specialized Hospital site (Unofficial)">
    <meta property="og:image" content="../CSS Sheets/Images/AboutUsImages/favicon.svg">
    <style>
        .hero {
            background: url(../CSS/Sheets/Images/Home-ContactImages/hospitalBuild.jpeg) no-repeat center center;
            background-size: cover;
            background-position: 0 -400px;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .service-item img {
            height: 300px;
            width: 300px;
            object-fit: cover;
            border: 1px solid black;
        }
        .phone-number {
            text-align: right;
            padding: 20px;
            font-size: 1.5em;
            background-color: white;
            color: black;
            font-family: 'Arial Black', sans-serif;
        }
        .phone-number .big-number {
            font-size: 2.5em;
            color: black;
        }
        .book-now {
            border: 2px solid green;
            background-color: green;
            color: white;
            text-align: center;
            padding: 5px 10px;
            font-size: 1.2em;
            display: inline-block;
            margin: 0 auto;
            margin-top: 3.7rem;
            display: inline;
            width: 100%;
        }
        .services-section {
            border: 1px solid black;
            padding: 20px;
            margin-top: 10px;
        }
        .service-item {
            margin-bottom: 20px;
        }
        .see-more, .learn-more, .see-all {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            border: 1px solid black;
            color: black;
            text-decoration: none;
            margin-left: auto;
            margin-right: auto;
        }
        .about-us {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .about-us .about-text {
            width: 50%;
        }
        .about-us .about-image {
            width: 50%;
        }
        .about-us .about-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .donation-section, .volunteering-section {
            text-align: center;
            margin-top: 20px;
        }
        .donation-section .donation-images, .volunteering-section .volunteering-images {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .donation-section .donation-images div, .volunteering-section .volunteering-images div {
            width: 30%;
        }
        .donation-section .donation-images img, .volunteering-section .volunteering-images img {
            width: 100%;
            height: auto;
        }
        .donation-section .donation-images p, .volunteering-section .volunteering-images p {
            margin-top: 10px;
            text-align: center;
        }
        .visit-section {
            background-color: grey;
            padding: 20px;
            color: white;
        }
        .visit-section h2 {
            font-size: 2em;
            font-weight: bold;
        }
        .Money {
            color: greenyellow;
            font-size: 30px;
            font-weight: bold;
        }
        .Blood{
            color: red;
            font-size: 30px;
            font-weight: bold;
        }
        .Organs{
            color: orange;
            font-size: 30px;
            font-weight: bold;
        }
        #body {
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="book-now">
        <center>
            <a href="#" style="color: white; text-decoration: none;">Book Now</a>
        </center>
    </div>
    <div class="phone-number">
        Call us: <br>
        <span class="big-number">02 33860236</span>
    </div>
    <?php
        include_once("../repeated.php");
        navBar();
    ?>
    <div style="background: url('../CSS Sheets/Images/Home-ContactImages/hospitalBuild.jpeg') no-repeat center center; background-size: cover; background-position: 0 -400px; color: white; padding: 100px 0; text-align: center;">
        <h2>Al Haram Specialized Hospital</h2>
        <p>Providing top-notch healthcare services with compassion</p>
    </div>
    <section id="body">
        <div style="margin-top: 5rem;">
            <div style="width: 100%;">
                <h2>Our Services</h2>
            </div>
            <div style="width: 33.33%; float: left; padding: 10px; box-sizing: border-box; margin-bottom: 20px;">
                <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/pngtree-pharmacy-snake-medical-bowl-png-image_6534987.png" alt="Pharmacy" style="height: 300px; border-radius: 9px; width: 300px; object-fit: cover; border: 1px solid black;"></a>
                <h5>Pharmacy</h5>
                <p>Our pharmacy provides a wide range of medications and health products.</p>
            </div>
            <div style="width: 33.33%; float: left; padding: 10px; box-sizing: border-box; margin-bottom: 20px;">
                <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/test.png" alt="Tests" style="height: 300px; width: 300px; object-fit: cover; border-radius: 9px; border: 1px solid black;"></a>
                <h5>Tests</h5>
                <p>We offer various tests to diagnose and monitor health conditions.</p>
            </div>
            <div style="width: 33.33%; float: left; padding: 10px; box-sizing: border-box; margin-bottom: 20px;">
                <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/book.png" alt="Book" style="height: 300px; width: 300px; border-radius: 9px; object-fit: cover; border: 1px solid black;"></a>
                <h5>Book</h5>
                <p>Schedule your appointments easily through our booking system.</p>
            </div>
        </div>
        <div style="clear: both; text-align: center; margin-top: 2rem;">
            <a href="#" style="display: inline-block; margin-top: 10px; padding: 5px 10px; border: 1px solid black; color: black; text-decoration: none; margin-left: auto; margin-right: auto;">See More</a>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <div style="width: 50%;">
                <h2>About Us</h2>
                <p>Our hospital provides top-notch healthcare services with a compassionate touch. Our team of expert doctors and nurses are here to ensure you receive the best care possible. Our mission is to deliver comprehensive healthcare services that meet the needs of our community.</p>
                <p>We are dedicated to continuous improvement and innovation in healthcare. Our facilities are equipped with the latest technology, and we prioritize patient safety and comfort. Our vision is to be a leader in healthcare, recognized for our commitment to excellence and compassionate care.</p>
                <a href="#" style="display: inline-block; margin-top: 10px; padding: 5px 10px; border: 1px solid black; color: black; text-decoration: none; margin-left: auto; margin-right: auto;">Learn More</a>
            </div>
            <div style="width: 20%;">
                <img src="../CSS Sheets/Images/Home-ContactImages/about us.png" alt="About Us Image" style="width: 100%; height: 400px; object-fit: cover;">
            </div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <h2>Donation</h2>
            <div>
                <p>Your generous donations help us provide essential healthcare services to those in need. Every contribution, big or small, makes a difference in the lives of our patients. We accept various types of donations, including money, blood, and organs.</p>
                <a href="#" style="display: inline-block; margin-top: 10px; padding: 5px 10px; border: 1px solid black; color: black; text-decoration: none; margin-left: auto; margin-right: auto;">See All</a>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <div style="width: 20%;">
                    <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/money.jpeg" alt="Money" style="width: 100%; height: auto;"></a>
                    <p style="color: greenyellow; font-size: 30px; font-weight: bold; margin-top: 10px; text-align: center;">Money</p>
                </div>
                <div style="width: 20%;">
                    <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/blood.jpeg" alt="Blood" style="width: 100%; height: auto;"></a>
                    <p style="color: red; font-size: 30px; font-weight: bold; margin-top: 10px; text-align: center;">Blood</p>
                </div>
                <div style="width: 20%;">
                    <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/heart.jpeg" alt="Organs" style="width: 100%; height: auto;"></a>
                    <p style="color: orange; font-size: 30px; font-weight: bold; margin-top: 10px; text-align: center;">Organs</p>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <h2>Volunteering</h2>
            <div>
                <p>Join our team of volunteers and make a difference in our community. Whether you have medical expertise or just a passion for helping others, we welcome your support. You can contribute your time and skills in various ways to help those in need.</p>
                <a href="#" style="display: inline-block; margin-top: 10px; padding: 5px 10px; border: 1px solid black; color: black; text-decoration: none; margin-left: auto; margin-right: auto;">See All</a>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <div style="width: 20%;">
                    <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/medical volun.jpeg" alt="Medical Office" style="width: 100%; border-radius: 9px; height: auto;"></a>
                    <p style="margin-top: 10px; text-align: center;">Medical volunteering</p>
                </div>
                <div style="width: 20%;">
                    <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/office volun.jpeg" alt="Community Support" style="width: 100%; border-radius: 9px; height: auto;"></a>
                    <p style="margin-top: 10px; text-align: center;">Community Support</p>
                </div>
                <div style="width: 20%;">
                    <a href="#"><img src="../CSS Sheets/Images/Home-ContactImages/childlife.jpeg" alt="Administrative Help" style="width: 100%; border-radius: 9px; height: auto;"></a>
                    <p style="margin-top: 10px; text-align: center;">Child life volunteering</p>
                </div>
            </div>
        </div>
    </section>
    <div style="background-color: grey; padding: 20px; color: white; text-align: center;">
        <h2 style="font-size: 2em; font-weight: bold;">Visit Us</h2>
        <p>11111 Street</p>
        <h2 style="font-size: 2em; font-weight: bold;">Call Us</h2>
        <p>Reserve an appointment: 11111</p>
        <p>WhatsApp: 11111</p>
        <p>To contact us: 11111@gmail.com</p>
        <p>Emergency Ambulance: 11111</p>
    </div>
    <footer style="background-color: black; color: white; text-align: center; padding: 1rem 0;">
        <p>&copy; 2024 Al Haram Hospital. All rights reserved.</p>
    </footer>
</body>
</html>


