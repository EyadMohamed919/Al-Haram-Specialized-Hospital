<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../CSS Sheets/HomePageStyle.css">
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Types Of Donations</title>
        <link rel="stylesheet" href="../CSS Sheets/FormStyle1.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <div id="title"><h1 id="title" style="font-family: Arial; font-size: 50px; text-align: center; color: lightseagreen;">Donations</h1>
        <title>Donations</title></div>
    </head>
    <body>
        <?php
            include_once('../repeated.php');
            navBar();
        ?>
        <h1><b>Description:</b></h1>
        <p>
        <br> Donations to public hospitals can be a lifeline for countless individuals.
             By supporting these institutions, we can help ensure that vital medical services are accessible to all,
             regardless of their financial situation. Donations can fund critical equipment purchases,
             support groundbreaking research, and provide essential care to patients who may not otherwise have access to it.
             Every contribution, no matter how small, can make a significant impact on the lives of those who rely on public healthcare,
             ultimately leading to healthier communities and a brighter future for all.</p><hr> 
             <h1>Types Of Donations</h1>
             <a href="MoneyDonations.php" target="_blank"></a>
             <a href="MoneyDonations.php" class="button-link">
             <img src="../CSS Sheets/Images/DonationsImages/Money.png" width="200" height="200" alt="Icon" class="button-image" align="center"></a>
             <label for="myButton">Money Donations</label>
             <a href="BloodDonations.php" target="_blank"></a>
             <a href="BloodDonations.php" class="button-link">
             <img src="../CSS Sheets/Images/DonationsImages/Blood bag.png" width="200" height="200" alt="Icon" class="button-image" align="center"></a>
             <label for="myButton">Blood Donations</label>
             <a href="OrganDonations.php" target="_blank"></a>
             <a href="OrganDonations.php" class="button-link">
             <img src="../CSS Sheets/Images/DonationsImages/Heart.png" width="200" height="200" alt="Icon" class="button-image" align="center"></a>
             <label for="myButton">Organ Donations</label>
    </body>
</html>
