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
        
        var Nueva_Direccion = document.getElementById('Nueva_Direccion').value;
        var Datos_Adicionales = document.getElementById('Datos_Adicionales').value;
        
        alert('Nueva Direccion: ' + Nueva_Direccion + '\nDatos Adicionales: ' + Datos_Adicionales );
        
        this.reset();
    });