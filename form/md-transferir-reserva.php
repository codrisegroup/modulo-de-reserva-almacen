<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">
  Transferir a Reserva
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Transferir  a Reserva</h4>
      </div>
      <div class="modal-body">
        
        <select name="reservatraslado" id="reservatraslado" required="">
          <option value="">[SELECCIONAR]</option>
          <?php 
           
           $query   =  "SELECT C.NRORESERVA,C.OT,C.CENTROCOSTO,(NOMBRES+' '+APELLIDOS)AS FULLNAME FROM [022BDCOMUN].DBO.RESERVA_CAB AS C INNER JOIN [022BDCOMUN].DBO.USUARIOS AS U ON 
           C.USUARIO=U.ID_USUARIO   WHERE ESTADO='00' 
           AND C.NRORESERVA<>'$reservainicial' ORDER BY C.NRORESERVA";
           $result  = mssql_query($query);
           while ($fila = mssql_fetch_object($result)) {
             
             echo "<option value='$fila->NRORESERVA'>$fila->NRORESERVA - $fila->CENTROCOSTO -  $fila->OT - ".utf8_encode($fila->FULLNAME)."</option>";
           }





           ?>
        </select>
         <script>
          $('#reservatraslado').selectize();
          </script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-info">Transferir</button>
      </div>
    </div>
  </div>
</div>

