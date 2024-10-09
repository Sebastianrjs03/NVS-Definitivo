function validarLogin() {
  let email = document.getElementById("mail");
  let contrasena = document.getElementById("contrasena");

  if (email.value == "" || contrasena.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese el email!",
    });
    return false;
  } else if (contrasena.value == "" || contrasena.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese contraseña!",
    });
    return false;
  } else {
    Swal.fire({
      icon: "success",
      title: "Correcto!",
      text: "Login exitoso!",
    });
    return true;
  }
}

function registrarUsuario() {
  let nombre = document.getElementById("nombre");
  let apellido = document.getElementById("apellido");
  let correo = document.getElementById("correo");
  let numero = document.getElementById("numero");
  let contrasena = document.getElementById("contrasena");
  let contrasena2 = document.getElementById("contrasena2");
  let direccion = document.getElementById("direccion");
  let datos = document.getElementById("datos");
  let checkbox = document.getElementById("terminos");

  if (nombre.value == null || nombre.value == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese su nombre!",
    });
    return false;
  } else if (apellido.value == null || apellido.value == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese su apellido!",
    });
    return false;
  } else if (correo.value == null || correo.value == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese su correo!",
    });
    return false;
  } else if (
    numero.value == null ||
    numero.value == "" ||
    numero.value.length != 10
  ) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese su número de celular!",
    });
    return false;
  } else if (
    contrasena.value == null ||
    (contrasena.value == "" && contrasena2.value == null) ||
    contrasena2.value == ""
  ) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese la contraseña!",
    });
    return false;
  } else if (contrasena.value !== contrasena2.value) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Contraseñas diferentes!",
    });
    return false;
  } else if (direccion.value == null || direccion.value == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese su dirección!",
    });
    return false;
  } else if (datos.value == null || datos.value == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Ingrese los datos adicionales para la correcta entrega de su producto!",
    });
    return false;
    } else if(!checkbox.checked){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Acepte los terminos y condiciones!",
          });
          return false;
    }else {
    Swal.fire({
      icon: "success",
      title: "Correcto!",
      text: "Registro exitoso!",
    });
    return true;
  }
}

function recuperacionContrasena(){
    let email = document.getElementById("mail");


    if (email.value=="" || email==null ) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "ingrese su correo!",
          });
          return false;
    } else{
        Swal.fire({
            icon: "success",
            title: "Correcto!",
            text: "Correo enviado!",
          });
        return true;
    }
}