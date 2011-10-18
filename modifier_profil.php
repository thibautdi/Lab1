<?php include("header.php") ?>
<?php include 'menu.php'; ?>
  <div id='contenu'>
    <h1>Modifier mon profil</h1>
    <?php if (isset($_SESSION['user'])){ ?>
      <h2 onClick="show_div('changePwdDiv');">Changer mon mot de passe</h1>
      <div id='changePwdDiv'>
        <form id='pwdForm' action='modif_success.php' method='post'>
          <label for 'old_pwd'>
          Ancien mot de passe
          </label>
          <input type='password' name='old_pwd'/>
          <label for='new_pwd'>
          Nouveau mot de passe
          </label>
          <input type='password' name='new_pwd'/>
          <label for='conf_pwd'>
          Confirmer nouveau mot de passe
          </label>
          <input type='password' name='conf_pwd'/>
          <input type='submit' value='Valider'>
        </form>
      </div>
      <h2 onClick="show_div('changeStyleDiv');">Changer le style du site</h1>
      <div id='changeStyleDiv'>
        <form id='styleForm' action='modif_success.php' method='post'>
          <label for='style_select'>
          Choisissez le nouveau style
          </label>
          <select name='style_select'>
            <option value=''>Par défaut</option>
            <option value='black'>Noir</option>
            <option value='white'>Blanc</option>
          </select>
          <input type='submit' value='valider'>
        </form>
      </div>
    <?php } else {
      ?> 
      <p>Vous devez être loggé pour accéder à cette page.</p>
      <?php
    }?>
  </div> 
  <?php include 'sidebar.php'; ?>
  <?php include 'footer.php'; ?>
