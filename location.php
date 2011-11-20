<?php
include 'header.php';
include 'menu.php';
?>
<div id="contenu">
  <h1>Clubs les plus proches</h1>
  <meta name="viewport" content="width=620">
  <script type="text/javascript" src="scripts/location.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <article>
        <p>Finding your location: <span id="status">checking...</span></p>
      </article>
      <p id='position'><p>
</div>
<?php
include 'sidebar.php';
include 'footer.php'; 
?>