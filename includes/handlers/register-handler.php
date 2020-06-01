<?php
  function CleanFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
  }

  function CleanFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
  }

  function CleanFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
  }

  if(isset($_POST['registerButton'])){
    $registerUsername = CleanFormUsername($_POST['registerUsername']);
    $firstName = CleanFormString($_POST['firstName']);
    $lastName = CleanFormString($_POST['lastName']);
    $email = CleanFormString($_POST['email']);
    $email2 = CleanFormString($_POST['email2']);
    $registerPassword = CleanFormPassword($_POST['registerPassword']);
    $registerPassword2 = CleanFormPassword($_POST['registerPassword2']);
  }
?>