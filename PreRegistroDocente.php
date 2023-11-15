<?php
    require_once('iconos.php');
    require_once(dirname(__FILE__).'/cargar_departamentos.php');
    require_once(dirname(__FILE__).'/cargar_Asesores.php');
    require_once(dirname(__FILE__).'/cargar_edicion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro docente | Dinámico Pedagog&iacute;a y Diseño</title>
    <link rel="icon" href="img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">

    <link rel="stylesheet" href="css/styleFormPRF.css">

    <style>
        .modal_carga {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            
            background: rgba(11,119,153,1)
                        url('img/FhHRx.gif') 
                        50% 50% 
                        no-repeat;
        }
        body.loading .modal_carga {
            overflow: hidden;   
        }
        body.loading .modal_carga {
            display: block;
        }
    </style>
</head>
<body class="fondoCielo" id="contenedor">

    <img id="inicioMico" src="img/fomrLarge/micoVolador@3x.png" alt="">
    <form method="post" class="formulario" id="formulario" action="inscripcionDocente.php">
        <!-- Titulo -->
        <div class="titulo">
            <img src="img/fomrLarge/avion@3x.png" alt="">
            <img id="helice" src="img/fomrLarge/helice@3x.png" alt="">
        </div>
        <div class="espacio"></div>
        <!-- Correo -->
        <div class="ContenidoX2"  id="inicioMicoContenedor">

            <div class="contenidoIZ"></div>

            <div class="contenidoDE nube5_3">
                <div class="row">
                    <div class="col-sm-12 margenInput">
                        <label for="E-mail" class="form-label formLabel labelcentrado">E-mail*</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $arroba ?></span>
                            <input name="email" autocomplete="off" type="email" class="form-control formInput" id="E-mail" aria-describedby="inputGroupPrepend3 E-mailFeedback" placeholder="Introduce tu correo electrónico" required>
                            <div id="E-mailFeedback" class="invalid-feedback mal">
                                <?php echo $alerta ?> Ingresa una dirección de correo electrónico válida.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 margenInput">
                        <label for="E-mail-2" class="form-label formLabel labelcentrado">Confirmar E-mail*</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $arroba ?></span>
                            <input type="email" autocomplete="off" class="form-control formInput" id="E-mail-2" aria-describedby="inputGroupPrepend3 E-mail-2Feedback" placeholder="Introduce nuevamente tu correo electrónico" required>
                            <div class="invalid-feedback mal">
                                <?php echo $alerta ?> Las direcciones de correo son diferentes.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="obligatorio">&nbsp; &nbsp; * Campo obligatorio.</p>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button id="btnCorreo" class="btnNext" type="button" onclick="codigoDiv()">Enviar código</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="espacio"></div>
        <!-- codigo -->
        <div class="ContenidoX2" id="codigo">
            <div class="contenidoIZ nube2">
                <div class="row margenInput">
                    <div class="col">
                        <label for="codigoEmail" class="form-label formLabel labelSangria">Código de <br> verificación*</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $check ?></span>
                            <input type="number" autocomplete="off" class="form-control formInput" id="codigoEmail" aria-describedby="inputGroupPrepend3 codigoEmailFeedback" placeholder="Código" required>
                            <div class="invalid-feedback mal">
                                <?php echo $alerta ?> Código incorrecto.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mal" id="respa"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="obligatorio">* Campo obligatorio.</p>
                    </div>
                    <div class="col">
                        <button class="btnNext" type="button" onclick="codigos()">Continuar</button>
                    </div>
                </div>
            </div>
            <div class="contenidoDE centrarElementos">
                <div class="letreroInstruccion">
                    <p>Introduce el código de verificación que se envió a tu correo electrónico. Si no has recibido este mensaje, recuerda darle un vistazo a la <strong>bandeja de spam de tu e-mail.</strong></p>
                </div>
            </div>
        </div>
        <div class="espacio"></div>
        <!-- datos docente -->
        <div id="datos">
            <div class="datosDocenteTitulo">
                <img src="img/fomrLarge/datosDocente.png" alt="">
            </div>
            <div class="ContenidoX2">
                <div class="contenidoIZ nube3_4">
                    <div class="row">
                        <div class="col-sm-12 margenInput">
                            <label for="nombre-1" class="form-label formLabel">Primer nombre*</label>
                            <div class="input-group has-validation">
                                <input name="FirstName" autocomplete="off" type="text" class="form-control formInput" id="FirstName" aria-describedby="inputGroupPrepend3 nombre-1Feedback" placeholder="Nombre" onkeyup="this.value = this.value.toUpperCase();" required>
                                <div id="nombre-1Feedback" class="invalid-feedback mal">
                                    <?php echo $alerta ?> Por favor ingresa tu nombre.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 margenInput">
                            <label for="nombre-2" class="form-label formLabel">Segundo nombre</label>
                            <div class="input-group has-validation">
                                <input name="MiddleName" autocomplete="off" type="text" class="form-control formInput" id="MiddleName" aria-describedby="inputGroupPrepend3 nombre-2Feedback" onkeyup="this.value = this.value.toUpperCase();" placeholder="Nombre">
                                <div id="nombre-2Feedback" class="invalid-feedback mal">
                                    <?php echo $alerta ?> Por favor ingresa tu nombre.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="obligatorio">&nbsp; &nbsp; * Campo obligatorio.</p>
                        </div>
                    </div>
                </div>
                <div class="contenidoDE nube3_4">
                    <div class="row">
                        <div class="col-sm-12 margenInput">
                            <label for="apellido-1" class="form-label formLabel">Primer apellido*</label>
                            <div class="input-group has-validation">
                                <input name="LastName" autocomplete="off" type="text" class="form-control formInput" id="LastName" aria-describedby="inputGroupPrepend3 apellido-1Feedback" placeholder="Apellido" onkeyup="this.value = this.value.toUpperCase();" required>
                                <div id="apellido-1Feedback" class="invalid-feedback mal">
                                    <?php echo $alerta ?> Por favor ingresa tu apellido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 margenInput">
                            <label for="apellido-2" class="form-label formLabel">Segundo apellido</label>
                            <div class="input-group has-validation">
                                <input name="SecondLastName" autocomplete="off" type="text" class="form-control formInput" id="SecondLastName" aria-describedby="inputGroupPrepend3 apellido-2Feedback" placeholder="Apellido" onkeyup="this.value = this.value.toUpperCase();">
                                <div id="apellido-2Feedback" class="invalid-feedback mal">
                                    <?php echo $alerta ?> Por favor ingresa tu apellido.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button id="btnName" class="btnNext" type="button" onclick="telefono()">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="espacio"></div>
        <!-- telefono -->
        <div id="telefono">
            <div class="ContenidoX2">
                <div class="contenidoIZ nube2">
                    <div class="row">
                        <div class="col margenInput">
                            <label for="Tel" class="form-label formLabel labelSangria">Número de <br> Teléfono*</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $telefono ?></span>
                                <input name="Tel" type="number" autocomplete="off" class="form-control formInput" id="Tel" aria-describedby="inputGroupPrepend3 TelFeedback" placeholder="Número telefónico" required>
                                <div class="invalid-feedback mal">
                                    <?php echo $alerta ?> Ingresa tu número telefónico.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="obligatorio">* Campo obligatorio.</p>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <button class="btnNext" type="button" id="btnTel" onclick="institucion()">Continuar</button>
                        </div>
                    </div>
                </div>
                <div class="contenidoDE">
                    <div class="telefonoImg">
                        <img id="telefonoP6" src="img/fomrLarge/telefono_2@3x.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="espacio"></div>
        <!-- Instituto -->
        <div id="institucion">
            <div class="datosInstituto">
                <img src="img/fomrLarge/datosInstitucion@3x.png" alt="">
            </div>
            <div id="add">
                <div id="add_1">
                    <div class="ContenidoX2">
                        <div class="contenidoIZ nube3_4">
                            <div class="row">
                                <div class="col margenInput">
                                    <label for="departamento" class="form-label formLabel">Departamento*</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $ubicacion ?></span>
                                        <select name="departamento_1" class="form-select formInput" id="departamento_1" aria-describedby="departamentoFeedback" onchange="datosInstituto('#departamento', 1)" required>
                                            <option selected disabled value="">Seleccionar</option>
                                            <?php echo $departamentoFull; ?>
                                        </select>
                                        <div id="departamentoFeedback" class="invalid-feedback mal">
                                            <?php echo $alerta ?> Selecciona el departamento.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col margenInput">
                                    <label for="Instituto" class="form-label formLabel">Institución*</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $instituto ?></span>
                                        <select name="instituto_1" class="form-select formInput escuela" id="Instituto_1" aria-describedby="InstitutoFeedback" onchange="datosCursos(1)" required>
                                            <option selected disabled value="">Seleccionar</option>
                                        </select>
                                        <div id="InstitutoFeedback" class="invalid-feedback mal">
                                            <?php echo $alerta ?> Selecciona la institución.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="contenidoDE nube3_3">
                            <div class="row">
                                <div class="col margenInput">
                                    <label for="ciudad" class="form-label formLabel">Ciudad*</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $ubicacion ?></span>
                                        <select name="ciudad_1" class="form-select formInput" id="ciudad_1" aria-describedby="ciudadaFeedback" onchange="datosInstituto('#ciudad', 1)" required>
                                            <option selected disabled value="">Seleccionar</option>
                                        </select>
                                        <div id="ciudadFeedback" class="invalid-feedback mal">
                                            <?php echo $alerta ?> Selecciona la ciudad.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col margenInput">
                                    <label for="otro" class="form-label formLabel">&nbsp;</label>
                                    <input name="otro_1" autocomplete="off" style="visibility: hidden" type="text" class="form-control formInput" id="otro_1" aria-describedby="otroFeedback" oninput="datosCursos(1)" placeholder="Otra:" onkeyup="this.value = this.value.toUpperCase();">
                                    <div id="otroFeedback" class="invalid-feedback mal">
                                        <?php echo $alerta ?> Por favor ingresa el nombre de la institución.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="letreroInstruccion centrarInstruccion">
                <p>Da click en el botón <button class="btnNext" type="button" id="addInstituto"><?php echo $cruz ?></button>&nbsp;para añadir una nueva institución.</p>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="obligatorio">* Campo obligatorio.</p>
                    </div>
                    <div class="col margenInput">
                        <button id="btnInstituto" class="btnNext" type="button" onclick="Asesor()" style="float: right">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="espacio"></div>
        <!-- asesor -->
        <div id="asesor">
            <br>
            <div class="letreroInstruccion centrarInstruccion">
                <p>Selecciona el código de tu asesor de venta del material educativo.</p>
            </div>
            <br>
            <div class="ContenidoX2">
                <div class="contenidoIZ nube3">
                    <div class="row">
                        <div class="col margenInput">
                            <label for="asesorSelect" class="form-label formLabel">Asesor</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $iconoasesor ?></span>
                                <select name="asesor" class="form-select  formInput" id="asesorSelect" aria-describedby="asesorFeedback" required>
                                    <option selected disabled value="">Seleccionar</option>
                                    <option value="0">No tengo</option>
                                    <?php echo $asesoresFull ?>
                                </select>
                                <div id="asesorFeedback" class="invalid-feedback mal">
                                    <?php echo $alerta ?> Selecciona el código del asesor.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-start">
                            <button id="btnCursosVin" class="btnNext" type="button" onclick="cursosVin()">Continuar</button>
                        </div>
                    </div>
                </div>
                <div class="contenidoDE">
                    <div class="AsesorImg">
                        <img src="img/fomrLarge/asesor@3x.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="espacio"></div>
        <!-- cursos vinculados -->
        <div id="cursosVinculados">
            <div class="ContenidoX2">
                <div class="contenidoIZ">
                    <div id="cursosImg" class="AsesorImg">
                        <img src="img/fomrLarge/cursosVinculados@3x.png" alt="">
                    </div>
                </div>
                <div class="contenidoDE letreroCursos centrarElementos">
                    <div class="centrarInstruccion" style="padding: 0vw 2vw">
                        <p>Selecciona los cursos en los que orientas e indica su sigla. <strong>Ejemplo:</strong> Si orientas en el grado sexto A escribe “601”, si orientas en el grado décimo B, escribe “1002”.</p>
                        <button id="btnDown" class="btnNext" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <div id="cursosAdd">
                <div class="ContenidoX2"  id="cursosAdd_1">

                    <div class="contenidoIZ nube3_4">

                        <div class="row">
                            <div class="col margenInput">
                                <label for="colegio" class="form-label formLabel">Institución*</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $instituto ?></span>
                                    <select name="colegio_1" class="form-select  formInput" id="colegio_1" aria-describedby="colegioFeedback" onchange="edicionEdicion('#colegio_',1)" required>
                                        <option selected disabled value="">Seleccionar</option>
                                    </select>
                                    <div id="colegioFeedback" class="invalid-feedback mal">
                                        <?php echo $alerta ?> Selecciona la institución.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col margenInput">
                                <label for="curso" class="form-label formLabel">Curso*</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $curso ?></span>
                                    <select name="curso_1" class="form-select formInput" id="curso_1" aria-describedby="cursoFeedback" required onchange="edicionEdicion('#curso_', 1)">
                                        <option selected disabled value="">Seleccionar</option>
                                        <option>...</option>
                                    </select>
                                    <div id="cursoFeedback" class="invalid-feedback mal">
                                        <?php echo $alerta ?> Selecciona la sigla.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="obligatorio">* Campo obligatorio.</p>
                            </div>
                        </div>

                    </div>

                    <div class="contenidoDE nube3_4">

                        <div class="row">
                            <div class="col margenInput">
                                <label for="edicion" class="form-label formLabel">Edición*</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $edicionIco ?></span>
                                    <select name="edicion_1" class="form-select  formInput" id="edicion_1" aria-describedby="edicionFeedback" onchange="edicionEdicion('#edicion_', 1)" required>
                                        <option selected disabled value="">Seleccionar</option>
                                        <?php echo $edicionFull; ?>
                                    </select>
                                    <div id="edicionFeedback" class="invalid-feedback mal">
                                        <?php echo $alerta ?> Selecciona la edición.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col margenInput">
                                <label for="sigla" class="form-label formLabel">Sigla*</label>
                                <input name="sigla_1" autocomplete="off" type="number" class="form-control  formInput" id="sigla_1" aria-describedby="siglaFeedback" placeholder="Ej: 801" oninput="edicionSigla(1)">
                                <div id="siglaFeedback" class="invalid-feedback mal">
                                    <?php echo $alerta ?> Por favor ingresa la sigla del grupo.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="letreroInstruccion centrarInstruccion">
                <p>Da click en el botón <button class="btnNext" type="button" id="addFullCurso"><?php echo $cruz ?></button>&nbsp;para añadir una nueva institución.</p>
            </div>
            <br>
            <div class="row">       
                <div class="col" style="text-align: center;">
                    <input id="enviarTerminar" type="submit" class="btnNext" style="padding: 0 2vw;" value="Enviar inscripción">
                </div>
            </div>
            <div class="espacio"></div>
        </div>

        

    </form>

<div class="modal fade fondoCielo" id="respuestaForm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="respuestaFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content modalIsa">
        <!-- mensaje para enviar -->
            <div class="modal-body">

                <div class="row">
                    <div id="avisoMonito" class="col-4 centrarElementos"></div>
                    <div class="col-8">
                        <div id="modalIcoIsa" class="modalIcoIsa"></div>
                        <div id="tituloIsa" class="tituloIsa">
                            <br>
                            <p id="tituloModalIsa"></p>
                        </div>
                        <div class="mensajeIsa">
                            <br>
                            <p id="msmVerificaEmail"></p>
                        </div>
                        <div class="modalFooterIsa" id="modal-footer"></div>
                    </div>
                </div>

            </div>
        </div>
        <!-- fin mensaje para enviar -->
    </div>
</div>

<div class="fondo"></div>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="js/registro.js"></script>
<script>

    $(document).mousemove(function(event) {

        var divTop = $('#inicioMicoContenedor').offset().top;
        var scrollPos = $(window).scrollTop();
        var particle = $('#inicioMico');
        var proceso = true;
            
        if (scrollPos < divTop) {
            proceso = false;
        }

        var mouseX = event.pageX;
        var mouseY = event.pageY;
        
        if(proceso === true){

            particle.css({
                transform: 'translate(' + mouseX + 'px, ' + mouseY + 'px)'
            });

        }else{

            particle.css({
                transform: 'translate(10vw, 30vw)'
            });
            
        }

    });

</script>
<script>
var contenedor = $(".fondoCielo");

var elemento = $("<img>").attr("src", "img/fomrLarge/nube.png").addClass("rellax nube");

var elemento1 = $("<img>").attr("src", "img/fomrLarge/paloma1@3x.png").addClass("rellax cososCielo");

var elemento2 = $("<img>").attr("src", "img/fomrLarge/paloma2@3x.png").addClass("rellax cososCielo");

var elemento3 = $("<img>").attr("src", "img/fomrLarge/paloma3@3x.png").addClass("rellax cososCielo");

var elemento4 = $("<img>").attr("src", "img/fomrLarge/globo@3x.png").addClass("rellax cososCielo");

var repeticiones = 100;
for (var i = 0; i < repeticiones; i++) {
  var speed = Math.floor(Math.random() * 9) + 1;
  var posicionX = Math.floor(Math.random() * 90) + 1;
  var posicionY = i;  
  var proceder = true;

  if (i % 25 === 0) {
    ubicarElemento(speed, elemento4, posicionX, posicionY, contenedor, 0);
    proceder = false;
  }
  if (i % 20 === 0) {
    if (proceder === true) {
      ubicarElemento(speed, elemento3, posicionX, posicionY, contenedor, 0);
    }
    proceder = false;
  }
  if (i % 10 === 0) {
    if (proceder === true) {
      ubicarElemento(speed, elemento2, posicionX, posicionY, contenedor, 0);
    }
    proceder = false;
  }
  if (i % 5 === 0) {
    if (proceder === true) {
      ubicarElemento(speed, elemento1, posicionX, posicionY, contenedor, 2);
    }
    proceder = false;
  }
  if (i % 1 === 0) {
    if (proceder === true) {
      ubicarElemento(speed, elemento, posicionX, posicionY, contenedor, 3);
    }
  }
}

function ubicarElemento(speed, elemento, posicionX, posicionY, contenedor, aumento) {
  var sizeNube = speed + aumento;
  elemento.css("width", sizeNube + "vw");
  elemento.attr("data-rellax-speed", speed.toString());
  var elementoCopia = elemento.clone();
  elementoCopia.css("left", posicionX + "%");
  elementoCopia.css("top", posicionY + "%");
  contenedor.append(elementoCopia);
}
</script>

<script src="js/rellax.min.js"></script>

<script>
    var rellax = new Rellax('.rellax');
</script>

</body>
<div class="modal_carga"></div>
</html>