<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Calificacion-Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
      <form action="../options_Calificacion_producto-Cliente/insert.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
            <div class="row" style="margin-bottom: 20px; margin-left: 2px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Cliente</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idCliente" name="idCliente">
                  <?php foreach ($resultado_Cliente as $row) { ?>
                  <option><?= $row['idCliente'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Producto</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idProducto" name="idProducto">
                  <?php foreach ($resultado_Producto as $row) { ?>
                  <option><?= $row['idProducto'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row" style="width: 110%;margin-bottom: 15px">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Calificacion</label>
                <input type="number" class="form-control shadow-none" id="numeroCalificacion" name="numeroCalificacion" style="background-color: lightgray" >
              </div>
            </div>
            <div class="row" style="width: 110%;margin-bottom: 15px">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Comentario</label>
                <textarea class="form-control" id="comentario" name="comentario" style="height: 100px;border:none"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col" style="display:flex; justify-content: center; gap: 40px; ">
                <button type="button" class="btn btn-secondary btn-ms" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-ms" onclick="return validar_Insertar()">Guardar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>





