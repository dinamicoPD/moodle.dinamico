$(document).ready(function() {
    $('#mostrar-contenido').click(function() {
        
        
        var fechaChecked = $("#fechaChecked").is(':checked');
        // Obtener el archivo seleccionado
        var evento = $('input[name="flexRadioDiploma"]:checked').val();
        var ruta = 'diplomas/img/temas/'+evento+'/';
        var colegioName = $('#listadoColegios option:selected').text();
        var colegioId = $('#listadoColegios option:selected').val();
        var festivalDia = $('#fechaFestivalDia option:selected').val();
        
        const fechaActual = new Date();
        const añoActual = fechaActual.getFullYear();
        var festivalCiudad = $('#inputDepartamento option:selected').text();

        ubicacion = $("#inputDepartamento option:selected").val();
        ArrayUbicacion = ubicacion.split(",");
        festivalDepartamento = ArrayUbicacion[1];

        var nuevoTexto = evento.replace(/_/g, " ");

        var archivo = $('#archivo_csv')[0].files[0];
        var a = 0;

        var nombre = "";
        var nombreMinusculas = "";
        var palabras = "";
        var palabrasCapitalizadas = "";
        var nombreFormateado = "";
        var puesto = "";
        var nivel = "";
        var curso = "";
        var imgPuesto = "";
        var btnGenerar = 0;
             
        if (archivo) {

            Swal.fire({
                title: 'Seleccione idioma',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#82D5E8',
                cancelButtonColor: '#F7746D',
                confirmButtonText: 'Español',
                cancelButtonText: 'Inglés'
            }).then((result) => {
                if (result.isConfirmed) {
                    // -----------------------------------------------------
                    var lector = new FileReader();
                    lector.onload = function(e) {
                        var contenido = e.target.result;
                        var festivalMes = $('#fechaFestivalMes option:selected').text();
                        var lineas = contenido.split('\n');
                        $('#csvContent').empty();
                        $.each(lineas, function(index, linea) {
                            a++;
                            var datos = linea.split(';');
                            var fila = $('<section class="diplomaFS" id="diploma_'+a+'"></section>');
                            nombre = decodeURIComponent(datos[0]);
                            nombreMinusculas = nombre.toLowerCase();
                            palabras = nombreMinusculas.split(' ');
                            palabrasCapitalizadas = palabras.map(function(palabra) {
                                return palabra.charAt(0).toUpperCase() + palabra.slice(1);
                            });
                            nombreFormateado = palabrasCapitalizadas.join(' ');

                            nivel = datos[2];
                            curso = datos[3];

                            if(datos[1] === "0"){
                                imgPuesto = "";
                                puesto = "participar";
                            }

                            if(datos[1] === "1"){
                                imgPuesto = '<img src="'+ruta+'Medalla1.png" alt="">';
                                puesto = "ocupar el PRIMER PUESTO";
                            }

                            if(datos[1] === "2"){
                                imgPuesto = '<img src="'+ruta+'Medalla2.png" alt="">';
                                puesto = "ocupar el SEGUNDO PUESTO";
                            }

                            if(datos[1] === "3"){
                                imgPuesto = '<img src="'+ruta+'Medalla3.png" alt="">';
                                puesto = "ocupar el TERCER PUESTO";
                            }

                            if (fechaChecked) {
                                fechaTexto = '<blockquote class="blockquote"><p>Actividad realizada el día:</p></blockquote><figcaption class="blockquote-footer"><cite title="Source Title">'+festivalDia+' de '+festivalMes+' del año '+añoActual+' en '+festivalCiudad+' - '+festivalDepartamento+'</cite></figcaption>';
                            } else {
                                fechaTexto = '';
                            }

                            fila.append('<div class="fondo" style="background-image: url('+ruta+'Fondo.png);"><div class="diploma"><div class="escudoDinamico"><div class="bordeEscudo"><img src="diplomas/img/logo@3x.png" alt=""></div></div><div class="contenidoDiploma"><div class="logoFestival"><img src="'+ruta+'Titulo.png" alt=""><hr class="lineaDecoracion logoLinea"></div><div class="creditos"><p>'+colegioName+'<br><span>otorga</span></p></div><div class="mencion"><p>Mención De Honor<br><span>a:</span></p></div><div class="nombreEstudiantes"><p>'+nombreFormateado+'</p></div><div class="puesto"><p>del grado '+curso+', por '+puesto+'<br> en la actividad '+nuevoTexto+' del nivel '+nivel+'</p></div><div class="firmas"><div class="rector"><hr class="lineaDecoracion"><p>Rector (a)</p></div><div class="medalla">'+imgPuesto+'</div><div class="docente"><hr class="lineaDecoracion"><p>Docente de área</p></div></div></div><div class="escudoColegio"><div class="bordeEscudo"><img src="diplomas/img/colegios/'+colegioId+'.png" alt=""></div></div></div><figure class="fechaMsm">'+fechaTexto+'</figure></div>');

                            $('#csvContent').append(fila);
                        });
                        btnGenerar = Math.ceil(a / 30);
                        var btn = "";

                        for (let i = 1; i <= btnGenerar; i++) {
                            btn += '<button class="btn btn-primary" onclick="descargarContenido('+i+')">parte_'+i+'</button>';
                        }

                        $("#btnDeDescagas").html(btn);

                        $('#cantidadDiplomas').val(a);
                    };
                    
                    lector.readAsText(archivo, 'ISO-8859-1');
                    // -----------------------------------------------------
                }else{
                    // -----------------------------------------------------
                    var lector = new FileReader();
                    var festivalMes = $('#fechaFestivalMes option:selected').val();
                    lector.onload = function(e) {
                        var contenido = e.target.result;
                        var lineas = contenido.split('\n');
                        $('#csvContent').empty();
                        $.each(lineas, function(index, linea) {
                            a++;
                            var datos = linea.split(';');
                            var fila = $('<section class="diplomaFS" id="diploma_'+a+'"></section>');
                            nombre = decodeURIComponent(datos[0]);
                            nombreMinusculas = nombre.toLowerCase();
                            palabras = nombreMinusculas.split(' ');
                            palabrasCapitalizadas = palabras.map(function(palabra) {
                                return palabra.charAt(0).toUpperCase() + palabra.slice(1);
                            });
                            nombreFormateado = palabrasCapitalizadas.join(' ');

                            nivel = datos[2];
                            curso = datos[3];

                            if(datos[1] === "0"){
                                imgPuesto = "";
                                puesto = "Participants";
                            }

                            if(datos[1] === "1"){
                                imgPuesto = '<img src="'+ruta+'Medalla1.png" alt="">';
                                puesto = "First place";
                            }

                            if(datos[1] === "2"){
                                imgPuesto = '<img src="'+ruta+'Medalla2.png" alt="">';
                                puesto = "Second place";
                            }

                            if(datos[1] === "3"){
                                imgPuesto = '<img src="'+ruta+'Medalla3.png" alt="">';
                                puesto = "Third place";
                            }


                            fila.append('<div class="fondo" style="background-image: url('+ruta+'Fondo.png);"><div class="diploma"><div class="escudoDinamico"><div class="bordeEscudo"><img src="diplomas/img/logo@3x.png" alt=""></div></div><div class="contenidoDiploma"><div class="logoFestival"><img src="'+ruta+'Titulo.png" alt=""><hr class="lineaDecoracion logoLinea"></div><div class="creditos"><p>'+colegioName+'<br><span>Awards</span></p></div><div class="mencion"><p>Honorable Mention<br><span>to:</span></p></div><div class="nombreEstudiantes"><p>'+nombreFormateado+'</p></div><div class="puesto"><p>'+curso+' grade student, in recognition of his/her outstanding academic performance, excellence, and effort during the "'+nuevoTexto+'" activity, has achieved "'+puesto+'" in the "'+nivel+'" level.</p></div><div class="firmas"><div class="rector"><hr class="lineaDecoracion"><p>Principal</p></div><div class="medalla">'+imgPuesto+'</div><div class="docente"><hr class="lineaDecoracion"><p>Teacher</p></div></div></div><div class="escudoColegio"><div class="bordeEscudo"><img src="diplomas/img/colegios/'+colegioId+'.png" alt=""></div></div></div><figure class="fechaMsm"><blockquote class="blockquote"><p>Activity carried out on the day:</p></blockquote><figcaption class="blockquote-footer"><cite title="Source Title">Issued in '+festivalCiudad+' - '+festivalDepartamento+' on '+festivalMes+' the '+festivalDia+' th, '+añoActual+'</cite></figcaption></figure></div>');

                            $('#csvContent').append(fila);
                        });
                        btnGenerar = Math.ceil(a / 30);
                        var btn = "";

                        for (let i = 1; i <= btnGenerar; i++) {
                            btn += '<button class="btn btn-primary" onclick="descargarContenido('+i+')">parte_'+i+'</button>';
                        }

                        $("#btnDeDescagas").html(btn);

                        $('#cantidadDiplomas').val(a);
                    };
                    
                    lector.readAsText(archivo, 'ISO-8859-1');
                    // -----------------------------------------------------
                }
            });
        } else {
            alert('Por favor, seleccione un archivo CSV.');
        }


    });

    $("#aumentar").click(function() {
        var fontSize = parseInt($(".creditos p").css("font-size"));
        $(".creditos p").css("font-size", fontSize + 2);
        $("#letraColegio").html(fontSize + 2);
    });

    $("#disminuir").click(function() {
        var fontSize = parseInt($(".creditos p").css("font-size"));
        $(".creditos p").css("font-size", fontSize - 2);
        $("#letraColegio").html(fontSize - 2);
    });

    $("#aumentarLogo").click(function() {
        var fontSize = parseInt($(".medalla img").css("width"));
        $(".medalla img").css("width", fontSize + 1);
        $("#LogoColegio").html(fontSize + 2);
    });

    $("#disminuirLogo").click(function() {
        var fontSize = parseInt($(".medalla img").css("width"));
        $(".medalla img").css("width", fontSize - 1);
        $("#LogoColegio").html(fontSize - 2);
    });

});

function descargarContenido(btnGenerar){

    if ($('#cantidadDiplomas').val() != '') {
        totalDivs = Number($('#cantidadDiplomas').val());
        var incio =((btnGenerar * 30)-30)+1;
        var final = (incio + 30)-1;
        if (final >= totalDivs){
            final = totalDivs;
        }else{
            final = final;
        }
        descargarDiplomas(incio, final);
    } else {
        alert("Debe generarlos antes de descargar dando clic en ver");
    }
}

function descargarDiplomas(i, totalDivs) {
    var zip = new JSZip();
    var promises = [];
    var nombreColegio = $("#listadoColegios").find('option:selected').text();

    function canvasToBase64(canvas) {
        return new Promise((resolve) => {
            canvas.toBlob((blob) => {
                const reader = new FileReader();
                reader.onload = () => resolve(reader.result.split(',')[1]);
                reader.readAsDataURL(blob);
            });
        });
    }

    for (let j = i; j <= totalDivs; j++) {
        var objetivo = document.querySelector('#diploma_' + j);
        var promise = html2canvas(objetivo, { pixelRatio: 3 }).then(function(canvas) {
            return canvasToBase64(canvas).then((base64Data) => {
                zip.file('diploma_' + j + '.png', base64Data, { base64: true });
            });
        });
        promises.push(promise);
    }

    Promise.all(promises)
    .then(function() {
        zip.generateAsync({ type: 'blob' })
        .then(function(content) {
            saveAs(content, nombreColegio+'_parte_'+i+'_'+totalDivs+'.zip');
        });
        Swal.fire({
            title: "Buen trabajo!",
            text: "Los diplomas del "+i+" al " +totalDivs+ " han sido descargados en un archivo .zip",
            icon: "success"
        });
    })
    .catch(function(error) {
        Swal.fire({
            title: "Error!",
            text: "Error al descargar los diplomas: " +error,
            icon: "error"
        });
    });
}

function verColegios(){
    ubicacion = $("#inputDepartamento").val();
    ArrayUbicacion = ubicacion.split(",");
    seleccion = ArrayUbicacion[0];

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

function verColegiosLogo(){
    var idColegio = $('#listadoColegios').val();
    var imagen = "<img class='rounded mx-auto d-block' src='diplomas/img/colegios/"+idColegio+".png' alt=''>";
    $('#imagenLogo').html(imagen);
}

function vistaPrevia(){
    var evento = $('input[name="flexRadioDiploma"]:checked').val();
    var ruta = 'diplomas/img/temas/'+evento+'/';
    var colegioName = $('#listadoColegios option:selected').text();
    var colegioId = $('#listadoColegios option:selected').val();

    var festivalDia = $('#fechaFestivalDia option:selected').val();
        var festivalMes = $('#fechaFestivalMes option:selected').val();
        const fechaActual = new Date();
        const añoActual = fechaActual.getFullYear();
        var festivalCiudad = $('#inputDepartamento option:selected').text();

        ubicacion = $("#inputDepartamento option:selected").val();
        ArrayUbicacion = ubicacion.split(",");
        festivalDepartamento = ArrayUbicacion[1];

    var nuevoTexto = evento.replace(/_/g, " ");

    var htmlDiploma ='<div class="fondo" style="background-image: url('+ruta+'Fondo.png);"><div class="diploma"><div class="escudoDinamico"><div class="bordeEscudo"><img src="diplomas/img/logo@3x.png" alt=""></div></div><div class="contenidoDiploma"><div class="logoFestival"><img src="'+ruta+'Titulo.png" alt=""><hr class="lineaDecoracion logoLinea"></div><div class="creditos"><p>'+colegioName+'<br> <span>otorga</span></p></div><div class="mencion"><p>Mención De Honor<br><span>a:</span></p></div><div class="nombreEstudiantes"><p>Lorem Ipsum Dolor Sit</p></div><div class="puesto"><p>del grado 101, por ocupar el PRIMER PUESTO <br> en la actividad '+nuevoTexto+' del nivel A</p></div><div class="firmas"><div class="rector"><hr class="lineaDecoracion"><p>Rector (a)</p></div><div class="medalla"><img src="'+ruta+'Medalla1.png" alt=""></div><div class="docente"><hr class="lineaDecoracion"><p>Docente de área</p></div></div></div><div class="escudoColegio"><div class="bordeEscudo"><img src="diplomas/img/colegios/'+colegioId+'.png" alt=""></div></div></div><figure class="fechaMsm"><blockquote class="blockquote"><p>Actividad realizada el día:</p></blockquote><figcaption class="blockquote-footer"><cite title="Source Title">'+festivalDia+' de '+festivalMes+' del año '+añoActual+' en '+festivalCiudad+' - '+festivalDepartamento+'</cite></figcaption></figure></div>';

    $('#diploma_vistaprevia').html(htmlDiploma);
}