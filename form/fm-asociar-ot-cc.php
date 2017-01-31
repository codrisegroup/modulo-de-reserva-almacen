<form action="../procesos/tablas-de-ayuda/crear-cc-ot.php" method="POST">	

<div class="row">
	


<div class="col-md-2">
<select name="ot" id="ot" required="">
<option value="">SELECCIONAR LA OT</option>
<?php 

$query   =  "
	SELECT OF_COD FROM ".BDSTARSOFT.".DBO.ORD_FAB  WHERE OF_ESTADO='ACTIVO'
	AND OF_COD NOT IN (
	SELECT CODIGOOT FROM  ".BD.".DBO.CENCOSOT)
	ORDER BY OF_COD";
$result  =  mssql_query($query);
while ($fila = mssql_fetch_object($result)) {
	echo "<option value='$fila->OF_COD'>$fila->OF_COD</option>";
}

 ?>
</select>
<script>
$('#ot').selectize();
</script>
</div>


<div class="col-md-5">
<select name="cc" id="cc"  required="">
<option value="">SELECCIONAR EL CENTRO DE COSTO</option>
<?php 

$query   =  "
	SELECT CENCOST_CODIGO,CENCOST_DESCRIPCION FROM ".BDCONTABILIDAD.".DBO.CENTRO_COSTOS
	ORDER BY CENCOST_DESCRIPCION";
$result  =  mssql_query($query);
while ($fila = mssql_fetch_object($result)) {
	echo "<option value='$fila->CENCOST_CODIGO'>$fila->CENCOST_CODIGO
	- ".utf8_encode($fila->CENCOST_DESCRIPCION)."</option>";
}

 ?>
</select>
<script>
$('#cc').selectize();
</script>
</div>



<div class="col-md-2">
<button class="btn btn-info btn-sm">Crear Asociación</button>
</div>

</div>

</form>