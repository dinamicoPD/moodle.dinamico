var count = 1;
var count_2 = 1;
var resultInsituto;

$(document).ready(function() {

    $("#codigo").slideUp();
    $("#datos").slideUp();
    $("#telefono").slideUp();
    $("#institucion").slideUp();
    $("#asesor").slideUp();
    $("#cursosVinculados").slideUp();

    $("#btnCorreo").slideUp();
    $("#btnName").slideUp();
    $("#respa").slideUp();
    $("#btnTel").slideUp();
    $("#btnInstituto").slideUp();
   
    $("#E-mail-2").on('paste', function(e){
        e.preventDefault();
    })
    $("#E-mail").on('paste', function(e){
        e.preventDefault();
    })

    $('#E-mail').on('input', () => comprobarEmail());
    $('#E-mail-2').on('input', () => comprobarEmail());

    $('#FirstName').on('input', () => nombreFull('#FirstName'));
    $('#MiddleName').on('input', () => nombreFull('#MiddleName'));
    $('#LastName').on('input', () => nombreFull('#LastName'));
    $('#SecondLastName').on('input', () => nombreFull('#SecondLastName'));

    $('#Tel').on('input', () => comprobarTel());

    $('#addInstituto').click(function() {

        $("#cursosVinculados").slideUp();
        $("#asesor").slideUp();
        
        var countDiv = $('#add').children('div').length;

        if (countDiv < 11){
            count++;  // Incrementar el conteo en cada clic
            $("#btnInstituto").slideUp();
            $('#btnCursosVin').css('pointer-events', 'all');

            $.ajax({
                url: 'newCampoInstitucion.php',
                type: 'POST',
                data: {
                        count: count
                    },
                success: function(data) {
                    var divElement = $('#add');
                    divElement.append(data);

                    $("#departamento_"+count).addClass("is-invalid");
                    $("#ciudad_"+count).addClass("is-invalid");
                    $("#Instituto_"+count).addClass("is-invalid");
                }
            });

            $('#add').find('select, input').css('pointer-events', 'all');
        }
    });

    $('#addFullCurso').click(function() {
        
        var countDiv = $('#cursosAdd').children('div').length;

        if (countDiv < 21){
            count_2++;  // Incrementar el conteo en cada clic
            
            $.ajax({
                url: 'newCampoCursos.php',
                type: 'POST',
                data: { count_2: count_2,
                        resultInsituto: resultInsituto
                },
                success: function(data) {
                    var divElement = $('#cursosAdd');
                    divElement.append(data);

                    $("#colegio_"+count_2).addClass("is-invalid");
                    $("#edicion_"+count_2).addClass("is-invalid");
                    $("#curso_"+count_2).addClass("is-invalid");
                    $("#sigla_"+count_2).addClass("is-invalid");

                    buscarNoValidos();
                }
            });
            
            $('#cursosAdd').find('select, input').css('pointer-events', 'all');
        }

    });

    $('#formulario').submit(function(e) {
        e.preventDefault(); // Evita que el formulario se envíe de forma convencional
        // Obtén los valores del formulario
        var valores = {};
        var elements = $('[name="enviar"]');
        elements.each(function() {
          var nombre = $(this).attr('name');
          var valor = $(this).val();
          valores[nombre] = valor;
        });
        // Realiza la solicitud AJAX al archivo PHP
        $.ajax({
          type: 'POST',
          url: 'inscripcionDocente.php',
          data: {valores: valores},
          success: function(response) {
            // Maneja la respuesta del archivo PHP aquí
            console.log(response);
          }
        });
      });

});

function comprobarEmail(){
    const correo = /([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})/g;
    const err_form = /(["\\<>/^'\s])/g;

    var email_1 = $("#E-mail").val();
    var email_2 = $("#E-mail-2").val();
    if (err_form.test(email_1) == false){
        if (correo.test(email_1) == false){
            /* para email_1 no corresponde los caracteres o estructura */
            $("#E-mail").addClass("is-invalid");
            $("#E-mail").removeClass("is-valid");
        }else{
            $("#E-mail").removeClass("is-invalid");
            $("#E-mail").addClass("is-valid");
            if (email_1 == email_2){
                /* los correos son iguales */
                $("#E-mail-2").removeClass("is-invalid");
                $("#E-mail-2").addClass("is-valid");

                $("#btnCorreo").slideDown();

            }else{
                /* los correos son diferentes */
                $("#E-mail-2").removeClass("is-valid");
                $("#E-mail-2").addClass("is-invalid");
            }
        }
    }else{
        /* para email_1 no corresponde los caracteres o estructura */
        $("#E-mail").addClass("is-invalid");
        $("#E-mail").removeClass("is-valid");
    }
}

function codigoDiv() {
    $("#codigo").slideDown();
    $("#E-mail").prop("readonly", true);
    $("#E-mail-2").prop("readonly", true);

    centrarDiv("#codigo");

    var email = $("#E-mail").val();
    var text = "";
    var possible = "1234567890";

    for (var i = 0; i < 8; i++){
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    $.ajax({
        url:'enviaCode.php',
        type: 'POST',
        data:{
            e:email,
            r:text,
            action: 'enviarCodigo'
        },
        success: function(response) {
            // Mostrar la respuesta en el DOM
            $("#respa").slideDown();
            if (response == 'si') {
                $('#respa').text('Se envio el codigo a su correo');
            } else if(response == 'no'){
                $('#respa').text('El correo que proporciono está en proceso de verificación, revise en la bandeja de entrada de su correo electrónico y transcriba su código');
            } else {
                $('#codigoEmail').val(response);
                $('#codigoEmail').prop('readonly', true);
                $('#respa').text('Su correo ya se encuentra verificado');
            }
        },
    });
}

function codigos(){
    var cod_1 = $("#codigoEmail").val();

    if (cod_1 === ""){
        $("#codigoEmail").addClass("is-invalid");
        $("#codigoEmail").removeClass("is-valid");
        $('#respa').text("No ha ingresado el código de verificación, si aun no lo tiene dar clic en enviar codigo");
    }else{
        var email = $("#E-mail").val();
        var codVer = $("#codigoEmail").val();
        $.ajax({
            url:'enviaCode.php',
            type: 'POST',
            data:{
                a:email,
                cod:codVer,
                action2:'verCorreo'
            },
            success: function(response) {
                if (response == 'no'){
                    $("#respa").slideUp();
                    $("#codigoEmail").addClass("is-invalid");
                    $("#codigoEmail").removeClass("is-valid");
                } else {
                    var cod_2 = response;
                    if (cod_1 == cod_2){
                        // codigo correcto
                        $("#codigoEmail").addClass("is-valid");
                        $("#codigoEmail").removeClass("is-invalid");
                        $("#respa").slideUp();
                        $("#datos").slideDown();

                        centrarDiv("#datos");
                        
                    }else{
                        $("#codigoEmail").addClass("is-invalid");
                        $("#codigoEmail").removeClass("is-valid");
                        $("#respa").slideUp();
                    }

                }
            },
        });
    }
}

function centrarDiv(selector){
    // Obtén la posición superior de la sección que deseas centrar
    var sectionTop = $(selector).offset().top;

    // Calcula la posición para centrar la sección en el navegador
    var windowHeight = $(window).height();
    var sectionHeight = $(selector).height();
    var offset = Math.max(0, (windowHeight - sectionHeight) / 2);

    // Centra la vista del navegador en la sección
    $('html, body').animate({
        scrollTop: sectionTop - offset
    }, 500);
}

function nombreFull(nombreInput) {
    const err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚ]/g;
    var name_1 = $(nombreInput).val();

    if (name_1 === null || name_1.trim() === "") {
        var name_1 = $(nombreInput).val("");
        $(nombreInput).removeClass("is-invalid is-valid");
        $("#btnName").slideUp();
        validarNombre();
    } else if (!err_form_1.test(name_1)) {
        $(nombreInput).removeClass("is-invalid");
        $(nombreInput).addClass("is-valid");
        validarNombre();
    } else {
        $(nombreInput).removeClass("is-valid");
        $(nombreInput).addClass("is-invalid");
        $("#btnName").slideUp();
        validarNombre();
    }
}

function validarNombre(){
    const err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚ]/g;
    var name = $("#FirstName").val() + $("#MiddleName").val() + $("#LastName").val() + $("#SecondLastName").val();

    if ($("#FirstName").val() !== "" && $("#LastName").val() !== "") {
        if (!err_form_1.test(name)) {
            $("#btnName").slideDown();
        }else{
            $("#btnName").slideUp();
        }       
    }else{
        $("#btnName").slideUp();
    }
}

function telefono(){
    $("#telefono").slideDown();
    centrarDiv("#telefono");
}

function comprobarTel(){
    var telefono = $("#Tel").val();
    const expTel = /^\d{7,15}$/g;

    if (expTel.test(telefono)) {
        $("#Tel").removeClass("is-invalid");
        $("#Tel").addClass("is-valid");
        $("#btnTel").slideDown();
    } else {
        $("#Tel").removeClass("is-valid");
        $("#Tel").addClass("is-invalid");
        $("#btnTel").slideUp();
    }
}

function institucion(){
    $("#institucion").slideDown();
    centrarDiv("#institucion");
}

function datosInstituto(input, valor){
    var proceso = "";
    var cargarDatos = "";
    var datoId = $(input+"_"+valor).val();

    $(input+"_"+valor).removeClass("is-invalid");
    $(input+"_"+valor).addClass("is-valid");

    switch(input) {
        case '#departamento':
            proceso = "#ciudad";
            cargarDatos = "cargar_ciudades.php";
            $("#ciudad_"+valor).val("");
            $("#ciudad_"+valor).removeClass("is-valid");
            $("#ciudad_"+valor).addClass("is-invalid");

            $("#Instituto_"+valor).val("");
            $("#Instituto_"+valor).removeClass("is-valid");
            $("#Instituto_"+valor).addClass("is-invalid");

            $("#otro_"+valor).val("");
            break;

        case '#ciudad':
            proceso = "#Instituto";
            cargarDatos = "cargar_instituto.php";
            $("#Instituto_"+valor).val("");
            $("#Instituto_"+valor).removeClass("is-valid");
            $("#Instituto_"+valor).addClass("is-invalid");

            $("#otro_"+valor).val("");
            break;
    }

    $.ajax({
        url: cargarDatos,
        type: 'POST',
        data: {datoId: datoId},
        success: function(data) {
            $(proceso+"_"+valor).html(data);
        }
    });

}

function datosCursos(valor){
    var proceder = true;

    if ($("#departamento_"+valor+" option:first-child:selected").length !== 0) {
        $("#departamento_"+valor).removeClass("is-valid");
        $("#departamento_"+valor).addClass("is-invalid");
        proceder =  false;
    }else{
        $("#departamento_"+valor).removeClass("is-invalid");
        $("#departamento_"+valor).addClass("is-valid");
    }
    if ($("#ciudad_"+valor+" option:first-child:selected").length !== 0) {
        $("#ciudad_"+valor).removeClass("is-valid");
        $("#ciudad_"+valor).addClass("is-invalid");
        proceder =  false;
    }else{
        $("#ciudad_"+valor).removeClass("is-invalid");
        $("#ciudad_"+valor).addClass("is-valid");
    }
    if ($("#Instituto_"+valor+" option:first-child:selected").length !== 0) {
        $("#Instituto_"+valor).removeClass("is-valid");
        $("#Instituto_"+valor).addClass("is-invalid");
        proceder =  false;
    }else{
        $("#Instituto_"+valor).removeClass("is-invalid");
        $("#Instituto_"+valor).addClass("is-valid");
        if ($("#Instituto_"+valor).val() == 'otro'){
            $("#otro_"+valor).css("visibility", "visible");

            if ($("#otro_"+valor).val() == ""){
                $("#otro_"+valor).removeClass("is-valid");
                $("#otro_"+valor).addClass("is-invalid");
                proceder =  false;
            }else{
                var colegio = $("#otro_"+valor).val();
                const err_form_2 = /(["\\<*>/^'0-9+-])/g;
                    if(err_form_2.test(colegio) !== false){
                        $("#otro_"+valor).removeClass("is-valid");
                        $("#otro_"+valor).addClass("is-invalid");
                        proceder =  false;
                    }else{
                        $("#otro_"+valor).removeClass("is-invalid");
                        $("#otro_"+valor).addClass("is-valid");
                    }
            }

        }else{
            $("#otro_"+valor).css("visibility", "hidden");
            $("#otro_"+valor).val("");
        }
    }

    if (proceder == false){
        $("#btnInstituto").slideUp();
    	return false;
    }

    // agregar que no exista la calse is-invalid
    var no_validas = $('#add').find('.is-invalid').length;

    if (no_validas == 0){
        $("#btnInstituto").slideDown();
    }
}

function subInstituto(eliminarDiv){

    $('#btnCursosVin').css('pointer-events', 'all');

    $("#cursosVinculados").slideUp();
    $("#asesor").slideUp();
    
    var divElement = $("#add_"+eliminarDiv);
    divElement.remove();

    var no_validas = $('#add').find('.is-invalid').length;

    if (no_validas == 0){
        $("#btnInstituto").slideDown();
    }

    $('#add').find('select, input').css('pointer-events', 'all');

}

function Asesor(){
    $("#asesor").slideDown();
    centrarDiv("#asesor");

    $('#add').find('select, input').css('pointer-events', 'none');
}

function cursosVin(){
    $('#btnCursosVin').css('pointer-events', 'none');
    $("#cursosVinculados").slideDown();
    centrarDiv("#cursosVinculados");

    if ($("#asesorSelect option:first-child:selected").length !== 0){
        $("#asesorSelect").val(1);
    }
        var selectedValues = $('#add select.escuela').map(function() {
        var id = this.id.slice(-1); // Extrae el último carácter del ID
        var value = $(this).val();
        var text = $(this).find('option:selected').text(); // Obtiene el texto del option seleccionado
        return {
          id: id,
          value: value,
          text: text
        };
      }).get();
      
      resultInsituto = "";
      resultInsituto += "<option selected disabled value=''>Seleccionar</option>";

      selectedValues.forEach(function(item) {

        if (item.value == "otro"){
            var valorOtro_1 = $("#otro_"+item.id).val();
            var valorOtro = valorOtro_1.toUpperCase();
            resultInsituto += "<option value='" + item.value + "'>"+ valorOtro +"</option>";
        }else{
            resultInsituto += "<option value='" + item.value + "'>"+ item.text +"</option>";
        }

      });

      $('#colegio_1').html(resultInsituto);

      // borrar todo

      $('#cursosAdd').find('select, input').removeClass("is-valid").addClass("is-invalid").val("");
}

function edicionEdicion(input, valorEd){
    var proceder = true;

    if ($(input+valorEd+" option:first-child:selected").length !== 0) {
        $(input+valorEd).removeClass("is-valid");
        $(input+valorEd).addClass("is-invalid");
        proceder =  false;
    }

    if (proceder == false){
    	return false;
    }

    $(input+valorEd).removeClass("is-invalid");
    $(input+valorEd).addClass("is-valid");

    if (input == '#edicion_'){
        $("#curso_"+valorEd).val("");
        $("#curso_"+valorEd).removeClass("is-valid");
        $("#curso_"+valorEd).addClass("is-invalid");

        var datoId = $("#edicion_"+valorEd).val();

        $.ajax({
            url: 'cargar_curso.php',
            type: 'POST',
            data: {datoId: datoId},
            success: function(data) {
                $("#curso_"+valorEd).html(data);
            }
        });
    }

    buscarNoValidos();
}

function edicionSigla(valorEd){
    var elemento = $("#sigla_" + valorEd);
    var sigla = elemento.val();

     if (sigla == "") {
        elemento.removeClass("is-valid").addClass("is-invalid");
    } else {
        if (/^\d+$/.test(sigla) && sigla > 99 && sigla < 1200) {
            elemento.removeClass("is-invalid").addClass("is-valid");
          } else {
            elemento.removeClass("is-valid").addClass("is-invalid");
          }
        
    }

    buscarNoValidos();
}

function subCurso(eliminarDiv){
    var divElement = $("#cursosAdd_"+eliminarDiv);
    divElement.remove();

    buscarNoValidos();
}

function buscarNoValidos(){
    var clasesInvalidas = $("#formulario .is-invalid");
    var cantidadClasesInvalidas = clasesInvalidas.length;
    
    if (cantidadClasesInvalidas > 0){
        $("#enviarTerminar").slideUp();
    }else{
        $("#enviarTerminar").slideDown();
    }
}