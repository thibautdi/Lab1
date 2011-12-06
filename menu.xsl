<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:param name="PARAM_ADMIN"/>
<xsl:param name="PARAM_USER"/>

<xsl:template match="/">
   
   <xsl:for-each select="menu/item">  
     <xsl:variable name="lien">
       <xsl:value-of select="link"/>
     </xsl:variable>    
     <xsl:variable name="titre">
       <xsl:value-of select="title"/>
     </xsl:variable> 
    <li>
      <a href="{$lien}"><xsl:value-of select="$titre"/></a>
    </li>
   </xsl:for-each>
   
   <xsl:if test="$PARAM_USER = 1">
   <xsl:for-each select="menu/item_user">
      <xsl:variable name="lien">
        <xsl:value-of select="link"/>
      </xsl:variable>    
      <xsl:variable name="titre">
        <xsl:value-of select="title"/>
      </xsl:variable> 
     <li>
       <a href="{$lien}"><xsl:value-of select="$titre"/></a>
     </li>
   </xsl:for-each>
  </xsl:if> 

    <xsl:if test="$PARAM_ADMIN = 1">
     <xsl:for-each select="menu/item_admin">
        <xsl:variable name="lien">
          <xsl:value-of select="link"/>
        </xsl:variable>    
        <xsl:variable name="titre">
          <xsl:value-of select="title"/>
        </xsl:variable> 
       <li>
         <a href="{$lien}"><xsl:value-of select="$titre"/></a>
       </li>
     </xsl:for-each>
   </xsl:if> 
   
</xsl:template>

</xsl:stylesheet>


