<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/HomePageStyle.css">
    <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Al Haram Hospital</title>
</head>
<body>
    <?php include("repeated.php"); navBar();?>

    <header class="header-section">
    </header>
    <div class="header-title">
        <h1>Welcome to Al Haram Hospital</h1>
    </div>
    
    <!-- Main Content of the page -->
    <section class="content-section">
        <h1>Our Services</h1>
        <div class="images-container">
            <div class="card">
                <h3>Pharmacy</h3>
                <div class="image" id="image1"></div>
                <p>Our pharmacy provides a wide range of medications and health products.</p>
            </div>

            <div class="card">
                <h3>Tests</h3>
                <div class="image" id="image2"></div>
                <p>Book now your blood testing appointment and get the results within 1 day</p>
            </div>

            <div class="card">
                <h3>Outpatients</h3>
                <div class="image" id="image3"></div>
                <p>If you need assistance outside hospital grounds we got you covered</p>
            </div>
        </div>

        <a href="services/ServicesMain.php">See more</a>
    </section>

    <section class="donation-section">
        <h1>Donations</h1>
        <div class="donation-container">
            <div class="donation-box">
                <p>Donations to public hospitals can be a lifeline 
                    for countless individuals. By supporting these 
                    institutions, we can help ensure that vital medical 
                    services are accessible to all, regardless of their 
                    financial situation. Donations can fund critical 
                    equipment purchases, support groundbreaking research, 
                    and provide essential care to patients who may not 
                    otherwise have access to it. 
                    <br>
                    <br>
                    Every contribution, no matter how small, can make 
                    a significant impact on the lives of those who rely 
                    on public healthcare, ultimately leading to healthier
                    communities and a brighter future for all.</p>
                <a href="Donations/Donations-Homepage.php">Donate Now</a>
            </div>
            <div class="donation-image"></div>
        </div>
    </section>
</body>
</html>