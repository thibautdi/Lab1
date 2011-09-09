<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <body>
    Formulaire d'inscription
    <form action='success.php' method='post'>
      <label for="fname">Prénom</label>
    <input type='text' name='fname'/>
    <label for="lname">Nom</label>
    <input type='text' name='lname'>
    <label for="email">Email</label>
    <input type='text' name='email'>
    <label for="jour">Jour</label>
    <select name='jour'>
      <?php for ($i = 1; $i < 32; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <label for="mois">Mois</label>
    <select name='mois'>
      <?php for ($i = 1; $i < 12; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <label for="annee">Année</label>
    <select name='annee'>
      <?php for ($i = 1900; $i < 2011; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <label for="sexe">Homme</label>
    <input type='radio' name='sexe' value='h'/>
    <label for="sexe">Femme</label>
    <input type='radio' name='sexe' value='f'>
    <label for="login">Login</label>
    <input type='texte' name='login'/>
    <label for="pwd">Mot de passe</label>
    <input type='password' name='pwd'/>
    <input type='checkbox' name='condition'/> J'accepte les conditions de ce site
    <input type='submit'/>
    </form>
  </body>
</html>