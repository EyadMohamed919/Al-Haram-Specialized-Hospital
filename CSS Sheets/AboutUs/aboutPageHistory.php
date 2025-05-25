<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutHistoryStyle.css">
    <link rel="icon" type="image/x-icon" href="CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Al Haram Hospital</title>
</head>
<body>
    <?php
    include("../repeated.php");
    navBar();   
    ?>
    <header class="header-section">
    </header>
    <div class="header-title">
        <h1>About Us</h1>
    </div>
    
    <!-- Main Content of the page -->
    <section class="content-section">
        <div class="content-box">
            <h2 class="content-box-title">History & Milestone</h2>
            <img class="content-image" src="../CSS Sheets/Images/AboutUsImages/Al Haram Hospital Zoomed.jpg" alt="Picture of Al Haram Hospital">
            <h3 class="content-box-subtitle">History<hr class="content-box-subtitle-hr"></h3>
                <p class="content-box-paragraph">Our hospital, a beacon of hope and recovery, 
                    traces its roots back to 1982. Founded with a vision to provide
                     exceptional healthcare to the community, we have evolved into a 
                     state-of-the-art medical facility.
                </p>
                <ul>
                    <h3 class="content-box-subtitle">Key Milestone<hr class="content-box-subtitle-hr"></h3>
                    <li>1982: Hospital Establishment: Our journey began with the laying of the foundation stone.</li>
                    <li>1995: Expansion of Services: We expanded our services to include cardiology and oncology departments.</li>
                    <li>2005: Adoption of Advanced Technology: We embraced cutting-edge technologies like robotic surgery and MRI.</li>
                    <li>2015: International Accreditation: We achieved Joint Commission International (JCI) accreditation, solidifying our commitment to quality.</li>
                    <li>2020: Community Outreach Programs: We launched initiatives to promote preventive healthcare and health awareness, including free health screenings and educational workshops.</li>
                </ul>
        </div>

        <!-- This is where user get to other links -->
        <div class="aside-div">
        <?php
            include("AboutFunctions.php");
            showAboutAside();
         ?>
        </div>
    </section>
</body>
</html>