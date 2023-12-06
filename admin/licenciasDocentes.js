$(document).ready(function() {

});

function cantidadRegistros(cantidad_registros, posicion){
    var searchTerm = $('#searchTerm').val();
    var perfil = $('#perfil').val();
    $.ajax({
        url: 'indexController.php',
        type: 'POST',
        data: { 
                cantidad_registros: cantidad_registros,
                posicion: posicion,
                searchTerm: searchTerm,
                perfil: perfil
            },
        success: function(data) {
            $("#registrosTabla").html(data);
            $("#cantidad_registros").val(cantidad_registros);
            return false;
        }
    });
}