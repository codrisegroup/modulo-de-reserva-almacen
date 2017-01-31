<?php 	

class Ot{

protected $id;
protected $cc;
protected $ot;
protected $fecha;
protected $hora;
protected $usuario;
protected $ip;
protected $estado;


function __construct($id,$cc,$ot,$fecha,$hora,$usuario,$ip,$estado){

  $this->id      = $id;
  $this->cc      = $cc;
  $this->ot      = $ot;
  $this->fecha   = $fecha;
  $this->hora    = $hora;
  $this->usuario = $usuario;
  $this->ip      = $ip;
  $this->estado  = $estado;

}


function Registrar()
{
  $query   =  "INSERT INTO ".BD.".DBO.CENCOSOT(CODIGOCENTROCOSTO,CODIGOOT,FECHA,HORA,USUARIO,NOMBRE_PC,ESTADO,PFAB,PSEV)
  VALUES('$this->cc','$this->ot','$this->fecha','$this->hora','$this->usuario','$this->ip','$this->estado',0,0)";
  $result  = mssql_query($query);
  if (!$result) {
  	echo "error";
  }
  else
  {
  	header('Location: ../../pages/cc-ot');
  }

}


function Registrar_Servicios()
{
   $link_mysql   = Conectarse_mysql();
   $query_mysql  = "INSERT INTO CENCOSOT(CODIGOCENTROCOSTO,CODIGOOT,CANT_HORAS,HORA,USUARIO,NOMBRE_PC,ESTADO)
   VALUES('$this->cc','$this->ot','300',now(),'$this->usuario','$this->ip','$this->estado')";
   $result_mysql     = mysql_query($query_mysql);
   if (!$result_mysql) {
     echo "error";
   }
   else
   {
     echo "ok";
   }
}



function Eliminar()
{
	$query   = "DELETE FROM ".BD.".DBO.CENCOSOT   WHERE IDCENCOSOT='$this->id'";
	$result  = mssql_query($query);
	if (!$result) {
		echo "error";
	}
	else
    {
    	header('Location: ../../pages/cc-ot');
    }

}

function Eliminar_Servicios()
{
  $link_mysql    = Conectarse_mysql();
  $query_mysql   = "DELETE FROM CENCOSOT  WHERE CODIGOOT='$this->ot'";
  $result_mysql  = mysql_query($query_mysql);
  if (!$result_mysql) {
    echo "error";
  }
  else
    {
      echo "ok";
    }

}




function ObtenerCC($ot)
{
$link    = Conectarse();
$query   = "
SELECT CODIGOCENTROCOSTO FROM ".BD.".DBO.CENCOSOT  WHERE  CODIGOOT='$ot'";
$result  = mssql_query($query);
$dato    = mssql_fetch_array($result);
return  $dato['CODIGOCENTROCOSTO'];

}


}



 ?>














