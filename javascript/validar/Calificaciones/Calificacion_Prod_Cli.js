function validar_Insertar() {
  let formulario = document.getElementById("insertModal");

  let idCliente = formulario.querySelector(".modal-body #idCliente").value;
  let idProducto = formulario.querySelector(".modal-body #idProducto").value;
  let numeroCalificacion = formulario.querySelector(".modal-body #numeroCalificacion").value;
  let comentario = formulario.querySelector(".modal-body #comentario").value;

  let formData = new FormData();
  formData.append("id", idProducto);
  formData.append("idCliente", idCliente);
  let url =
    "/NVS-Definitivo/javascript/validar/Calificaciones/get_Cal_Prod_Cli.php";
  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.json();
    })
    .then((data) => {
      if (data.existe) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "El cliente registrado ya calificó el producto",
        });
        return false;
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud:", error);
      alert("Hubo un problema al verificar el producto.");
      return false;
    });

  if (numeroCalificacion == "" || numeroCalificacion == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "El campo de Calificación está vacío",
    });
    return false;
  } else if (numeroCalificacion > 5 || numeroCalificacion <0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "La calificacion esta fuera de rango es de 0 a 5",
    });
    return false;
  } else if (comentario.length = 10) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "El comentario no puede exceder los 500 caracteres ",
    });
    return false;
  } else if (!comentario) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "El campo de Comentario está vacío",
    });
    return false;
  } else {  
    return true;
  }

}