<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Requerimiento de Materiales</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
<?php include('../enlaces/jquery-ui.php'); ?>
<style type="text/css">
table{font-size: 13px;}
</style>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php include('../nav.php'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php include('../grid/editar-rqm-c.php'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Detalle Requerimiento <?php echo $_GET['numero']; ?>      
				</div>
				<div class="panel-body">
					<?php include('../grid/editar-rqm-d.php'); ?>
				</div>
			
			
			</div>
		</div>
	</div>
</div>

</body>
</html>