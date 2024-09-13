<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Historial Puntos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_historial_puntos/insert.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Id Factura</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="pk_fk_Factura" name="pk_fk_Factura">
                  <?php foreach ($resultado_Factura as $row) { ?>
                  <option><?= $row['idFactura'].""; ?></option> 
                  <?php } ?>
                </select>
              </div> 
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Id Cliente</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idCliente" name="idCliente">
                  <?php foreach ($resultado_Cliente as $row) { ?>
                  <option><?= $row['idCliente'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row" style="margin-bottom: 30px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Puntos Generados</label>
                <input type="number" class="form-control shadow-none" id="puntosGenerados" name="puntosGenerados" placeholder="Puntos Generados..." required>
              </div>
            </div>
            <div class="row">
              <div class="col" style="display:flex; justify-content: center; gap: 40px; ">
                <button type="button" class="btn btn-secondary btn-ms" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-ms">Insertar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
