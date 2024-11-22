$(document).ready(function() {
    $('#checkqrAll').change(function() {
        if ($(this).is(':checked')) {
            $('input[type="checkbox"].checkqr').prop('checked', true);
        } else {
            $('input[type="checkbox"].checkqr').prop('checked', false);
        }
    });
});

function buscarcheckqr(){
    let allChecked = true;

    $('.checkqr').each(function() {
        if (!$(this).is(':checked')) {
            allChecked = false;
        }
    });

    if (allChecked) {
        $('input[type="checkbox"]#checkqrAll').prop('checked', true);
    } else {
        $('input[type="checkbox"]#checkqrAll').prop('checked', false);
    }
}

function proyecto(valor, titulo){
    $.ajax({
        url:'generadorQRController.php',
        type: 'POST',
        data:{
                valor:valor
            },
        success:function(valor){
            $("#tablaQR").html(valor);
            $("#tituloProyecto").html(titulo);
        }
    });
}

function verProyecto(valor, titulo){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Desea ver los registros del proyecto "+titulo+"?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            proyecto(valor, titulo);
        }
    });
}

function editarQR(valor){

    $.ajax({
        url:'editarQR.php',
        type: 'POST',
        data:{
                valor:valor
            },
        success:function(valor){
            $("#contenidoModal").empty();
            $("#contenidoModal").html(valor);
            $("#actualizarModal").modal('show');
        }
    });

}

function actualizacionQR(valor){
    var partes = valor.split(",");
    var identificador = parseInt(partes[0], 10);
    var campo = partes[1];
    var tabla = partes[2];
    var idProyecto = partes[3];
    var tituloProyecto = partes[4];
    var nuevoValor =  $("#"+campo).val();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Desea actualizar el registro?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'ActualizarRegistros.php',
                type: 'POST',
                data:{
                    identificador:identificador,
                    campo:campo,
                    tabla:tabla,
                    nuevoValor:nuevoValor
                    },
                success:function(){
                    proyecto(idProyecto,tituloProyecto);
                }
            });
        }
    });
}

function downloadQR() {
    var CheckedQR = [];
    $('.checkqr:checked').each(function() {
        CheckedQR.push($(this).val());
    });
    
    if (CheckedQR.length > 0) {

        descargaQR =  CheckedQR.join(",");

        $.ajax({
            url:'downloadQR.php',
            type: 'POST',
            data:{
                    descargaQR: descargaQR
                },
            success:function(valor){
                alert(valor);
            }
        });

    } else {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "No se ha seleccionado ningún QR."
        });
    }
}

function crearQR(valor){
    $("#creacionQR").modal('show');
    $("#proyectoQR_crear").val(valor);
}