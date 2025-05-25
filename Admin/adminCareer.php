<html lang="en">
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
    <?php 
    include("../repeated.php");
    navBar();
    ?>
    <header class="header-section">
    </header>
    <div class="header-title">
        <h1>Administrative</h1>
    </div>
    
    <!-- Main Content of the page -->
    <section class="content-section">
        <div class="content-box">
            <h2 class="content-box-title">Admin Settings</h2>
            <h3 class="content-box-subtitle">Career Applications<hr class="content-box-subtitle-hr"></h3>
            
            <table class="career-table">
                <tr>
                    <td><strong>Download Resumes</strong></td>
                </tr>
                <?php
                    $folder = "../Database/Uploads";
                    $files = scandir("../Database/Uploads");

                    foreach ($files as $file) {
                
                        if ($file !== '.' && $file !== '..') {
                            $name = basename($file);
                            echo "<tr>";
                            echo "<td>";
                            echo "<a href='$folder/$name' download><i class=\"fa-solid fa-download\"></i> $name</a><br>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                 ?>
            </table>                   
        </div>

        <!-- This is where user get to other links -->
        <?php include_once("../repeated.php"); adminNav(); ?>
    </section>

    <script src="form.js"></script>
</body>
</html>