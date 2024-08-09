$(document).ready(function() {
    $("#Departamento").on("change", function(){
        let datoId = $(this).val();
        $.ajax({
            url: '../../cargar_ciudades.php',
            type: 'POST',
            data: {datoId: datoId},
            success: function(data) {
                $("#Ciudad").html(data);
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición AJAX: " + error);
            }
        });
    });
});