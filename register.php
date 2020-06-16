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
                $("#loginContainer").css("z-index", "1");
              })
            </script>';
    } else {
      echo '<script>
              $(document).ready(function () {
                $("#loginForm").show();
                $("#registerForm").hide();
                $("#loginContainer").css("z-index", "3");
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
        <div class="errorBoxLogin">
          <?php echo $account->getError(Constants::$loginFailed); ?>
        </div>

        <br>
        <div class="openRegisterForm">
          <span class="text">Don't have an account? <span id="hideLogin">Sign up here</span></span>
        </div>
      </form>
    </div>
    
    <div id="registerContainer">
      <form action="register.php" id="registerForm" method="POST">
        <div class="grid-login">
          <input type="text" name="firstName" id="firstName" value="<?php getInputValue('firstName') ?>" placeholder="First name" required>
          <input type="text" name="lastName" id="lastName" value="<?php getInputValue('lastName') ?>" placeholder="Last name" required>
          <input type="text" name="registerUsername" id="registerUsername" value="<?php getInputValue('registerUsername') ?>" placeholder="Username" required>
          <input type="email" name="email" id="email" value="<?php getInputValue('email') ?>" placeholder="Email" required>
          <input type="email" name="email2" id="email2" value="<?php getInputValue('email2') ?>" placeholder="Confirm email" required>
          <input type="password" name="registerPassword" id="registerPassword" placeholder="Password" required>
          <input type="password" name="registerPassword2" id="registerPassword2" placeholder="Confirm password" required>
          <div class="btn-border">
            <button type="submit" name="registerButton">Register</button>
          </div>
        </div>
        <div class="errorBoxRegister">
          <p><?php echo $account->getError(Constants::$fnLength); ?></p>
          <p><?php echo $account->getError(Constants::$lnLength); ?></p>
          <p><?php echo $account->getError(Constants::$unLength); ?></p>
          <p><?php echo $account->getError(Constants::$unTaken); ?></p>
          <p><?php echo $account->getError(Constants::$emNoMatch); ?></p>
          <p><?php echo $account->getError(Constants::$emInvalid); ?></p>
          <p><?php echo $account->getError(Constants::$emTaken); ?></p>
          <p><?php echo $account->getError(Constants::$pwNoMatch); ?></p>
          <p><?php echo $account->getError(Constants::$pwNoAlpha); ?></p>
          <p><?php echo $account->getError(Constants::$pwLength); ?></p>
        </div>
        <div class="openRegisterForm">
          <span class="text">Already have an account? <span id="hideRegister">Log in here</span></span>
        </div>
      </form>
    </div>
  </div>
</body>

</html>