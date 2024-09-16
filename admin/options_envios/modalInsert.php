<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Envio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_envios/insert.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="row">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">

                <label for="formGroupExampleInput">Factura envio</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="envio" name="envio">
                  <?php foreach ($resultado_Factura as $row) { ?>
                  <option><?= $row['idFactura'].""; ?></option> 
                  <?php } ?>
                </select>

              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Tiempo Estimado</label>
                <input type="text" class="form-control shadow-none" id="tiempoestimado" name="tiempoestimado" placeholder="..." required>
              </div> 
            </div>
            <div class="row" style="margin-bottom: 20px;">
            <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Observaciones</label>
                <input type="text" class="form-control shadow-none" id="observaciones" name="observaciones" placeholder="..." required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Estado envio</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="estadoenvio" name="estadoenvio">
                  <?php foreach ($resultado_EstadoEnvio as $row) { ?>
                  <option><?= $row['idEstadoEnvio'].""; ?></option> 
                  <?php } ?>
                </select>
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
