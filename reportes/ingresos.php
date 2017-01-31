<?php 
include('../configuracion.php');
include('../rutas.php');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingresos</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
</head>
<body>
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<?php include('../nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Ingresos por Compras Locales</h3>
	</div>
	<div class="panel-body">
		<?php include('../grid/ingresos.php'); ?>
	</div>
</div>
</div>
</div>


</div>
</body>
</html>