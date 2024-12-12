<?php
    session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
    }
    include("menu.php");
    include("generadorQRController.php");
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
        <link rel="stylesheet" href="../css/articulos.css">
        <link rel="stylesheet" href="css/categorias.css">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">

        <!-- https://sweetalert.js.org/guides/ -->
        <script src="../js/sweetAlert/sweetalert.min.js"></script>
        <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">

        <script src="html2canvas.js.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/file-saver"></script>
    </head>
    <body>
    <?php echo $menu; ?>
    <script>
        var posicionMenu = document.getElementById('m3');
        posicionMenu.classList.add('menuActivo');
    </script>

    <section id="p1">
        <div class="titulo">
            <h2>Gestor QR</h2>
            <hr>
            <p id="mensaje"></p>
        </div>
        <br>
        <div class="container-fluid popinsFont p-3">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <label for="select_1" onclick="verActivo(1)">
                                <p id="nav-link_1" class="nav-link active">
                                    Generar QR
                                </p>
                            </label>
                            <label for="select_2" onclick="verActivo(2)">
                                <p id="nav-link_2" class="nav-link">
                                    Páginas de aterrizaje
                                </p>
                            </label>
                            <label for="select_3" onclick="verActivo(3)">
                                <p id="nav-link_3" class="nav-link">
                                    Diseños QR
                                </p>
                            </label>
                        </li>
                    </ul>
                    <div class="select_main">
                        <ul>
                            <li>
                                <input type="radio" name="inputRadio" class="inputRadio" id="select_1" checked>
                                <div class="select_content p-2 text-bg-light">

                                    <div class="row">
                                        <div class="col p-2">
                                            <button type="button" class="btn btn-dark agregarRegistro" style="float: right" id="btnProyecto" value="QR_proyectos"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg> Crear proyecto</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto"><?php echo $btnProyectos; ?></div>
                                        <div class="col table-responsive">
                                            
                                            <table class="table table-hover">
                                                <caption style="caption-side: top">
                                                    <p class="blockquote-footer p-2" id="tituloProyecto">Seleccione el proyecto que desea ver</p>
                                                </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col"><input id="checkqrAll" class="form-check-input" type="checkbox"></th>
                                                        <th scope="col">Titulo</th>
                                                        <th scope="col">Destino</th>
                                                        <th scope="col">Enlaces</th>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaQR">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </li>
                            <li>
                                <input type="radio" name="inputRadio" class="inputRadio" id="select_2">
                                <div class="select_content p-2 text-bg-light">
                                    <div class="row">
                                        <div class="col p-2">
                                            <button type="button" class="btn btn-dark agregarRegistro" style="float: right" id="btnProyecto" value="QR_aterrizaje"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg> Enlazar página de aterrizaje</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <input type="radio" name="inputRadio" class="inputRadio" id="select_3">
                                <div class="select_content p-2 text-bg-light">
                                    3
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal proyecto -->
    <div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
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

    <div class="modal fade" id="creacionQR" tabindex="-1" aria-labelledby="creacionQRLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="creacionQRLabel">Creación QR</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="creacionQRModal">
                    <form action="crearQr.php" method="post" id="miFormulario">
                        <input type="hidden" name="proyectoQR_crear" id="proyectoQR_crear">
                        <div class="mb-3">
                            <label for="tituloQR" class="form-label">
                                <strong>Titulo del QR</strong>
                            </label>
                            <div class="input-group mb-3">
                                <input name="tituloQR" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="aterrizaje" class="form-label">
                                <strong>Página aterrizaje</strong>
                            </label>
                            <div class="input-group mb-3">
                                <select id="aterrizaje" class="form-select" name="aterrizaje" required>
                                    <option selected disabled value="">Seleccionar</option>
                                    <?php echo $listasAterrizaje; ?>
                                </select>
                            </div>
                        </div>
                        <div class="btnMas">
                            <button id="addEnlace" type="button" class="btn btn-outline-dark m-2">Agregar enlace</button>
                        </div>
                        <br>
                        <div class="enlaces">
                            <div class="mb-3">
                                <label for="nombreEnlace" class="form-label">
                                    <strong>Nombre enlace</strong>
                                </label>
                                <div class="input-group mb-3">
                                    <input name="nombreEnlace[]" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Enlace" class="form-label">
                                    <strong>Enlace</strong>
                                </label>
                                <div class="input-group mb-3">
                                    <input name="Enlace[]" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Enviar">
                    </form>                
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
    <script>
        function verActivo(selector){
            $('.nav-link').removeClass('active');
            $('#nav-link_'+selector).addClass('active');
        }
    </script>
    <script src="../../../js/menu.js"></script>
    <script src="js/actualizarRegistro.js"></script>
    <script src="js/generadorQR.js"></script>
    </body>
</html>