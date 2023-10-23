<?php
    require_once('iconos.php');
    require_once(dirname(__FILE__).'/cargar_departamentos.php');
    require_once(dirname(__FILE__).'/cargar_Asesores.php');
    require_once(dirname(__FILE__).'/cargar_edicion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Dinámico Pedagogia y Diseño</title>
    <link rel="icon" href="img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <link rel="stylesheet" href="css/formInscripcion.css" type="text/css">
    <link rel="stylesheet" href="css/styleParticulas.css">
    <link rel="stylesheet" href="css/formInscripcion_docentes.css">
    <style>
        .modal_carga {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: #E9D7FF 
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
<body>
<div id="particles-js"></div>
<!--   -->
<div class="contenedor">
    <form method="post" class="formulario" id="formulario" action="inscripcionDocente.php">

        <div class="titulo">
            <?php echo $profeInicio ?>
        </div>
        <div class="correo">
            <div class="formContenedor">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="E-mail" class="form-label formLabel">E-mail*</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $arroba ?></span>
                            <input name="email" type="email" class="form-control formInput" id="E-mail" aria-describedby="inputGroupPrepend3 E-mailFeedback" placeholder="Introduce tu correo electrónico" required>
                            <div id="E-mailFeedback" class="invalid-feedback mal">
                                <?php echo $alerta ?> Ingresa una dirección de correo electrónico válida.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="E-mail-2" class="form-label formLabel">Confirmar E-mail*</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $arroba ?></span>
                            <input type="email" class="form-control formInput" id="E-mail-2" aria-describedby="inputGroupPrepend3 E-mail-2Feedback" placeholder="Introduce nuevamente tu correo electrónico" required>
                            <div class="invalid-feedback mal">
                                <?php echo $alerta ?> Las direcciones de correo son diferentes.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="obligatorio">* Campo obligatorio.</p>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button id="btnCorreo" class="btnNext" type="button" onclick="codigoDiv()">Enviar verificación</button>
                    </div>
                </div>
            </div>
        </div>
        <div  id="codigo">
            <div class="formContenedor">
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="codigoEmail" class="form-label formLabel">Código de verificación*</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $check ?></span>
                            <input type="number" class="form-control formInput" id="codigoEmail" aria-describedby="inputGroupPrepend3 codigoEmailFeedback" placeholder="Código" required>
                            <div class="invalid-feedback mal">
                                <?php echo $alerta ?> Código incorrecto.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center">
                        <p class="txtInstruccion">Introduce el código de verificación que se envió a tu correo electrónico. Si no has recibido este mensaje, recuerda darle un vistazo a la bandeja de spam de tu e-mail.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mal" id="respa"></div>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="obligatorio">* Campo obligatorio.</p>
                    </div>
                    <div class="col-sm-3 d-flex justify-content-end">
                        <button class="btnNext" type="button" onclick="codigos()">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="datos">
            <div class="formContenedor">
                <div class="row">
                    <div class="col-sm-6"><p class="txtTituloSeccion">Datos del docente</p></div>
                    <div class="col-sm-6 texturaXO"><?php echo $textura ?></div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nombre-1" class="form-label formLabel">Primer nombre*</label>
                        <div class="input-group has-validation">
                            <input name="FirstName" type="text" class="form-control formInput" id="FirstName" aria-describedby="inputGroupPrepend3 nombre-1Feedback" placeholder="Nombre" onkeyup="this.value = this.value.toUpperCase();" required>
                            <div id="nombre-1Feedback" class="invalid-feedback mal">
                                <?php echo $alerta ?> Por favor ingresa tu nombre.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="nombre-2" class="form-label formLabel">Segundo nombre</label>
                        <div class="input-group has-validation">
                            <input name="MiddleName" type="text" class="form-control formInput" id="MiddleName" aria-describedby="inputGroupPrepend3 nombre-2Feedback" onkeyup="this.value = this.value.toUpperCase();" placeholder="Nombre">
                            <div id="nombre-2Feedback" class="invalid-feedback mal">
                                <?php echo $alerta ?> Por favor ingresa tu nombre.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="apellido-1" class="form-label formLabel">Primer apellido*</label>
                        <div class="input-group has-validation">
                            <input name="LastName" type="text" class="form-control formInput" id="LastName" aria-describedby="inputGroupPrepend3 apellido-1Feedback" placeholder="Apellido" onkeyup="this.value = this.value.toUpperCase();" required>
                            <div id="apellido-1Feedback" class="invalid-feedback mal">
                                <?php echo $alerta ?> Por favor ingresa tu apellido.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="apellido-2" class="form-label formLabel">Segundo apellido</label>
                        <div class="input-group has-validation">
                            <input name="SecondLastName" type="text" class="form-control formInput" id="SecondLastName" aria-describedby="inputGroupPrepend3 apellido-2Feedback" placeholder="Apellido" onkeyup="this.value = this.value.toUpperCase();">
                            <div id="apellido-2Feedback" class="invalid-feedback mal">
                                <?php echo $alerta ?> Por favor ingresa tu apellido.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="obligatorio">* Campo obligatorio.</p>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button id="btnName" class="btnNext" type="button" onclick="telefono()">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="telefono">
            <div class="formContenedor">
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="Tel" class="form-label formLabel">Teléfono*</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text formIco" id="inputGroupPrepend3"><?php echo $telefono ?></span>
                                    <input name="Tel" type="number" class="form-control formInput" id="Tel" aria-describedby="inputGroupPrepend3 TelFeedback" placeholder="Número telefónico" required>
                                    <div class="invalid-feedback mal">
                                        <?php echo $alerta ?> Ingresa tu número telefónico.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="espacio"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="obligatorio">* Campo obligatorio.</p>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button class="btnNext" type="button" id="btnTel" onclick="institucion()">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-sm d-flex align-items-center telImg">
                        <?php echo $llamadas ?>
                    </div>
                </div>                
            </div>
        </div>
        <div id="institucion">
            <div class="formContenedor">
                <div class="row">
                    <div class="col-sm-6"><p class="txtTituloSeccion">Datos de la institución<p></div>
                    <div class="col-sm-6 texturaXO"><?php echo $textura ?></div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="txtInstruccion2">Da click en el botón <button class="btnNext" type="button"><?php echo $cruz ?></button>&nbsp;para añadir una nueva institución.</p>
                    </div>
                </div>
                <div class="espacio"></div>
                <!-- instituto -->
                <div id="add">
                    <div id="add_1">
                        <div class="row">
                            <div class="col-sm-6">
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
                            <div class="col-sm-6">
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
                        <div class="espacio"></div>
                        <div class="row">
                            <div class="col-sm-6">
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
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <label for="otro" class="form-label formLabel">&nbsp;</label>
                                        <input name="otro_1" style="visibility: hidden" type="text" class="form-control formInput" id="otro_1" aria-describedby="otroFeedback" oninput="datosCursos(1)" placeholder="Otra:" onkeyup="this.value = this.value.toUpperCase();">
                                        <div id="otroFeedback" class="invalid-feedback mal">
                                            <?php echo $alerta ?> Por favor ingresa el nombre de la institución.
                                        </div>
                                    </div>
                                    <div class="col-sm-2 align-self-end">
                                        <button class="btnNext" type="button" id="addInstituto"><?php echo $cruz ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- fin instituto -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="espacio"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="obligatorio">* Campo obligatorio.</p>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <button id="btnInstituto" class="btnNext" type="button" onclick="Asesor()">Continuar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="asesor">
            <div class="formContenedor">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
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
                        <div class="espacio"></div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-start">
                                <button id="btnCursosVin" class="btnNext" type="button" onclick="cursosVin()">Continuar</button>
                            </div>
                        </div>   
                    </div>
                    <div class="col-sm-3 d-flex align-items-center">
                        <p class="txtInstruccion">Selecciona el código de tu asesor de venta del material educativo. </p>
                    </div>
                    <div class="col-sm-5 telImg">
                        <?php echo $asesorIco ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="cursosVinculados">
            <div class="formContenedor">
                <div class="row">
                    <div class="col-sm-6"><p class="txtTituloSeccion">Cursos vinculados</p></div>
                    <div class="col-sm-6 texturaXO"><?php echo $textura ?></div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="txtInstruccion2">Selecciona los cursos en los que orientas e indica su sigla. Ejemplo: Si orientas en el grado sexto A escribe “601”, si orientas en el grado décimo B, escribe “1002”.</p>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="txtInstruccion2">Da click en el botón <button class="btnNext" type="button"><?php echo $cruz ?></button> &nbsp;para añadir un nuevo grado.</p>
                    </div>
                </div>
                <div class="espacio"></div>
                <div id="cursosAdd">
                    <div id="cursosAdd_1">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
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
                            <div class="col-sm-6">
                                <div class="col-sm-12">
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
                        </div>
                        <div class="espacio"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
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
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <label for="sigla" class="form-label formLabel">Sigla*</label>
                                        <input name="sigla_1" type="number" class="form-control  formInput" id="sigla_1" aria-describedby="siglaFeedback" placeholder="Ej: 801" oninput="edicionSigla(1)">
                                        <div id="siglaFeedback" class="invalid-feedback mal">
                                            <?php echo $alerta ?> Por favor ingresa la sigla del grupo.
                                        </div>
                                    </div>
                                    <div class="col-sm-2 align-self-end">
                                        <button class="btnNext" type="button" id="addFullCurso"><?php echo $cruz ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="obligatorio">* Campo obligatorio.</p>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="row text-center justify-content-center">
                    <div class="col-sm-4">
                        <input id="enviarTerminar" type="submit" class="btnNext" style="padding: 0 2vw;" value="Enviar inscripción">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="respuestaForm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="respuestaFormLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content contenedor_2">
        <!-- mensaje para enviar -->
      <div class="modal-header">
        <h1 class="modal-title fs-5 txtTituloSeccion" id="respuestaFormLabel">VERIFICACIÓN EMAIL</h1>
      </div>
      <div class="modal-body formContenedor">
        <div class="row">
            <div class="col">
                <?php echo $textura ?>
            </div>
        </div>
        <div class="row">
            <div class="col text-center advertenciaImg"><img src="img/dinamicoadvertenciabebé.svg" alt=""></div>
        </div>
        <div class="row">
            <div class="col text-center txtInstruccion2"><p id="msmVerificaEmail"></p></div>
        </div>
      </div>
      <div class="modal-footer" id="modal-footer"></div>
        <!-- fin mensaje para enviar -->
    </div>
  </div>
</div>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script src="js/registro.js"></script>

<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>

</body>
<div class="modal_carga"></div>
</html>