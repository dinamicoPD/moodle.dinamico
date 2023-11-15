$(document).ready(function() {
    $("#piso_4").slideUp().addClass("ocultar");
    $("#piso_5").slideUp().addClass("ocultar");
    $("#piso_6").slideUp().addClass("ocultar");
    $("#piso_7").slideUp().addClass("ocultar");

    $("#nombreDocente").keyup(function() {
        validacionSeccion_1();
    });
    $("#nombreCurso").keyup(function() {
        validacionSeccion_1();
    });
    $("#nombreGrupo").keyup(function() {
        validacionSeccion_1();
    });
    $("#nombreInstitucion").keyup(function() {
        validacionSeccion_1();
    });
    $("#nombreCiudad").keyup(function() {
        validacionSeccion_1();
    });
    $("#validationEmail").keyup(function() {
        validacionSeccion_1();
    });
    $("#validationEmail_2").keyup(function() {
        validacionSeccion_1();
    });

    $("#validationName").keyup(function() {
        validacionSeccion_2();
    });
    $("#validationapellido").keyup(function() {
        validacionSeccion_2();
    });
    $("#validationName2").keyup(function() {
        validacionSeccion_2();
    });
    $("#validationapellido2").keyup(function() {
        validacionSeccion_2();
    });

    $("#validationCodigo").keyup(function() {
        var codigoInput = "#validationCodigo";
        var codigoValor = $(codigoInput).val();
        var caracteresCodigo = codigoValor.length;

        if(caracteresCodigo != 8){
            $(codigoInput).addClass("is-invalid").removeClass("is-valid");
        }else{
            $(codigoInput).removeClass("is-invalid").removeClass("is-valid");
            codigos();
        }
    });

    $("#validationNewPass").keyup(function() {
        var proceder = true;

        var nombreInput = "#validationNewPass";
        var valorInput = $(nombreInput).val().trim();
        var err_form4 = /[\-_*./()&$!#%+=]/g;
        var err_form3 = /[\d]/g;
        var err_form2 = /[A-Z]/g;
        var err_form1 = /[a-z]/g;

        var numeroCaracteres = $(nombreInput).val().length;

        if(numeroCaracteres < 8 && numeroCaracteres > 15){
            proceder = false
        }
        
        if(!err_form1.test(valorInput)){
            proceder = false
        }

        if(!err_form2.test(valorInput)){
            proceder = false
        }

        if(!err_form3.test(valorInput)){
            proceder = false
        }

        if(!err_form4.test(valorInput)){
            proceder = false
        }

        var palabras = valorInput.split(" ");
        if (palabras.length != 1) {
            proceder = false;
        }

        if(proceder === true){
            $(nombreInput).removeClass("is-invalid").addClass("is-valid");
        }else{
            $(nombreInput).removeClass("is-valid").addClass("is-invalid");
        }

        newPass();
    });

    $("#validationNewPass2").keyup(function() {          
        newPass(); 
    });

    $("#validationTelefono").keyup(function() {
        var nombreInput = "#validationTelefono";
        var err_form = /[^0-9]/;

        var numeroCaracteres = $(nombreInput).val().length;
        if(numeroCaracteres > 0){
            LetrasEspacio(nombreInput, 10, 7, 1, err_form, true);
        }else{
            $(nombreInput).addClass("is-invalid").removeClass("is-valid");
        }   
    });
    
});

function newPass(){
    var proceder = true;

    var validationNewPass = $("#validationNewPass");
    var validationNewPass2 = $("#validationNewPass2");
    var numeroCaracteres = validationNewPass2.val().length;

        if (validationNewPass.val() === "") {
            proceder = false;
        }

        if (numeroCaracteres < 7){
            proceder = false;
        }

        if (validationNewPass.hasClass("is-invalid")) {
            proceder = false;
        }

        if (validationNewPass.val() != validationNewPass2.val()) {
            proceder = false;
        }

        if (proceder === true){
            $(validationNewPass2).addClass("is-valid").removeClass("is-invalid");
        }else{
            $(validationNewPass2).addClass("is-invalid").removeClass("is-valid");
        }

        cofrePass(proceder);
}

function cofrePass(proceder) {
    var validationNewPass = $("#validationNewPass").val().trim();
    var validationNewPass2 = $("#validationNewPass2").val().trim();
    var cofre = $(".cofre");

    if (proceder === true) {
        cofre.attr({
            "id": "cofre4",
            "src": "img/fomrLarge/cofre4.png"
        });
        down(7);
    } else {
        if (validationNewPass === "" || $("#validationNewPass").hasClass("is-invalid")) {
            console.log("1");
            cofre.attr({
                "id": "cofre1",
                "src": "img/fomrLarge/cofre1.png"
            });
        } else {
            if (validationNewPass2 === "") {
                console.log("2");
                cofre.attr({
                    "id": "cofre2",
                    "src": "img/fomrLarge/cofre2.png"
                });
            } else {
                if (validationNewPass2.length > 0) {
                    console.log("3");
                    cofre.attr({
                        "id": "cofre3",
                        "src": "img/fomrLarge/cofre3.png"
                    });
                }
            }
        }
    }
}

function down1(valor){
    var contenedor = $("#piso_"+valor);
    contenedor.slideDown().removeClass("ocultar");
    $('html, body').animate({
        scrollTop: contenedor.offset().top
    }, 1000);
}

function down(valor){
    var contenedor = $("#piso_"+valor);
    var proceder = true;

    if(valor === 4){
        validacionSeccion_1();
    }
    if(valor === 5){
        codigos();
    }
    if(valor === 6){
        validacionSeccion_2();
    }
    if(valor === 8){
        var nombreInput = "#validationTelefono";
        var err_form = /[^0-9]/;

        var numeroCaracteres = $(nombreInput).val().length;
        if(numeroCaracteres > 0){
            LetrasEspacio(nombreInput, 10, 7, 1, err_form, proceder);
        }else{
            $(nombreInput).addClass("is-valid").removeClass("is-invalid");
        } 
    }

    proceder = buscarNoValidos();

    if (proceder === false){
          Swal.fire({
            icon: 'error',
            title: 'Advertencia',
            text: 'No a completado el formulario correctamente',
            iconColor: "#912a2d"
          })

          $('.swal2-title').css({
            'color': '#912a2d',
            'text-shadow': '-0.2vw 0vw 0vw #61221D'
          });

        return false;
    }else if(valor === 8){
        
            Swal.fire({
                icon: 'success',
                title: 'Bien',
                text: 'formulario enviado',
                iconColor: "#90BD1F"
              })

              $('.swal2-title').css({
                'color': '#90BD1F',
                'text-shadow': '-0.2vw 0vw 0vw #77932B'
              });

              $('#inscripciondocenteForm').submit();

        }else{
            
            if($("#userNamePD").val() != "" && valor === 6){
                $("#piso_6").remove();
                $("#piso_7").slideDown().removeClass("ocultar");
                $('html, body').animate({
                    scrollTop: $("#piso_7").offset().top
                }, 1000);
            }else{
                contenedor.slideDown().removeClass("ocultar");
                $('html, body').animate({
                    scrollTop: contenedor.offset().top
                }, 1000);
            }

            if(valor === 4){
                correoExiste();
            }  
            return true;
        }
}

function correoExiste(){
    var email = $("#validationEmail").val();
    $.ajax({
        url:'emailExisteSTD.php',
        type: 'POST',
        data:{
            email: email
        },
        success: function(response) {

            if (response === "no existe"){
                codigoDiv();
            }else{
                codigoDiv();
                var responseArray = response.split(",");
                for (var i = 0; i < responseArray.length; i++){
                    switch (i) {
                        case 0:
                            $("#validationName").val(responseArray[i]).prop("readonly", true);
                            break;
                        case 1:
                            $("#validationName2").val(responseArray[i]).prop("readonly", true);
                            break;
                        case 2:
                            $("#validationapellido").val(responseArray[i]).prop("readonly", true);
                            break;
                        case 3:
                            $("#validationapellido2").val(responseArray[i]).prop("readonly", true);
                            break;
                        case 4:
                            $("#userNamePD").val(responseArray[i]).prop("readonly", true);
                            break;
                        case 5:
                            $("#validationTelefono").val(responseArray[i]).prop("readonly", true);
                            break;
                        default:
                            break;
                    }
                }
            }

        },
    });
}

function codigoDiv() {
    var email = $("#validationEmail").val();
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
            if (response == 'si') {
                $('#respa').text('Se envio el código a su correo');
                $("#validationEmail").prop('readonly', true);
                $("#validationEmail_2").prop('readonly', true);
            } else if(response == 'no'){
                $('#respa').text('El correo proporcionado no esta verificado. Revise su bandeja de entrada y transcriba el código.');
            } else {
                $('#validationCodigo').val(response).prop('readonly', true);
                $("#validationEmail").prop('readonly', true);
                $("#validationEmail_2").prop('readonly', true);
                $('#respa').text('Su correo ya se encuentra verificado');
            }
        },
    });
    return;
}

function codigos(){
    var cod_1 = $("#validationCodigo").val().trim();
    var proceder = true;

    if (cod_1 === ""){
        $("#validationCodigo").addClass("is-invalid").removeClass("is-valid");
        $('#respa').text("No ha ingresado el código de verificación, si aun no lo tiene dar clic en enviar código");
        proceder = false;
    }else{
        var email = $("#validationEmail").val();
        var codVer = $("#validationCodigo").val();
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
                    $("#validationCodigo").addClass("is-invalid").removeClass("is-valid");
                    $('#respa').text('No ha ingresado el código de verificación, si aun no lo tiene dar clic en enviar código');
                    proceder = false;
                } else {
                    var cod_2 = response;
                    if (cod_1 == cod_2){
                        $("#validationCodigo").addClass("is-valid").removeClass("is-invalid").prop('readonly', true);
                        $('#respa').text('Su correo ya se encuentra verificado');            
                    }else{
                        $("#validationCodigo").addClass("is-invalid").removeClass("is-valid");
                        $('#respa').text('No ha ingresado el código de verificación, si aun no lo tiene dar clic en enviar código');
                        proceder = false;
                    }

                }
                    return proceder;
            },
        });
    }
}

function validacionSeccion_1(){
    // valor de control
    var proceder = true;

    //errores
    var err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g;
    var err_form_2 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s\d_.+-]/g;
    var err_form_3 = /([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})/g;

    //piso_2
    var nombreDocente = "#nombreDocente";
    var nombreCurso = "#nombreCurso";
    var nombreGrupo = "#nombreGrupo";
    var nombreInstitucion = "#nombreInstitucion";
    var nombreCiudad = "#nombreCiudad";

    //piso_3
    var validationEmail = "validationEmail";
    var validationEmail_2 = "validationEmail_2";

    proceder = LetrasEspacio(nombreDocente, 50, 1, 2, err_form_1, proceder);
    proceder = LetrasEspacio(nombreInstitucion, 50, 5, 1, err_form_1, proceder);
    proceder = LetrasEspacio(nombreCiudad, 50, 5, 1, err_form_1, proceder);
//-------------------------------------------------
    proceder = LetrasEspacio(nombreCurso, 50, 5, 1, err_form_2, proceder);
    proceder = LetrasEspacio(nombreGrupo, 50, 3, 1, err_form_2, proceder);
//-------------------------------------------------
    proceder = CorreosValidar(validationEmail, err_form_3, proceder);
    
    if ($("#" + validationEmail).val() != ""){
        if ($("#" + validationEmail).val() === $("#" + validationEmail_2).val()){
            $("#" + validationEmail_2).addClass('is-valid').removeClass('is-invalid');
        }else{
            proceder === false;
            $("#" + validationEmail_2).addClass('is-invalid').removeClass('is-valid');
        }
    }else{
        $("#" + validationEmail_2).addClass('is-invalid').removeClass('is-valid');
    }
    
    return proceder;
}

function validacionSeccion_2(){
    // valor de control
    var proceder = true;

    //errores
    var err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g;

    var validationName = "#validationName";
    var validationapellido = "#validationapellido";
    var validationName2 = "#validationName2";
    var validationapellido2 = "#validationapellido2";

    proceder = LetrasEspacio(validationName, 50, 1, 1, err_form_1, proceder);
    proceder = LetrasEspacio(validationapellido, 50, 1, 1, err_form_1, proceder);
    proceder = LetrasEspacio(validationName2, 50, 0, 0, err_form_1, proceder);
    proceder = LetrasEspacio(validationapellido2, 50, 0, 0, err_form_1, proceder);

    return proceder;
}

function LetrasEspacio(inputId, maxLength, minLength, N_palabras, err_form, proceder){
    var input = $(inputId);
    var inputVal = input.val().trim();

    if (!err_form.test(inputVal) && inputVal.length >= minLength && inputVal.length <= maxLength){
        
        var palabras = inputVal.split(" ");
        if (palabras.length >= N_palabras) {
            input.addClass('is-valid').removeClass('is-invalid');
        } else {
            input.addClass('is-invalid').removeClass('is-valid');
            proceder = false;
        }

    }else{
        input.removeClass('is-valid').addClass('is-invalid');
        proceder = false;
    }

    return proceder

}

function CorreosValidar(inputId, err_form, proceder){
    var input = $("#" + inputId);
    var inputVal = input.val().trim();

    if (err_form.test(inputVal) === false) {
        input.addClass('is-invalid').removeClass('is-valid');
        proceder = false;
    }else{
        input.addClass('is-valid').removeClass('is-invalid');
    }

    return proceder;
}

function buscarNoValidos(){
    var proceder = true;
    var inputInvalido = $("#contenedor input.is-invalid");

    // Verificar si se encontró el input
    if (inputInvalido.length > 0) {
        proceder = false;
    }

    return proceder;
}