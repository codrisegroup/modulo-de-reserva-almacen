<?php 
include('../../configuracion.php');
include('../../rutas.php');
$link  = Conectarse();

$numero     = $_POST['numero'];
$codigo     = $_POST['codigo'];
$cantidad   = $_POST['cantidad'];
$autorizada = $_POST['autorizada'];

$query_rqm = "UPDATE [010BDCOMUN].DBO.INV_REQMATERIAL_DET SET REQ_CANTIDAD_REQUERIDA='$cantidad',
    REQ_CANTIDAD_AUTORIZADA='$autorizada'
    WHERE REQ_NUMERO='$numero' 
   AND ACODIGO='$codigo'";

$query_rsv = "UPDATE [022BDCOMUN].DBO.RESERVA_DET SET CANTIDAD='$cantidad',CANT_PEND='$cantidad' WHERE REQUERIMIENTO='$numero' 
   AND CODIGO='$codigo'";

$result_rqm = mssql_query($query_rqm);

if($result_rqm)
{
$result_rsv = mssql_query($query_rsv);
   header('Location: ../../pages/editar-rqm?numero='.$numero);
}
else
{
   echo "error";
}










 ?>