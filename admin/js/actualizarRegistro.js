const verBtn = document.querySelectorAll('.actualizar');

verBtn.forEach(boton => {
    boton.addEventListener('click', function() {
        const valor = this.value;
        miFuncion(valor);
    });
});

const agregarBtn = document.querySelectorAll('.agregarRegistro');

agregarBtn.forEach(boton => {
    boton.addEventListener('click', function() {
        const valor = this.value;
        agregarElemento(valor);
    });
});

const eliminarBtn = document.querySelectorAll('.eliminar');

eliminarBtn.forEach(boton => {
    boton.addEventListener('click', function() {
        const valor = this.value;
        eliminarElemento(valor);
    });
});

const actualizarModificarBtn = document.querySelectorAll('.actualizarModificar');

actualizarModificarBtn.forEach(boton => {
    boton.addEventListener('click', function() {
        const valor = this.value;
        actualizarModificar(valor);
    });
});

function eliminarElemento(Registro){
    arrayRegistro = Registro.split(",");
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Desea Eliminar el registro?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'EliminarRegistros.php',
                type: 'POST',
                data:{
                        identificador:arrayRegistro[0],
                        tabla:arrayRegistro[1]
                    },
                success:function(valor){
                    location.reload();
                }
            });
        }
    });
}

function agregarElemento(Registro){
    $("#contenidoModal").empty();
    $.ajax({
        url:'verTabla.php',
        type: 'POST',
        data:{
            Registro: Registro
        },
        success:function(valor){
            $("#contenidoModal").html(valor);
        }
    });

    $("#actualizarModal").modal('show');
}

function miFuncion(valor) {
    var partes = valor.split(",");
    var identificador = parseInt(partes[0], 10);
    var tabla = partes[1];

    $.ajax({
        url:'VerActualizarRegistros.php',
        type: 'POST',
        data:{
            identificador:identificador,
            tabla:tabla,
            },
        success:function(valor){
            $("#contenidoModal").empty();
            $("#contenidoModal").html(valor);
            $("#actualizarModal").modal('show');
        }
    });
}

function actualizacion(valor){
    var partes = valor.split(",");
    var identificador = parseInt(partes[0], 10);
    var campo = partes[1];
    var tabla = partes[2];
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
                success:function(valor){
                    location.reload();
                }
            });
        }
    });
}

function actualizarModificar(valor) {

    const arrayValores = valor.split(",");
    var valorInput = $("#"+arrayValores[1]).val()

    /* extrae el valor del input y envialo*/

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Desea actualizar el registro por "+valorInput+"?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'actulizarModificar.php',
                type: 'POST',
                data:{
                    valor:arrayValores[0],
                    valorInput:valorInput
                    },
                success:function(valor){
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = valor;
                    $("#accordionFlushExample").empty().append(tempDiv.childNodes);
                }
            });
        }else{
            console.log("no confirmado");
        }
    });
}