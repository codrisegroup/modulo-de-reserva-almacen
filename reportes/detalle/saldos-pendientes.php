<?php include('../../configuracion.php'); ?>
<?php include('../../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Saldos Pendientes</title>
	<?php include('../../enlaces/principal.php'); ?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php include('../../nav.php'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 <div class="panel panel-default">
		 	<!-- Default panel contents -->
		 	<div class="panel-heading">Detalle Requerimiento <strong><?php echo $_GET['rq']; ?></strong></div>
		 	<div class="panel-body">
		 	<?php include('../../grid/reportes/saldos-pendientes.php'); ?>
		 	</div>
		 </div>
		</div>
	</div>
</div>
</body>
</html>