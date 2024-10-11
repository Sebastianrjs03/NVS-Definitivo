function validar_Insertar() {

    let idCliente = document.getElementById("idCliente");
    let idProducto = document.getElementById("idProducto");
    let numeroCalificacion = document.getElementById("numeroCalificacion");
    let comentario = document.getElementById("comentario");

    console.log(+numeroCalificacion);
    if (!numeroCalificacion.value) {
        alert("Debe ingresar una calificación.");
        return false;  // Detenemos el envío del formulario
    }

    if (!comentario.value) {
        alert("Debe ingresar un comentario.");
        return false;  // Detenemos el envío del formulario
    }

    // Si todo está bien, devolvemos true para que el formulario se envíe
    console.log("Validación exitosa.");
    return true;
}