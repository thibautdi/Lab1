<?php
include "db.php";
include 'config.php';

$db = new Db($config);
header("Content-type: text/html; charset=iso-8859-1");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
switch ($_REQUEST['action']) {
  case 'make_admin':
    echo json_encode($db->modify_user($_REQUEST['id'],'admin', 1)); // echo ($b_ok ? 'true' : 'false');
    break;
  case 'remove_admin':
    echo json_encode($db->modify_user($_REQUEST['id'],'admin', 0)); // echo ($b_ok ? 'true' : 'false');
    break;
  case 'delete_user':
    echo json_encode($db->delete_user($_REQUEST['id'])); // echo ($b_ok ? 'true' : 'false');
    break;
  default:
    echo 'Erreur';
    break;
}
exit;