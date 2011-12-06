 <div id="menu">

    <?php
      $xslDoc = new DOMDocument();
      $xslDoc->load("menu.xsl");
      $xmlDoc = new DOMDocument();
      $xmlDoc->load("menu.xml");
      $proc = new XSLTProcessor();
      $proc->importStylesheet($xslDoc);
      
      if ($_SESSION['user']['admin'] == '1') { 
      $proc->setParameter('', 'PARAM_ADMIN', "1");
      }
      else $proc->setParameter('', 'PARAM_ADMIN', "0");
      
      if ($_SESSION['user']) { 
      $proc->setParameter('', 'PARAM_USER', "1");
      }
      else $proc->setParameter('', 'PARAM_USER', "0");
      
      // transform the XML into HTML using the XSL file
      if ($html = $proc->transformToXML($xmlDoc)) {
          echo $html;
      } else {
          trigger_error('XSL transformation failed.', E_USER_ERROR);
      } // if
    ?>

 </div>