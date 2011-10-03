<?php 
session_start();
include 'config.php';
include 'Db.php';    
if (isset($_POST['login'])) {
   $db = new Db($config);
   $user = $db->select_user('login',$_POST['login']);

   if ($user['pwd'] == $_POST['pwd']) {
     $_SESSION['user'] = $user;
     $logged_in='display:none';
   }
   else {
     echo 'FAIL';
   }
}
elseif (isset($_SESSION['user'])) {
  $logged_in='display:none';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>Lab 1, Boivin-Diehl</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="scripts/form.js"></script>
  </head>
  <body>
	  <div id="header">
      <a href='index.php'><span id='logo'>Note une boite.com</span></a>
	    <div id="connection" style=<?php echo $logged_in;?>>
	      <form action='index.php' method='post'>
  	      <input type='text' name='login' id='login' placeholder="Nom d'usager"/>
    	    <input type='password' name='pwd' id='pwd' placeholder='Mot de passe'/>
    	    <input type='submit' id='submit' value='Se connecter'>
    	   </form> 
      </div>    	    
    	    
    	<div id='creerCompte'>
    	    <a href='form.php'>Créer un compte</a> 
	    </div>
	    
	  </div>
	  <div id='main'>
