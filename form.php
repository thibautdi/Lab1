<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />

    <script type="text/javascript" src="scripts/jquery.validate.min.js"></script>

  </head>
  <body>
  <div class="cadredumenugauche">
    <div class="menu">
	<ul  name="coordonnees" id="coordonnees">
		<li id="Li1"  class="menu">Collaborateur<br/>
		<span  class="collaborateur" id="collaborateur"></span><br/>
		</li>

		<li class="menu">Date<br/>
		
		<select   id="date" tabindex="10">
           
       	   </select><br/>
		</li>
	


		<li class="menu">Urgence<br />
		<select  name="urgence" id="urgence" tabindex="30">
          </select><br/>
		</li>

		<li class="menu">Durée<br />
		<select  name="duree" id="duree" tabindex="40">
           
       	   </select><br/>
		</li>
        <li class="menu">Environnement<br />
		<select class="listbox1"  name="environnement" id="environnement" 
                tabindex="45" size="5">
           
       	   </select>
		</li>

	</ul>
	
	</div>

   </div>
    <script>
      $(document).ready(function(){
        $("#inscriptionForm").validate();
      });
      </script>
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
      <?php for ($i = 1; $i < 12; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <select id='annee' name='annee'>
      <?php for ($i = 1900; $i < 2011; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    </div>
    <div>
    <label for="sexe">Homme</label>
    <input type='radio' id='sexeh' name='sexe' value='h' class='required'/>
    </div>
    <div>
    <label for="sexe">Femme</label>
    <input type='radio' id='sexef' name='sexe' value='f' class='required'>
    </div>
    <div>
    <label for="login">Login</label>
    <input type='texte' id='login' name='login'/>
    </div>
    <div>
    <label for="pwd">Mot de passe</label>
    <input type='password' id='pwd'name='pwd' class='required'/>
    </div>
    <div>
    <input type='checkbox' id='condition' name='condition' class='required check'> J'accepte les conditions de ce site
    </div>
    <div>
    <input type='submit'/>
    </div>
    </form>
  </body>
</html>