<?php 

$link = Conectarse();

$query  =  "
SELECT id_usuario,nombres,apellidos,dni,starsoft,idtipousuario FROM USUARIOS 
order by nombres";

$result = mssql_query($query);
 ?>

<div class="table-responsive">
<table id="consulta" class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>CODIGO</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>DNI</th>
<th>CODIGO SOLICITANTE</th>
<th>TIPO</th>


</tr>
</thead>
<tbody>
<?php 
while ($fila = mssql_fetch_object($result))
 {
	?>
 
<tr>
<td>
<input type="number" class="form-control input-sm" 
 name="codigo[]" onchanger
 value="<?php echo $fila->id_usuario; ?>" readonly >
 </td>
<td>
<input type="text" name="nombres[]" onchange="Mayusculas(this)" class="form-control input-sm" value="<?php echo utf8_encode($fila->nombres); ?>" ></td>
<td>
<input type="text" name="apellidos[]" onchange="Mayusculas(this)" class="form-control input-sm" value="<?php echo utf8_encode($fila->apellidos); ?>" ></td>
<td>
<input type="text" maxlength="8" name="dni[]" class="form-control input-sm" 
 value="<?php echo $fila->dni; ?>" >
</td>
<td>
<input type="text" name="solicitante[]" maxlength="3" class="form-control input-sm" 
 value="<?php echo $fila->starsoft; ?>"  >
</td>
<td>
<input type="number" min="1" max="2" name="tipo[]" class="form-control input-sm" 
 value="<?php echo $fila->idtipousuario; ?>" >
</td>

</tr>



<?php
 }


 ?>
</tbody>

</table>
</div>

