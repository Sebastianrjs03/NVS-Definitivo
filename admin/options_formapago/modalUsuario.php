<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Forma Pago</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_formapago/update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <div class="form-group row">
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Forma De Pago</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idFormaPago" name="idFormaPago">
                  <?php foreach ($resultado_idFormaPago as $row)  ?>
                  <option><?= $row['idFormaPago'].""; ?></option> 
                </select>
              </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">EstadoMetodoPago</label>
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