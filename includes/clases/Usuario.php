<?php 

class Usuario
{

protected $codigo;
protected $nombres;
protected $apellidos;
protected $dni;
protected $solicitante;
protected $tipo;

function __construct($codigo,$nombres,$apellidos,$dni,$solicitante,$tipo)
{

$this->codigo        =  $codigo;
$this->nombres       =  $nombres;
$this->apellidos     =  $apellidos;
$this->dni           =  $dni;
$this->solicitante   =  $solicitante;
$this->tipo          =  $tipo;

}


function Registrar()
{

$query    =  "SELECT * FROM ".BD.".DBO.USUARIOS WHERE 
dni='$this->dni'";
$result   = mssql_query($query);
$numfilas = mssql_num_rows($result);

if ($numfilas>0) 
{
header('Location: ../../pages/usuarios?m=warning');
}
else
{
$query   =  "INSERT INTO ".BD.".DBO.USUARIOS(nombres,apellidos,dni,idtipousuario,usuario,contrasena,starsoft)
VALUES('$this->nombres','$this->apellidos','$this->dni','2','$this->dni','$this->dni','$this->solicitante');";
$result  = mssql_query($query);
if (!$result)
header('Location: ../../pages/usuarios?m=danger');
else
header('Location: ../../pages/usuarios?m=success');
}


}



function Actualizar()
{


foreach ($this->codigo as $key => $valuecodigo) {
	 
   $valuenombres        = utf8_decode($this->nombres[$key]);
   $valueapellidos      = utf8_decode($this->apellidos[$key]);
   $valuedni            = $this->dni[$key];
   $valuesolicitante    = $this->solicitante[$key];
   $valuetipo           = $this->tipo[$key];

$query   =  "UPDATE USUARIOS SET nombres=LTRIM('$valuenombres'),
apellidos=LTRIM('$valueapellidos'),dni=LTRIM('$valuedni'),usuario=LTRIM('$valuedni'),contrasena=LTRIM('$valuedni'),starsoft=LTRIM('$valuesolicitante'),idtipousuario=LTRIM('$valuetipo') WHERE id_usuario='$valuecodigo'";
$result  = mssql_query($query);
if  (!$result)
echo "error";
else
header('Location: ../../pages/usuarios');

}


}


}

 ?>