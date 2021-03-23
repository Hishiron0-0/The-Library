<?php
session_start();
  include("php/connection.php");
  include("php/functions.php");
  $user_data = get_data($con);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pink Axolotl</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/profilestyles.css">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="hcontent">
          <a href="Main.php" rel="noopener noreferrer">
            <img class="logoimg" border="0" src="img/Logo.jpg">
          </a>
          <div class="accname">
            THE LIBRARY
          </div>
          <div class="navigations">
            <a href="Books.php" rel="noopener noreferrer">
              <img class="navlogos acc"  src="img/Booklogo.png">
            </a>
            <a href="About.php" rel="noopener noreferrer">
              <img class="navlogos abo"  src="img/Aboutlogo.png">
            </a>
            <a href="Login.php" rel="noopener noreferrer">
              <img class="navlogos log"  src="img/Accountlogo.png">
            </a>
          </div>
        </div>
      </div>
      <div class="contentpart">
        <div class="profilepage">
          <div class="profile">
            <div class="profile_name">
              PROFILE
            </div>
            <div class="profile_content">
              <?php
              profile_content($con,$user_data);
              ?>
            </div>
            <div class="rent">
              <?php
              rent_content($con,$con2,$user_data);
              ?>
            </div>
            <form method="POST" action="#">
              <input type="submit" name="logout" value="Logout">
            </form>
            <?php
              clear_session();
            ?>
          </div>
        </div>
      </div>
      <div class="footer">
        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
          <img class="smlogos fb"  src="img/icon_fb.png" width="60" height="60">
        </a>
        <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer">
          <img class="smlogos twt"  src="img/icon_twt.png" width="60" height="60">
        </a>
        <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
          <img class="smlogos inst"  src="img/icon_insta.png" width="60" height="60">
        </a>
      </div>
    </div>
  </body>
</html>
