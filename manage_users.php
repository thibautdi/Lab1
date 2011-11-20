<?php
include 'header.php';
include 'menu.php';
$users = $db->get_users();
?>
<div id="contenu">
  <h1>Gestion des utilisateurs</h1>    
  <?php if ($_SESSION['user']['admin'] == 1) {?>
    <table>
      <th>id</th>
      <th>login</th> 
      <th>Prénom</th>
      <th>Nom</th>
      <?php 
      foreach ($users as $user) {
      ?>
        <tr id="user_<?php echo $user['id']; ?>">
          <td id='id'><?php echo $user['id'];?></td>
          <td id='login'><?php echo $user['login']; ?></td>
          <td id='fname'><?php echo $user['fname'] ?></td>
          <td id='lname'><?php echo $user['lname'] ?></td>
          <?php if ($user['admin'] == 0): ?>
            <td><input type='button' class='make_admin' id="<?php echo $user['id'];?>" value='Nommer admin'></td>
          <?php endif; ?>
          <?php if ($user['admin'] == 1): ?>
            <td><input type='button' id="<?php echo $user['id'];?>" class='remove_admin' value='Retirer privilèges'></td>
          <?php endif; ?>
          <td><img alt='Supprimer Utilisateur' id="delete_<?php echo $user['id'];?>" class='delete_user' src='img/no.png'/></td>
        </tr>
      <?php
      }
      ?>
    </table>
  <?php }else {
    echo "Vous devez être un admin pour voir cette page.";
  } ?>
</div>
<?php
include 'sidebar.php';
include 'footer.php'; 
?>