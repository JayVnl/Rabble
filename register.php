<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($con);
  
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
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
        <?php echo $account->getError(Constants::$loginFailed); ?>
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
        <?php echo $account->getError(Constants::$fnLength); ?>
        <label for="firstName">First name</label>
        <input type="text" name="firstName" id="firstName" value="<?php getInputValue('firstName') ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$lnLength); ?>
        <label for="lastName">Last name</label>
        <input type="text" name="lastName" id="lastName" value="<?php getInputValue('lastName') ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$unLength); ?>
        <?php echo $account->getError(Constants::$unTaken); ?>
        <label for="registerUsername">Username</label>
        <input type="text" name="registerUsername" id="registerUsername" value="<?php getInputValue('registerUsername') ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$emNoMatch); ?>
        <?php echo $account->getError(Constants::$emInvalid); ?>
        <?php echo $account->getError(Constants::$emTaken); ?>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php getInputValue('email') ?>" required>
      </p>
      <p>
        <label for="email2">Confirm email</label>
        <input type="email" name="email2" id="email2" value="<?php getInputValue('email2') ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$pwNoMatch); ?>
        <?php echo $account->getError(Constants::$pwNoAlpha); ?>
        <?php echo $account->getError(Constants::$pwLength); ?>
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