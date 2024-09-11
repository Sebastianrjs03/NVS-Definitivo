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
        
        var email = document.getElementById('e-mail').value;
        var email = document.getElementById('e-mail').value;
        
        alert('Nuevo e-mail: ' + email + '\nConfirmacion e-mail: ' + email );
        
        this.reset();
    });