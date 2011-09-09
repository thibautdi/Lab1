<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="scripts/jquery.validate.min.js"></script>
  </head>
  <body>
    <script>
      $(document).ready(function(){
        $("#inscriptionForm").validate();
      });
      </script>
    Formulaire d'inscription
    <form id='inscriptionForm' action='success.php' method='post'>
      <label for="fname">Prénom</label>
    <input type='text' id='fname' name='fname' class='required'/>
    <label for="lname">Nom</label>
    <input type='text' id='lname' name='lname' class='required'>
    <label for="email">Email</label>
    <input type='text' id='email' name='email' class='required email'>
    <label for="jour">Jour</label>
    <select name='jour' id='jour' class='required'>
      <?php for ($i = 1; $i < 32; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <label for="mois">Mois</label>
    <select id='mois' name='mois'>
      <?php for ($i = 1; $i < 12; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <label for="annee">Année</label>
    <select id='annee' name='annee'>
      <?php for ($i = 1900; $i < 2011; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <label for="sexe">Homme</label>
    <input type='radio' id='sexeh' name='sexe' value='h' class='required'/>
    <label for="sexe">Femme</label>
    <input type='radio' id='sexef' name='sexe' value='f' class='required'>
    <label for="login">Login</label>
    <input type='texte' id='login' name='login'/>
    <label for="pwd">Mot de passe</label>
    <input type='password' id='pwd'name='pwd' class='required'/>
    <input type='checkbox' id='condition' name='condition' class='required check'> J'accepte les conditions de ce site
    <input type='submit'/>
    </form>
  </body>
</html>