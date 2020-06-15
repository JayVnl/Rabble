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
  <link rel="stylesheet" href="assets/css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
</head>

<body>
  <?php 
    if (isset($_POST['registerButton'])) {
      echo '<script>
              $(document).ready(function () {
                $("#loginForm").hide();
                $("#registerForm").show();
              })
            </script>';
    } else {
      echo '<script>
              $(document).ready(function () {
                $("#loginForm").show();
                $("#registerForm").hide();
              })
            </script>';
    }
    ?>

  <div id="inputContainer">
    <div id="loginContainer">
      <form action="register.php" id="loginForm" method="POST">
        <img src="assets/img/rabble_logo.svg" />
        <br>
        <div class="grid-login">
          <input type="text" name="loginUsername" id="loginUsername" value="<?php getInputValue('loginUsername') ?>" placeholder="Username" required>
          <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required>
          <div class="btn-border">
            <button type="submit" name="loginButton">Log in</button>
          </div>
        </div>
        <?php echo $account->getError(Constants::$loginFailed); ?>
        
        <br>
        <div class="openRegisterForm">
          <span class="text">Don't have an account? <span id="hideLogin">Sign up here</span></span>
        </div>
      </form>
    </div>
    

    <form action="register.php" id="registerForm" method="POST">
      <?php echo $account->getError(Constants::$fnLength); ?>
      <label for="firstName">First name</label>
      <input type="text" name="firstName" id="firstName" value="<?php getInputValue('firstName') ?>" required>
      <br>
      <?php echo $account->getError(Constants::$lnLength); ?>
      <label for="lastName">Last name</label>
      <input type="text" name="lastName" id="lastName" value="<?php getInputValue('lastName') ?>" required>
      <br> 
      <?php echo $account->getError(Constants::$unLength); ?>
      <?php echo $account->getError(Constants::$unTaken); ?>
      <label for="registerUsername">Username</label>
      <input type="text" name="registerUsername" id="registerUsername" value="<?php getInputValue('registerUsername') ?>" required>
      <br>
      <?php echo $account->getError(Constants::$emNoMatch); ?>
      <?php echo $account->getError(Constants::$emInvalid); ?>
      <?php echo $account->getError(Constants::$emTaken); ?>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="<?php getInputValue('email') ?>" required>
      <br>
      <label for="email2">Confirm email</label>
      <input type="email" name="email2" id="email2" value="<?php getInputValue('email2') ?>" required>
      <br>
      <?php echo $account->getError(Constants::$pwNoMatch); ?>
      <?php echo $account->getError(Constants::$pwNoAlpha); ?>
      <?php echo $account->getError(Constants::$pwLength); ?>
      <label for="registerPassword">Password</label>
      <input type="password" name="registerPassword" id="registerPassword" required>
      <br>
      <label for="registerPassword2">Confirm password</label>
      <input type="password" name="registerPassword2" id="registerPassword2" required>
      <br>
      <button type="submit" name="registerButton">Sign up</button>
      <br>
      <div class="openRegisterForm">
        <span id="hideRegister">Already have an account? Log in here</span>
      </div>
    </form>
  </div>
</body>

</html>