<?php 

$query ="SELECT REQ_NUMERO,REQ_ITEM,ACODIGO,REQ_CANTIDAD_REQUERIDA,REQ_CANTIDAD_AUTORIZADA,REQ_CANTIDAD_DESPACHADA,
CENCOST_CODIGO,REQ_DEORDFAB  FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_DET  WHERE REQ_NUMERO='".$_GET['rq']."'
  AND REQ_CANTIDAD_DESPACHADA <>REQ_CANTIDAD_REQUERIDA
";
$result = mssql_query($query);

 ?>

 <table class="table table-condensed">
 	<thead>
 		<tr>
 			<th>ITEM</th>
 			<th>CÓDIGO</th>
 			<th>C. REQUERIDA</th>
 			<th>C. AUTORIZADA</th>
 			<th>C. DESPACHADA</th>
 			<th>OT</th>
 			<th>CENTRO DE COSTO</th>
 			<th><i class="fa fa-times text-danger fa-2x"></i></th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
        
        while ($fila = mssql_fetch_object($result))
         {
          ?>
         <tr>
 			<td><?php echo $fila->REQ_ITEM; ?></td>
 			<td><?php echo $fila->ACODIGO; ?></td>
 			<td><?php echo $fila->REQ_CANTIDAD_REQUERIDA; ?></td>
 			<td><?php echo $fila->REQ_CANTIDAD_AUTORIZADA; ?></td>
 			<td><?php echo $fila->REQ_CANTIDAD_DESPACHADA; ?></td>
 			<td><?php echo $fila->REQ_DEORDFAB; ?></td>
 			<td><?php echo $fila->CENCOST_CODIGO; ?></td>
 			<td><a href="../../procesos/reportes/saldos-pendientes?codigo=<?php  echo $fila->ACODIGO;  ?>&rq=<?php echo $_GET['rq']; ?>"><i class="fa fa-times text-danger fa-2x"></i></a></td>
 		</tr>
        <?php
         }


 		 ?>
 	</tbody>
 </table>

