<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Insertar Genero</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../options_genero/insert.php" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="row">
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">Genero</label>
                <input type="text" class="form-control shadow-none" id="idgenerojuego" name="idgenerojuego" placeholder="genero..." required>
              </div>
              <div class="col" style=" display:flex; flex-direction: column; align-items: center;">
                <label for="formGroupExampleInput">estado</label>
                <input type="" class="form-control shadow-none" id="estadogenero" name="estadogenero" placeholder="estado..." required>
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
