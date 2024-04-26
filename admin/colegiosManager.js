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

function Actualizar(id, colegio){
    $('#Colegio').val(colegio);
    $('#idColegio').val(id);
    var imagen = "<img src='diplomas/img/colegios/"+id+".png' alt=''>";
    $('#imagenLogo').html(imagen);
    $('#colegioModal').modal('show');
}

function borrarColegio(){
   Swal.fire({
  title: '¿Estás seguro?',
  text: "¡Esta acción no se puede deshacer!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.isConfirmed) {
    $('#Colegioborrar').val('1');
    $("#formularioColegio").submit();
  }else{
    $('#Colegioborrar').val('0');
  }
});
}