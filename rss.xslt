<?xml version="1.0" encoding="utf-8" ?> 
<xsl:stylesheet 
     version="1.0" 
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
     <xsl:output method="html" /> 
     <xsl:template match="rss/channel">
       <div id="tweets"> 
        <xsl:apply-templates select="item" /> 
      </div>
     </xsl:template>

    <xsl:template match="item"> 
        <div class="tweet"> 
            <div class="tweet_author"><xsl:value-of select="substring-before(author,'@twitter.com')" disable-output-escaping="yes"/> a dit:</div> 
            <div class="tweet_content"><a target="_blank" href="{link}"><xsl:value-of select="description" disable-output-escaping="yes"/></a></div>
            <div class="tweet_date"><xsl:value-of select="substring-after(substring-before(pubDate,' +0000'),', ')" /></div> 
        </div> 
    </xsl:template> 
</xsl:stylesheet>