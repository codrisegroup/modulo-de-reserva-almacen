<?php 

$link   = Conectarse();
$query  = "SELECT REQ_NUMERO,REQ_ITEM,M.ACODIGO,M.ADESCRI,REQ_CANTIDAD_REQUERIDA,REQ_CANTIDAD_AUTORIZADA,REQ_CANTIDAD_DESPACHADA,CENCOST_CODIGO,REQ_DEORDFAB
FROM [010BDCOMUN].DBO.INV_REQMATERIAL_DET AS  D INNER JOIN [010BDCOMUN].DBO.MAEART AS M ON D.ACODIGO=M.ACODIGO WHERE REQ_NUMERO='".$_GET['numero']."'
ORDER BY REQ_ITEM";
$result = mssql_query($query);
 ?>

 <div class="table-responsive">
 <table  id="consulta" class="table table-bordered table-condensed">
 	<thead>
 		<tr class="info">
 			<th>IT</th>
 			<th>CÓDIGO</th>
 			<th>DESCRIPCIÓN</th>
 			<th>CANTIDAD</th>
 			<th>AUTORIZADO</th>
 			<th>DESPACHADO</th>
 			<th>CENTRO DE COSTO</th>
 			<th>ORDEN DE TRABAJO</th>
 			<th><i class="glyphicon glyphicon-refresh"></i></th>
 			<th><i class="glyphicon glyphicon-trash"></i></th>
 		</tr>
 	</thead>
 	<tbody>
 	<?php 
    while ($fila = mssql_fetch_object($result)) 
    {

	$txta                      ='modal-containera-';
	$txtxa                     ='#modal-containera-';
	$txta                      .=$a;
	$txtxa                     =$txtxa.=$a;

	$txte                      ='modal-containere-';
	$txtxe                     ='#modal-containere-';
	$txte                      .=$e;
	$txtxe                     =$txtxe.=$e;

    ?>
	<tr>
	<td><?php echo $fila->REQ_ITEM; ?></td>
	<td><?php echo utf8_encode($fila->ACODIGO); ?></td>
	<td><?php echo utf8_encode($fila->ADESCRI); ?></td>
	<td><?php echo $fila->REQ_CANTIDAD_REQUERIDA; ?></td>
	<td><?php echo $fila->REQ_CANTIDAD_AUTORIZADA; ?></td>
	<td><?php echo $fila->REQ_CANTIDAD_DESPACHADA; ?></td>
	<td><?php echo $fila->CENCOST_CODIGO; ?></td>
	<td><?php echo $fila->REQ_DEORFAB; ?></td>
	<td>
	<a  data-toggle="modal" href='<?php echo $txtxa;?>'>
	<i class="glyphicon glyphicon-refresh text-primary"></i>
	</a>
    </td>
    <td>
	<a  data-toggle="modal" href='<?php echo $txtxe;?>'>
	<i class="glyphicon glyphicon-trash text-danger"></i>
	</a>
    </td>
	<?php include('../modal/actualizar-rqm.php'); ?> 
    <?php include('../modal/eliminar-rqm.php'); ?> 
	</tr>
    <?php
    
    $a = $a+1;
    $e = $e+1;


    }

 	 ?>
 	</tbody>
 </table>
 </div>

 <script type="text/javascript">
 $(document).ready(function() {
    $('#consulta').DataTable();
} );
 </script>