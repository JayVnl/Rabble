<?php
  include('includes/handlers/register-handler.php');
  include('includes/handlers/login-handler.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <div id="inputContainer">
    <form action="register.php" id="loginForm" method="POST">
      <h2>Login</h2>
      <p>
        <label for="loginUsername">Username</label>
        <input type="text" name="loginUsername" id="loginUsername" required>
      </p>
      <p>
        <label for="loginPassword">Password</label>
        <input type="password" name="loginPassword" id="loginPassword" required>
      </p>
      <button type="submit" name="loginButton">Log in</button>
    </form>

    <form action="register.php" id="registerForm" method="POST">
      <h2>Register</h2>
      <p>
        <label for="firstName">First name</label>
        <input type="text" name="firstName" id="firstName" required>
      </p>
      <p>
        <label for="lastName">Last name</label>
        <input type="text" name="lastName" id="lastName" required>
      </p>
      <p>
        <label for="registerUsername">Username</label>
        <input type="text" name="registerUsername" id="registerUsername" required>
      </p>
      <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </p>
      <p>
        <label for="email2">Confirm email</label>
        <input type="email" name="email2" id="email2" required>
      </p>
      <p>
        <label for="registerPassword">Password</label>
        <input type="password" name="registerPassword" id="registerPassword" required>
      </p>
      <p>
        <label for="registerPassword2">Confirm password</label>
        <input type="password" name="registerPassword2" id="registerPassword2" required>
      </p>
      <button type="submit" name="registerButton">Sign up</button>
    </form>
  </div>
</body>

</html>