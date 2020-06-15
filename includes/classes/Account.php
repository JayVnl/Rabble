<?php
  class Account {
    private $con;
    private $errorArray;

    public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
    }

    public function login($un, $pw) {
      $pw = md5($pw);
      $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

      if (mysqli_num_rows($query) == 1) {
        return true;
      } else {
        array_push($this->errorArray, Constants::$loginFailed);
        return false;
      }
    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
      $this->checkFirstName($fn);
      $this->checkLastName($ln);
      $this->checkUsername($un);
      $this->checkEmails($em, $em2);
      $this->checkPasswords($pw, $pw2);

      if (empty($this->errorArray)) {
        return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
      } else {
        return false;
      }
    }

    public function getError($error) {
      if (!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($fn, $ln, $un, $em, $pw) {
      // I know md5 isn't good for encrypting passwords so this will most likely change later on to something like bcrypt
      $pwEncrypted = md5($pw);
      $profilePic = "assets/images/profile-pics/standard_icon.png";
      $date = date("Y-m-d");

      $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$pwEncrypted', '$date', '$profilePic')");
    
      return $result;
    }
  
    private function checkFirstName($fn) {
      if (strlen($fn) > 25 || strlen($fn) < 2) {
        array_push($this->errorArray, Constants::$fnLength);
        return;
      }
    }
  
    private function checkLastName($ln) {
      if (strlen($ln) > 30 || strlen($ln) < 2) {
        array_push($this->errorArray, Constants::$lnLength);
        return;
      }
    }

    private function checkUsername($un) {
      if (strlen($un) > 25 || strlen($un) < 3) {
        array_push($this->errorArray, Constants::$unLength);
        return;
      }

      $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username ='$un'");
      if (mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($this->errorArray, Constants::$unTaken);
        return;
      }
    }
  
    private function checkEmails($em, $em2) {
      if ($em != $em2) {
        array_push($this->errorArray, Constants::$emNoMatch);
        return;
      }
      
      if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        array_push($this->errorArray, Constants::$emInvalid);
        return;
      }

      $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email ='$em'");
      if (mysqli_num_rows($checkEmailQuery) != 0) {
        array_push($this->errorArray, Constants::$emTaken);
        return;
      }
    }
  
    private function checkPasswords($pw, $pw2) {
      if ($pw != $pw2) {
        array_push($this->errorArray, Constants::$pwNoMatch);
        return;
      }

      if (preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($this->errorArray, Constants::$pwNoAlpha);
        return;
      }

      if (strlen($pw) > 30 || strlen($pw) < 5) {
        array_push($this->errorArray, Constants::$pwLength);
        return;
      }
    }
  }
?>