<?php 

include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Usuario.php');

$codigo      = $_POST['codigo'];
$nombres     = $_POST['nombres'];
$apellidos   = $_POST['apellidos'];
$dni         = $_POST['dni'];
$solicitante = $_POST['solicitante'];
$tipo        = $_POST['tipo']; 


$usuario =  new Usuario($codigo,$nombres,$apellidos,$dni,$solicitante,$tipo);
$usuario -> Actualizar();


 ?>