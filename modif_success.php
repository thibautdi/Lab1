<?php
include 'db.php';
include 'config.php';

$db = new Db($config);

if (isset($_POST['style_select'])) {
  setcookie('style', $_POST['style_select'], time() + 365*24*3600, null, null, false, true);
}
$user = $db->select_user('id',$_POST['user_id']);
if ($user['pwd'] != $_POST['old_pwd']) {
  $error = "?error=pwd";
} elseif ($_POST['new_pwd'] != $_POST['conf_pwd'] ){
  $error = "?error=s_pwd";
}
elseif (($user['pwd'] == $_POST['old_pwd']) && ($_POST['new_pwd'] == $_POST['conf_pwd'])) {
  $db->modify_user($user['id'], 'pwd', $_POST['new_pwd']);
}

header("Location: modifier_profil.php${error}");

?>