<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Detalles de Factura</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_detalle_factura/insert.php" method="POST" enctype="multipart/form-data">

            <div class="row" style="margin-bottom: 20px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Factura</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idfactura" name="idfactura">
                  <?php foreach ($resultado_Factura as $row) { ?>
                  <option><?= $row['idFactura'].""; ?></option> 
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
            <div class="row" style="margin-bottom: 20px;">
                <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                  <label for="formGroupExampleInput">Cantidad</label>
                  <input type="number" class="form-control shadow-none" id="cantidadProducto" name="cantidadProducto" style="background-color: lightgray" required >
                </div>
                <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                  <label for="formGroupExampleInput">Valor Unitario</label>
                  <input type="number" class="form-control shadow-none" id="valorUnitario" name="valorUnitario" style="background-color: lightgray" required >
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                  <label for="formGroupExampleInput">IVA</label>
                  <input type="number" class="form-control shadow-none" id="iva" name="iva" style="background-color: lightgray" required >
                </div>
                <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                  <label for="formGroupExampleInput">Total Producto</label>
                  <input type="number" class="form-control shadow-none" id="total" name="total" style="background-color: lightgray" required >
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
</div>





