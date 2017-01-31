<?php 

$link = Conectarse();

$query  =  "

SELECT  CONVERT(VARCHAR,RQM.REQ_FECHA_EMISION,103)REQ_FECHA_EMISION,RQM.REQ_NUMERO,RQM.TDESCRI,C.NRORESERVA,
REQ_ESTADO FROM [022BDCOMUN].DBO.RESERVA_CAB AS C  INNER JOIN (
SELECT C.REQ_NUMERO,C.REQ_FECHA_EMISION,T.TDESCRI,REQ_ESTADO FROM [010BDCOMUN].DBO.INV_REQMATERIAL_CAB AS C 
INNER JOIN [010BDCOMUN].DBO.INV_REQMATERIAL_DET AS D ON C.REQ_NUMERO=D.REQ_NUMERO 
INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC=T.TCLAVE  AND T.TCOD=12
 WHERE REQ_ESTADO IN ('03','04','05') 
AND REQ_CANTIDAD_DESPACHADA <> REQ_CANTIDAD_REQUERIDA
GROUP BY C.REQ_NUMERO,C.REQ_FECHA_EMISION,T.TDESCRI,REQ_ESTADO
) AS RQM  ON C.REQUERIMIENTO=RQM.REQ_NUMERO

";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="danger">
<th>REQUERIMIENTO</th>
<th>RESERVA</th>
<th>USUARIO</th>
<th>FECHA</th>
<th>ESTADO</th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><a href="detalle/saldos-pendientes?rq=<?php echo $fila->REQ_NUMERO; ?>" target="_blank"><?php echo $fila->REQ_NUMERO; ?></a></td>
<td><?php echo $fila->NRORESERVA; ?></td>
<td><?php echo $fila->TDESCRI; ?></td>
<td><?php echo $fila->REQ_FECHA_EMISION; ?></td>
<td><?php echo $fila->REQ_ESTADO; ?></td>
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

