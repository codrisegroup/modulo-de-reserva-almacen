<?php 
$link = Conectarse();
$query  =  "
SELECT * FROM ".BDSTARSOFT.".DBO.MOVALMCAB  WHERE CATD='NI'  AND CATIPMOV='I' AND 
CAALMA='01' AND CAGLOSA='REGULARIZACION'
";
$result = mssql_query($query);
 ?>
<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th><input type="checkbox" name="" ></th>
<th>NÚMERO DE NI</th>
<th>RUC</th>

</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td><input type="checkbox" name="" ></td>
<td><?php echo $fila->CANUMDOC; ?></td>
<td><?php echo $fila->CACODPRO; ?></td>
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




