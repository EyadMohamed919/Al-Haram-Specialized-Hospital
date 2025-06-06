<?php

function navBar()
{
    echo "<nav>
            <img src='../CSS Sheets/Images/AboutUsImages/Hospital_Logo.svg' class='nav-logo' alt=''>
            <div class='nav-container'>
                <a class='nav-links' href='../index.php'>Home</a>
                <a class='nav-links' href='../Donations/Donations-Homepage.php'>Donation</a>
                <div class='nav-dropdown'>
                    <a class='nav-links' href='../services/ServicesMain.php'>Services<i class='fa-solid fa-caret-down'></i></a>
                    <div class='nav-dropdown-links'>
                        <a class='dropdown-item' href='../services/ServicesMain.php'>Services Home</a>
                        <a class='dropdown-item' href='../services/Pharmacy.php'>Pharmacy</a>
                        <a class='dropdown-item' href='../services/Tests.php'>Tests</a>
                        <a class='dropdown-item' href='../services/Appointments.php'>Book Us</a>
                        <a class='dropdown-item' href='../services/Outpatient.php'>Outpatient</a>
                        <a class='dropdown-item' href='../services/Surgery.php'>Surgery</a>
                        <a class='dropdown-item' href='../services/PrevMed.php'>PrevMed™</a>
                        <a class='dropdown-item' href='../services/Emergency.php'>Emergency</a>
                        <a class='dropdown-item' href='../services/Dentistry.php'>Dentistry</a>
                        <a class='dropdown-item' href='../services/ICU.php'>ICU</a>
                        <a class='dropdown-item' href='../services/Oncology.php'>Oncology</a>
                    </div>
                </div>
                
                <a class='nav-links' href='../contactUs.php'>Contact Us</a>
                <a class='nav-links' href='../AboutUs/aboutPageMain.php'>About Us</a>
                <a class='nav-links' href='../Volunteering/Volunteering-Homepage.php'>Volunteering</a>
                <a href='../Login.php' class='nav-links'><i class='fa-solid fa-user'></i></a>
                <a href='../Logout.php' class='nav-links'><i class='fa-solid fa-arrow-right-to-bracket'></i></a>
            </div>
        </nav>";
}

function servicesSEO()
{
    echo "<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel='icon' type='image/x-icon' href='../CSS Sheets/Images/AboutUsImages/favicon.svg'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/c19e8a164c.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS Sheets/aboutNavStyle.css'>
    <link rel='stylesheet' href='../CSS Sheets/aboutAwardStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS Sheets/StyleSecondaryServices.css'>
    <link href='https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap' rel='stylesheet'>
    <link href='https://fonts.goophppis.com/css2?family=Oswald:wght@200..700&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>";
}

function adminNav()
{
    echo "<div class=aside-dive>
    <aside>
        <h2 class=aside-title>Links</h2>
        <hr>
        <div class=aside-container>
            <a class=aside-links href=../Admin/AdminMain.php><i class='fa-regular fa-bookmark'></i> Profile</a>
            <hr class=aside-horizontal>

            <a class=aside-links href=../Admin/adminCareer.php><i class='fa-regular fa-bookmark'></i> Career Applications</a>
            <hr class=aside-horizontal>

            <a class=aside-links href=../Donations/DonationsBE-Homepage.php><i class='fa-regular fa-bookmark'></i> Admin Donations</a>
            <hr class=aside-horizontal>

            <a class=aside-links href=../Volunteering/VolunteeringBE-Homepage.php><i class='fa-regular fa-bookmark'></i> Admin Volunteering</a>
            <hr class=aside-horizontal>

            <a class=aside-links href=../services/admin.php><i class='fa-regular fa-bookmark'></i> Admin Services</a>
            <hr class=aside-horizontal>

            <a class=aside-links href=../Admin/RecieveContactUs.php><i class='fa-regular fa-bookmark'></i> Messages</a>
            <hr class=aside-horizontal>

            <a class=aside-links href=../Admin/AdminUsers.php><i class='fa-regular fa-bookmark'></i> Admin Users</a>
            <hr class=aside-horizontal>
        </div>
    </aside>
</div>";
}
?>