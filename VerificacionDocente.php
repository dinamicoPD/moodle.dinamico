<?php
    require_once('VerificacionDocenteController.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Usuarios | Verificación Docente</title>
    <link rel="icon" href="img/cara.png" type="image/x-icon">
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

<script src="js/verColegio.js"></script>
<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>