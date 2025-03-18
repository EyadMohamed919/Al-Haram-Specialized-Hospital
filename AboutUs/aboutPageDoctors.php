<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutDoctorStyle.css">
    <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
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
            <h2 class="content-box-title">Our Physicians</h2>
            <h3 class="content-box-subtitle">Doctors<hr class="content-box-subtitle-hr"></h3>
            <div class="content-card">
                <img src="../CSS Sheets/Images/AboutUsImages/Doctor/Photo 1.jpg" alt="">
                <div class="content-card-container">
                    <div class="content-card-bar">
                        <h4><i class="fa-solid fa-user-doctor"></i> Dr. Khaled Rafek El Shenawy</h4>
                        <p>Internal medicine and endocrinology consultant, Ain Shams University</p>
                    </div>
                    <p class="content-card-bar-paragraph">Endocrinologist Specialized in Adult Diabetes and Endocrinology, Adult Internal Medicine, Adult Chest and Respiratory and Pediatric Diabetes and Endocrinology</p>
                    <p class="content-card-bar-paragraph" id="fees"><i class="fa-solid fa-money-bill-wave"></i> Fees: 300EGP</p>
                </div>
            </div>

            <div class="content-card">
                <img src="../CSS Sheets/Images/AboutUsImages/Doctor/Photo2.jpg" alt="">
                <div class="content-card-container">
                    <div class="content-card-bar">
                        <h4><i class="fa-solid fa-user-doctor"></i> Dr. Ahmed Ismael</h4>
                        <p>Vascular surgery specialist at Armed Forces Hospitals</p>
                    </div>
                    <p class="content-card-bar-paragraph">Vascular Surgeon Specialized in Pediatric Vascular Surgery, Adult Vascular Surgery and Diabetic Foot treatment</p>
                    <p class="content-card-bar-paragraph" id="fees"><i class="fa-solid fa-money-bill-wave"></i> Fees: 500EGP</p>
                </div>
            </div>

            <div class="content-card">
                <img src="../CSS Sheets/Images/AboutUsImages/Doctor/Photo3.jpg" alt="">
                <div class="content-card-container">
                    <div class="content-card-bar">
                        <h4><i class="fa-solid fa-user-doctor"></i> Dr. Hala Yousre</h4>
                        <p>Orthodontic and esthetic specialist</p>
                    </div>
                    <p class="content-card-bar-paragraph">Dentist Specialized in Adult Dentistry, Pediatric Dentistry, Cosmetic Dentistry, Endodontics, Periodontics , Oral and Maxillofacial Surgery, Orthodontics, Prosthodontics, Elder Dentistry, Oral Radiology and Implantology</p>
                    <p class="content-card-bar-paragraph" id="fees"><i class="fa-solid fa-money-bill-wave"></i> Fees: 100EGP</p>
                </div>
            </div>

            <div class="content-card">
                <img src="../CSS Sheets/Images/AboutUsImages/Doctor/Photo4.jpg" alt="">
                <div class="content-card-container">
                    <div class="content-card-bar">
                        <h4><i class="fa-solid fa-user-doctor"></i> Dr. Mohamed Amr Mahmoud</h4>
                        <p>Dentistry Specialist</p>
                    </div>
                    <p class="content-card-bar-paragraph">Dentist Specialized in Cosmetic Dentistry, Endodontics, Orthodontics, Implantology and Adult Dentistry</p>
                    <p class="content-card-bar-paragraph" id="fees"><i class="fa-solid fa-money-bill-wave"></i> Fees: 100EGP</p>
                </div>
            </div>
        </div>

        <!-- This is where user get to other links -->
        <div class="aside-dive">
        <?php
            include("AboutFunctions.php");
            showAboutAside();
         ?>
        </div>
    </section>
</body>
</html>