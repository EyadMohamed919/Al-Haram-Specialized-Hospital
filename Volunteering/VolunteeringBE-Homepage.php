<html>
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
        <title>Volunteering Admin page</title>
        <link rel="stylesheet" href="../../CSS Sheets/BEstylesheet2.css">
        <h1 id="title" style="font-family: Arial; font-size: 50px; text-align: center; color: lightseagreen;">Volunteering Admin page</h1>  
    </head>
<body>

    <p style="color: darkblue;"><br>An admin page for volunteers streamlines management by centralizing registration, schedules, and contributions. 
    It enables real-time tracking, efficient task allocation, and clear communication. Additionally, it helps identify trends,
    address challenges, and optimize resources, enhancing efficiency and accountability while supporting the hospital's mission.</p><hr>
            <h1 style="text-align: center;">Types Of Volunteering</h1>
            <div class="icon-container">
                <div class="icon">
                    <a href="MedicalVolBE.php" class="button-link">
                        <img src="../../CSS Sheets/Images/Volunteering/Medical Volunteer.jpg" width="200" height="200" alt="Medical Volunteering">
                    </a>
                    <label>Medical Volunteering</label>
                </div>

                <div class="icon">
                    <a href="OfficeVolBE.php" class="button-link">
                        <img src="../../CSS Sheets/Images/Volunteering/Office Volunteer.jpg" width="200" height="200" alt="Office Volunteering">
                    </a>
                    <label>Office Volunteering</label>
                </div>

                <div class="icon">
                    <a href="ChildLifeVolBE.php" class="button-link">
                        <img src="../../CSS Sheets/Images/Volunteering/Child Life Volunteer.jpg" width="200" height="200" alt="Child Life Volunteering">
                    </a>
                    <label>Child Life Volunteering</label>
                </div>
            </div>
            
            <?php include_once("../repeated.php"); adminNav(); ?>
</body>
</html>