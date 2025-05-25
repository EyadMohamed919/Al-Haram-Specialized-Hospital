<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutVisionStyle.css">
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
            <h2 class="content-box-title">Vision, Mission & Values</h2>
            <div class="content-box-container">
                <h3 class="content-box-subtitle"><i class="fa-solid fa-bullseye"></i> Mission & Objectives<hr class="content-box-subtitle-hr"></h3>
                <p class="content-box-paragraph">Our mission is to serve our 
                    community through continuous education, training and introducing 
                    high quality medical services including facilities and amenities
                     that promote the highest quality care. <br>
                     To carry out this mission, Al Haram Hospital is dedicated to:
                </p>
                <ul>
                    <li><strong><em>Partnering</em></strong> with reputable institutions</li>
                    <li>Attracting the best <strong><em>physicians</em></strong> and support staff</li>
                    <li>Investing behind latest <strong><em>technology</em></strong> and cutting edge procedures</li>
                    <li>Implementing the best in <strong><em>hospital systems</em></strong> processes and procedures befitting with the local environment and customs</li>
                    <li>Establishing a hub for <strong><em>education</em></strong> and training</li>
                    <li>Become home to a world class working environment for our employees</li>
                </ul>
            </div>
            <div class="content-box-container">
                <h3 class="content-box-subtitle">Values <hr class="content-box-subtitle-hr"></h3>
                <p class="content-box-paragraph">We are bound by key fundamental values and principles:</p>
                <ul>
                    <li>Professional and technological excellence</li>
                    <li>Continuous education, research and development</li>
                    <li>Quality service guided by compassion</li>
                    <li>Integrity of highest standards driven by honesty, transparency, respect and confidentiality.</li>
                </ul>
            </div>
        </div>

        <!-- This is where user get to other links -->
        <?php
            include("AboutFunctions.php");
            showAboutAside();
         ?>
    </section>
</body>
</html>