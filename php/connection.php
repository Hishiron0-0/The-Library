<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "the_library";

$link = mysqli_connect($dbhost,$dbuser,$dbpass);
if(!$link){
  die("failed to connect");
}

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
  $create1 = "CREATE DATABASE $dbname";
  if(mysqli_query($link,$create1)){}
  $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  $tccreate = "CREATE TABLE `test`.`customers` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `customer_id` INT(8) NOT NULL , `surname` VARCHAR(50) NOT NULL , `first_name` VARCHAR(50) NOT NULL , `user_name` VARCHAR(30) NOT NULL , `pass_word` VARCHAR(50) NOT NULL , `user_admin` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  $ticreate = "CREATE TABLE `test`.`inventory` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `book_id` INT(8) NOT NULL , `btitle` VARCHAR(100) NOT NULL , `bauthor` VARCHAR(100) NOT NULL , `bimg` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  $trcreate = "CREATE TABLE `test`.`rentals` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `customer_id` INT(11) NOT NULL , `rent_id` INT(11) NOT NULL , `book_id` INT(11) NOT NULL , `expiration` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  if(mysqli_query($con,$tccreate)){}
  if(mysqli_query($con,$ticreate)){}
  if(mysqli_query($con,$trcreate)){}
  $insertadmin = "INSERT INTO customers(`customer_id`, `surname`, `first_name`, `user_name`, `pass_word`, `user_admin`) VALUES ('00000000','ADMIN','admin','admin','admin',1)";
  $insertuser = "INSERT INTO customers(`customer_id`, `surname`, `first_name`, `user_name`, `pass_word`, `user_admin`) VALUES ('00000000','SURNAME','firstname','user','user',0)";
  if (mysqli_query($con,$insertadmin)){}
  if (mysqli_query($con,$insertuser)){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('57433581','13 Little Blue Envelopes','Maureen Johnson','31.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('78738677','Always with Love','Giovanna Fletcher','33.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('55013659','A Court of Thorns and Roses','Sarah J. Maas','32.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('47540533','A Kingdom of Exiles','S.B. Nova','34.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('21637985','Another Day','David Levithan','35.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('39942475','Apprentice','Rachel E. Carter','36.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('79719272','Assassin's Blade','Sarah J. Maas','37.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('42803404','Auralia's Colors','Jeffrey Overstreet','38.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('92271335','Avalon High','Meg Cabot','39.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('24782075','Beauty of Darkness','Mary E. Pearson','40.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('18573772','Between the Devil and the Deep Blue Sea','April G. Tucholke','41.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('33334286','Between the Lines','Jodi Picoult','42.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('75503978','Between You and Me','Lisa Hall','43.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('42415599','Billow','Emma Raveling','44.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('78059024','The Book of Laughter and Forgetting','Millan Kundera','45.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('13189240','City of Ashes','Cassandra Clare','46.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('93490090','City of Fallen Angels','Cassandra Clare','47.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('95417736','City of Heavenly Fire','Cassandra Clare','48.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('76276524','City of Lost Souls','Cassandra Clare','49.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('15810832','Cross My Heart and Hope to Spy','Ally Carter','50.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('82070892','Crown of Midnight','Sarah J. Maas','51.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('57376180','Dance with Darkness','Jenna Wolfhart','52.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('23834114','Dearest','Alethea Kontis','54.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('45820143','Did I Mention I Miss You','Estelle Maskame','55.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('70417621','Did I Mention I Love You','Estelle Maskame','56.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('79497304','Did I Mention I Need You','Estelle Maskame','57.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('55629319','Girl Online','Zoe Sugg','59.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('71365724','Girl Online On Tour','Zoe Sugg','60.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('78681506','How I found You','Gabriella Lepore','61.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('70812137','Just One Day','Gayle Forman','63.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('99596243','Library of Souls','Ransom Riggs','64.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('24355210','My Heart and other Black Holes','Jasmine Warga','65.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('49250503','My Invisible Boyfriend','Susie Day','66.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('37703949','Never Always Sometimes','Adi Alsaid','67.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('26073924','Off the Page','Jodi Picoult','68.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('46161362','Proposal ','Meg Cabot','69.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('28375106','Queen of Shadows','Sarah J. Maas','70.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('55048002','Rapture','Lauren Kate','71.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('80553475','Remembrance','Meg Cabot','72.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('45536015','Reunion','Meg Cabot','73.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('65082833','Revelations','Melissa de La Cruz','74.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('87082394','Rise','Jennifer Anne Davis','75.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('78831384','Shadowland','Meg Cabot','76.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('25858895','Someday','David Levithan','79.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('14817194','Soulmates','Holly Bourne','80.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('84444557','Starters','Lissa Price','81.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('30685263','Storm Siren','Mary Weber','82.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('57411246','The Grography of You and Me','Jennifer E. Smith','83.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('14580994','The Girl with a Clock for a Heart','Peter Swanson','84.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('52361046','The Girl in the Steel Corset','Kady Cross','85.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('20927526','The Hating Game','Sally Thourne','86.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('78271173','The Iron King','Julie Kagawa','87.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('91249603','The Iron Knight','Julie Kagawa','88.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('36330283','The Iron Queen','Julie Kagawa','89.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('95129885','The Iron Daughter','Julie Kagawa','90.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('95547942','The Manifesto on How to be Interesting','Holly Bourne','91.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('20072019','The Map from Here to There','Emery Lord','92.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('87929071','The Name of the Star','Maureen Johnson','93.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('88290650','The Program','Suzanne Young','94.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('61180562','The Rose Society','Marie Lu','95.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('74175109','The Siren','Kiera Cass','96.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('25257813','The Start of Me and You','Emery Lord','97.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('78127468','The Statistical Probability of Love at First Sight','Jennifer E. Smith','98.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('71226030','The Young Elites','Marie Lu','99.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('46964319','The Language of Stars','Lousie Hawes','100.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('26183996','The Problem with Forever','Jennifer AL. Armentrout','101.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('38101789','This is My Brain on Boys','Sarah Strohmeyer','102.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('98814418','This is What Happy Looks Like','Jennifer E. Smith','103.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('22658040','This is Where the World Ends','Amy Zhang','104.jpeg')")){}
if (mysqli_query($con,"INSERT INTO inventory(`book_id`, `btitle`, `bauthor`, `bimg`) VALUES ('58398547','Waterfall','Lauren Kate','105.jpeg')")){}
    header("Refresh:0");
  die("failed to connect");
}
$dbhost2 = "localhost";
$dbuser2 = "root";
$dbpass2 = "";
$dbname2 = "the_library_customer_rents";


if(!$con2 = mysqli_connect($dbhost2,$dbuser2,$dbpass2,$dbname2)){
  $create2 = "CREATE DATABASE $dbname2";
  if(mysqli_query($link,$create2)){}
    header("Refresh:0");
  die("failed to connect");
}
?>
