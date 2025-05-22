<html lang="en">
<?php
session_start();
    if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: index.php");
      }
    }
    else
    {
        header("location: ../index.php");
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
    <?php include_once("../repeated.php"); navBar(); ?>
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
                echo "<h2>Name: " . $_SESSION["UserName"] . "</h2>";
                echo "<h2>Email: " . $_SESSION["UserEmail"] . "</h2>";
                echo "<h2>Access: " . $_SESSION["Access"] . "</h2>";
            ?>
            
          <form class="admin-adder" action="../GlobalFunctions.php" method="post">
            <label for="name">Add New Admin</label>
            <input type="text" name="name" placeholder="Enter New admin's name"<?php if($_SESSION["Access"]!="top"){echo "disabled";}?>>
            <input type="email" name="email" value="example@hospital.com" <?php if($_SESSION["Access"]!="top"){echo "disabled";}?>>
            <select name="access" <?php if($_SESSION["Access"]!="top"){echo "disabled";}?>>
                <option value="messages">Choose Access</option>
                <option value="messages">Messages</option>
                <option value="pharmacist">Pharmacist</option>
            </select>
            <button type="submit" name="addAdmin" <?php if($_SESSION["Access"]!="top"){echo "disabled";}?>>Add</button>
          </form>
        </div>

        <?php include_once("../repeated.php"); adminNav(); ?>
    </section>

    <script src="form.js"></script>
</body>
</html>