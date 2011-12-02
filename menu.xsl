<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
   <xsl:for-each select="menu/item">
    <li>
      <a>
        <xsl:value-of select="title"/>
      </a>
    </li>
   </xsl:for-each>
   
   <?php if (isset($_SESSION['user'])){ ?>
   <xsl:for-each select="menu/item_user">
    <li>
      <xsl:value-of select="title"/>
    </li>
   </xsl:for-each>
   <?php 
   } ?>
   
   <?php if ($_SESSION['user']['admin'] == '1'){ ?>
   <xsl:for-each select="menu/item_admin">
    <li>
      <xsl:value-of select="title "/>
    </li>
   </xsl:for-each>
   <?php 
   } ?>
   
</xsl:template>

</xsl:stylesheet>


