<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Detalles de Factura</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_detalle_factura/update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <div class="form-group row">
            <div class="row" style="widht: 50%;margin-bottom: 5px">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Cantidad Producto</label>
                <input type="number" class="form-control shadow-none" id="cantidad" name="cantidad" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Valor Unitario Producto</label>
                <input type="number" class="form-control shadow-none" id="valorUnitario" name="valorUnitario" required>
              </div>
            </div>
            <div class="row" style="widht: 50%;margin-bottom: 15px">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">IVA</label>
                <input type="number" class="form-control shadow-none" id="iva" name="iva" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Total</label>
                <input type="number" class="form-control shadow-none" id="total" name="total" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col" style="display:flex; justify-content: end; gap: 20px; ">
                <button type="button" class="btn btn-secondary btn-ms" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-ms">Guardar</button>
              </div>
            </div>
        </form>
    </div>
  </div>
</div>