<?php include("header.php") ?>
<?php include 'menu.php'; ?>
   <div id='contenu'>
     <?php
      $ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);  

      $temp_image = 'club_images/temp.'.$ext;
      move_uploaded_file($_FILES['logo']['tmp_name'],$temp_image);
      $link = 'club_images/'.$_POST['name'].".".$ext;
      rename($temp_image,$link);

      $club = array(
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'logo' => $link,
        'age' => $_POST['age']
        );  
  
      $db = new Db($config);
      $db->insert_club($club);
      echo "Club inserted";
?>
  <a href='add_club.php'>Ajouter un autre club</a>
  </div>
  <?php include 'sidebar.php'; ?>
  <?php include 'footer.php'; ?>