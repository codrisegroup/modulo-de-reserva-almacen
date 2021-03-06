
<?php 

$query  =  "SELECT (ROW_NUMBER() OVER(ORDER BY ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) ASC))AS
 ITEM,
DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,SUM(ISNULL(D.CANT_PEND,0)) AS CANT_RESERV,
ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)) AS CANT_DISP
FROM ".BD.".DBO.DATOS_RSV AS DRV LEFT JOIN 
".BD.".DBO.RESERVA_DET AS D ON 
DRV.CODIGO=D.CODIGO  LEFT JOIN ".BDSTARSOFT.".DBO.STKART AS S ON 
DRV.CODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN ".BDSTARSOFT.".DBO.MAEART AS M ON
DRV.CODIGO=M.ACODIGO  WHERE USUARIO='".$_SESSION[KEY.USUARIO]."' AND  DRV.TIPO='RESERVA'  AND
M.AFSTOCK='S' AND STALMA='01' AND AESTADO='V' 
GROUP BY DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,S.STSKDIS

";
$result = mssql_query($query);


 ?>


<div class="table-responsive">
 <table id="consultasinstock" class="table table-striped table-hover table-condensed table-bordered">
    <thead>
        <tr class="info">
         
            <th>CÓDIGO</th>
            <th>DESCRIPCIÓN</th>
            <th>CANTIDAD</th>
            <th>UND</th>
            <th>CANT. RESERVADA</th>
            <th>CANT. DISPONIBLE</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 

         while ($fila = mssql_fetch_object($result)) 
         {

           if ($fila->CANT_DISP==0)
            {
            ?>
             
            <tr>           
            <td><?php echo utf8_encode($fila->CODIGO); ?></td>
            <td><?php echo utf8_encode($fila->ADESCRI); ?></td>
            <td><?php echo $fila->CANTIDAD; ?></td>
            <td><?php echo $fila->AUNIDAD; ?></td>
            <td><?php echo $fila->CANT_RESERV; ?></td>
            <td><?php echo $fila->CANT_DISP; ?></td>
            </tr>     
              

            <?php
            }

            else
            {
                #disponible
            }

           
         
         }

         ?>
    </tbody>
 </table>
</div>


