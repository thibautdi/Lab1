<?php

include 'db.php';
include 'config.php';

if (isset($_POST['club_to_delete'])) {
  $db = new Db($config);
  $db->remove_club($_POST['club_to_delete']);
}

if (isset($_POST['club_to_validate'])) {
  $db = new Db($config);
  $db->validate_club($_POST['club_to_validate']);
}

header('Location: clubs.php');

?>