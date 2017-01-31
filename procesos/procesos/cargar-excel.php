<?php
include('../../configuracion.php');
include('../../rutas.php');
extract($_POST);
if ($action == "upload") {
//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 
$archivo = $_FILES['excel']['name'];
$tipo = $_FILES['excel']['type'];
$destino = "bak_" . $archivo;
if (copy($_FILES['excel']['tmp_name'], $destino)){
?>
<!--  
<label for="	">Archivo Cargado Con Éxito</label>-->

<?php
}
else{
echo "Error Al Cargar el Archivo";
}
if (file_exists("bak_" . $archivo)) {
/** Clases necesarias */
include('../../librerias/PHPEXCEL/PHPExcel.php');
include('../../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_" . $archivo);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);
//conectamos con la base de datos 
$link = Conectarse();
// Llenamos el arreglo con los datos  del archivo xlsx
for ($i = 1; $i <=300; $i++) {
$_DATOS_EXCEL[$i]['CODIGO'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['CANTIDAD'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['USUARIO']= $_SESSION[KEY.USUARIO]; 
$_DATOS_EXCEL[$i]['TIPO']= "RESERVA"; 
}
}
//si por algo no cargo el archivo bak_ 
else {
echo "Necesitas primero importar el archivo";
}
$errores = 0;
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD


foreach ($_DATOS_EXCEL as $campo => $valor) {


$sql = "INSERT INTO DATOS_RSV VALUES ('";
foreach ($valor as $campo2 => $valor2) {
$campo2 == "TIPO" ? $sql.= $valor2 . "');" : $sql.= $valor2 . "','";

}


$result = mssql_query($sql);

if (!$result) 
{
#echo "Error al insertar registro " . $campo;

$errores+=1;
}
}

header('Location: ../../mensaje/carga-excel');

//una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
unlink($destino);
}
?>