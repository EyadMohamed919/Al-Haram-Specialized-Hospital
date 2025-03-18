<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutCareerStyle.css">
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
            <h2 class="content-box-title">Career</h2>
            <h3 class="content-box-subtitle">Career Form <hr class="content-box-subtitle-hr"></h3>
            <p class="content-box-paragraph">Al Haram Specialized Hospital constantly expanding, and we are regularly seeking qualified talent to join the team. If you are interested in working with us, please send us your CV with an appropriate covering letter.</p>
            <form action="SendCareerData.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="name-cell"><label for="Fname">First Name</label></td>
                        <td><input type="text" name="Fname" required></td>
                        <td class="name-cell"><label for="Lname">Last Name</label></td>
                        <td><input type="text" name="Lname" required></td>
                    </tr>
                    <tr>
                        <td class="name-cell"><label for="email">Email</label></td>
                        <td><input oninput="completer()" type="email" name="email" id="email" required></td>

                        <td class="name-cell"><label for="DOB">Date of Birth</label></td>
                        <td><input type="date" name="DOB" required></td>
                    </tr>

                    <tr>
                        <td class="name-cell"><label for="phone">Phone Number</label></td>
                        <td><input type="tel" name="phone" required></td>

                        <td class="name-cell">Gender</td>
                        <td class="gender-cell">
                                <label for="gender">Male</label><input class="radio-btn" type="radio" name="gender" value="M" required>
                                <label for="gender">Female</label><input class="radio-btn" type="radio" name="gender" value="F" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="cv">Upload CV</label></td>
                        <td><input class="cv-input" type="file" name="cv" required></td>
                    </tr>
                </table>

                <input class="submit-btn" type="submit" value="Submit CV">
            </form>
        </div>

        <!-- This is where user get to other links -->
        <?php
            include("AboutFunctions.php");
            showAboutAside();
         ?>
    </section>

    <script src="../form.js"></script>
</body>
</html>