$(document).ready(function(){
    swal({
        title: "Instrucciones",
        text: "Este formulario esta dividido por secciones complete la información solicitada y podrá continuar",
        icon: "info",
        closeOnClickOutside: false,
      });
    // bloqueo de espacio email 2
    $("#Email_2").prop('disabled', true);
    // visibilidad de pestañas
    $('#se_1').css('display', 'none');
    $('#se_2').css('display', 'block');
    $('#se_3').css('display', 'none');
    $('#se_4').css('display', 'none');
    $('#se_5').css('display', 'none');
    $('#se_6').css('display', 'none');
    
    $('#se_3').css('visibility', 'hidden');
    $('#se_4').css('visibility', 'hidden');
    $('#se_5').css('visibility', 'hidden');
    $('#se_6').css('visibility', 'hidden');
    
    $('#FlIzq').css('visibility', 'hidden');
    $('#FlDer').css('visibility', 'visible');
    $('.pestana').css('margin-bottom', '0vh');

    $("#select_1").click(function() {  
        $('#se_1').css('display', 'none');
        $('#se_2').css('display', 'block');
        $('#se_3').css('display', 'none');
        $('#se_4').css('display', 'none');
        $('#se_5').css('display', 'none');
        $('#se_6').css('display', 'none');
        $('#FlIzq').css('visibility', 'hidden');
        $('#FlDer').css('visibility', 'visible');
        $('.pestana').css('margin-bottom', '0vh');  
    });
    $("#select_2").click(function() {  
        $('#se_1').css('display', 'block');
        $('#se_2').css('display', 'none');
        $('#se_3').css('display', 'block');
        $('#se_4').css('display', 'none');
        $('#se_5').css('display', 'none');
        $('#se_6').css('display', 'none');
        $('#FlIzq').css('visibility', 'visible');
        $('#FlDer').css('visibility', 'visible');
        $('.pestana').css('margin-bottom', '0vh');  
    });  
    $("#select_3").click(function() {
        swal({
            title: "Instrucciones",
            text: "Por favor dar clic en (enviar) y a su correo se enviara el código, donde tendrá que ingresarlo para poder continuar",
            icon: "info",
            closeOnClickOutside: false,
          });
        

        $('#se_1').css('display', 'none');
        $('#se_2').css('display', 'block');
        $('#se_3').css('display', 'none');
        $('#se_4').css('display', 'block');
        $('#se_5').css('display', 'none');
        $('#se_6').css('display', 'none');
        $('#FlIzq').css('visibility', 'visible');
        $('#FlDer').css('visibility', 'visible');
        $('#Email_3').css('visibility', 'hidden');
        $('#veCod').css('visibility', 'visible');
        $('.pestana').css('margin-bottom', '0vh');
        $('#Email_3').val($('#Email_2').val());
    });
    $("#submit-btn").click(function() {
        $("#submit-btn").val('CORREO ENVIADO');
    });
    
    $("#select_4").click(function() {  
        $('#se_1').css('display', 'none');
        $('#se_2').css('display', 'none');
        $('#se_3').css('display', 'block');
        $('#se_4').css('display', 'none');
        $('#se_5').css('display', 'block');
        $('#se_6').css('display', 'none');
        $('#FlIzq').css('visibility', 'visible');
        $('#FlDer').css('visibility', 'visible');
        $('.pestana').css('margin-bottom', '0vh');  
    });  
    $("#select_5").click(function() {  
        $('#se_1').css('display', 'none');
        $('#se_2').css('display', 'none');
        $('#se_3').css('display', 'none');
        $('#se_4').css('display', 'block');
        $('#se_5').css('display', 'none');
        $('#se_6').css('display', 'block');
        $('#FlIzq').css('visibility', 'visible');
        $('#FlDer').css('visibility', 'visible');
        $('.pestana').css('margin-bottom', '0vh');  
    });  
    $("#select_6").click(function() {  
        $('#se_1').css('display', 'none');
        $('#se_2').css('display', 'none');
        $('#se_3').css('display', 'none');
        $('#se_4').css('display', 'none');
        $('#se_5').css('display', 'block');
        $('#se_6').css('display', 'none');
        $('#FlIzq').css('visibility', 'visible');
        $('#FlDer').css('visibility', 'hidden');
        $('.pestana').css('margin-bottom', '25vh');

        $("input[name='FirstName']").val($("#FirstName").val());
        $("input[name='MiddleName']").val($("#MiddleName").val());
        $("input[name='LastName']").val($("#LastName").val());
        $("input[name='SecondLastName']").val($("#SecondLastName").val());
        $("input[name='Phone']").val($("#Phone").val());
        $("input[name='Institution']").val($("#Institution").val());
        $("input[name='City']").val($("#City").val());
        $("input[name='Email']").val($("#Email_2").val());

        swal({
            title: "Instrucciones",
            text: "A continuación se presenta la información que ingreso, por favor verificar y para terminar clic en enviar inscripción",
            icon: "info",
            closeOnClickOutside: false,
          });
    });  
});

function correoUno(){
    const correo = /([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})/g;
    const err_form = /(["\\<>/^'\s])/g;
    
    var email_1 = $("#Email_1").val();
    var email_2 = $("#Email_2").val();

    $("#Email_2").on('paste', function(e){
        e.preventDefault();
    })
    
    if (err_form.test(email_1) == false){
        if (correo.test(email_1) == false){
            $('#correo_no').show();
            $("#Email_2").prop('disabled', true);
            $("#Email_2").val("");
        }else{
            $('#correo_no').hide();
            $("#Email_2").prop('disabled', false);
            if (email_1 == email_2){
                $('#correo_diferente').hide();

                swal({
                    title: email_2,
                    icon: "success",
                    closeOnClickOutside: false,
                  });

                $('#se_3').css('visibility', 'visible');
                valEmail();
            }else{
                $('#se_3').css('visibility', 'hidden');
                $('#correo_diferente').show();
            }
        }
    }else{
        $('#se_3').css('visibility', 'hidden');
        $('#correo_no').show();
        $("#Email_2").prop('disabled', true);
        $("#Email_2").val("");
    }
}

function valEmail(){
    var text = "";
    var possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.?,;-_¡!¿*%&$/()[]{}|@><";

    for (var i = 0; i < 8; i++){
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    $("#veCod").val(text);

}

function codigos(){
    var cod_1 = $("#cod").val();
    var cod_2 = $("#veCod").val();

    if (cod_1 == cod_2){
        codigo = 1;
        swal({
            title: "Instrucciones",
            text: "El codigo es correcto",
            icon: "success",
            closeOnClickOutside: false,
          });
        $('#se_4').css('visibility', 'visible');
    }else{
        $('#se_4').css('visibility', 'hidden');
        codigo = 0;
    }
}

function valName_1(){
    const err_form_1 = /(["\\<*>/^'\s0-9])/g;
    var name_1 = $("#FirstName").val();
    
    if (err_form_1.test(name_1) == false){
        $('#nombre_1').hide();
        valName_full()
    }else{
        $('#nombre_1').show();
        $('#se_5').css('visibility', 'hidden');
    }
}

function valName_2(){
    const err_form_1 = /(["\\<*>/^'\s0-9])/g;
    var name_2 = $("#MiddleName").val();

    if (err_form_1.test(name_2) == false){
        $('#nombre_2').hide();
        valName_full()
    }else{
        $('#nombre_2').show();
        $('#se_5').css('visibility', 'hidden');
    }
}

function valName_3(){
    const err_form_1 = /(["\\<*>/^'\s0-9])/g;
    var name_3 = $("#LastName").val();

    if (err_form_1.test(name_3) == false){
        $('#apellido_1').hide();
        valName_full()
    }else{
        $('#apellido_1').show();
        $('#se_5').css('visibility', 'hidden');
    }
}

function valName_4(){
    const err_form_1 = /(["\\<*>/^'\s0-9])/g;
    var name_4 = $("#SecondLastName").val();

    if (err_form_1.test(name_4) == false){
        $('#apellido_2').hide();
        valName_full()
    }else{
        $('#apellido_2').show();
        $('#se_5').css('visibility', 'hidden');
    }
}

function valName_full(){
    var text = "";
    const err_form_1 = /(["\\<*>/^'\s0-9])/g;
    
    var name = $("#FirstName").val()+$("#MiddleName").val()+$("#LastName").val()+$("#SecondLastName").val();

    if ($("#FirstName").val() == ""){
        text += "Falta primer nombre \n";
        if ($("#LastName").val() == ""){
            text += "Falta primer apellido \n";
        }
    }else{
        if ($("#LastName").val() == ""){
            text += "Falta primer apellido \n";
        }else{
            text += "esta seguro que desea continuar con las siguientes condiciones: \n"
            if ($("#MiddleName").val() == ""){
                text += "Falta segundo nombre \n";
                if ($("#SecondLastName").val() == ""){
                    text += "Falta segundo apellido \n";
                    text += "su nombre es: "+$("#FirstName").val()+
                    " "+$("#LastName").val();
                }
            }else{
                if ($("#SecondLastName").val() == ""){
                    text += "Falta segundo apellido \n";
                    text += "su nombre es: "+$("#FirstName").val()+
                    " "+$("#MiddleName").val()+" "+$("#LastName").val();
                }else{
                    text += "su nombre es: "+$("#FirstName").val()+
                    " "+$("#MiddleName").val()+" "+$("#LastName").val()+" "+$("#SecondLastName").val();
                }
            }

            if (err_form_1.test(name) == false){
                swal({
                    title: "Instrucciones",
                    text: text,
                    icon: "success",
                    closeOnClickOutside: false,
                  });

                $('#se_5').css('visibility', 'visible');
            }else{
                swal({
                    title: "Instrucciones",
                    text: "Esta usando caracteres no permitidos",
                    icon: "error",
                    closeOnClickOutside: false,
                  });

                $('#se_5').css('visibility', 'hidden');
            }          
        }
    }

    
}

function valDate(){
    const err_form_1 = /(["\\<*>/^'\s0-9+-])/g;
    const err_form_2 = /(["\\<*>/^'0-9+-])/g;
    var colegio = $("#Institution").val();
    var ciudad = $("#City").val();

    var proceder = true;

    if(isNaN($("#Phone").val())){
        $('#Err_telefono').show();
        proceder =  false;
    }else{
        $('#Err_telefono').hide();
    }

    if(err_form_2.test(colegio) == false){
        $('#Err_instituto').hide();
    }else{
        $('#Err_instituto').show();
        proceder =  false;
    }

    if(err_form_1.test(ciudad) == false){
        $('#Err_ciudad').hide();
    }else{
        $('#Err_ciudad').show();
        proceder =  false;
    }

    if(colegio == ""){
        $('#Err_instituto').show();
        proceder =  false;
    }else{
        $('#Err_instituto').hide();
    }

    if(ciudad == ""){
        $('#Err_ciudad').show();
        proceder =  false;
    }else{
        $('#Err_ciudad').hide();
    }

    if (proceder == false){
        $('#se_6').css('visibility', 'hidden');
    	return false;
    }

    $('#se_6').css('visibility', 'visible');

}
