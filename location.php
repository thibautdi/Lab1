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
    <p>Géolocalisation en cours: <span id="status">...</span></p>
      <div id='top_0' class='closest'></div>
      <div id='top_1' class='closest'></div>
      <div id='top_2' class='closest'></div>
      <div id='top_3' class='closest'></div>
      <div id='top_4' class='closest'></div>
  </article>
  <p id='position'><p>
  
</div>
<?php
include 'sidebar.php';
include 'footer.php'; 
?>