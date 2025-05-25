<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Al Haram Hospital</title>
  <link rel="stylesheet" href="CSS Sheets/LoginStyle.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h1>Welcome</h1>
      <p>Create new Account</p>

      <form id="loginForm" method="post" action="GlobalFunctions.php">
        <div class="input-group">
          <input type="text" name="name" required value="">
          <label for="name">Username</label>
        </div>
        <div class="input-group">
          <input type="email" id="email" name="email" required value="example@gmail.com">
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" id="password" name="password" required value="123">
          <label for="password">Password</label>
        </div>

        <button type="submit" name="register">Login</button>
      </form>
      
    </div>
    
  </div>
  <script src="script.js"></script>
</body>
</html>