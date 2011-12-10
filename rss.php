<div id='droite'>
  <p id='rss_title'>Ils parlent de nous !</p>
<?php
 $xslDoc = new DOMDocument();
  $xslDoc->load("rss.xslt");
  $xmlDoc = new DOMDocument();
  $xmlDoc->load("https://search.twitter.com/search.rss?q=noteuneboite");
  $proc = new XSLTProcessor();
  $proc->importStylesheet($xslDoc);
  // transform the XML into HTML using the XSL file
  if ($html = $proc->transformToXML($xmlDoc)) {
      echo $html;
  } else {
      trigger_error('XSL transformation failed.', E_USER_ERROR);
  }
?>
</div>