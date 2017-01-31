<?php 

$link = Conectarse();

$query  =  "
SELECT REQ_NUMERO,CONVERT(VARCHAR,REQ_FECHA_CREACION,103)REQ_FECHA_CREACION,TDESCRI,REQ_DEORDFAB
 FROM [010BDCOMUN].DBO.INV_REQMATERIAL_CAB AS C 
  INNER JOIN [010BDCOMUN].DBO.TABAYU AS T 
  ON C.REQ_PERSONAL_SOLIC=T.TCLAVE AND TCOD=12
  WHERE REQ_ESTADO IN ('00','01','03') 
 AND REQ_DEORDFAB  IN (SELECT  OF_COD FROM [010BDCOMUN].DBO.ORD_FAB)
";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="warning">
<th>REQUERIMIENTO</th>
<th>FECHA DE EMISION</th>
<th>SOLICITANTE</th>
<th>OT</th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><a href="../PDF/reporte/rqm?id=<?php echo $fila->REQ_NUMERO; ?>&orden=ACODIGO" target="_blank"><?php echo $fila->REQ_NUMERO; ?></a></td>
<td><?php echo $fila->REQ_FECHA_CREACION; ?></td>
<td><?php echo $fila->TDESCRI; ?></td>
<td><?php echo $fila->REQ_DEORDFAB; ?></td>

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

