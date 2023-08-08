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

    realizarInscripcion(registro, cursos);
}

function realizarInscripcion(registro, cursos){

    var constCursos = "";

    $('#enviarInscripcion').modal('show');

    var FirstName = $('input[name="FirstName_'+registro+'"]').val();
    var MiddleName = $('input[name="MiddleName_'+registro+'"]').val();
    var LastName = $('input[name="LastName_'+registro+'"]').val();
    var SecondLastName = $('input[name="SecondLastName_'+registro+'"]').val();
    var Phone = $('input[name="Phone_'+registro+'"]').val();
    var Email = $('input[name="email_'+registro+'"]').val();
    var perfil = $('input[name="perfil_'+registro+'"]').val();
    var CityIn =  $('select[name="Municipio_1_'+registro+'"] option:selected').text();
    var Codigo_Colegio;
    var Codigo_Curso;
    var Codigo_Sigla;
    var constCursos = "";

    $('input[name="FirstName"]').val(FirstName);
    $('input[name="MiddleName"]').val(MiddleName);
    $('input[name="LastName"').val(LastName);
    $('input[name="SecondLastName"]').val(SecondLastName);
    $('input[name="Phone"]').val(Phone);
    $('input[name="City"]').val(CityIn);
    $('input[name="Email"]').val(Email);
    $('input[name="Perfil"]').val(perfil);

    for (i = 1; i <= cursos; i++){
        Codigo_Colegio = $('select[name="Colegio_'+i+'_'+registro+'"] option:selected').val();
        Codigo_Colegio_txt = $('select[name="Colegio_'+i+'_'+registro+'"] option:selected').text();
        Codigo_Curso = $('select[name="Curso_'+i+'_'+registro+'"] option:selected').val();
        Codigo_Curso_txt = $('select[name="Curso_'+i+'_'+registro+'"] option:selected').text();
        Codigo_Sigla = $('select[name="Sigla_'+i+'_'+registro+'"] option:selected').val();
        Codigo_Sigla_txt = $('select[name="Sigla_'+i+'_'+registro+'"] option:selected').text();

        constCursos += '<div class="row">'
            constCursos += '<div class="col-4">'
                constCursos += '<div class="form-floating mb-3">';
                    constCursos += '<select class="form-select" name="Codigo_Colegio[]">';
                        constCursos += '<option selected value="'+Codigo_Colegio+'">'+Codigo_Colegio_txt+'</option>';
                    constCursos += '</select>';
                    constCursos += '<label for="floatingEmail">Colegio</label>';
                constCursos += '</div>';
            constCursos += '</div>';
            constCursos += '<div class="col-4">'
                constCursos += '<div class="form-floating mb-3">';
                    constCursos += '<select class="form-select" name="field_name[]">';
                        constCursos += '<option selected value="'+Codigo_Curso+'">'+Codigo_Curso_txt+'</option>';
                    constCursos += '</select>';
                    constCursos += '<label for="floatingEmail">Curso</label>';
                constCursos += '</div>';
            constCursos += '</div>';
            constCursos += '<div class="col-4">'
                constCursos += '<div class="form-floating mb-3">';
                    constCursos += '<input type="text" class="form-control" name="field_name2[]" value="'+Codigo_Sigla+'">';
                    constCursos += '<label for="floatingEmail">Sigla</label>';
                constCursos += '</div>';
            constCursos += '</div>';
        constCursos += '</div>';
    }

    $('#cursosVinculados').html(constCursos);
    
}