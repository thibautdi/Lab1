//Removing a club by id :
DELIMITER //
CREATE PROCEDURE RemoveClub(IN clubID INT(11))
BEGIN
DELETE FROM clubs WHERE id = clubID;
END //
DELIMITER ;


//Reviewing a club by id :
DELIMITER //
CREATE PROCEDURE ValidateClub(IN clubID INT(11))
BEGIN
UPDATE clubs SET reviewed = 1 WHERE id = clubID;
END //
DELIMITER ;

//Getting a rating
DELIMITER //
CREATE PROCEDURE IsRated(IN clubID INT(10), IN userID INT(10), OUT rate INT(2))
BEGIN
SELECT rating INTO rate FROM ratings WHERE club_id = clubID AND user_id = userID;
END //
DELIMITER ;

<?php
if ($_SESSION['user']['admin'] == '1') {
  if (isset($_GET['delete_club'])) {
    $db = new Db($config);
    $db->remove_club($_GET['delete_club']);
?> 
    <div id="blanket" style="display:none;"></div>
   	<div id="popUpDiv" style="display:none;">
   	<a href="clubs.php" onclick="popup('popUpDiv')">Club supprimé </br> </br> Cliquez ici pour fermer</a>
   	</div>	
    <script>popup('popUpDiv');</script>
    <?php
  }

  if (isset($_GET['validate_club'])) {
    $db = new Db($config);
    $db->validate_club($_GET['validate_club']);
?>
    <div id="blanket" style="display:none;"></div>
   	<div id="popUpDiv" style="display:none;">
   	<a href="clubs.php" onclick="popup('popUpDiv')">Club validé </br> </br> Cliquez ici pour fermer</a>
   	</div>	
    <script>popup('popUpDiv');</script>
    <?php
  }
}
