<?php 
$link   = Conectarse();
$query  = "SELECT  CANUMDOC,CONVERT(VARCHAR,CAFECDOC,103)CAFECDOC,CACODMOV,CAGLOSA,CAORDFAB,O.OF_ESTADO,CACODPRO,P.PRVCNOMBRE
 FROM [010BDCOMUN].DBO.MOVALMCAB  AS C INNER JOIN 
 (
SELECT NUMERO_DOC FROM [022BDCOMUN].DBO.RESERVA_DET  WHERE NRORESERVA=423  AND CANT_PEND<>0
GROUP BY NUMERO_DOC) AS D ON C.CANUMDOC=D.NUMERO_DOC
INNER JOIN [010BDCOMUN].DBO.MAEPROV AS P ON C.CACODPRO=P.PRVCCODIGO
INNER JOIN [010BDCOMUN].DBO.ORD_FAB AS O ON C.CAORDFAB=O.OF_COD
 WHERE CACODMOV='CL'";
$result = mssql_query($query);

 ?>
 <div class="table-responsive">
 	<table  id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="active">
 				<th>#</th>
 				<th>FECHA</th>
 				<th>OT</th>
        <th>ESTADO OT</th>
 				<th>RUC</th>
 				<th>RAZÓN SOCIAL</th>
 				<th>GLOSA</th>
 		
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
         while ($fila = mssql_fetch_object($result))
          {
 
         	?>
          <tr>
          <td><?php echo $fila->CANUMDOC; ?></td>
          <td><?php echo $fila->CAFECDOC; ?></td>
          <td><?php echo $fila->CAORDFAB; ?></td>
          <td><?php echo $fila->OF_ESTADO; ?></td>
          <td><?php echo $fila->CACODPRO; ?></td>
          <td><?php echo utf8_encode($fila->PRVCNOMBRE); ?></td>
          <td><?php echo $fila->CAGLOSA; ?></td>
          
          </tr>
         <?php
          
                
 
          }

 		 ?>
 		</tbody>
 	</table>
 </div>

 <script>
 $(document).ready(function() {
    $('#consulta').DataTable();
} );
 </script>