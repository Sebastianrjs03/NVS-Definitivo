$(function() {
    
    $("#Menu_Principal ul li a").click(function() {
        $("#Menu_Principal ul li a").removeClass("seleccionado");
        $(this).addClass("seleccionado");
    });

    
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
        
        
        
        alert('Nueva contraseña guardada con exito');
        
        this.reset();
    });