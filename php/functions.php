<?php

function check_login($con){
  if(isset($_SESSION['customer_id'])){
    $id = $_SESSION['customer_id'];
    $query = "select * from customers where customer_id = '$id' limit 1";
    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) >= 0){
      $user_data = mysqli_fetch_assoc($result);
      header("Location: Profile.php");
      return $user_data;
    }
  }
}
function get_data($con){
  if(isset($_SESSION['customer_id'])){
    $id = $_SESSION['customer_id'];
    $query = "select * from customers where customer_id = '$id' limit 1";
    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) >= 0){
      $user_data = mysqli_fetch_assoc($result);
      return $user_data;
    }
  }
}
function clear_session(){
  if(isset($_POST["logout"])){
    $_SESSION['customer_id'] = null;
    header("Location:Main.php");
  }
}
function default_bookpage($con,$rownum){
  for ($x=1; $x <= $rownum; $x++){
    $tsearch = mysqli_query($con,"SELECT * FROM inventory where id= $x limit 1");
    $title = mysqli_fetch_assoc($tsearch);
    if($x == 1){
      echo '<div class="bbox start"><img src="img/books/';
      echo $title["bimg"];
      echo '">';
      echo '<div class="booktitle start">';
      echo $title["btitle"];
      echo '</div>';
      echo '<div class="bookauthor">';
      echo $title["bauthor"];
      echo '</div>';
      echo '</div>';
    }
    else{
    echo '<div class="bbox"><img src="img/books/';
    echo $title["bimg"];
    echo '">';
    echo '<div class="booktitle">';
    echo $title["btitle"];
    echo '</div>';
    echo '<div class="bookauthor">';
    echo $title["bauthor"];
    echo '</div>';
    echo '</div>';
    }
  }
}
function man_nav($con,$rn){
  echo '<div class="mannav">';
  for ($x=1; $x <= $rn; $x++){
    echo '<label for="p'.$x.'" class="manbtn"></label>';
  }
  echo '</div>';
}
function rbut($con,$rn){
  for ($x=1; $x <= $rn; $x++){
    echo '<input type="radio" name="radbtn" onclick="wait('.$x.')" id="p'.$x.'">
    ';
  }
}
function for_nav($con,$rn){
  for ($x=1; $x <= $rn; $x++){
    $te = ((-100/$rn)*($x-1)) + ((10/$rn));
    echo '#p'.$x.':checked ~ .start{
      margin-left: '.$te.'%;
 }
    ';
  }
}

function login_account($con){
  if(isset($_POST['usern'])){
    $usname=$_POST['usern'];
    $password=$_POST['passw'];
    $sql=mysqli_query($con,"SELECT * from customers WHERE user_name='$usname' AND pass_word='$password' limit 1");
    $row = mysqli_num_rows($sql);

    if($row >= 1){
      $user_data = mysqli_fetch_assoc($sql);
      $_SESSION['customer_id'] = $user_data['customer_id'];
      $id = $_SESSION['customer_id'];
        if ($user_data['user_admin'] == 1){
          header("Location: Admin.php");
      }
        else {
          header("Location: Main.php");
        }
    }
    else{
      echo "<div>you entered wrong username or password</div>";
    }
  }
}

function profile_content($con,$user_data){
  echo '
    <div class="name">
    Name : '.$user_data['surname'].', '.$user_data['first_name'].'
    </div>
    <div class="userna">
    Username : '.$user_data['user_name'].'
    </div>
    <div class="id">
    ID : '.$user_data['customer_id'].'
    </div>';
}
function rent_content($con,$con2,$user_data){
  $table_name = $user_data['customer_id'];
  $newsql=mysqli_query($con2,"SELECT * from `$table_name`");
  $num_rent = mysqli_num_rows($newsql);
    for ($s=1; $s <= $num_rent; $s++){
      $rent_data = mysqli_query($con2,"SELECT * from `$table_name` WHERE id = $s limit 1");
      $rent_data_assoc = mysqli_fetch_assoc($rent_data);
      $book_id = $rent_data_assoc['book_id'];
      if($book_id != NULL){
        $book_row = mysqli_query($con,"SELECT * from inventory WHERE book_id = $book_id limit 1");
        $book_name = mysqli_fetch_assoc($book_row);
        echo '
        <div class="book_name">
        Book Name : '.$book_name['btitle'].'
        </div>
        <div class="deadline">
        Return Before : '.$rent_data_assoc['expiration'].'
        </div>';
      }
      else{

      }
  }
}
function addto_table_customers($con){
    if(isset($_POST["surname_AC"]) && isset($_POST["firstname_AC"]) && isset($_POST["username_AC"])
    && isset($_POST["password_AC"])  && isset($_POST["add_C"])){
    $surname = $_POST["surname_AC"];
    $firstname = $_POST["firstname_AC"];
    $username = $_POST["username_AC"];
    $password = $_POST["password_AC"];
    $customerid = rand(10000000,99999999);
    $cusid_check = mysqli_query($con,"SELECT * FROM customers where customer_id = $customerid");
    $cicheck = mysqli_num_rows($cusid_check);
    if($cicheck >= 1){
      $customerid = rand(10000000,99999999);
    }
    $insert = "INSERT INTO customers(`customer_id`, `surname`, `first_name`, `user_name`, `pass_word`, `user_admin`) VALUES ($customerid,'$surname','$firstname','$username','$password',0)";
    if (mysqli_query($con,$insert)){
      }
    }
  }
function addto_table_inventory($con){
    if(isset($_POST["title_AI"]) && isset($_POST["author_AI"]) && isset($_POST["bookimg_AI"])  && isset($_POST["add_I"])){
    $book_title = $_POST["title_AI"];
    $author = $_POST["author_AI"];
    $coverimg = $_POST["bookimg_AI"];
    $bookid = rand(10000000,99999999);
    $insert = "INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ($bookid,'$book_title','$author','$coverimg')";
    if (mysqli_query($con,$insert)){
      }
    }
  }
function addto_table_rentals($con,$con2){
    if(isset($_POST["username_AR"]) && isset($_POST["password_AR"]) && isset($_POST["title_AR"])  && isset($_POST["add_R"])){
    $username = $_POST["username_AR"];
    $password = $_POST["password_AR"];
    $booktitle = $_POST["title_AR"];
    $deadlinelimit = strtotime("+7 Days");
    $deadline = date("Y-m-d",$deadlinelimit);
    $rentid = rand(10000000,99999999);
    $getcusid = mysqli_query($con,"SELECT * FROM customers where user_name = '$username' AND pass_word = '$password' limit 1");
    $sqlaa = mysqli_fetch_assoc($getcusid);
    $customerid = $sqlaa['customer_id'];
    $getbookid = mysqli_query($con,"SELECT * FROM inventory where btitle = '$booktitle'");
    $sql = mysqli_fetch_assoc($getbookid);
    $bookid = $sql['book_id'];
    $newtable = "CREATE TABLE `$customerid`(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	rent_id int(8),
    book_id int(8),
    expiration text)";
    $check_table = mysqli_query($con2,"SELECT 1 from `$customerid`");
    if($check_table != FALSE){
      $insert2 = "INSERT INTO `$customerid` (`rent_id`, `book_id`, `expiration`) VALUES ($rentid,$bookid,'$deadline')";
      $insert = "INSERT INTO `rentals`(`customer_id`, `rent_id`, `book_id`, `expiration`) VALUES ($customerid,$rentid,$bookid,'$deadline')";
      if (mysqli_query($con,$insert)){
        }
      if (mysqli_query($con2,$insert2)){
        }
    }
    else if ($check_table != TRUE) {
      if(mysqli_query($con2,$newtable)){}
      $insert2 = "INSERT INTO `$customerid` (`rent_id`, `book_id`, `expiration`) VALUES ($rentid,$bookid,'$deadline')";
      $insert = "INSERT INTO `rentals`(`customer_id`, `rent_id`, `book_id`, `expiration`) VALUES ($customerid,$rentid,$bookid,'$deadline')";
      if (mysqli_query($con,$insert)){}
      if (mysqli_query($con2,$insert2)){}
    }
    }
  }
function print_table_customers($con){
  $sql = mysqli_query($con,"SELECT * from customers");
  $rows = mysqli_num_rows($sql);
  for ($s=1; $s <= $rows; $s++){
    $row_sql = mysqli_query($con,"SELECT * FROM customers where id = $s limit 1");
    $row_data = mysqli_fetch_assoc($row_sql);
    echo '<tr>
      <th>'.$row_data['id'].'</th>
      <th>'.$row_data['customer_id'].'</th>
      <th>'.$row_data['surname'].'</th>
      <th>'.$row_data['first_name'].'</th>
      <th>'.$row_data['user_name'].'</th>
      <th>'.$row_data['pass_word'].'</th>
    </tr>';
  }
}
function print_table_inventory($con){
  $sql = mysqli_query($con,"SELECT * from inventory");
  $rows = mysqli_num_rows($sql);
  for ($s=1; $s <= $rows; $s++){
    $row_sql = mysqli_query($con,"SELECT * FROM inventory where id = $s limit 1");
    $row_data = mysqli_fetch_assoc($row_sql);
    echo '<tr>
      <th>'.$row_data['id'].'</th>
      <th>'.$row_data['book_id'].'</th>
      <th>'.$row_data['btitle'].'</th>
      <th>'.$row_data['bauthor'].'</th>
      <th>'.$row_data['bimg'].'</th>
    </tr>';
  }
}
function print_table_rentals($con){
  $sql = mysqli_query($con,"SELECT * from rentals");
  $rows = mysqli_num_rows($sql);
  for ($s=1; $s <= $rows; $s++){
    $row_sql = mysqli_query($con,"SELECT * FROM rentals where id = $s limit 1");
    $row_data = mysqli_fetch_assoc($row_sql);
    echo '<tr>
      <th>'.$row_data['id'].'</th>
      <th>'.$row_data['customer_id'].'</th>
      <th>'.$row_data['rent_id'].'</th>
      <th>'.$row_data['book_id'].'</th>
      <th>'.$row_data['expiration'].'</th>
    </tr>';
  }
}
function edit_table_customers($con){
    if(isset($_POST["id_EC"]) && isset($_POST["username_EC"]) && isset($_POST["password_EC"])  && isset($_POST["Edit_C"])){
    $id_s = $_POST["id_EC"];
    $newusername = $_POST["username_EC"];
    $newpassword = $_POST["password_EC"];
    $update = "UPDATE `customers` SET `user_name`='$newusername',`pass_word`='$newpassword' WHERE id = $id_s";
    if (mysqli_query($con,$update)){
      }
    }
  }
  function edit_table_inventory($con){
      if(isset($_POST["id_EI"]) && isset($_POST["title_EI"]) && isset($_POST["author_EI"])  && isset($_POST["bookimg_EI"]) && isset($_POST["Edit_I"])){
      $id_s = $_POST["id_EI"];
      $newtitle = $_POST["title_EI"];
      $newauthor = $_POST["author_EI"];
      $newlink = $_POST["bookimg_EI"];
      $update = "UPDATE `inventory` SET `btitle`='$newtitle',`bauthor`='$newauthor' ,`bimg`= '$newlink' WHERE id = $id_s";
      if (mysqli_query($con,$update)){
        }
      }
    }
function edit_table_rentals($con,$con2){
    if(isset($_POST["expiration_ER"]) && isset($_POST["id_ER"]) && isset($_POST["Edit_R"])){
    $id_s = $_POST["id_ER"];
    $newdeadline = $_POST["expiration_ER"];
    $rowdata = mysqli_query($con,"SELECT * from rentals WHERE id = $id_s");
    $rd = mysqli_fetch_assoc($rowdata);
    $rowdata_rentid =$rd['rent_id'];
    $rowdata_cusid =$rd['customer_id'];
    $update2 = "UPDATE `$rowdata_cusid` SET `expiration`= '$newdeadline' WHERE rent_id = '$rowdata_rentid'";
    $update = "UPDATE `rentals` SET `expiration`= '$newdeadline' WHERE id = $id_s";
    if (mysqli_query($con,$update)){
      }
    if(mysqli_query($con2,$update2)){
    }
  }
}
  function remove_table_customers($con){
      if(isset($_POST["id_RC"]) && isset($_POST["Remove_C"])){
      $id_sc = $_POST["id_RC"];
      $update = "UPDATE `customers` SET `customer_id`= null,`surname`= null,`first_name`= null,`user_name`= null,`pass_word`= null,`user_admin`= 0 WHERE `id` = $id_sc";
      if (mysqli_query($con,$update)){
        }
      }
    }
function remove_table_inventory($con){
    if(isset($_POST["id_RI"]) && isset($_POST["Remove_I"])){
    $id_si = $_POST["id_RI"];
    $update = "UPDATE `inventory` SET `book_id`= null,`btitle`= null,`bauthor`= null,`book_inventory`= null,`bimg`= null WHERE `id` = $id_si";
    if (mysqli_query($con,$update)){
      }
    }
  }
function remove_table_rentals($con,$con2){
  if(isset($_POST["id_RR"]) && isset($_POST["Remove_R"])){
  $id_sr = $_POST["id_RR"];
  $rowdata = mysqli_query($con,"SELECT * from rentals WHERE id = $id_sr");
  $rd = mysqli_fetch_assoc($rowdata);
  $rowdata_rentid =$rd['rent_id'];
  $rowdata_cusid =$rd['customer_id'];
  $update2 = "UPDATE `$rowdata_cusid` SET `rent_id`= null,`book_id`= null,`expiration`= null WHERE `rent_id` = $rowdata_rentid";
  $update = "UPDATE `rentals` SET `customer_id`= null,`rent_id`= null,`book_id`= null,`expiration`= null WHERE `id` = $id_sr";
  if (mysqli_query($con,$update)){
    }
  if(mysqli_query($con2,$update2)){}
  }
}
