function confirmarEliminacion() {
    Swal.fire({
        title: '¿Eliminar producto?',
        text: '¿Estás seguro de quitar este producto del carrito?',
        icon: 'warning',
        background: '#2a0054',
        color: '#ffffff',
        iconColor: '#facc15',
        confirmButtonColor: '#7e4efc',
        cancelButtonColor: '#7e4efc',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        customClass: {
            popup: 'alerta-violeta',
            title: 'alerta-titulo',
            confirmButton: 'btn-confirmar',
            cancelButton: 'btn-cancelar'
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    const boton = document.getElementById('boton-comprar');
    boton.addEventListener('click', function() {
        window.location.href = 'pagos.html';
    });
});