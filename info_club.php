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
        <div id='club_address'>
          <?php echo $club['address'];?>
        </div>
      </div>
      <div id='club_comments'>
        <div class="fb-comments" data-href="localhost/lab1/info_club.php?club_id=<?php echo $club['club_id'];?>" data-num-posts="5" data-width="500"></div>
      </div>
    </div>
  </div>
<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
