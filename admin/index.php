<?php
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

    <!-- https://sweetalert.js.org/guides/ -->
    <script src="../js/sweetAlert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/sweetAlert/sweetalert2.min.css">
</head>
<body>
<?php echo $menu; ?>
<script>
    var posicionMenu = document.getElementById('m1');
    var posicionSudMenu = document.getElementById('m1-a');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>
<section id="p1">
    <div class="titulo">
        <h2>Licencias disponibles</h2>
        <hr>
    </div>
    <div class="container popinsFont">
        <br>
        <div class="row">
            <div class="col">
                <button id="LicenciasAdd" type="button" class="botonDP hover botonDP_1">Agregar licencias</button>
            </div>
            <div class="col">
                <button id="exportarExcel" type="button" class="botonDP hover botonDP_2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                    </svg>
                    Descargar
                </button>
            </div>
            <div class="col">
                <button type="button" class="botonDP hover botonDP_3" onclick="buscarElimnar()">Eliminar</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="perfil" class="form-label">Seleccione perfil:</label>
                    <select class="form-select" id="perfil" onchange="cantidad()">
                        <option value="1">Todos</option>
                        <option value="2">Estudiante</option>
                        <option value="3">Profesor</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="buscar">
                        <svg width="20" height="20" class="DocSearch-Search-Icon" viewBox="0 0 20 20"><path d="M14.386 14.386l4.0877 4.0877-4.0877-4.0877c-2.9418 2.9419-7.7115 2.9419-10.6533 0-2.9419-2.9418-2.9419-7.7115 0-10.6533 2.9418-2.9419 7.7115-2.9419 10.6533 0 2.9419 2.9418 2.9419 7.7115 0 10.6533z" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </span>
                    <input placeholder="Buscar" type="text" id="searchTerm" name="searchTerm" class="form-control" aria-describedby="buscar" oninput="searchTerm()">
                </div>
            </div>
        </div>
        <div id="registrosTabla"></div>
    </div>
</section>


<!-- MODAL -->
<div class="modal fade" id="actualizarRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarRegistroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Actualizar licencia</h1>
        <button type="button" class="inicioClose hover" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.65 27.23"><defs><style>.btnClose-1{fill:#f7746d;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="btnClose-1" d="M7.55,13.65C5.4,9.5.52,2.05.58,1.27.58,1,7.76.11,8.39.11S13,7.93,13.32,8.5C13.59,8.09,18.2.06,18.52,0s8.18,1.05,8.13,1.31c-.42,1.36-4.41,7.92-7.14,12,2.15,4.25,6.67,12,6.67,12.69-.06.37-7.24,1.26-7.87,1.26s-4.36-7.66-5-8.76c-.73,1.16-4.87,8.6-5.14,8.6S0,26,0,25.71C.37,24.5,4.56,18,7.55,13.65Z"/></g></g></svg>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-floating">
            <select class="form-select" id="inputRol">
                <option value="E">Estudiante</option>
                <option value="P">Profesor</option>
            </select>
            <label for="inputRol">Rol:</label>
        </div>
        <br>
        <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button" id="button-generar">Generar</button>
            <div class="form-floating">
                <input type="text" class="form-control monospaceFont" id="inputCodigo" placeholder="Licencia:">
                <label for="inputCodigo">Licencia:</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputTitulo" placeholder="Título:">
            <label for="floatingInput">Título:</label>
        </div>
        <input id="inputIdLicencia" type="hidden">

      </div>
      <div class="modal-footer">
        <button id="actualizarCode" type="button" class="botonDP hover botonDP_4">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL Licencias Masivo-->
<div class="modal fade" id="LicenciasMasivo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="LicenciasMasivoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Crear licencias</h1>
        <button type="button" class="inicioClose hover" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.65 27.23"><defs><style>.btnClose-1{fill:#f7746d;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="btnClose-1" d="M7.55,13.65C5.4,9.5.52,2.05.58,1.27.58,1,7.76.11,8.39.11S13,7.93,13.32,8.5C13.59,8.09,18.2.06,18.52,0s8.18,1.05,8.13,1.31c-.42,1.36-4.41,7.92-7.14,12,2.15,4.25,6.67,12,6.67,12.69-.06.37-7.24,1.26-7.87,1.26s-4.36-7.66-5-8.76c-.73,1.16-4.87,8.6-5.14,8.6S0,26,0,25.71C.37,24.5,4.56,18,7.55,13.65Z"/></g></g></svg>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-floating">
            <select class="form-select" id="inputRolcrear">
                <option value="E">Estudiante</option>
                <option value="P">Profesor</option>
            </select>
            <label for="inputRol">Rol:</label>
        </div>
        <br>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputTitulocrear" placeholder="Título:">
            <label for="floatingInput">Título:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="inputCantidadcrear" placeholder="Número de licencias:">
            <label for="floatingInput">Número de licencias:</label>
        </div>
        

      </div>
      <div class="modal-footer">
        <button id="actualizarLicenciasMasivo" type="button" class="botonDP hover botonDP_4">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="indexController.js"></script>
<script src="../../../js/menu.js"></script>
</body>
</html>