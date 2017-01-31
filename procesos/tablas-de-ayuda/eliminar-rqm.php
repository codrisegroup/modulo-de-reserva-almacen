<?php 

include('../../configuracion.php');
include('../../rutas.php');

$link   = Conectarse();

$numero = $_POST['numero'];
$codigo = $_POST['codigo'];


$query_rqm = "DELETE FROM [010BDCOMUN].DBO.INV_REQMATERIAL_DET 
              WHERE REQ_NUMERO='$numero' AND ACODIGO='$codigo'";

$query_rsv = "DELETE FROM [022BDCOMUN].DBO.RESERVA_DET WHERE CODIGO='$codigo' AND REQUERIMIENTO='$numero'";

$result_rqm = mssql_query($query_rqm);

if ($result_rqm)
{
  $result_rsv = mssql_query($query_rsv);
  header('Location: ../../pages/editar-rqm?numero='.$numero);
}
else
{
  echo "error";
}






 ?>