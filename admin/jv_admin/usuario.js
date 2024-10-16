function validarUsuario(){
    let insertar = document.getElementById('insertModal')

    let nombre = insertar.querySelector('.modal-body #nombre')
    let apellido = insertar.querySelector('.modal-body #apellido')

    if (nombre.value == "" || nombre.value == null) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
            text: "ingresa el nombre de usuario",
        });
    return false;
    }else if (apellido.value == "" || apellido.value == null) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "ingresa el apellido de usuario",
        });

    }
    
    else{
        Swal.fire({
            icon: "success",
            title: "Registro exitoso!",
            text: "Usuario Registrado con exito",
          });
    return true;
    }
    
}