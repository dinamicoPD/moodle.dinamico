$(document).ready(function(){
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
});

var posicionMenu = document.getElementById('m2');
 posicionMenu.classList.add('menuActivo');

function verActivo(selector){
    $('.nav-link').removeClass('active');
    $('#nav-link_'+selector).addClass('active');
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
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Una vez eliminado, no podrá recuperar los registros!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            var idCateg_array = [];
            var contarCateg_all = 0;
            var contarCateg_select = 0;
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
                            alert("Todos los registros eliminados");
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
                                alert("Registros eliminados: " + idCateg_array);
                            }
                    });
                }else{
                    alert("No seleciono ningun registro");
                }
            }
        }else{
            alert("Tu registro está a salvo!");
        }
    });
}

function categ_llenar(id,string){
    $("#idcategM").val(id);
    $("#categM").val(string);
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

                Swal.fire({
                    title: "Buen trabajo!",
                    text: "Categoría agregada: " + categories,
                    icon: "success"
                  });
            }
    });
}

function enviacodigo(){
    var categories = $("#categ").val();

    if (categories == ""){
        Swal.fire({
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
                Swal.fire({
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

function deleteCateg(){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Una vez eliminado, no podrá recuperar los registros!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
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
                            Swal.fire({
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
                                Swal.fire({
                                    title: "Correcto",
                                    text: "Registros eliminados: " + idCateg_array,
                                    icon: "success",
                                    closeOnClickOutside: false,
                                  });
                            }
                    });
                }else{
                    Swal.fire({
                        title: "Error",
                        text: "No seleciono ningun registro",
                        icon: "error",
                        closeOnClickOutside: false,
                      });
                }
            }

            // fin
        }else{
            alert("Tu registro está a salvo!");
        }
    });
}