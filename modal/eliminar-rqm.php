
<div class="modal fade" id="<?php echo $txte;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Eliminar</h4>
			</div>
			
     <form action="../procesos/tablas-de-ayuda/eliminar-rqm.php" method="POST">
          	
		<div class="modal-body">

		<h3>¿Deseas eliminar el código <?php echo utf8_encode($fila->ACODIGO); ?>?</h3>

		<input type="hidden" name="numero" value="<?php echo $fila->REQ_NUMERO;?>">
		<input type="hidden" name="codigo" value="<?php echo $fila->ACODIGO;?>">

		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
		</div>



          </form>




		</div>
	</div>
</div>