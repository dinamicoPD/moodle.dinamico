<?php
include("menu.php");
include("colegiosManagerController.php");
session_start();
if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
header("location: AdminLogin.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegios | Dinámico pedagogía y diseño</title>
    <link rel="icon" href="../img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <script src="../js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../css/menu.css">
    <link rel="stylesheet" href="../../../css/config.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="styleManager.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    
    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">
</head>
<body>
<?php echo $menu; ?>
<script>
    var posicionMenu = document.getElementById('m5');
    var posicionSudMenu = document.getElementById('m5-b');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>

<section id="p1">
    <div class="titulo">
        <h2>Colegios</h2>
        <hr>
        <br>
    </div>
    <div class="container popinsFont">
        <div class="row">
            <div class="col shadow-lg p-2">
                <form action="colegiosManagerEnviar.php" method="post" class="p-3" enctype="multipart/form-data">
                    <?php echo $variable1 ?>
                    <div class="mb-3">
                        <label for="inputDepartamento">Municipio</label>
                        <select name="inputDepartamento" id="inputDepartamento" class="form-select" aria-describedby="InputDepartamentoHelp" onchange="verColegios()">
                            <option value="" selected disabled>Seleccione ...</option>
                            <?php echo $selectCiudades ?>
                        </select required>
                        <div id="InputDepartamentoHelp" class="form-text">Seleccione municipio</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputInstitucion" class="form-label">Institución</label>
                        <input type="text" class="form-control" name="InputInstitucion" id="InputInstitucion" aria-describedby="InputInstitucionHelp" required>
                        <div id="InputInstitucionHelp" class="form-text">Ingresa el nombre la institución</div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <select id="listadoColegios" class="form-select" multiple aria-label="Multiple select example" aria-describedby="listadoColegiosHelp" disabled></select>
                        <div id="listadoColegiosHelp" class="form-text alert alert-warning">Verifica si la institución ya este registrada</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label" for="inputImg">Adjunte logo</label>
                        <input name="inputImg" class="form-control" type="file" id="inputImg" aria-describedby="inputImg" aria-label="Upload" accept=".png">
                    </div>
                    <hr>
                    <button style="float:right" type="submit" class="btn btnPlataforma">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container p-5">
        <table class="table table-striped align-middle">
            <?php echo $listadoColegios; ?>
        </table>
    </div>
</section>

<div class="modal fade" id="colegioModal" tabindex="-1" aria-labelledby="colegioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="colegioModalLabel">Actualizar colegio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formularioColegio" action="colegiosManagerActualizar.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-check-label" for="Colegio">Colegio</label>
                        <input name="Colegio" class="form-control" type="text" id="Colegio" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="imagenLogo" style="background:#f4f4f4; text-align: center;"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label" for="inputImglogo">Adjunte logo</label>
                        <input name="inputImglogo" class="form-control" type="file" id="inputImglogo" aria-describedby="inputImglogo" aria-label="Upload" accept=".png">
                    </div>
                    <input id="idColegio" type="hidden" name="idColegio">
                    <input id="Colegioborrar" type="hidden" name="Colegioborrar" value="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="borrarColegio()">Borrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>
<script src="colegiosManager.js"></script>
</body>
</html>