$(document).ready(function() {
    $("#Ciudad").on("change", function(){
        let datoId = $(this).val();
        $.ajax({
            url: '../../cargar_instituto.php',
            type: 'POST',
            data: {datoId: datoId},
            success: function(data) {
                $("#Institucion").html(data);
            }
        });
    });
})