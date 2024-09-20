<?php
    session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
    }
    include("menu.php");
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
                                    Proyectos
                                </p>
                            </label>
                            <label for="select_4" onclick="verActivo(4)">
                                <p id="nav-link_4" class="nav-link">
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
                                            <button type="button" class="btn btn-dark" style="float: right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg> Crear proyecto</button>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="proyectosPD">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proyectosPD_One" aria-expanded="false" aria-controls="proyectosPD_One">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th class="align-middle">Nombre</th>
                                                        <th class="align-middle">Activos [*]</th>
                                                    </tr>
                                                </table>
                                            </button>
                                            </h2>
                                            <div id="proyectosPD_One" class="accordion-collapse collapse" data-bs-parent="#proyectosPD">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col p-2">
                                                            <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16"><path d="M2 2h2v2H2z"/><path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z"/><path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z"/><path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z"/><path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z"/></svg> Crear Qr</button>
                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg> Modificar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th><input class="form-check-input" type="checkbox"></th>
                                                                        <th>Nombre QR</th>
                                                                        <th>URL</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-group-divider">
                                                                    <tr>
                                                                        <td><input class="form-check-input" type="checkbox"></td>
                                                                        <td>Nombre QR</td>
                                                                        <td>URL</td>
                                                                        <td>
                                                                            <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/></svg> Descargar</button>
                                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16"><path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/></svg> Estadistica</button>
                                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/></svg> Editar</button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col p-2">
                                                            <button type="button" class="btn btn-dark" style="float: right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/></svg> Descargar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proyectosPD_Two" aria-expanded="false" aria-controls="proyectosPD_Two">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th class="align-middle">Nombre</th>
                                                        <th class="align-middle">Activos [*]</th>
                                                    </tr>
                                                </table>
                                            </button>
                                            </h2>
                                            <div id="proyectosPD_Two" class="accordion-collapse collapse" data-bs-parent="#proyectosPD">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col p-2">
                                                            <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16"><path d="M2 2h2v2H2z"/><path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z"/><path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z"/><path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z"/><path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z"/></svg> Crear Qr</button>
                                                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg> Modificar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <input type="radio" name="inputRadio" class="inputRadio" id="select_2">
                                <div class="select_content p-2 text-bg-light">
                                    2
                                </div>
                            </li>
                            <li>
                                <input type="radio" name="inputRadio" class="inputRadio" id="select_3">
                                <div class="select_content p-2 text-bg-light">
                                    3
                                </div>
                            </li>
                            <li>
                                <input type="radio" name="inputRadio" class="inputRadio" id="select_4">
                                <div class="select_content p-2 text-bg-light">
                                    4
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
    <script>
        function verActivo(selector){
            $('.nav-link').removeClass('active');
            $('#nav-link_'+selector).addClass('active');
        }
    </script>
    <script src="../../../js/menu.js"></script>
    </body>
</html>