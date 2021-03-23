<?php
session_start();
  include("php/connection.php");
  include("php/functions.php");
  $query = mysqli_query($con,"SELECT * FROM inventory");
  $rownum = mysqli_num_rows($query);
  $rn = ceil($rownum/5);
  $nwidth = $rn * 100;
  $newwidth =''.$nwidth.'%';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pink Axolotl</title>
    <meta charset="UTF-8">
    <script src="scripts/BookScript.js" defer></script>
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/BookStyle.css">
  </head>
  <style>
    .blist{
      width: <?=$newwidth?>;
    }
    <?php
      for_nav($con,$rn);
    ?>
  </style>
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
        <div class="bookspart">
          <div class="blist">
            <?php
              rbut($con,$rn);
              default_bookpage($con,$rownum);
            ?>
          </div>
              <?php
              man_nav($con,$rn);
              ?>
            <div class="slidearrows">
              <input type="image" src="img/backarrow.png" name="sarr" onclick="arrowadjust(-1)" id="backarr">
              <input type="image" src="img/nextarrow.png" name="sarr" onclick="arrowadjust(1)" id="nextarr">
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
