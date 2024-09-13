<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Calificacion-Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_calificacion_producto-Final/insert.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="row" style="margin-bottom: 20px; margin-left: 2px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Producto</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="id" name="id">
                  <?php foreach ($resultado_Producto as $row) { ?>
                  <option><?= $row['idProducto'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Total Calificacion</label>
                <input type="number" class="form-control shadow-none" id="totalCalificacion" name="totalCalificacion" required>
              </div>
            </div>
            <class="row" style="widht: 50%;margin-bottom: 15px">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Promedio Aceptacion</label>
                <input type="number" class="form-control shadow-none" id="PromedioAceptacion" name="PromedioAceptacion" required>
              </div>
            </div>
            <div class="row">
              <div class="col" style="display:flex; justify-content: center; gap: 40px; ">
                <button type="button" class="btn btn-secondary btn-ms" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-ms">Guardar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
