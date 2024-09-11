$(function() {
    
    $('#Abrir_Pop_Up').click(function() {
        $('#popup').css('display', 'flex');
    });

    
    $('#popup').click(function(event) {
        if (event.target === this) {
            $(this).css('display', 'none');
        }
    });
});

    document.getElementById('Formulario').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var nombre = document.getElementById('nombre').value;
        var Apellido = document.getElementById('Apellido').value;
        
        alert('Nuevo Nombre: ' + nombre + '\nNuevo Apellido : ' + Apellido );
        
        this.reset();
    });