<?php
session_start();
  include("php/connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pink Axolotl</title>
    <meta charset="UTF-8">
    <script src="scripts/Scripts.js"></script>
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Home.css">
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
        <div class="carousel">
          <div class="slides">
            <input type="radio" name="radbtn" onclick="wait(1)" id="p1">
            <input type="radio" name="radbtn" onclick="wait(2)" id="p2">
            <input type="radio" name="radbtn" onclick="wait(3)" id="p3">
            <div class="slide start">
              <img src="img/A1.jpg" alt="">
            </div>
            <div class="slide">
              <img src="img/A2.jpg" alt="">
            </div>
            <div class="slide">
              <img src="img/A3.jpg" alt="">
            </div>
          </div>
          <div class="autonav">
            <div class="autobtn1"></div>
            <div class="autobtn2"></div>
            <div class="autobtn3"></div>
          </div>
          <div class="mannav">
            <label for="p1" class="manbtn"></label>
            <label for="p2" class="manbtn"></label>
            <label for="p3" class="manbtn"></label>
          </div>
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
