<?php include 'header.php';?>
<?php include 'menu.php';?>
<div id='contenu'>
  <?php
  extract($_POST);
  $bday = mktime(0,0,0,$jour,$mois,$annee);
  $db = new Db($config);
  $db->insert_user(array(
    'fname' => $fname,
    'lname' => $lname,
    'bday' => $bday,
    'sexe' => $sexe,
    'login' => $username,
    'pwd' => $pwd,
    'email' => $email,
    'admin' => 0
  ));
  ?>
  <p>Votre inscription a bien été prise en compte !</p>
</div>
<?php include 'sidebar.php';?>
<?php include 'footer.php';?>