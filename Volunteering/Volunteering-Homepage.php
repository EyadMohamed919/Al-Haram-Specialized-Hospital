<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../CSS Sheets/HomePageStyle.css">
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
        <title>Types Of Volunteering</title>
        <link rel="stylesheet" href="../CSS Sheets/FormStyle1.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
        <style>
            .flex-container {
                display: flex;
                justify-content: center;
                gap: 20px;
            }
            .links {
                text-align: center;
                margin: 0 10px;
            }
            .button-link {
                display: inline-block;
            }
            .button-image {
                border-radius: 9px;
                margin-bottom: 10px;
            }
            .links label {
                margin-top: 10px;
                display: block;
            }
        </style>
        <h1 id="title" style="font-family: Arial; font-size: 50px; text-align: center; color: lightseagreen; margin-top: 75px;">Types Of Volunteering</h1>
    </head>
    <body>
        <?php
            include_once '../repeated.php';
            navBar();
        ?>
        <h1><b>Description:</b></h1>
        <p>
        <br>Volunteering in hospitals is a noble act that can significantly impact the lives of patients and their families.
            By dedicating their time and energy, volunteers provide invaluable support,
            alleviating the burdens faced by both patients and healthcare staff.
            From offering companionship and emotional support to assisting with administrative tasks,
            volunteers contribute to a more positive and caring hospital environment.
            Their efforts can uplift patients' spirits, reduce stress, and accelerate the healing process. Ultimately,
            hospital volunteers play a vital role in enhancing the overall quality of healthcare and creating a more compassionate healthcare system.</p><hr> 
             <h1 style="text-align: center;">Types Of Volunteering</h1>
             <center>
                <section class="flex-container">
                    <div class="links">
                        <a href="MedicalVolunteering.php" class="button-link">
                        <img src="../CSS Sheets/Images/Volunteering/Medical Volunteer.jpg" width="200" height="200" alt="Icon" class="button-image" align="center"></a>
                        <label for="myButton">Medical Volunteering</label>
                    </div>
                    <div class="links">
                        <a href="OfficeVolunteering.php" class="button-link">
                        <img src="../CSS Sheets/Images/Volunteering/Office Volunteer.jpg" width="200" height="200" alt="Icon" class="button-image" align="center"></a>
                        <label for="myButton">Office Volunteering</label>
                    </div>
                    <div class="links">
                        <a href="ChildLifeVolunteering.php" class="button-link">
                        <img src="../CSS Sheets/Images/Volunteering/Child Life Volunteer.jpg" width="200" height="200" alt="Icon" class="button-image" align="center"></a>
                        <label for="myButton">Child Life Volunteering</label>
                    </div>
                </section>
             </center>
    </body>
</html>
