<?php
include("menu.php");
session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
		header("location: AdminLogin.php");
		exit;
    }

    include("catalogoFestivalesController.php");
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
    <link rel="stylesheet" href="css/categorias.css">

    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">
</head>
<body>
<?php echo $menu; ?>
<script>
    var posicionMenu = document.getElementById('m6');
    var posicionSudMenu = document.getElementById('m6-c');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>
<section id="p1">
    <div class="titulo">
        <h2>Festivales</h2>
        <hr>
    </div>
    <br>
    <div class="container popinsFont">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <label for="select_1" onclick="verActivo(1)"><p id="nav-link_1" class="nav-link active">Personal disponible</p></label>
                        <label for="select_2" onclick="verActivo(2)"><p id="nav-link_2" class="nav-link">Áreas</p></label>
                        <label for="select_3" onclick="verActivo(3)"><p id="nav-link_3" class="nav-link">Actividades</p></label>
                        <label for="select_4" onclick="verActivo(4)"><p id="nav-link_4" class="nav-link">Solicitudes</p></label>
                    </li>
                </ul>
                <div class="select_main">
                    <ul>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_1" checked>
                            <div class="select_content">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="p-3">
                                    <div class="input-group mb-3">
                                        <label for="personalTotal" class="input-group-text">Personal disponible</label>
                                        <span class="input-group-text" id="letraColegio">(Actual <?php echo $totalDocentes; ?>)</span>
                                        <input id="personalTotal" name="personalTotal" type="number" class="form-control" placeholder="Ingrese nueva cantidad" min="0" required>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_2">
                            <div class="select_content">
                                <div class="container p-3">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-outline-danger agregarRegistro" type="button" value="FestivalArea">Agregar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="container p-3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover align-middle">
                                            <tr class="table-info">
                                                <th class='text-center'>Área</th>
                                                <th class='text-center'>Actualizar</th>
                                                <th class='text-center'>Eliminar</th>
                                            </tr>
                                            <?php echo $areas ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_3">
                            <div class="select_content">
                                <div class="container p-3">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-outline-danger agregarRegistro" type="button" value="FestivalTipo">Agregar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="container p-3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover align-middle">
                                            <tr class="table-info">
                                                <th class='text-center'>Actividad</th>
                                                <th class='text-center'>Actualizar</th>
                                                <th class='text-center'>Eliminar</th>
                                            </tr>
                                            <?php echo $tipo ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="inputRadio" class="inputRadio" id="select_4">
                            <div class="select_content">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="actualizarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="actualizarLabel">Actualizar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="contenidoModal">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>


<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="indexController.js"></script>
<script src="../../../js/menu.js"></script>
<script src="js/categorias.js"></script>
<script src="js/actualizarRegistro.js"></script>
</body>
</html>