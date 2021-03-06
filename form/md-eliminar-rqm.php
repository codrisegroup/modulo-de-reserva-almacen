<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs btn-danger" data-toggle="modal" data-target="#myModal">
  Eliminar Requerimientos Seleccionados
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Requerimientos de Materiales.</h4>
      </div>
      <div class="modal-body">
        Los requerimientos de materiales se eliminaran permanentemente y las reservas pasaran a pendientes para que puedan ser editadas.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>