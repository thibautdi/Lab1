<?php include("header.php") ?>
<?php include 'menu.php'; ?>
   <div id='contenu'>
    <div id='inscriptionDiv'>
      <h1>Formulaire d'inscription</h1>
      <form id='inscriptionForm' enctype='multipart/form-data' action='club_added.php' method='post'>
        <div>
          <label for="nom">Nom du club</label>
          <input type='text' id='name' name='name' class='required'/>
        </div>
        <div>
          <label for="nom">Adresse</label>
          <input type='text' id='address' name='address' class='required'/>
        </div>
        <div>
          <label for="logo">Logo</label>
          <input type='file' id='logo' name='logo' class='required'>
        </div>
        <div>
          <label for="website">Site web</label>
          <input type='text' id='website' name='website' class='required url'>
        </div>
        <div>
          <label for="public">Âge Moyen</label>
          <input type='texte' id='age' name='age'/>
        </div>
        <div>
          <input type='submit' value='Envoyer'/>
          <input id='viderForm' type='button' value='Vider formulaire' onClick="viderform();">
        </div>
      </div>
    </form>
  </div>
  <?php include 'sidebar.php'; ?>
  <?php include 'footer.php'; ?>
