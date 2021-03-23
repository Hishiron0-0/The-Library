<?php
session_start();
  include("php/connection.php");
  include("php/functions.php");
  $user_data = get_data($con);
  clear_session();
  addto_table_customers($con);
  addto_table_inventory($con);
  addto_table_rentals($con,$con2);
  edit_table_customers($con);
  edit_table_inventory($con);
  edit_table_rentals($con,$con2);
  remove_table_customers($con);
  remove_table_inventory($con);
  remove_table_rentals($con,$con2);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pink Axolotl</title>
    <meta charset="UTF-8">
    <script src="scripts/Adminscr.js" defer></script>
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Adminstyle.css">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="hcontent">

            <img class="logoimg" border="0" src="img/Logo.jpg">

          <div class="accname">
            THE LIBRARY
          </div>
        </div>
      </div>
      <div class="contentpart">
        <div class="admin_whole">
          <div class="admin_func">
            <ul class="tabs">
              <li data-tab-target="#customer_func" data-table-target="#customer_func_i" class="active tab" >Customers</li>
              <li data-tab-target="#inventory_func" data-table-target="#inventory_func_i" class="tab">Inventory</li>
              <li data-tab-target="#rentals_func" data-table-target="#rentals_func_i" class="tab">Rentals</li>
            </ul>
            <div class="tab_func_content">
              <div id="customer_func" data-tab-content class="active">
                <div class="customer_tab">
                <form method="POST" action="#">
                <div class="Add">
                  <input type="text" name="surname_AC" placeholder="Surname">
                  <input type="text" name="firstname_AC" placeholder="First name">
                  <input type="text" name="username_AC" placeholder="Username">
                  <input type="text" name="password_AC" placeholder="Password">
                  <input type="submit" name="add_C" value="Add">
                </div>
                <div class="Edit">
                  <input type="text" name="id_EC" placeholder="Row ID">
                  <input type="text" name="username_EC" placeholder="Username">
                  <input type="text" name="password_EC" placeholder="Password">
                  <input type="submit" name="Edit_C" value="Edit">
                </div>
                <div class="Remove">
                  <input type="text" name="id_RC" placeholder="Row ID">
                  <input type="submit" name="Remove_C" value="Remove">
                </div>
                </form>
                </div>
              </div>
              <div id="inventory_func" data-tab-content>
                <div class="inventory_tab">
                <form method="POST" action="#">
                <div class="Add">
                  <input type="text" name="title_AI" placeholder="Title">
                  <input type="text" name="author_AI" placeholder="Author">
                  <input type="text" name="bookimg_AI" placeholder="Image Link">
                  <input type="submit" name="add_I" value="Add">
                </div>
                <div class="Edit">
                  <input type="text" name="id_EI" placeholder="Row ID">
                  <input type="text" name="title_EI" placeholder="Title">
                  <input type="text" name="author_EI" placeholder="Author">
                  <input type="text" name="bookimg_EI" placeholder="Image Link">
                  <input type="submit" name="Edit_I" value="Edit">
                </div>
                <div class="Remove">
                  <input type="text" name="id_RI" placeholder="Row ID">
                  <input type="submit" name="Remove_I" value="Remove">
                </div>
                </form>
                </div>
              </div>
              <div id="rentals_func" data-tab-content>
                <div class="rentals_tab">
                <form method="POST" action="#">
                <div class="Add">
                  <input type="text" name="username_AR" placeholder="Username">
                  <input type="text" name="password_AR" placeholder="Password">
                  <input type="text" name="title_AR" placeholder="Book">
                  <input type="submit" name="add_R" value="Add">
                </div>
                <div class="Edit">
                  <input type="text" name="id_ER" placeholder="Row id">
                  <input type="text" name="expiration_ER" placeholder="New Deadline">
                  <input type="submit" name="Edit_R" value="Edit">
                </div>
                <div class="Remove">
                  <input type="text" name="id_RR" placeholder="Row ID">
                  <input type="submit" name="Remove_R" value="Remove">
                </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          <div class="admin_table">
            <div class="table_content">
              <div class="tab_func_content">
              <div id="customer_func_i" data-tab-table class="active">
                  <table class="customers_table">
                    Customer Table
                    <tr>
                      <th>ID</th>
                      <th>Customer ID</th>
                      <th>Surname</th>
                      <th>First Name</th>
                      <th>Username</th>
                      <th>Password</th>
                    </tr>
                      <?php
                      print_table_customers($con);
                      ?>
                  </table>
              </div>
              <div id="inventory_func_i" data-tab-table>
                  <table class="inverntory_table">
                    Inventory Table
                    <tr>
                      <th>ID</th>
                      <th>Book ID</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Coverpage scr</th>
                    </tr>
                    <?php
                    print_table_inventory($con);
                    ?>
                  </table>
              </div>
              <div id="rentals_func_i" data-tab-table>
                <table class="rentals_table">
                  Rentals Table
                  <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Rent ID</th>
                    <th>Book ID</th>
                    <th>Deadline</th>
                  </tr>
                  <?php
                  print_table_rentals($con);
                  ?>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
        <form method="POST" action="#">
          <input type="submit" name="logout" value="Logout">
        </form>
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
