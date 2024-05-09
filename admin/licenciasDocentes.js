let selectHtml;

function searchTerm(){
    $('#indicador').val(1);
    cantidadRegistros();
}

function cantidad(){
    $('#indicador').val(1);
    cantidadRegistros();
}

function fin(valor){
    $('#indicador').val(valor);
    cantidadRegistros();
}

function inicio(){
    $('#indicador').val(1)
    cantidadRegistros();
}

function anterior(){
    valorIndicador = $('#indicador').val();
    valorIndicador = parseInt(valorIndicador) - parseInt(1);
    if(valorIndicador < 1){
        valorIndicador = 1;
    }
    $('#indicador').val(valorIndicador);
    
    cantidadRegistros(); 
}

function siguiente(){
    valorIndicador = $('#indicador').val();
    valorIndicador = parseInt(valorIndicador) + parseInt(1);
    valor = $('#btnFin').val();
    if(valorIndicador > valor){
        valorIndicador = valor;
    }
    $('#indicador').val(valorIndicador);
    
    cantidadRegistros();
}

function cantidadRegistros(){
    var searchTerm = $('#searchTerm').val();
    var posicion = $('#indicador').val();
    var cantidad_registros = $('#cantidad_registros').val();

    $.ajax({
        url: 'constructorLicenciasPrf.php',
        type: 'POST',
        data: { 
                cantidad_registros: cantidad_registros,
                posicion: posicion,
                searchTerm: searchTerm,
            },
        success: function(data) {
            var datos = data.split("¬-|°.°|¬-");
            $("#cantidad").html(datos[0]);
            $("#fin").html('<button id="btnFin" class="page-link" value="'+datos[1]+'" onclick="fin('+datos[1]+')">'+datos[1]+'</button>');
            $("#licenciasBuscadas").html(datos[2]);
            
        }
    });
}

function AgregarGrupo(datos) {
    $('#ModalGrupo').modal('show');
    const arrayDatos = datos.split(",");
    $('#firstnameInput').val(arrayDatos[0]);
    $('#middlenameInput').val(arrayDatos[1]);
    $('#lastnameInput').val(arrayDatos[2]);
    $('#alternatenameInput').val(arrayDatos[3]);
    $('#emailInput').val(arrayDatos[4]);
    $('#usernameInput').val(arrayDatos[5]);
    $('#IdInput').val(arrayDatos[6]);
    $('#addInst').val(0);
    $(".newInstituto").html("");
    $(".newGrupos").html("");
    $('#addInst').val(0);
    $('#addGrup').val(0);

    const valoresSeleccionados = [];
    const textosSeleccionados = [];

    $('.cole_' + arrayDatos[6]).each(function () {
        const valor = $(this).val();
        const texto = $.trim($(this).text());

        // Verificar si el valor ya está en la lista
        if (valoresSeleccionados.indexOf(valor) === -1) {
            valoresSeleccionados.push(valor);
            textosSeleccionados.push(texto);
        }
    });

    selectHtml = "";
    for (let i = 0; i < valoresSeleccionados.length; i++) {
        selectHtml += "<option value='" + valoresSeleccionados[i] + "'>" + textosSeleccionados[i] + "</option>";
    }

    //agregar la variable selectHtml para añadir las instituciones ya inscritas
}

function editInstituto(){
    var cantidad = $("#addInst").val();
    $(".newGrupos").html("");

    if (cantidad > 0){
        construirInstituto(cantidad);
    }else{
        $(".newInstituto").html("");
    }
}

function construirInstituto(cantidad){
    cantidad = parseInt(cantidad);
    $(".newGrupos").html("");

    $.ajax({
        url: 'cargar_departamentos.php',
        type: 'POST',
        data: {datoId: cantidad},
        success: function(data) {
            $(".newInstituto").html(data);
        }
    });
}

function datosDepartamento(value){
    valorDepartamento = $("#departamento_"+value).val();
    $(".newGrupos").html("");

    $.ajax({
        url: 'cargar_ciudades.php',
        type: 'POST',
        data: {datoId: valorDepartamento},
        success: function(data) {
            $("#Municipio_"+value).html(data);
        }
    });
}

function datosMunicipio(value){
    valorInstituto = $("#Municipio_"+value).val();
    $(".newGrupos").html("");
    
    $.ajax({
        url: 'cargar_colegio.php',
        type: 'POST',
        data: {datoId: valorInstituto},
        success: function(data) {
            $("#Instituto_"+value).html(data);
        }
    });
}

function borrarInstitutos(){
    $(".newGrupos").html("");
}

function editGrupos(){
    var cantidad = $("#addGrup").val();

    if (cantidad > 0){
        construirGrupInstituto(cantidad);
    }else{
        alert ("menor de 0");
        //$(".newInstituto").html("");
    }
}

function construirGrupInstituto(value){
   
        var selectedValues = $('select.elCole' ).map(function() {
        var id = this.id.slice(-1); // Extrae el último carácter del ID
        var value = $(this).val();
        var text = $(this).find('option:selected').text(); // Obtiene el texto del option seleccionado
        return {
          id: id,
          value: value,
          text: text
        };
      }).get();
      resultInsituto_1 = "";

      selectedValues.forEach(function(item) {
        
        if (item.text != "Seleccionar"){
                    resultInsituto_1 += "<option value='" + item.value + "'>"+ item.text +"</option>";
                    return;
        }

      });
      
      value = parseInt(value);
      construccionInstituto = "";

      for(i = 1; i<=value; i++){
        construccionInstituto += "<h3> Grupo " +i+":</h3>";

        resultInsituto = "<div class='row'>";
            resultInsituto += "<div class='col'>";
                resultInsituto += "<label for='Instituto_fn_"+i+"' class='form-label'>Instituto*</label>";
                resultInsituto += "<div class='input-group'>";
                    resultInsituto += "<span class='input-group-text'><svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z'/></svg></span>";
                    resultInsituto += "<select name='Instituto_fn[]' id='Instituto_fn_"+i+"' class=\"form-select\" onchange='cargarEdicion("+i+")' required>";
                        resultInsituto += "<option selected disabled value=''>Seleccionar</option>";
                        resultInsituto += resultInsituto_1;
                        resultInsituto += selectHtml;
                    resultInsituto += "</select>";
                resultInsituto += "</div>";
            resultInsituto += "</div>";
        resultInsituto += "</div>";
        resultInsituto += "<div class='row'>";
            resultInsituto += "<div class='col'>";
                resultInsituto += "<label for='edicion_fn_"+i+"' class='form-label'>Edición*</label>";
                resultInsituto += "<div class='input-group'>";
                    resultInsituto += "<span class='input-group-text'><svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z'/></svg></span>";
                    resultInsituto += "<select id='edicion_fn_"+i+"' class=\"form-select\" onchange='cargarNivel("+i+")' required>";
                        resultInsituto += "<option selected disabled value=''>Seleccionar</option>";
                    resultInsituto += "</select>";
                resultInsituto += "</div>";
            resultInsituto += "</div>";
            resultInsituto += "<div class='col'>";
                resultInsituto += "<label for='nivel_fn_"+i+"' class='form-label'>Nivel*</label>";
                resultInsituto += "<div class='input-group'>";
                    resultInsituto += "<span class='input-group-text'><svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-160q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740v484q51-32 107-48t113-16q36 0 70.5 6t69.5 18v-480q15 5 29.5 10.5T898-752q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59Zm80-200v-380l200-200v400L560-360Zm-160 65v-396q-33-14-68.5-21.5T260-720q-37 0-72 7t-68 21v397q35-13 69.5-19t70.5-6q36 0 70.5 6t69.5 19Zm0 0v-396 396Z'/></svg></span>";
                    resultInsituto += "<select name='nivel_fn[]' id='nivel_fn_"+i+"' class=\"form-select\" required>";
                        resultInsituto += "<option selected disabled value=''>Seleccionar</option>";
                    resultInsituto += "</select>";
                resultInsituto += "</div>";
            resultInsituto += "</div>";
        resultInsituto += "</div>";
        resultInsituto += "<div class='row'>";
            resultInsituto += "<div class='col'>";
                resultInsituto += "<label for='sigla_fn_"+i+"' class='form-label'>Sigla*</label>";
                resultInsituto += "<div class='input-group'>";
                    resultInsituto += "<span class='input-group-text'><svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H160v400Zm140-40-56-56 103-104-104-104 57-56 160 160-160 160Zm180 0v-80h240v80H480Z'/></svg></span>";
                    resultInsituto += "<input name='sigla_fn[]' type='number' class='form-control' id='sigla_fn_"+i+"' placeholder='Ej: 801'>";
                resultInsituto += "</div>";
            resultInsituto += "</div>";
        resultInsituto += "</div>";
        resultInsituto += "<br>";

        construccionInstituto += resultInsituto;
      }

      $(".newGrupos").html(construccionInstituto);
}

function cargarEdicion(i){
    $.ajax({
        url: 'cargar_edicion.php',
        type: 'POST',
        success: function(data) {
            $("#edicion_fn_"+i).html(data);
        }
    });
}

function cargarNivel(i){
    datoId = $("#edicion_fn_"+i).val();

    $.ajax({
        url: 'cargar_curso.php',
        type: 'POST',
        data: {datoId: datoId},
        success: function(data) {
            $("#nivel_fn_"+i).html(data);
        }
    });
}

function actualizarCodeVer(codigo, LicenceId, Title){
    
    $('#actualizarRegistro').modal('show');
    $('#inputCodigo').val(codigo);
    $('#inputIdLicencia').val(LicenceId);
    $('#inputTitulo').val(Title);
}

$("#button-generar").click(function(){

    generar = 1;

    $.ajax({
        url: 'generarCodigo.php',
        type: 'POST',
        data: {
            generar: generar
        },
        success: function(data) {
            $('#inputCodigo').val(data);
        }
    });
});

$("#actualizarCode").click(function() {
    Type = $('#inputRol').val();
    Code = $('#inputCodigo').val();
    Title = $('#inputTitulo').val();
    LicenceId = $('#inputIdLicencia').val();

    $.ajax({
        url: 'actualizarLicencia.php',
        type: 'POST',
        data: {
            Type: Type,
            Code: Code,
            Title: Title,
            LicenceId: LicenceId
        },
        success: function(data) {
            if (data === "on"){
                location.reload();
            } else {
                alert("El registro no fue actualizado");
            }
        }
    });
});

function reenviarCorreo(idUser, correo, nombreUser){
    $.ajax({
        url: 'reenviarGrupos.php',
        type: 'POST',
        data: {
            idUser: idUser,
            correo: correo,
            nombreUser: nombreUser
        },
        success: function(data){
            alert(data);
        }
    });
}