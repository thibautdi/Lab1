<?php
include 'config.php';
include 'db.php';
  
$ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);  

$temp_image = 'club_images/temp.'.$ext;
move_uploaded_file($_FILES['logo']['tmp_name'],$temp_image);
$link = 'club_images/'.$_POST['nom'].".".$ext;
rename($temp_image,$link);

$club = array(
  'nom' => $_POST['nom'],
  'addresse' => $_POST['address'],
  'logo' => $link
  );  
  
var_dump($_FILES['logo']);
var_dump($club);
$db = new Db($config);
$db->insert_club($club);

?>