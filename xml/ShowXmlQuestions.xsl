<?xml version="1.0" ?>
<xsl:stylesheet version="2.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
    <body>
      <table border="3">
        <thead>
          <th>Autor</th>
          <th>Enunciado</th>
          <th>Respuesta Correcta</th>
          <th>Respuestas incorrectas</th>
          <th>Tema</th>  
        </thead>
          <xsl:for-each select="/assessmentItems/assessmentItem" >
           <TR>
                <td>
                    <xsl:value-of select="@author"/> <BR/>
                </td>
                <td>
                    <xsl:value-of select="itemBody/p"/> <BR/>
                </td>
                <td>
                    <xsl:value-of select="correctResponse"/><BR/>
                </td>
                <td>
                    <UL>
                        <xsl:for-each select="incorrectResponses/response" >
                            <LI><xsl:value-of select="."/></LI>
                        </xsl:for-each>
                    </UL>
                </td>
                <td>
                    <xsl:value-of select="@subject"/> <BR/>
                </td>
           </TR>
        </xsl:for-each>
      </table>
    </body>
</html>
</xsl:template>
</xsl:stylesheet>