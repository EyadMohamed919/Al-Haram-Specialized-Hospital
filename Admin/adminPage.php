<html lang="en">
<?php
session_start();


if (!isset($_SESSION["user_email"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: ../index.php"); // Redirect non-admins
    exit();
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/AdminStyle.css">
    <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Al Haram Hospital</title>
</head>
<body>
    <?php include("../repeated.php"); navBar(); ?>
    <header class="header-section">
    </header>
    <div class="header-title">
        <h1>Administrative</h1>
    </div>
    
    <!-- Main Content of the page -->
    <section class="content-section">
        <div class="content-box">
            <h2 class="content-box-title">Admin Settings</h2>
            <h3 class="content-box-subtitle">Profile<hr class="content-box-subtitle-hr"></h3>
            <div  class="userPhoto">
                <i class="fa-solid fa-user"></i>
            </div>

            <?php
                echo "<h2 id=adminName>Name: " . $_SESSION["user_name"] . "</h2>";
                echo "<h2 id=adminEmail>Email: " . $_SESSION["user_email"] . "</h2>";
                echo "<h2 id=adminPassword>Password: " . $_SESSION["user_pass"] . "</h2>";
            ?>
            
            <form  method="get">
                <h2>Change Admin Profile</h2>
                <table>
                    <tr>
                        <td class="name-cell"><label for="name">Admin Name</label></td>
                        <td><input type="text" name="name" id="name" required></td>
                        <td class="name-cell"><label for="email">Email</label></td>
                        <td><input oninput="completer()" type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td class="name-cell"><label for="password">Old Password</label></td>
                        <td><input oninput="completer()" type="password" name="password" id="password"></td>

                        <td class="name-cell"><label for="newPassword">New Password</label></td>
                        <td><input oninput="completer()" type="password" name="newPassword" id="newPassword" required></td>
                    </tr>
                </table>

                <input onclick="saveAdminData()" class="submit-btn" type="submit" value="Save">
            </form>
        </div>

        <?php include_once("../repeated.php"); adminNav(); ?>
    </section>

    <script src="form.js"></script>
</body>
</html>