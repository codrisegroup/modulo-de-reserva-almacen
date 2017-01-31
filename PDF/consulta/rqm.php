<?php include('../../configuracion.php'); ?>
<?php include('../../includes/bd/conexion.php'); ?>
<?php $link = Conectarse(); ?>
<?php 

$querycab="SELECT REQ_NUMERO,
CONVERT(VARCHAR,REQ_FECHA_EMISION,105)AS FECHA,REQ_PERSONAL_SOLIC,TDESCRI,REQ_GLOSA FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB AS C 
INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON C.REQ_PERSONAL_SOLIC=T.TCLAVE WHERE  REQ_NUMERO='$_GET[id]' AND T.TCOD=12";
$querydet = "SELECT INVD.REQ_ITEM,INVD.ACODIGO,M.ADESCRI,M.AUNIDAD,INVD.REQ_CANTIDAD_REQUERIDA AS CANT,
(INVD.REQ_CANTIDAD_REQUERIDA-INVD.REQ_CANTIDAD_DESPACHADA) as SALDO ,
TC.TCASILLERO,
(INVD.REQ_CANTIDAD_REQUERIDA-(INVD.REQ_CANTIDAD_REQUERIDA-INVD.REQ_CANTIDAD_DESPACHADA) )AS DESPACHO,
INVD.CENCOST_CODIGO,INVD.REQ_DEORDFAB
FROM ".BDSTARSOFT.".DBO.INV_REQMATERIAL_CAB  AS INVC 
INNER JOIN ".BDSTARSOFT.".DBO.INV_REQMATERIAL_DET  AS INVD 
ON INVC.REQ_NUMERO=INVD.REQ_NUMERO 
INNER JOIN ".BDSTARSOFT.".DBO.MAEART AS M ON INVD.ACODIGO=M.ACODIGO  
LEFT JOIN ".BDSTARSOFT.".DBO.TABCASILLERO AS TC ON 
M.ACODIGO=TC.TCODART  AND TCODALM='01'
INNER JOIN ".BDSTARSOFT.".DBO.TABAYU AS T ON
INVC.REQ_PERSONAL_SOLIC=T.TCLAVE   WHERE 
  T.TCOD=12   AND INVC.REQ_NUMERO='$_GET[id]'
  ORDER BY $_GET[orden]";
$resultdet = mssql_query($querydet);
$resultcab = mssql_query($querycab);
$filacab   = mssql_fetch_array($resultcab);

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Requerimiento de Materiales - <?php echo $_GET['id']; ?></title>
	<link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/estilos.css">

</head>
<body>

<center>
<img src="../../assets/img/logoreporte.png" 
 width="400" height="80" >

<h4 >Requerimiento de Materiales <?php echo $_GET['id']; ?></h4>
</center>

<table  class="table table-condensed table-bordered">
<thead>
<tr>
<td >FECHA DE EMISIÓN:</td>
<td ><?php echo $filacab['FECHA']; ?></td>
<td >SOLICITANTE</td>
<td ><?php echo $filacab['TDESCRI']; ?></td>
</tr>
<tr >
<td >COMENTARIO:</td>
<td ><?php echo $filacab['REQ_GLOSA']; ?></td>
<td >JEFE DE ÁREA SOLICITANTE:</td>
<td ></td>
</tr>
<tr >
<td >NOTA DE SALIDA:</td>
<td ></td>
<td >ENCARGADO DE ALMACEN:</td>
<td ></td>
</tr>
</thead>
</table>
<p></p>
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>IT</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>CANT</th>
<th>SALDO</th>
<th>DESP.</th>
<th>UND</th>
<th>CC</th>
<th>OT</th>
<th>UBC</th>
</tr>
</thead>
<tbody>

<?php 
while ($fila=mssql_fetch_object($resultdet))
 {
 ?>
<tr>
<td><?php echo $fila->REQ_ITEM; ?></td>
<td><?php echo $fila->ACODIGO; ?></td>
<td><?php echo utf8_encode($fila->ADESCRI); ?></td>
<td><?php echo $fila->CANT; ?></td>
<td><?php echo $fila->SALDO; ?></td>
<td><?php echo $fila->DESPACHADO ?></td>
<td><?php echo $fila->AUNIDAD; ?> </td>
<td><?php echo $fila->CENCOST_CODIGO; ?></td>
<td><?php echo $fila->REQ_DEORDFAB; ?></td>
<td><?php echo $fila->TCASILLERO; ?></td>
</tr>
<?php
}
 ?>

</tbody>
</table>




</body>
</html>