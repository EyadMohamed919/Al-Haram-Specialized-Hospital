<!DOCTYPE html>
<html lang="en">
<?php
session_start();


if (isset($_SESSION["Logged"])) {
  if($_SESSION["Logged"] == true)
  {
    if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == true)
      {
        header("location: Admin/adminMain.php");
      }
      else
      {
        header("location: index.php");
      }

    }
  }
    
}

?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Al Haram Hospital</title>
  <link rel="stylesheet" href="CSS Sheets/LoginStyle.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h1>Welcome Back</h1>
      <p>Sign in to continue</p>

      <form id="loginForm" method="post" action="GlobalFunctions.php">
        <div class="input-group">
          <input type="email" id="email" name="email" required value="hamada@hospital.com">
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" id="password" name="password" required value="123">
          <label for="password">Password</label>
        </div>
        <?php
        if(isset($_SESSION["Logged"]))
        {
          if ($_SESSION["Logged"] == false) {
              echo "<p> Incorrect email or password<p>";
          }
        }

        ?>
        <a href="Register.php">Register?</a>
        <button type="submit" name="login">Login</button>
      </form>
      
    </div>
    
  </div>
  <script src="script.js"></script>
</body>
</html>