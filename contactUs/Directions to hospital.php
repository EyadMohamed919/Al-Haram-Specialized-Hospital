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
    <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Directions to Hospital - Cairo Public Hospital</title>
    <style>
        .content {
            margin-top: 20px;
        }
        .directions {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .map {
            margin-top: 20px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .visit-section {
            background-color: grey;
            padding: 20px;
            color: white;
            margin-top: 20px;
            border-radius: 10px;
        }
        .phone-number {
            text-align: right;
            padding: 20px;
            font-size: 1.5em;
            margin-top: 2rem;
            background-color: white;
            color: black;
            font-family: 'Arial Black', sans-serif;
        }
        .phone-number .big-number {
            font-size: 2.5em;
            color: black;
        }
    </style>
</head>
<body>
    <div class="phone-number">
        Call us: <br>
        <span class="big-number">02 33860236</span>
    </div>
    <?php
        include_once '../repeated.php';
        navBar();
    ?>
    
        <div class="container content">
            <h2>Directions to Al Haram Hospital</h2>
            <div class="directions">
                <h3>Our Address</h3>
                <p>Al Haram Hospital</p>
                <h3>Public Transport</h3>
                <p>You can get to the hospital by the nearest bus stop</p>
            </div>
            <div class="map">
                <h3>Location Map</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.5863282351465!2d31.148676011722078!3d29.991316320980463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145845ea455faf07%3A0x3c5c459a0fb9c936!2sAl%20Haram%20Hospital!5e0!3m2!1sen!2seg!4v1730988501839!5m2!1sen!2seg" width="1100" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    
        <div class="visit-section">
            <h2>Visit Us</h2>
            <p>You are welcome at any time to visit us</p>
            <h2>Call Us</h2>
            <p>Reserve an appointment: 11111</p>
            <p>WhatsApp: 11111</p>
            <p>To contact us: 11111@gmail.com</p>
            <p>Emergency Ambulance: 11111</p>
        </div>
    
        <footer style="background-color: #343a40; color: white; text-align: center; padding: 20px;">
            <p>&copy; 2024 Cairo Public Hospital. All rights reserved.</p>
        </footer>
    </body>
    </html>


