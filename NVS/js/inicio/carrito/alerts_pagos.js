function confirmarEliminacion() {
    Swal.fire({
        title: 'Confirmar compra',
        text: '¿Estás seguro de confirmar tu pago?',
        icon: 'warning',
        background: '#2a0054',
        color: '#ffffff',
        iconColor: '#facc15',
        confirmButtonColor: '#7e4efc',
        cancelButtonColor: '#7e4efc',
        confirmButtonText: 'Sí, pagar',
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