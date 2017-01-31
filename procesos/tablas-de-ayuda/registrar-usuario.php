<?php 
include('../../configuracion.php');
include('../../rutas.php');
include('../../includes/clases/Usuario.php');

$usuario =  new Usuario('?',utf8_decode($_POST['nombres']),utf8_decode($_POST['apellidos']),$_POST['dni'],$_POST['solicitante'],'?');

$usuario -> Registrar();




 ?>