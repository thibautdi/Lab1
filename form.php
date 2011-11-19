<?php include("header.php") ?>
<?php include 'menu.php'; ?>
   <div id='contenu'>
    <div id='inscriptionDiv'>
      <h1>Formulaire d'inscription</h1>
      <form id='inscriptionForm' action='success.php' method='post'>
        <div>
          <label for="fname">Prénom</label>
          <input type='text' id='fname' name='fname' class='required'/>
        </div>
        <div>
          <label for="lname">Nom</label>
          <input type='text' id='lname' name='lname' class='required'>
        </div>
        <div>
          <label for="email">Email</label>
          <input type='text' id='email' name='email' class='required email'>
        </div>
        <div>
        <label for="jour">Date de naissance</label>
        <select name='jour' id='jour' class='required'>
          <?php for ($i = 1; $i < 32; $i++):?>
          <option value='<?php echo $i;?>'>
            <?php echo $i; ?>
          </option>
          <?php endfor;?>
        </select>
        <select id='mois' name='mois'>
          <?php for ($i = 1; $i < 13; $i++):?>
          <option value='<?php echo $i;?>'>
            <?php echo $i; ?>
          </option>
          <?php endfor;?>
        </select>
        <select id='annee' name='annee'>
          <?php for ($i = 1900; $i < 2012; $i++):?>
          <option value='<?php echo $i;?>'  <?php if ( $i == 1989 ) echo 'SELECTED';?>>
            <?php echo $i; ?>
          </option>
          <?php endfor;?>
        </select>
        </div>
        
        <div id='sexe'>
            Je suis : 
            <label for="sexe" id="lsexeh">Un homme</label>
            <input type='radio' id='sexeh' name='sexe' value='h' class='required'/>
            <label for="sexe" id="lsexef">Une femme</label>
            <input type='radio' id='sexef' name='sexe' value='f' class='required'>
        </div>
        
        <div>
          <label for="username">Login</label>
          <input type='texte' id='username' name='username' class='required'/>
          <input type='hidden' id='username_status' value='false'/>
        </div>
        <div>
          <label for="pwd">Mot de passe</label>
          <input type='password' id='pwd'name='pwd' class='required'/>
        </div>
        <div>
          <label for="condition"></label>
          <input type='checkbox' id='condition' name='condition' class='required check'> J'accepte les conditions de ce site
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
    