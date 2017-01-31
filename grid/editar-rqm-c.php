<?php 

$link   = Conectarse();
$query  = "
SELECT REQ_NUMERO,
CONVERT(VARCHAR,REQ_FECHA_EMISION,103)AS REQ_FECHA_EMISION,
CONVERT(VARCHAR,REQ_FECHA_AUTORI,103)AS REQ_FECHA_AUTORI,CASE REQ_ESTADO
WHEN '00'  THEN 'EMITIDO'
WHEN '01'  THEN 'ATENDIDO'
WHEN '03'  THEN 'REC-PARCIAL'
WHEN '04'  THEN 'REC-TOTAL'
WHEN '05'  THEN 'LIQUIDADA'
WHEN '06'  THEN 'ANULADA'
END AS REQ_ESTADO,REQ_PERSONAL_SOLIC,T.TDESCRI,REQ_GLOSA,CENCOST_CODIGO,REQ_DEORDFAB
 FROM [010BDCOMUN].DBO.INV_REQMATERIAL_CAB AS C INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC=T.TCLAVE AND TCOD=12
   WHERE REQ_NUMERO='".$_GET['numero']."'";
$result = mssql_query($query);
 ?>

 <div class="table-responsive">
 <table class="table table-bordered table-condensed">
 	<thead>
 		<tr class="success">
 			<th>NÚMERO</th>
 			<th>SOLICITANTE</th>
 			<th>COMENTARIO</th>
 			<th>CENTRO DE COSTO</th>
 			<th>ORDEN DE FABRICACIÓN</th>
 			<th>FECHA DE EMISIÓN</th>
 			<th>FECHA DE AUTORIZACIÓN</th>
 			<th>ESTADO</th>
 		</tr>
 	</thead>
 	<tbody>
 	<?php 
    while ($fila = mssql_fetch_object($result)) 
    {
    ?>
	<tr>
	<td><?php echo $fila->REQ_NUMERO; ?></td>
	<td><?php echo $fila->TDESCRI; ?></td>
	<td><?php echo $fila->REQ_GLOSA; ?></td>
	<td><?php echo $fila->CENCOST_CODIGO; ?></td>
	<td><?php echo $fila->REQ_DEORFAB; ?></td>
	<td><?php echo $fila->REQ_FECHA_EMISION; ?></td>
	<td><?php echo $fila->REQ_FECHA_AUTORI; ?></td>
	<td><?php echo $fila->REQ_ESTADO; ?></td>
	</tr>
    <?php
    }

 	 ?>
 	</tbody>
 </table>
 </div>