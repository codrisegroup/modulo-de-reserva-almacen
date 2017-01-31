<?php include('../configuracion.php'); ?>
<?php include('../rutas.php'); ?>
<?php include('../includes/clases/Reserva.php'); 
      $reserva = new Reserva();    
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reserva</title>
<?php include('../enlaces/principal.php'); ?>
<?php include('../enlaces/datatables.php'); ?>
<?php include('../enlaces/jquery-ui.php'); ?>
<?php include('../enlaces/selectize.php'); ?>
 
   <script>
  $(function() {
    $( "#fechainicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#fechafin" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
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
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Lista de Ot y Centros de Costos.

               <?php include('../form/fm-asociar-ot-cc.php'); ?>
            
             
				</div>
				<div class="panel-body">
					<?php include('../grid/cc-ot.php'); ?>
				</div>
			
			
			</div>
		</div>
	</div>
</div>

</body>
</html>