$(document).ready(function() {
    $('#mostrar-contenido').click(function() {
        // Obtener el archivo seleccionado
        var evento = $('input[name="flexRadioDiploma"]:checked').val();
        var ruta = 'diplomas/img/temas/'+evento+'/';
        var colegioName = $('#listadoColegios option:selected').text();
        var colegioId = $('#listadoColegios option:selected').val();

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
            var lector = new FileReader();

            // Cuando se cargue el archivo
            lector.onload = function(e) {
                var contenido = e.target.result;
                
                // Dividir el contenido por saltos de línea
                var lineas = contenido.split('\n');
                
                // Limpiar el contenido anterior de la tabla
                $('#csvContent').empty();
                
                // Recorrer cada línea y agregar a la tabla como fila
                $.each(lineas, function(index, linea) {
                    a++;
                    // Dividir la línea por comas para obtener los datos
                    var datos = linea.split(',');
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

                    //fila.append(datos[0] + datos[1] + datos[2]);
                    fila.append('<div class="fondo" style="background-image: url('+ruta+'Fondo.png);"><div class="diploma"><div class="escudoDinamico"><div class="bordeEscudo"><img src="diplomas/img/logo@3x.png" alt=""></div></div><div class="contenidoDiploma"><div class="logoFestival"><img src="'+ruta+'Titulo.png" alt=""><hr class="lineaDecoracion logoLinea"></div><div class="creditos"><p>'+colegioName+'<br><span>otorga</span></p></div><div class="mencion"><p>Mención De Honor<br><span>a:</span></p></div><div class="nombreEstudiantes"><p>'+nombreFormateado+'</p></div><div class="puesto"><p>Del grado '+curso+', por '+puesto+'<br> en la actividad '+nuevoTexto+' del nivel '+nivel+'</p></div><div class="firmas"><div class="rector"><hr class="lineaDecoracion"><p>Rector (a)</p></div><div class="medalla">'+imgPuesto+'</div><div class="docente"><hr class="lineaDecoracion"><p>Docente de área</p></div></div></div><div class="escudoColegio"><div class="bordeEscudo"><img src="diplomas/img/colegios/'+colegioId+'.png" alt=""></div></div></div></div>');

                    $('#csvContent').append(fila);
                });
                btnGenerar = Math.ceil(a / 30);
                console.log(btnGenerar);
                var btn = "";

                for (let i = 1; i <= btnGenerar; i++) {
                    btn += '<button class="btn btn-primary" onclick="descargarContenido('+i+')">parte_'+i+'</button>';
                }

                $("#btnDeDescagas").html(btn);

                $('#cantidadDiplomas').val(a);
            };
            
            // Leer el archivo como texto
            lector.readAsText(archivo);
        } else {
            alert('Por favor, seleccione un archivo CSV.');
        }
    });

    $("#aumentar").click(function() {
        var fontSize = parseInt($(".creditos p").css("font-size"));
        $(".creditos p").css("font-size", fontSize + 2);
    });

    $("#disminuir").click(function() {
        var fontSize = parseInt($(".creditos p").css("font-size"));
        $(".creditos p").css("font-size", fontSize - 2);
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

    var nuevoTexto = evento.replace(/_/g, " ");

    var htmlDiploma ='<div class="fondo" style="background-image: url('+ruta+'Fondo.png);"><div class="diploma"><div class="escudoDinamico"><div class="bordeEscudo"><img src="diplomas/img/logo@3x.png" alt=""></div></div><div class="contenidoDiploma"><div class="logoFestival"><img src="'+ruta+'Titulo.png" alt=""><hr class="lineaDecoracion logoLinea"></div><div class="creditos"><p>'+colegioName+'<br> <span>otorga</span></p></div><div class="mencion"><p>Mención De Honor<br><span>a:</span></p></div><div class="nombreEstudiantes"><p>Lorem Ipsum Dolor Sit</p></div><div class="puesto"><p>Del grado 101, por ocupar el PRIMER PUESTO <br> en la actividad '+nuevoTexto+' del nivel A</p></div><div class="firmas"><div class="rector"><hr class="lineaDecoracion"><p>Rector (a)</p></div><div class="medalla"><img src="'+ruta+'Medalla1.png" alt=""></div><div class="docente"><hr class="lineaDecoracion"><p>Docente de área</p></div></div></div><div class="escudoColegio"><div class="bordeEscudo"><img src="diplomas/img/colegios/'+colegioId+'.png" alt=""></div></div></div></div>';

    $('#diploma_vistaprevia').html(htmlDiploma);
}

