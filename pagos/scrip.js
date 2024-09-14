let formVisible = false; // Variable para rastrear si el formulario está visible

// Función para alternar la visibilidad del formulario
function toggleForm() {
    const tarjetaDiv = document.getElementById('tarjeta');
    const paypalDiv = document.getElementById('paypal');
    const mercadopagoDiv = document.getElementById('mercadopago');
    const cardForm = document.getElementById('card-form');

    // Alternar visibilidad del formulario
    if (!formVisible) {
        tarjetaDiv.classList.add('active');
        paypalDiv.classList.add('shrunk');
        mercadopagoDiv.classList.add('shrunk');
        cardForm.style.display = 'block';
    } else {
        // Guardar automáticamente los datos cuando se oculta el formulario
        guardarFormulario();

        tarjetaDiv.classList.remove('active');
        paypalDiv.classList.remove('shrunk');
        mercadopagoDiv.classList.remove('shrunk');
        cardForm.style.display = 'none';
    }

    formVisible = !formVisible; // Cambiar el estado de visibilidad
}

// Función para guardar los datos del formulario
function guardarFormulario() {
    // Obtener los valores del formulario
    const nombreTitular = document.getElementById('nombre-titular').value;
    const numeroTarjeta = document.getElementById('numero-tarjeta').value;
    const fecha = document.getElementById('fecha').value;
    const codigo = document.getElementById('codigo').value;

    // Guardar los datos en el almacenamiento local (localStorage)
    localStorage.setItem('nombreTitular', nombreTitular);
    localStorage.setItem('numeroTarjeta', numeroTarjeta);
    localStorage.setItem('fecha', fecha);
    localStorage.setItem('codigo', codigo);

    console.log("Datos guardados correctamente."); // Opción de mostrar una alerta
}

// Función para ocultar el formulario y restaurar las otras opciones
function shrinkForm() {
    const tarjetaDiv = document.getElementById('tarjeta');
    const paypalDiv = document.getElementById('paypal');
    const mercadopagoDiv = document.getElementById('mercadopago');
    const cardForm = document.getElementById('card-form');

    tarjetaDiv.classList.remove('active');
    paypalDiv.classList.remove('shrunk');
    mercadopagoDiv.classList.remove('shrunk');
    cardForm.style.display = 'none';
    formVisible = false;
}

// Función para cargar los datos guardados al recargar la página
window.onload = function() {
    const nombreTitular = localStorage.getItem('nombreTitular');
    const numeroTarjeta = localStorage.getItem('numeroTarjeta');
    const fecha = localStorage.getItem('fecha');
    const codigo = localStorage.getItem('codigo');

    // Si hay datos guardados, rellenar los campos del formulario
    if (nombreTitular) document.getElementById('nombre-titular').value = nombreTitular;
    if (numeroTarjeta) document.getElementById('numero-tarjeta').value = numeroTarjeta;
    if (fecha) document.getElementById('fecha').value = fecha;
    if (codigo) document.getElementById('codigo').value = codigo;
}
