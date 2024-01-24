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