function verColegio(identificador, consecutivo){
    var municipioName = "Municipio_" + consecutivo + "_" + identificador;
    var valorSeleccionado = $('select[name="'+municipioName+'"]').val();
    var otroName = "Otro_" + consecutivo + "_" + identificador;
    var otroSeleccionado = $('input[name="'+otroName+'"]').val();
    
    if (otroSeleccionado === "NO"){
        var instituloVal = $('select[name="Instituto_'+consecutivo+'_'+identificador+'"]').text();
        
        $('#InstitutoNuevoForm').modal('show');
        $('#defOtro').val("");
        $('#inputDepartamento').val(valorSeleccionado);
        $('#identificador').val(identificador);
        $('#consecutivo').val(consecutivo);
        $('#newName').val(instituloVal);
        verColegios();
    }else{
        $('#InstitutoNuevoForm').modal('show');
        $('#defOtro').val(otroSeleccionado);
        $('#inputDepartamento').val(valorSeleccionado);
        $('#identificador').val(identificador);
        $('#consecutivo').val(consecutivo);
        $('#newName').val(otroSeleccionado);
        verColegios();
    }
}

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
    /*
    selectSelector = contenedor + " select[name='asesor_"+registro+"']";

    $(selectSelector).each(function() {
        if ($(this).val() === "" || $(this).val() === null) {
            proceder =  false;
        }
    });
    */
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
    var asesor = $('select[name="asesor_'+registro+'"]').val();
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
    $('input[name="Asesor"]').val(asesor);
    $('input[name="Registro"]').val(registro);

    for (i = 1; i <= cursos; i++){
        Codigo_Colegio = $('select[name="Colegio_'+i+'_'+registro+'"] option:selected').val();
        Codigo_Colegio_txt = $('select[name="Colegio_'+i+'_'+registro+'"] option:selected').text();
        Codigo_Curso = $('select[name="Curso_'+i+'_'+registro+'"] option:selected').val();
        Codigo_Curso_txt = $('select[name="Curso_'+i+'_'+registro+'"] option:selected').text();
        Codigo_Sigla = $('input[name="Sigla_'+i+'_'+registro+'"]').val();

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

function cantidadGrupos(estado, registro){
    var cantidadInput = document.querySelector('input[name="addGrup'+registro+'"]');

    cantidad = cantidadInput.value;

    if (cantidadInput.value == ""){
        cantidad = 0;
    }
    if (estado == "add"){
        cantidad++;
    }
    if (estado == "sub"){
        cantidad--;
    }
    if (cantidad <= 0){
        cantidad = 0;
    }

    cantidadInput.value = cantidad;
}

function editGrupos(registro){

    var totalGrupos = $('input[name="addGrup'+registro+'"]').val();

    var selects = $('.InstitutoXD_'+registro);
    var valores = "";

    selects.each(function() {
        var valor = $(this).val();
        var textoValor = $(this).find("option:selected").text();
        valores += '<option value="'+valor+'">'+textoValor+'</option>';
    });
    console.log(valores);

    if (totalGrupos == "" || totalGrupos == null || totalGrupos == 0){
        alert("Ingrese un valor valido");
    }else{

        $.ajax({
            url: '../grupo_1.php',
            type: 'POST',
            data: { dato: registro,
                    total: totalGrupos,
                    colegios: valores},
            success: function(response){

                var datos = JSON.parse(response);

                $('#grupoModal').modal('show');
                $('#contenidoGrupo').html(datos.dato1);
                $('#modal-footer_mdGrupo').html('<button type="button" class="btn btn-primary" onclick="madafaca('+registro+', '+datos.dato2+')">Guardar cambios</button>');
            }
        });

    }
    //$('#grupoModal').modal('show');
}

function delGrupos(registro){
    $('div[name="fe_'+registro+'"]').remove();
}

function libro(registro){
    var datoId = $('select[name="ju_'+registro+'"]').val();
    $.ajax({
        url: '../cargar_curso.php',
        type: 'POST',
        data: {datoId: datoId},
        success: function(data) {
            $('select[name="da_'+registro+'"]').html(data);
        }
    });
}

function madafaca(registro, cantidad){
    var inputs = $(document.getElementById("contenidoGrupo")).find("input, select");
    var contador = 0;
    inputs.each(function() {
        if ($(this).val() === "" || $(this).val() === null || $(this).val() === undefined) {
          contador++;
        }
      });

    if(contador > 0){
        alert("responder las preguntas");
        return;
    }

    var gruposSelect = [];
    
    for(var i = 0; i < cantidad; i++){
        var inputValor = '#fender'+i;
        var input = $(inputValor);
        if (input.is('select')) {
            gruposSelect.push(input.val() + ',' + $(inputValor+' option:selected').text());
        } else if (input.is('input')) {
            //gruposSelect.push(input.val());
            var sigla = input.val();
            gruposSelect.push(sigla);
        } 
    }

    var gruposFull = gruposSelect.join(',');

    $.ajax({
        url: '../arreglarGrupo.php',
        type: 'POST',
        data: { gruposFull: gruposFull,
                registro: registro},
        success: function(response) {
            if (response = "1"){
                location.reload();
            }
        }
    });
}