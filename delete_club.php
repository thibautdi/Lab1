<?php

include 'db.php';
include 'config.php';

if (isset($_POST['club_to_delete'])) {
  $db = new Db($config);
  $db->remove_club($_POST['club_to_delete']);
}
header('Location: clubs.php');

?>