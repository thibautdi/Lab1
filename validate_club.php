<?php include("header.php") ?>
<?php include 'menu.php'; ?>
   <div id='contenu'>
     <h1>Liste des clubs à valider</h1>
     <div id='list_clubs'>
     <?php
      $clubs = $db->get_clubs(0);
      foreach ($clubs as $club) {      
        ?>
        <a href="info_club.php?club_id=<?php echo $club['id']; ?>"><img src="<?php echo $club['logo']; ?>"/></a>      
      <?php
        }
      ?>
     </div>
   </div>
  <?php include 'sidebar.php'; ?>
  <?php include 'footer.php'; ?>