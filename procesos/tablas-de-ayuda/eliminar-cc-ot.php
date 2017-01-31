<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Ot.php');
include('../../includes/bd/conexion_mysql.php');


$otcc  =  new Ot($_GET['id'],'?',$_GET['ot'],'?','?','?','?','?','?','?');


$otcc -> Eliminar_Servicios();
$otcc -> Eliminar();

 ?>