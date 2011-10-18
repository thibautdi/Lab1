<?php
if (isset($_POST['style_select'])) {
  setcookie('style', $_POST['style_select'], time() + 365*24*3600, null, null, false, true);
}
header('Location: index.php');

?>