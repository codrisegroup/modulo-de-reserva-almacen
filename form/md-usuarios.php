<form action="../procesos/tablas-de-ayuda/registrar-usuario.php" method="POST">

<div class="form-group">
 <a id="modal-520107" href="#modal-container-520107" role="button" class="btn btn-info" data-toggle="modal">Crear Usuario</a>
</div>
      
      <div class="modal fade" id="modal-container-520107" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              <h4 class="modal-title" id="myModalLabel">
                Creación de Usuario
              </h4>
            </div>
            <div class="modal-body">
          
            <div class="form-group">
             <input type="text" name="nombres" class="form-control input-sm" placeholder="Nombres" required="" 
             onchange="Mayusculas(this)">
            </div>

            <div class="form-group">
             <input type="text" name="apellidos" class="form-control input-sm" placeholder="Apellidos" required=""
             onchange="Mayusculas(this)">
            </div>

            <div class="form-group">
             <input type="number" name="dni" class="form-control input-sm" placeholder="Número de DNI" required="" >
            </div>

            <div class="form-group">
             <input type="text" name="solicitante" class="form-control input-sm" placeholder="Código de Solicitante" required="">
            </div>
    

            </div>
            <div class="modal-footer">
               
              <button type="button" class="btn btn-default" data-dismiss="modal">
                Cerrar
              </button> 
              <button type="submit" class="btn btn-success">
                Crear Usuario
              </button>
            </div>
          </div>
          
        </div>
        
      </div>

</form>
