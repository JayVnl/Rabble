<?php
  class Account {

    private $errorArray;

    public function __construct() {
      $this->$errorArray = array();
    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
      $this->checkFirstName($fn);
      $this->checkLastName($ln);
      $this->checkUsername($un);
      $this->checkEmails($em, $em2);
      $this->checkPasswords($pw, $pw2);
    }
  
    private function checkFirstName($fn) {
      if(strlen($fn) > 25 || strlen($fn) < 2) {
        array_push($this->errorArray, "First name has to be between 2 and 25 characters!");
        return;
      }
    }
  
    private function checkLastName($ln) {
      if(strlen($ln) > 30 || strlen($ln) < 2) {
        array_push($this->errorArray, "Last name has to be between 2 and 30 characters!");
        return;
      }
    }

    private function checkUsername($un) {
      if(strlen($un) > 22 || strlen($un) < 3) {
        array_push($this->errorArray, "Username has to be between 3 and 22 characters!");
        return;
      }
    }
  
    private function checkEmails($em, $em2) {
      if($em != $em2) {
        array_push($this->errorArray, "Emails don't match!");
        return;
      }
      
      if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        array_push($this->errorArray, "Email is invalid!");
        return;
      }
    }
  
    private function checkPasswords($pw, $pw2) {
      if($pw != $pw2) {
        array_push($this->errorArray, "Passwords don't match!");
        return;
      }

      if(preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($this->errorArray, "Password can only contain letters and numbers!");
        return;
      }

      if(strlen($pw) > 30 || strlen($pw) < 5) {
        array_push($this->errorArray, "Password has to be between 5 and 30 character!");
        return;
      }
    }
  }
?>