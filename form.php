<html>
  <head>
  </head>
  <body>
    Formulaire d'inscription
    <form action='success.php' method='post'>
    <input type='text' name='fname'/>
    <input type='text' name='lname'>
    <input type='text' name='email'>
    <input type='text' name=''>
    <select name='jour'>
      <?php for ($i = 1; $i < 32; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <select name='mois'>
      <?php for ($i = 1; $i < 31; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    <select name='annee'>
      <?php for ($i = 1900; $i < 2011; $i++):?>
      <option value='<?php echo $i;?>'>
        <?php echo $i; ?>
      </option>
      <?php endfor;?>
    </select>
    </form>
  </body>
</html>