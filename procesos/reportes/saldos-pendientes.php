<?php 
include('../../configuracion.php');
include('../../rutas.php');


$codigo = $_GET['codigo'];
$rq     = $_GET['rq'];

$query = "DELETE FROM [010BDCOMUN].DBO.INV_REQMATERIAL_DET WHERE ACODIGO='$codigo' AND REQ_NUMERO='$rq'";

$query_rsv="DELETE FROM [022BDCOMUN].DBO.RESERVA_DET WHERE CODIGO='$codigo' AND REQUERIMIENTO='$rq'";

$result   = mssql_query($query);

if (!$result)
echo "error";
else
$result_rsv   = mssql_query($query_rsv);

header('Location: ../../reportes/detalle/saldos-pendientes?rq='.urlencode($rq));



 ?>