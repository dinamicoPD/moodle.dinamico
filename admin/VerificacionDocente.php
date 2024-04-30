<?php
    require_once('VerificacionDocenteController.php');
    include("verInscripcion.php");
    include("menu.php");

    session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Dinámico pedagogía y diseño</title>
    <link rel="icon" href="../img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <script src="../js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/config.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="styleManager.css">
    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">
    <!--
    <link rel="stylesheet" href="../css/admiGestor.css">
    <link rel="stylesheet" href="../css/8_0_1_normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    -->
</head>
<body>
<style>
.ocultarCss{
    display: none;
}
</style>

<?php echo $menu; ?>
<script>
    var posicionMenu = document.getElementById('m1');
    var posicionSudMenu = document.getElementById('m1-b');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>
<section id="p1">
    <div class="titulo">
        <h2>Inscripción pendientes</h2>
        <hr>
    </div>
    <br><br>
    <div class="container popinsFont">
        <div class="container-fluid">
            <div class="table-responsive">
                <?php
                    echo $PreinscripcionFull;
                ?>
            </div>
        </div>
    </div>
</section>   

<div class="modal fade" id="InstitutoNuevoForm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="respuestaFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content contenedor_2">
            <div class="modal-header">
                <h1 class="modal-title fs-5 txtTituloSeccion" id="respuestaFormLabel">COMPROBAR INSTITUTO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="arregloInstituto.php" method="post">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input name="defOtro" id="defOtro" type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                        <label for="defOtro">Colegio Ingresado</label>
                    </div>
                    <div class="alert alert-light" role="alert">
                        <p>Si el colegio ya está registrado, por favor selecciónelo de la lista a continuación. Si no aparece o si considera que es necesario, puede modificar su nombre</p>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="instituto_1" class="form-select" id="instituto_1"></select>
                        <label for="instituto_1" id="labelColegio">Colegios</label>
                    </div>
                    <input name="id_registro" type="hidden" id="identificador">
                    <input name="ciudadId" type="hidden" id="ciudadId">
                    <input name="consecutivo" type="hidden" id="consecutivo">
                    <input name="newName" type="hidden" id="newName">
                </div>
                <div class="modal-footer" id="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="enviarInscripcion" tabindex="-1" data-bs-backdrop="static" aria-labelledby="InscripcionFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content contenedor_2">
            <div class="modal-header">
                <h1 class="modal-title fs-5 txtTituloSeccion" id="InscripcionFormLabel">Incripción Docente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../enviarInscripcion.php" method="post">
                <div class="modal-body">
                <fieldset>
                    <legend>Información personal</legend>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Registro" id="floatingRegistro" readonly>
                        <label for="floatingRegistro">Registro*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="FirstName" id="floatingFirstName" required>
                        <label for="floatingFirstName">Primer Nombre*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="MiddleName" id="floatingMiddleName" >
                        <label for="floatingMiddleName">Segundo Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="LastName" id="floatingLastName" required>
                        <label for="floatingLastName">Primer Apellido*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="SecondLastName" id="floatingSecondLastName">
                        <label for="floatingSecondLastName">Segundo Apellido*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="Phone" id="floatingPhone">
                        <label for="floatingPhone">Número de Teléfono</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="City" id="floatingCity" readonly required>
                        <label for="floatingCity">Ciudad*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="Email" id="floatingEmail" readonly required>
                        <label for="floatingEmail">Correo electrónico*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Perfil" id="floatingPerfil" readonly required>
                        <label for="floatingPerfil">Perfil*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Asesor" id="floatingAsesor" readonly>
                        <label for="floatingPerfil">Asesor*</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Cursos que orienta</legend>
                    <div class="field_wrapper" id="cursosVinculados"></div>
                </fieldset>
                </div>
                <div class="modal-footer" id="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="grupoModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="respuestaFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content contenedor_2">
            <div class="modal-header">
                <h1 class="modal-title fs-5 txtTituloSeccion" id="respuestaFormLabel">MODICAR GRUPOS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div id="contenidoGrupo"></div>
                </div>
                <div class="modal-footer" id="modal-footer_mdGrupo"></div>
            </form>
        </div>
    </div>
</div>

<script src="js/verColegio.js"></script>
<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>

</body>
</html>