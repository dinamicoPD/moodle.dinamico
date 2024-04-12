function verColegios(){
    seleccion = $("#inputDepartamento").val();
    $.ajax({
        url: 'cargar_colegio.php',
        type: 'POST',
        data: {
            datoId: seleccion
        },
        success: function(data) {
            var textoHTML = data;
            var textoModificado = textoHTML.replace(/Seleccionar/g, "Instituciones registrados");

            $("#listadoColegios").html(textoModificado);
        }
    });
}