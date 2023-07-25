function verColegio(identificador, consecutivo){
    var municipioName = "Municipio_" + consecutivo + "_" + identificador;
    var valorSeleccionado = $('select[name="'+municipioName+'"]').val();
    var txtSeleccionado = $('select[name="'+municipioName+'"]').text();
    var otroName = "Otro_" + consecutivo + "_" + identificador;
    var otroSeleccionado = $('input[name="'+otroName+'"]').val();

    $.ajax({
        url: 'cargar_instituto.php',
        type: 'POST',
        data: {datoId: valorSeleccionado},
        success: function(data) {
            $('#InstitutoNuevoForm').modal('show');
            $('#instituto_1').html(data);
            $('#labelColegio').text("COLEGIOS EN: " + txtSeleccionado);
            $('#defOtro').val(otroSeleccionado);
            $('#newName').val(otroSeleccionado);
            $('#identificador').val(identificador);
            $('#ciudadId').val(valorSeleccionado);
            $('#consecutivo').val(consecutivo);
        }
    });
}

function editProf(registro, cursos){
    var proceder = true;
    var contenedor = "#laTabla_" + registro;
    var inputSelector, selectSelector;

    for (var i = 1; i <= cursos; i++) {
        inputSelector = contenedor + " input[name='Otro_"+i+"_"+registro+"']";
        $(inputSelector).each(function() {
            if ($(this).val() !== "NO") {
                proceder =  false;
            }
        });
    }

    selectSelector = contenedor + " select[name='asesor_"+registro+"']";

    $(selectSelector).each(function() {
        if ($(this).val() === "" || $(this).val() === null) {
            proceder =  false;
        }
    });
    
    if (proceder == false){
        alert ("El registro no esta completo");
    	return false;
    }

    alert ("verificar OK");
}