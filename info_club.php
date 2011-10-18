<?php include("header.php") ?>
<?php include 'menu.php'; ?>
<?php
$club = $db->get_club('id',$_GET['club_id']);

?>
  <div id='contenu'>
    <div id= 'club'>
      <div id='club_info'>
        <span class='club_name'><?php echo $club['name'];?></span>
        <div id='club_logo'>
          <img src="<?php echo $club['logo']?>"/>
        </div>
        <?php if ($club['website'] != ''): ?>
        <div id='club_website'>
          <div class='club_title'>Website:</div>
          <p><a href="<?php echo $club['website']?>"><?php echo $club['website'];?></a></p>
        </div>
        <?php endif;?>
        <div id='club_address'>
          <div class='club_title'>Adresse:</div>
          <p><?php echo $club['address'];?></p>
        </div>
        <div id='club_age'>
          <div class='club_title'>Age Moyen:</div>
          <p><?php echo $club['age'];?></p>
        </div>
      </div>
      <div id='club_comments'>
        <div class="fb-comments" data-href="localhost/lab1/info_club.php?club_id=<?php echo $club['club_id'];?>" data-num-posts="5" data-width="500"></div>
      </div>
    </div>
  </div>
<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
