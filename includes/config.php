<?php
  ob_start();

  $timezone = date_default_timezone_set("Europe/Amsterdam");

  $con = mysqli_connect("localhost", "root", "", "rabble");

  if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
  }
?>