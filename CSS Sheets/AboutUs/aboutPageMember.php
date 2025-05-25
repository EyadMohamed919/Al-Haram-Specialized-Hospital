<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutBoardStyle.css">
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
            <h2 class="content-box-title">Members of Board of Directors</h2>
            <div>
                <h3 class="content-box-subtitle"><i class="fa-solid fa-address-card"></i> Dr. Lamiaa Fouda</h3>
                <p class="content-box-paragraph"><i class="fa-solid fa-circle"></i> Head of Training Department</p>
                <hr class="content-box-subtitle-hr">
            </div>

            <div>
                <h3 class="content-box-subtitle"><i class="fa-solid fa-address-card"></i> Dr. Asia Saeed</h3>
                <p class="content-box-paragraph"><i class="fa-solid fa-circle"></i> Head of Clinical Pharmacy Department</p>
                <hr class="content-box-subtitle-hr">
            </div>

            <div>
                <h3 class="content-box-subtitle"><i class="fa-solid fa-address-card"></i> Dr. Injee El Said</h3>
                <p class="content-box-paragraph"><i class="fa-solid fa-circle"></i> Member of the Therapeutic Nutrition Committee</p>
                <hr class="content-box-subtitle-hr">
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