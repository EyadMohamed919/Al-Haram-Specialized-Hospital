<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
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
            <h2 class="content-box-title">Awards</h2>
            <h3 class="content-box-subtitle">WSO Angels Award<hr class="content-box-subtitle-hr"></h3>
            <div class="content-award">
                <p class="content-box-paragraph">Health announces that Al Haram Hospital has received the World Stroke Organization's Platinum Award

                    <br><br>The award is presented to units with low mortality and the highest commitment to quality standards in stroke treatment
                    
                    <br><br>The unit was established in 2021 with a capacity of 4 beds, which was increased to 16 beds this year
                    
                    <br><br>The stroke unit at Al Haram Hospital has treated 1,586 cases since the beginning of operation</p>
                    <img src="../CSS Sheets/Images/AboutUsImages/Al Haram Hospital Award.png" alt="WSO Angels Award">
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