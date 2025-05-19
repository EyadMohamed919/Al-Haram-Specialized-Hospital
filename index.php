<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="CSS Sheets/HomePageStyle.css">
    <link rel="icon" type="image/x-icon" href="CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Al Haram Hospital</title>
</head>
<body>
    <nav>
            <img src='CSS Sheets/Images/AboutUsImages/Hospital_Logo.svg' class='nav-logo' alt=''>
            <div class='nav-container'>
                <a class='nav-links' href='index.php'>Home</a>
                <a class='nav-links' href='Donations/Donations-Homepage.php'>Donation</a>
                <div class='nav-dropdown'>
                    <a class='nav-links' href='../services/ServicesMain.php'>Services<i class='fa-solid fa-caret-down'></i></a>
                    <div class='nav-dropdown-links'>
                        <a class='dropdown-item' href='services/ServicesMain.php'>Services Home</a>
                        <a class='dropdown-item' href='services/Pharmacy.php'>Pharmacy</a>
                        <a class='dropdown-item' href='services/Tests.php'>Tests</a>
                        <a class='dropdown-item' href='services/Appointments.php'>Book Us</a>
                        <a class='dropdown-item' href='services/Outpatient.php'>Outpatient</a>
                        <a class='dropdown-item' href='services/Surgery.php'>Surgery</a>
                        <a class='dropdown-item' href='services/PrevMed.php'>PrevMed™</a>
                        <a class='dropdown-item' href='services/Emergency.php'>Emergency</a>
                        <a class='dropdown-item' href='services/Dentistry.php'>Dentistry</a>
                        <a class='dropdown-item' href='services/ICU.php'>ICU</a>
                        <a class='dropdown-item' href='services/Oncology.php'>Oncology</a>
                    </div>
                </div>
                
                <a class='nav-links' href='contactUs.php'>Contact Us</a>
                <a class='nav-links' href='AboutUs/aboutPageMain.php'>About Us</a>
                <a class='nav-links' href='Volunteering/Volunteering-Homepage.php'>Volunteering</a>
                <a href='Login.php' class='nav-links'><i class='fa-solid fa-user'></i></a>
                <a href='Logout.php' class='nav-links'><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
            </div>
</nav>

    <header class="header-section">
    </header>
    <div class="header-title">
        <?php
            session_start();
            if(isset($_SESSION["UserName"]))
            {
                echo "<h1>Welcome " . $_SESSION["UserName"] . "</h1>";   
            }
            else
            {
                echo "<h1>Welcome to Al Haram Hospital</h1>";
            }
        ?>
        
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