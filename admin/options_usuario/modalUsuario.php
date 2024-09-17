<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="options_usuario/update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <div class="form-group row">
            <div class="row">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" class="form-control shadow-none" id="nombre" name="nombre" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Segundo Nombre</label>
                <input type="text" class="form-control shadow-none" id="senombre" name="senombre" placeholder="Nombre...">
              </div>
            </div>
            <div class="row">
            <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Apellido</label>
                <input type="text" class="form-control shadow-none" id="apellido" name="apellido" required>
              </div>  

              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Segundo Apellido</label>
                <input type="text" class="form-control shadow-none" id="seapellido" name="seapellido" placeholder="Apellido...">
              </div>  
            </div>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Celular</label>
                <input type="number" class="form-control shadow-none" id="celular" name="celular" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Contraseña</label>
                <input type="text" class="form-control shadow-none" id="contraseña" name="contraseña" required>
              </div>
              <div class="form-group" style="align-items: center; display: flex; flex-direction: column;">
                <label for="formGroupExampleInput">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
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