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
      <h1>Welcome Back</h1>
      <p>Sign in to continue</p>
      <form id="loginForm" method="post" action="Authentication.php">
        <div class="input-group">
          <input type="email" id="email" name="email" required>
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" id="password" name="password" required>
          <label for="password">Password</label>
        </div>
        <button type="submit">Login</button>
      </form>
      <div class="links">
        <a href="#">Forgot Password?</a>
        <a href="#">Create Account</a>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>