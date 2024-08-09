function nombreFull(nombreInput) {
    var input = $(nombreInput);
    var name_1 = input.val().trim();
    const err_form_1 = /[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g;
    
    if (name_1 !== "") {
        if (!err_form_1.test(name_1)) {
            input.addClass("inputValido");
            input.removeClass("inputIncorrecto");
            var textoFormateado = name_1.toLowerCase().replace(/\b\w/g, function(letra) {
                return letra.toUpperCase();
            });
            input.val(textoFormateado);
        } else {
            var textoLimpio = name_1.replace(err_form_1, '');
            input.val(textoLimpio);
            nombreFull(nombreInput);
        }
    } else {
        input.removeClass("inputValido");
        input.addClass("inputIncorrecto");
        input.val("");
    }
}

function numeroFull(nombreInput) {
    var input = $(nombreInput);
    var numero = input.val().trim();
    const expTel = /^\d{1,15}$/;
    
        if (expTel.test(numero)) {
            $(nombreInput).addClass("inputValido").removeClass("inputIncorrecto");
        } else {
            $(nombreInput).removeClass("inputValido").addClass("inputIncorrecto");
            input.val(0);
        }
}