<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Factura</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_factura/insertfac.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Id Factura</label>
                <input type="number" class="form-control shadow-none" id="id" name="id" required>
              </div>
            </div>
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Fecha Factura</label>
                <input type="date" class="form-control shadow-none" id="fechaFactura" name="fechaFactura" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">iva</label>
                <input type="number" class="form-control shadow-none" id="iva" name="iva" required>
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
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">descontar Puntos</label>
                <input type="number" class="form-control shadow-none" id="descontarPuntos" name="descontarPuntos" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">descuento Generado</label>
                <input type="number" class="form-control shadow-none" id="descuentoGenerado" name="descuentoGenerado" required>
              </div>
            </div>
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Cliente</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idCliente" name="idCliente">
                  <?php foreach ($resultado_Cliente as $row) { ?>
                  <option><?= $row['idCliente'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Puntos Cliente</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idPuntosCliente" name="idPuntosCliente">
                  <?php foreach ($resultado_Puntos as $row) { ?>
                  <option><?= $row['idPuntosCliente'].""; ?></option> 
                  <?php } ?>
                </select>  
              </div>
            </div>
            <div class="row" style="margin-bottom: 5px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">id Forma Pago</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idFormaPago" name="idFormaPago">
                  <?php foreach ($resultado_Pago as $row) { ?>
                  <option><?= $row['idFormaPago'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center; margin-bottom: 30px;">
                <label for="formGroupExampleInput">fk_pk_direccion</label>
                <select class="form-select" aria-label="Default select example" style="background-color: lightgray" id="idDireccion" name="idDireccion">
                  <?php foreach ($resultado_Direccion as $row) { ?>
                  <option><?= $row['fk_pk_Cliente'].""; ?></option> 
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col" style="display:flex; justify-content: end; gap: 35px;margin-top: 10px; ">
                <button type="button" class="btn btn-secondary btn-ms" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-ms">Guardar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>