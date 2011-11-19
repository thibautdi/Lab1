<?php include("header.php") ?>
<?php include 'menu.php'; ?>
  <div id='contenu'>
    <h1>Modifier mon profil</h1>
    <p>Cliquez sur une catégorie ci dessous pour effectuer une modification</p>
    </br>
    <?php if ($_GET['error'] == 'pwd') echo "<label class ='error_pwd'> Vous n'avez pas saisi correctement votre ancien mot de passe !</label>";?>
    <?php if ($_GET['error'] == 's_pwd') echo "<label class='error_pwd'> Vous avez saisi deux nouveaux mots de passe différents !</label>";?>
    
    <?php if (isset($_SESSION['user'])){ ?>
      <h3 onClick="show_div('changePwdDiv');">Changer mon mot de passe</h3>
      <div id='changePwdDiv'>
        <form id='pwdForm' action='modif_success.php' method='post'>
          <div>
          <label for 'old_pwd'>
          Ancien mot de passe
          </label>
          <input type='password' name='old_pwd'/>
          </div>
          
          <div>
          <label for='new_pwd'>
          Nouveau mot de passe
          </label>
          <input type='password' name='new_pwd'/>
           </div>
           
          <div>
          <label for='conf_pwd'>
          Confirmer nouveau mot de passe
          </label>
          <input type='password' name='conf_pwd'/>
          </div>
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'];?>"/>
          <input type='submit' value='Valider'/>
           
        </form>
      </div>
      </br>
      <h3 onClick="show_div('changeStyleDiv');">Changer le style du site</h3>
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
