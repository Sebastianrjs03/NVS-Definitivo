<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Administrador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="options_admin/insert.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="row">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Documento</label>
                <input type="text" class="form-control shadow-none" id="documento" name="documento"
                  placeholder="Documento..." required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="tipo_documento">Tipo doc</label>
                <select class="form-control shadow-none" name="tdoc" id="tipo_documento" required>
                  <?php
                  foreach ($resultado2 as $row) { ?>
                    <option value="<?php echo $row['t_doc']; ?>"><?= $row['desc_tdoc'] ?></option>
                  <?php } ?>
                </select>

              </div>
              <div class="form-group"
                style="align-items: center; display: flex; flex-direction: column; margin-bottom: 15px ;">
                <label for="idUsuario">USUARIO</label>
                <select class="form-control shadow-none" name="idUsuario" id="tipo_documento" required>
                  <?php
                  foreach ($resultado3 as $row) { ?>
                    <option value="<?php echo $row['idUsuario']; ?>"><?= $row['nombreUsuario'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group"
              style="align-items: center; display: flex; flex-direction: column; margin-bottom: 15px ;">
              <label for="formGroupExampleInput">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña..."
                required>
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
</div>