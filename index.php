<?php
include("includes/config.php");

if (isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
  header("Location: register.php");
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div id="playBarContainer">
    <div id="playBar">
      <div id="playBarLeft">
        <span class="albumLink">
          <img class="albumArt" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fs.mxmcdn.net%2Fimages-storage%2Falbums4%2F0%2F3%2F5%2F3%2F0%2F1%2F37103530_800_800.jpg&f=1&nofb=1" />
        </span>
        <div class="trackInfo">
          <span class="trackName">
            <span>Best Friends</span>
          </span>
          <span class="artistName">
            <span>Grandson</span>
          </span>
        </div>
      </div>
      <div id="playBarRight">
        <div class="playBar-play-bg">
          <button class="playBar-btn playBar-play">
            <img src="assets/img/rabble_playbar_play.svg" />
          </button>
        </div>
        <div class="playBar-play-bg" style="display: none;">
          <button class="playBar-btn playBar-pause">
            <img src="assets/img/rabble_playbar_pause.svg" />
          </button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>