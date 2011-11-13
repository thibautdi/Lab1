<?php session_start(); ?>
<?php
include 'config.php';
include 'db.php'; 
$db = new Db($config);
  
if (isset($_POST['login'])) {
   $_SESSION['bla'] = 'bla';
   $user = $db->select_user('login',$_POST['login']);

   if ($user['pwd'] == $_POST['pwd']) {
     $_SESSION['user'] = $user;
   }
   else {
     echo 'FAIL';
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>Note une boite</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/default.css" />
    <link rel="stylesheet" type="text/css" href="style/rating.css" />
    <?php if (isset($_COOKIE['style'])): ?>
    <link rel="stylesheet" type="text/css" href="style/<?php echo $_COOKIE['style'];?>.css" />
    <?php endif;?>
    <script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="scripts/form.js"></script>
    <script type="text/javascript" src="scripts/ie.js"></script>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=175779149170885";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
	  <div id="header">
      <a href='index.php'><span id='logo'>Note une boite.com</span></a>
	    <div id="connection">
	    <?php if (!isset($_SESSION['user'])){ ?>

  	    <div id="connection">
  	      <form action='index.php' method='post'>
    	      <input type='text' name='login' id='login' placeholder="Nom d'usager"/>
      	    <input type='password' name='pwd' id='pwd' placeholder='Password'/>      
      	    <input type='submit' id='submit' value='Se connecter'>
      	   </form>     	    
      	<div id='creerCompte'>
      	    <a href='form.php'>Créer un compte</a> 
  	    </div>
  	    </div>  	    
  	    
	  <?php } else { ?> <span style="color: white"> <?php
	    echo "Bonjour ".$_SESSION['user']['fname']." ".$_SESSION['user']['lname'];
	    ?>
	    <a href='logout.php'>Logout</a>
	    <?php ?> </span> <?php } ?>
	  </div>
	</div>
	<div id='main'>
