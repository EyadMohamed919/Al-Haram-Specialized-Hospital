<?php
session_start();


if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: index.php");
      }
    }

?>
    <head>
        <title>Donations Admin page</title>
        <link rel="stylesheet" href="../CSS Sheets/BEstylesheet1.css">
        <h1 id="title" style="font-family: Arial; font-size: 50px; text-align: center; color: lightseagreen;">Donations Admin page</h1>
    </head>
    <body>
        <h1><b>Description:</b></h1>
        <p>
        <br>An admin page for donators is an essential tool for organizations to efficiently manage and monitor their donation activities.
         It serves as a centralized hub where administrators can track donation records, maintain donor profiles,
         and analyze trends in contributions. This streamlined approach allows for better financial oversight,
         ensuring transparency and accountability in the handling of funds. Moreover,
         an admin page helps organizations build stronger relationships with donors by enabling personalized communication,
         acknowledgment of contributions, and updates on the impact of their donations. By facilitating better management, reporting,
         and engagement, an admin page plays a vital role in sustaining donor trust and ensuring the long-term success of fundraising efforts.
        </p><hr> 
        <h1>Types Of Donations</h1>
        <a href="MoneyDonBE.php" target="_blank"></a>
        <a href="MoneyDonBE.php" class="button-link">
        <img src="../CSS Sheets/Images/DonationsImages/Money.png" width="200" height="200" alt="Icon" class="button-image" align="center">
        <label for="myButton">Money Donations</label>
        <a href="BloodDonBE.php" target="_blank"></a>
        <a href="BloodDonBE.php" class="button-link">
        <img src="../CSS Sheets/Images/DonationsImages/Blood bag.png" width="200" height="200" alt="Icon" class="button-image" align="center">
        <label for="myButton">Blood Donations</label>
        <a href="OrganDonBE.php" target="_blank"></a>
        <a href="OrganDonBE.php" class="button-link">
        <img src="../CSS Sheets/Images/DonationsImages/Heart.png" width="200" height="200" alt="Icon" class="button-image" align="center">
        <label for="myButton">Organ Donations</label>


        <?php include_once("../repeated.php"); adminNav(); ?>
    </body>
</php>
