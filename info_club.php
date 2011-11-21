<?php session_start();?>
<?php include("header.php") ?>
<?php include 'menu.php'; ?>

<?php
if ($_SESSION['user']['admin'] == '1') {
  if (isset($_GET['delete_club'])) {
    $db = new Db($config);
    $db->remove_club($_GET['delete_club']);
    echo '<script language="Javascript">
    <!--
    document.location.replace("success_delete_club.php");
    // -->
    </script>'; 
  }

  if (isset($_GET['validate_club'])) {
    $db = new Db($config);
    $db->validate_club($_GET['validate_club']);
    echo '<script language="Javascript">
    <!--
    document.location.replace("success_validate_club.php");
    // -->
    </script>';
  }
}

if (isset($_POST['hidden_rating'])) {
  if (isset($_SESSION['user']['id']))
  {
    $db->rate_club($_GET['club_id'],$_POST['hidden_rating'],$_SESSION['user']['id'],$_SESSION['user']['id'],$_SESSION['user']['sexe']);
  }
}
$club = $db->get_club('id',$_GET['club_id']);
$club_rated = $db->is_rated($_GET['club_id'],$_SESSION['user']['id']);

?>
  <div id='contenu'>
    <div id= 'club'>    
      <div id='club_info'>
        <span class='club_name'><?php echo $club['name'];?></span>
        <div id='club_logo'>
          <img src="<?php echo $club['logo']?>"/>
        </div>  
        <?php if ($_SESSION['user']['admin'] == '1') { ?>
          <div id='manage_club'>
            <a href="info_club.php?delete_club=<?php echo $_GET['club_id']; ?>&club_id=<?php echo $_GET['club_id']; ?>"><input type ='submit' value='Supprimer'></a>
            <a href="info_club.php?validate_club=<?php echo $_GET['club_id']; ?>&club_id=<?php echo $_GET['club_id']; ?>"><input type ='submit' value='Valider'></a>
          </div>          
        <?php } ?>
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
        <div id='club_rating'>
          <div class="stars empty">
            <div class="stars filled_<?php echo $club['rating'];?>"></div>
          </div>
        </div>
      <div class='club_title' id='club_videos'>Videos</div>
        <script src="http://www.yvoschaap.com/ytpage/ytembed.js" type="text/javascript"></script>
        <div id="ytThumbs"></div>
          <script type="text/javascript">
        	  ytEmbed.init({'block':'ytThumbs','q':"<?php echo $club['name'];?> club montreal",'type':'search','results':5,'order':'most_relevance','player':'embed','layout':'thumbnails','width':'550'});
        </script>
      <form action="info_club.php?club_id=<?php echo $club['id'];?>" id='rating_form' method='POST'>
        <input type='hidden' id='hidden_rating' name='hidden_rating' value="<?php echo $club['rating'];?>"/>       
       <?php if ($club_rated) {
         echo "Merci d'avoir noté cette boite !";
         $note = $club_rated['rating']/2;
         echo " Vous lui avez donné une note de : ". $note;
         ?>
         <input type='hidden' value='yes' name='already_rated' id= 'already_rated'/>
         <?php
       }
       if (isset($_SESSION['user'])) {
         ?>
         <input type='hidden' value='yes' name='logged_in' id='logged_in'/>
         <?php
       }
        ?>
      </form> 
      </div>
      <div id='club_comments'>
        <div class="fb-comments" data-href="www.info.polymtl.ca/~grboi/Lab1/info_club.php?club_id=<?php echo $club['id'];?>" data-num-posts="5" data-width="500"></div>
      </div>
        
    </div>
  </div>

  
<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
