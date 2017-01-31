<div class="modal fade" id="<?php echo $txta;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Actualizar</h4>
			</div>

			<form action="../procesos/tablas-de-ayuda/actualizar-rqm.php" method="POST">

			<input type="hidden" name="numero" value="<?php echo $fila->REQ_NUMERO;?>">
			<input type="hidden" name="codigo" value="<?php echo $fila->ACODIGO;?>">
				
            <div class="modal-body">
            <h4><?php echo utf8_encode($fila->ACODIGO); ?></h4>
            <h4><?php echo utf8_encode($fila->ADESCRI); ?></h4>
             
			<div class="form-group">
			<label>CANTIDAD REQUERIDA:</label>
			<input type="number" name="cantidad" class="form-control input-sm" required="" step="any"  min="1" value="<?php echo $fila->REQ_CANTIDAD_REQUERIDA; ?>">
			</div>

			<div class="form-group">
			<label>CANTIDAD AUTORIZADA:</label>
			<input type="number" name="autorizada" class="form-control input-sm" required="" step="any"  min="1" value="<?php echo $fila->REQ_CANTIDAD_AUTORIZADA; ?>">
			</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
			</div>



			</form>



		</div>
	</div>
</div>