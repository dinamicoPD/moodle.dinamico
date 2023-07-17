$(document).ready(function(){
    $("#check_todos").click(function(){
      if($(this).is(":checked")) {
            
            $(".ch:not(:checked)").each(function(){
            $(this).prop("checked", true);
            $('#slt_all').html('Deseleccionar todo');
          });
      }else{
        $(".ch:checked").each(function(){
            
            $(this).prop("checked", false);
            $('#slt_all').html('Seleccionar todo');
          });
      }
    });

    $("#check_todos_para").click(function(){
        if($(this).is(":checked")) {
              $(".pa:not(:checked)").each(function(){
              $(this).prop("checked", true);
              $('#slt_all_para').html('Deseleccionar todo');
            });
        }else{
          $(".pa:checked").each(function(){          
              $(this).prop("checked", false);
              $('#slt_all_para').html('Seleccionar todo');
            });
        }
      });

    $("#checktodosETD").click(function(){
        if($(this).is(":checked")) {
            $(".std:not(:checked)").each(function(){
            $(this).prop("checked", true);
            $('#slt_checktodosETD').html('Deseleccionar todo');
          });
      }else{
        $(".std:checked").each(function(){     
            $(this).prop("checked", false);
            $('#slt_checktodosETD').html('Seleccionar todo');
          });
      }
    })

    $("#checktodosPFE").click(function(){
        if($(this).is(":checked")) {
            $(".pfe:not(:checked)").each(function(){
            $(this).prop("checked", true);
            $('#slt_checktodosPFE').html('Deseleccionar todo');
          });
      }else{
        $(".pfe:checked").each(function(){     
            $(this).prop("checked", false);
            $('#slt_checktodosPFE').html('Seleccionar todo');
          });
      }
    })



  });

function enviacodigo(){
    var categories = $("#categ").val();

    if (categories == ""){
        swal({
            title: "Error",
            text: "No agrego categoria",
            icon: "error",
            closeOnClickOutside: false,
          });
    }else{

        $.ajax({
            url:'actualizar.php?op=1',
            type: 'POST',
            data:{
                c:categories,
                },
            success:function(){
                $("#cat_recargar").load("actualizar.php?op=2");
                $("#categ").val("");
                swal({
                    title: "Correcto",
                    text: "Categoria agregada: " + categories,
                    icon: "success",
                    closeOnClickOutside: false,
                  });
            }
        });

        return false;
    }
}

function categ_llenar(string){
    var valor = string;

    $("#idcategM").val($("#ca"+valor).val());
    $("#categM").val($("#cb"+valor).val());

}

function cambioCateg(){
    var categories = $("#categM").val();
    var idCategories = $("#idcategM").val();

    $.ajax({
        url:'actualizar.php?op=3',
        type: 'POST',
        data:{
            cat_cam: categories,
            id_cat_cam: idCategories,
            },
            success:function(){
               $("#cat_recargar").load("actualizar.php?op=2");
               $("#par_recargar").load("actualizar.php?op=6");

                swal({
                    title: "Correcto",
                    text: "Categoria agregada: " + categories,
                    icon: "success",
                    closeOnClickOutside: false,
                  });
            }
    });
}

function deleteCateg(){

    swal({
        title: "¿Está seguro?",
        text: "Una vez eliminado, no podrá recuperar los registros!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })

      .then((willDelete) => {
        if (willDelete) {

            $('.modal_load').css('display','block');

           // inicio 

            var idCateg_array = [];
            var contarCateg_all = 0;
            var contarCateg_select = 0;
        
            $('#slt_all').html('Seleccionar todo');
        
            $("input:checkbox[class=ch]").each(function(){
                contarCateg_all = contarCateg_all + 1;
            });
        
            $("input:checkbox[class=ch]:checked").each(function(){
                idCateg_array.push($(this).val());
                contarCateg_select = contarCateg_select + 1;
            });
        
            if(contarCateg_all == contarCateg_select){
                $.ajax({
                    url:'actualizar.php?op=5',
                    type: 'POST',
                    data:{
                        idCateg_array: idCateg_array,
                        },
                        success:function(){
                            $('.modal_load').css('display','none');
                            $("#cat_recargar").load("actualizar.php?op=2");
                            swal({
                                title: "Correcto",
                                text: "Todos los registros eliminados",
                                icon: "success",
                                closeOnClickOutside: false,
                              });
                        }
                });
            }else{
                if(idCateg_array.length > 0){
                    $.ajax({
                        url:'actualizar.php?op=4',
                        type: 'POST',
                        data:{
                            idCateg_array: idCateg_array,
                            },
                            success:function(){
                                $('.modal_load').css('display','none');
                                $("#cat_recargar").load("actualizar.php?op=2");
                                swal({
                                    title: "Correcto",
                                    text: "Registros eliminados: " + idCateg_array,
                                    icon: "success",
                                    closeOnClickOutside: false,
                                  });
                            }
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "No seleciono ningun registro",
                        icon: "error",
                        closeOnClickOutside: false,
                      });
                }
            }

            // fin
            
        } else {
          swal("Tu registro está a salvo!");
        }
      });
}

function actualizarParametro(){
    $("#actCategoria").load("actualizar.php?op=7");
    $("#actCurso").load("actualizar.php?op=8");
}

function cambioParametro(){
    var categoriaModal = $("#inputGroupCategoria option:selected").val();
    var cursoModal = $("#inputGroupCursos option:selected").val();

    $.ajax({
        url:'actualizar.php?op=9',
        type: 'POST',
        data:{
            categoriaModal: categoriaModal,
            cursoModal: cursoModal,
            },
            success:function(){
               $("#par_recargar").load("actualizar.php?op=6");

                swal({
                    title: "Correcto",
                    text: "Categoria: " + categoriaModal + " Curso: " + cursoModal,
                    icon: "success",
                    closeOnClickOutside: false,
                  });
            }
    });
}

function deletePara(){

    swal({
        title: "¿Está seguro?",
        text: "Una vez eliminado, no podrá recuperar los registros!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })

      .then((willDelete) => {
        if (willDelete) {

           // inicio 
           $('.modal_load').css('display','block');

    var idCateg_array = [];
    var contarCateg_all = 0;
    var contarCateg_select = 0;

    $('#slt_all_para').html('Seleccionar todo');

    $("input:checkbox[class=pa]").each(function(){
        contarCateg_all = contarCateg_all + 1;
    });

    $("input:checkbox[class=pa]:checked").each(function(){
        idCateg_array.push($(this).val());
        contarCateg_select = contarCateg_select + 1;
    });

    if(contarCateg_all == contarCateg_select){
        $.ajax({
            url:'actualizar.php?op=10',
            type: 'POST',
            data:{
                idCateg_array: idCateg_array,
                },
                success:function(){
                    $('.modal_load').css('display','none');
                    $("#par_recargar").load("actualizar.php?op=6");
                    swal({
                        title: "Correcto",
                        text: "Todos los registros eliminados",
                        icon: "success",
                        closeOnClickOutside: false,
                      });
                }
        });
    }else{
        if(idCateg_array.length > 0){
            $.ajax({
                url:'actualizar.php?op=10',
                type: 'POST',
                data:{
                    idCateg_array: idCateg_array,
                    },
                    success:function(){
                        $('.modal_load').css('display','none');
                        $("#par_recargar").load("actualizar.php?op=6");
                        swal({
                            title: "Correcto",
                            text: "Registros eliminados: " + idCateg_array,
                            icon: "success",
                            closeOnClickOutside: false,
                          });
                    }
            });
        }else{
            swal({
                title: "Error",
                text: "No seleciono ningun registro",
                icon: "error",
                closeOnClickOutside: false,
              });
        }
    }

     // fin

    } else {
        swal("Tu registro está a salvo!");
      }
    });
}

function deleteSTD(){

    swal({
        title: "¿Está seguro?",
        text: "Una vez eliminado, no podrá recuperar los registros! recuerde eliminar estos mismos usuarios en la plataforma",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })

      .then((willDelete) => {
        if (willDelete) {
            $('.modal_load').css('display','block');
           // inicio 


    var idSTD_array = [];
    var contarSTD_all = 0;
    var contarSTD_select = 0;

    $('#slt_checktodosETD').html('Seleccionar todo');

    $("input:checkbox[class=std]").each(function(){
        contarSTD_all = contarSTD_all + 1;
    });

    $("input:checkbox[class=std]:checked").each(function(){
        idSTD_array.push($(this).val());
        contarSTD_select = contarSTD_select + 1;
    });

    if(contarSTD_all == contarSTD_select){
        $.ajax({
            url:'actualizar.php?op=11',
            type: 'POST',
            data:{
                idSTD_array: idSTD_array,
                },
                success:function(){
                    $('.modal_load').css('display','none');
                    $("#std_recargar").load("actualizar.php?op=12");
                    swal({
                        title: "Correcto",
                        text: "Todos los registros eliminados, si aún no ha eliminado los usuarios en moodle, realicelo para evitar errores",
                        icon: "success",
                        closeOnClickOutside: false,
                      });
                }
        });
    }else{
        if(idSTD_array.length > 0){
            $.ajax({
                url:'actualizar.php?op=11',
                type: 'POST',
                data:{
                    idSTD_array: idSTD_array,
                    },
                    success:function(){
                        $('.modal_load').css('display','none');
                        $("#std_recargar").load("actualizar.php?op=12");
                        swal({
                            title: "Correcto",
                            text: "Registros eliminados: " + idSTD_array + ", si aún no ha eliminado los usuarios en moodle, realicelo para evitar errores",
                            icon: "success",
                            closeOnClickOutside: false,
                          });
                    }
            });
        }else{
            swal({
                title: "Error",
                text: "No seleciono ningun registro",
                icon: "error",
                closeOnClickOutside: false,
              });
        }
    }

    // fin

} else {
    swal("Tu registro está a salvo!");
  }
});
}

function deletePFE(){
    swal({
        title: "¿Está seguro?",
        text: "Una vez eliminado, no podrá recuperar los registros! recuerde eliminar estos mismos usuarios en la plataforma",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })

      .then((willDelete) => {
        if (willDelete) {
            $('.modal_load').css('display','block');
           // inicio 


    var idPFE_array = [];
    var contarPFE_all = 0;
    var contarPFE_select = 0;

    $('#slt_checktodosPFE').html('Seleccionar todo');

    $("input:checkbox[class=pfe]").each(function(){
        contarPFE_all = contarPFE_all + 1;
    });

    $("input:checkbox[class=pfe]:checked").each(function(){
        idPFE_array.push($(this).val());
        contarPFE_select = contarPFE_select + 1;
    });

    if(contarPFE_all == contarPFE_select){
        $.ajax({
            url:'actualizar.php?op=13',
            type: 'POST',
            data:{
                idPFE_array: idPFE_array,
                },
                success:function(){
                    $('.modal_load').css('display','none');
                    $("#pfe_recargar").load("actualizar.php?op=14");
                    swal({
                        title: "Correcto",
                        text: "Todos los registros eliminados, si aún no ha eliminado los usuarios en moodle, realicelo para evitar errores",
                        icon: "success",
                        closeOnClickOutside: false,
                      });
                }
        });
    }else{
        if(idPFE_array.length > 0){
            $.ajax({
                url:'actualizar.php?op=13',
                type: 'POST',
                data:{
                    idPFE_array: idPFE_array,
                    },
                    success:function(){
                        $('.modal_load').css('display','none');
                        $("#pfe_recargar").load("actualizar.php?op=14");
                        swal({
                            title: "Correcto",
                            text: "Registros eliminados: " + idPFE_array + ", si aún no ha eliminado los usuarios en moodle, realicelo para evitar errores",
                            icon: "success",
                            closeOnClickOutside: false,
                          });
                    }
            });
        }else{
            swal({
                title: "Error",
                text: "No seleciono ningun registro",
                icon: "error",
                closeOnClickOutside: false,
              });
        }
    }

    // fin

} else {
    swal("Tu registro está a salvo!");
  }
});
}

function estadoPes() {
    $('input[type=radio]').each(function () {
        if ($(this).is(':checked')) {
            $('label[for=' + $(this).prop("id") + ']').addClass("active");
$('.modal_load').css('display','block'); // eliminar
                if ($(this).prop("id") == "select_21" || $(this).prop("id") == "select_22"){
                    $("#navbarDropdownMenuLink").addClass("active");
                }else{
                    $("#navbarDropdownMenuLink").removeClass("active");
                }
        } else {
            $('label[for=' + $(this).prop("id") + ']').removeClass("active");
        }
    });
}
