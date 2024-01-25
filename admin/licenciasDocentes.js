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

function buscarEliminar(){
    var idSelect_array = [];
    $(".codLicence:checked").each(function(){
        idSelect_array.push($(this).val());
    });

    var idSelect = idSelect_array.join(', ');
    console.log (idSelect);
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

    let selectHtml = "";
    for (let i = 0; i < valoresSeleccionados.length; i++) {
        selectHtml += "<option value='" + valoresSeleccionados[i] + "'>" + textosSeleccionados[i] + "</option>";
    }

    selectHtml += "<option value='OTRO'>OTRA</option>";


    $('.Institution').html(selectHtml);

}