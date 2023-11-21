$(document).ready(function() {
    cantidadRegistros(25, 1);
    
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
                    valorIndicador = $('#indicador').val();
                    cantidad_registros = $('#cantidad_registros').val();
                    cantidadRegistros(cantidad_registros,valorIndicador);
                    $('#actualizarRegistro').modal('hide');
                } else {
                    alert("El registro no fue actualizado");
                }
            }
        });
    });

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

    $("#LicenciasAdd").click(function(){
        $('#LicenciasMasivo').modal('show');
    });

    $("#actualizarLicenciasMasivo").click(function(){
        generar = 2;
        rol = $("#inputRolcrear").val();
        totalLicencias = $("#inputCantidadcrear").val();
        tituloLicencias = $("#inputTitulocrear").val();

        $.ajax({
            url: 'generarCodigo.php',
            type: 'POST',
            data: {
                generar: generar,
                rol: rol,
                totalLicencias: totalLicencias,
                tituloLicencias: tituloLicencias
            },
            success: function(data) {
                if (data === "ok"){
                    location.reload();
                }else{
                    valorIndicador = $('#indicador').val();
                    cantidad_registros = $('#cantidad_registros').val();
                    cantidadRegistros(cantidad_registros,valorIndicador);
                    $('#LicenciasMasivo').modal('hide');
                }
            }
        });
    });

    $("#exportarExcel").click(function(e) {
        e.preventDefault();
        var rol = $("#perfil").val();
        var filtro = $("#searchTerm").val();
        var ruta = 'exportar.php?rol=' + rol + '&filtro=' + filtro;
        window.open(ruta, '_blank');
    });

});

function buscarElimnar(){
    var idSelect_array = [];

    $(".codLicence:checked").each(function(){
        idSelect_array.push($(this).val());
    });

    var idSelect = idSelect_array.join(', ');
    $.ajax({
        url: 'eliminar.php',
        type: 'POST',
        data:{
            idSelect: idSelect
        },
        success: function() {
            valorIndicador = $('#indicador').val();
            cantidad_registros = $('#cantidad_registros').val();
            cantidadRegistros(cantidad_registros,valorIndicador);
        }
    });    
}

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

function inicio(){
    $('#indicador').val(1)
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,1);
}

function fin(valor){
    $('#indicador').val(valor);
    valorIndicador = $('#indicador').val();
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,valorIndicador);
}

function anterior(){
    valorIndicador = $('#indicador').val();
    valorIndicador = parseInt(valorIndicador) - parseInt(1);
    if(valorIndicador < 1){
        valorIndicador = 1;
    }
    $('#indicador').val(valorIndicador);
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,valorIndicador); 
}

function siguiente(){
    valorIndicador = $('#indicador').val();
    valorIndicador = parseInt(valorIndicador) + parseInt(1);
    valor = $('#fin').val();
    if(valorIndicador > valor){
        valorIndicador = valor;
    }
    $('#indicador').val(valorIndicador);
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,valorIndicador);
}

function cantidad(){
    $('#indicador').val(1);
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,1);
}

function cantidad2(){
    valorIndicador = $('#indicador').val();
    valor = $('#fin').val();
    if(valorIndicador > valor){
        valorIndicador = valor;
    }
    $('#indicador').val(valorIndicador);
    cantidad_registros = $('#cantidad_registros').val();
    valorIndicador = $('#indicador').val();

    cantidadRegistros(cantidad_registros,valorIndicador);
}

function searchTerm(){
    $('#indicador').val(1);
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,1);
}

function miFuncion() {
    valorIndicador = $('#indicador').val();
    cantidad_registros = $('#cantidad_registros').val();
    cantidadRegistros(cantidad_registros,valorIndicador);
}

function actualizarCodeVer(LicenceId, Code, Title, Type){
    $('#actualizarRegistro').modal('show');
    $('#inputRol').val(Type);
    $('#inputCodigo').val(Code);
    $('#inputTitulo').val(Title);
    $('#inputIdLicencia').val(LicenceId);
}