<?php
    require_once('VerificacionDocenteController.php');
    include("verInscripcion.php");
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
    <title>Gestor Usuarios | Verificación Docente</title>
    <link rel="icon" href="img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="css/admiGestor.css">
    <link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
</head>
<body>
<style>
.ocultarCss{
    display: none;
}
</style>
<header>
		<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
		  <div class="container-fluid">
			<a class="navbar-brand" href="cleanConfirmaEmail.php" target="_blank"><img src="img/logo 2.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link active" href="LicenceManager.php">Gestor licencias</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link position-relative" href="VerificacionDocente.php" target="_blank">Inscripciones
				  	<span id="totalRegistros" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $totalRegistros ?></span>
				  </a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="./phpMyAdmin-5.2.1" target="_blank">phpMyAdmin</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
</header>
<div class="container-fluid">
    <div class="table-responsive">
        <?php
            echo $PreinscripcionFull;
        ?>
    </div>
</div>

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
            <form action="enviarInscripcion.php" method="post">
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
<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>