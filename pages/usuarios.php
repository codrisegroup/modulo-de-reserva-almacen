<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php include('../includes/clases/Funciones.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reserva</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
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
<?php 
if ($_GET['m']=='success') 
echo mensaje('Usuario Registrado Correctamente.',$_GET['m']);
else if ($_GET['m']=='warning')
echo mensaje('Número de Dni Duplicado,verificar por favor',$_GET['m']);
else if ($_GET['m']=='danger')
echo mensaje('Error al Registrar.',$_GET['m']);
 ?>
		</div>
	</div>


	<div class="row">

     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <?php include('../form/md-usuarios.php'); ?>
     </div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<form action="../procesos/tablas-de-ayuda/actualizar-usuario.php" method="POST">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Lista de Usuarios.
				Tipo{1=Administrador,2=Usuario}
                <div class="pull-right">
                <button type="submit" class="btn btn-xs btn-info">Actualizar Información</button>
                </div>
				</div>
				<div class="panel-body">
					<?php include('../grid/usuarios.php'); ?>
				</div>
			
			
			</div>
</form>

		</div>
	</div>
</div>

</body>
</html>