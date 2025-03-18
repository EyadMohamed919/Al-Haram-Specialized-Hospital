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
    <title>Contact Us - Cairo Public Hospital</title>
    <style>
        .contact-section {
            padding: 40px 0;
            text-align: center;
        }
        .contact-info {
            background-color: #343a40;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 0 auto;
            max-width: 600px;
        }
        .contact-info h2 {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .contact-info p {
            font-size: 1.2em;
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
        }
        .visit-section h2 {
            font-size: 2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="phone-number">
        Call us: <br>
        <span class="big-number">02 33860236</span>
    </div>
    <?php
    include '../repeated.php';
    navBar();
    ?>
    <div class="container contact-section" style="padding: 40px 0; text-align: center;">
        <div class="contact-info" style="background-color: #343a40; color: white; padding: 20px; border-radius: 10px; margin: 0 auto; max-width: 600px;">
            <h2 style="font-size: 2.5em; font-weight: bold; margin-bottom: 20px;">Contact Details</h2>
            <p style="font-size: 1.2em;"><strong>Address:</strong>  Al Haram, Oula Al Haram, El Omraniya, Giza Governorate 3531201</p>
            <p style="font-size: 1.2em;"><strong>Phone:</strong> 02 33860236</p>
            <p style="font-size: 1.2em;"><strong>Email:</strong> contact@alharamhospital.com</p>
            <p style="font-size: 1.2em;"><strong>Working Hours:</strong> 24/7</p>
        </div>
    </div>
    <div class="visit-section" style="background-color: grey; padding: 20px; color: white; margin-top: 20px;">
        <h2 style="font-size: 2em; font-weight: bold;">Visit Us</h2>
        <p>11111 Street</p>
        <h2 style="font-size: 2em; font-weight: bold;">Call Us</h2>
        <p>Reserve an appointment: 11111</p>
        <p>WhatsApp: 11111</p>
        <p>To contact us: 11111@gmail.com</p>
        <p>Emergency Ambulance: 11111</p>
    </div>
    <footer class="bg-dark text-white text-center py-3" style="background-color: #343a40; color: white; text-align: center; padding: 20px;">
        <p>&copy; 2024 Cairo Public Hospital. All rights reserved.</p>
    </footer>
</body>
</html>
