function validar_Insertar() {

    let numeroCalificacion = document.getElementById("numeroCalificacion");
    let comentario = document.getElementById("comentario");

    console.log("Valor de numeroCalificacion: " + numeroCalificacion.value);
    console.log("Valor de comentario: " + comentario.value);
    
    if (!numeroCalificacion.value) {
        alert("Debe ingresar una calificación.");
        return false; 
    }

    if (!comentario.value) {
        alert("Debe ingresar un comentario.");
        return false;  
    }

    console.log("Validación exitosa.");
    return true; 
}