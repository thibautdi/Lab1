<!-- //fichier du menu, regroupe tous les liens du site -->

<div id="menu">
   <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="clubs.php">Les lieux</a></li>
      
   
  <?php if (isset($_SESSION['user'])){ ?>
      <li><a href="add_club.php">Ajouter un lieu</a></li>
      <li><a href="modifier_profil.php">Gérer mon compte</a></li>
  <?php 
  } 
  
  if ($_SESSION['user']['admin'] == '1') { ?>  
    <li><a href="validate_club.php">Valider les nouveaux clubs</a></li>

    <?php   
  } 
  
  ?>
    <li><a href="contact.php">Nous contacter</a></li>
    </ul> 

 </div>