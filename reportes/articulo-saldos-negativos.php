<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Articulos Saldos negativos</title>
	<?php include('../enlaces/principal.php'); ?>
	<?php include('../enlaces/datatables.php'); ?>
<style type="text/css">
table{font-size: 12px;}
</style>
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

<div class="panel panel-danger">
	<!-- Default panel contents -->
	<div class="panel-heading">Lista de Articulos con saldos negativos</div>
	<div class="panel-body">
	<?php 

include('../grid/reportes/articulo-saldos-negativos.php');

 ?>
	</div>

</div>

</div>
</div>
</div>

</body>
</html>