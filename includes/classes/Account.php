<?php
  class Account {

    private $errorArray;

    public function __construct() {
      $this->errorArray = array();
    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
      $this->checkFirstName($fn);
      $this->checkLastName($ln);
      $this->checkUsername($un);
      $this->checkEmails($em, $em2);
      $this->checkPasswords($pw, $pw2);

      if (empty($this->errorArray)) {
        return true;
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