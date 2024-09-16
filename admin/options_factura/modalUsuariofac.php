<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Factura</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_factura/updatefac.php" method="POST" enctype="multipart/form-data">
          <input type="text" id="id" name="id">
          <div class="form-group row">
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Fecha Factura</label>
                <input type="text" class="form-control shadow-none" id="fechaFactura" name="fechaFactura" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">iva</label>
                <input type="text" class="form-control shadow-none" id="iva" name="iva" required>
              </div>  
            </div>
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">base</label>
                <input type="number" class="form-control shadow-none" id="base" name="base" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">total Compra</label>
                <input type="number" class="form-control shadow-none" id="totalCompra" name="totalCompra" required>
              </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">descontar Puntos</label>
                <input type="number" class="form-control shadow-none" id="descontarPuntos" name="descontarPuntos" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">descuento Generado</label>
                <input type="number" class="form-control shadow-none" id="descuentoGenerado" name="descuentoGenerado" required>
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