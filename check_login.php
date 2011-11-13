<?php
include "db.php";
include 'config.php';

$db = new Db($config);
header("Content-type: text/html; charset=iso-8859-1");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
echo json_encode($db->check_login($_REQUEST['login'])); // echo ($b_ok ? 'true' : 'false');
exit;

