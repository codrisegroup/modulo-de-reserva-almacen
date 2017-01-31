<?php 
$link = Conectarse();
$query  =  "SELECT ITEM,NRORESERVA,IDRESERVA_DET,CODIGO,DESCRIPCION,CANTIDAD,CANT_PEND,OT,NUMERO_DOC,UNIDAD,OT FROM ".BD.".DBO.RESERVA_DET
WHERE NRORESERVA=423 AND CANT_PEND<>0";
$result = mssql_query($query);
 ?>
<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th><input type="checkbox" name="" ></th>
<th>ITEM</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>UND</th>
<th>CANTIDAD</th>
<th>OT</th>
<th>NOTA DE INGRESO</th>
</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><input type="checkbox" name="" ></td>
<td><?php echo $fila->ITEM; ?></td>
<td><?php echo utf8_encode($fila->CODIGO); ?></td>
<td><?php echo utf8_encode($fila->DESCRIPCION); ?></td>
<td><?php echo $fila->UNIDAD; ?></td>
<td><?php echo $fila->CANT_PEND; ?></td>
<td><?php echo $fila->OT; ?></td>
<td><a href="../reportes/detalle/detalle-ni?ni=<?php echo $fila->NUMERO_DOC;?>" target="_blank"><?php echo $fila->NUMERO_DOC; ?></a></td>

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




