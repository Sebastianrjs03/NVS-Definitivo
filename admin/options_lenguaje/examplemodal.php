<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Lenguaje</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_lenguaje/update.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="row">
              <input type="hidden" id="id" name="id">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Nombre Lenguaje</label>
                <input type="text" class="form-control shadow-none" id="idlenguaje" name="idlenguaje" required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Estado</label>
                <input type="number" class="form-control shadow-none" id="estadolenguaje" name="estadolenguaje" required>
              </div>  
            </div>
            <div class="row">
              <div class="col" style="display:flex; justify-content: center; gap: 40px;">
                <button type="button" class="btn btn-secondary btn-ms" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-ms">Guardar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>