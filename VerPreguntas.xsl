<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
   <xsl:output method="html" encoding="UTF-8"/>
   <xsl:template match="/">
      <html>
         <body>
            <h3 align='center'>COLECCION DE PREGUNTAS</h3>
            <h5 align='center'>Estas son las preguntas que han quedado registradas:</h5>
            <style>
               table {
               border-collapse: collapse;
               width: 100%;
               }
               th, td {
               text-align: left;
               padding: 8px;
               }
               tr:nth-child(even){background-color: #f2f2f2}
               th {
               background-color: #4CAF50;
               color: white;
               }
            </style>
            <table border="1">
               <thead>
                  <tr>
                     <th>Enunciado</th>
                     <th>Complejidad</th>
                     <th>Tematica</th>
                  </tr>
               </thead>
               <xsl:for-each select="/assessmentItems/assessmentItem">
                  <tr>
                     <td>
                        <xsl:value-of select="itemBody/p"/>
                     </td>
                     <td>
                        <xsl:value-of select="@complexity"/>
                     </td>
                     <td>
                        <xsl:value-of select="@subject"/>
                     </td>
                  </tr>
               </xsl:for-each>
            </table>
         </body>
      </html>
   </xsl:template>
</xsl:stylesheet>