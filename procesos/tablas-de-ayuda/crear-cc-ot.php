<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Ot.php');
include('../../includes/bd/conexion_mysql.php');

$fecha = date('Y-m-d');
$hora  = date('H:i:s');


$otcc  =  new Ot('?',$_POST['cc'],$_POST['ot'],$fecha,$hora,$_SESSION[KEY.USUARIO],$_SERVER['REMOTE_ADDR'],'ACTIVO',0,0);

$otcc -> Registrar_Servicios();
$otcc -> Registrar();

 ?>