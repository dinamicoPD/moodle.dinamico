<?php
    include("cargar_edicion.php");
    include("constructorLicenciasPrf.php");
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
    <title>Licencias docente | Dinámico pedagogía y diseño</title>
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
    var posicionMenu2 = document.getElementById('m1-c');
    posicionMenu.classList.add('menuActivo');
    posicionMenu2.classList.add('menuActivo');
</script>
<section id="p1">
    <div class="titulo">
        <h2>Licencias docentes</h2>
        <hr>
    </div>
    <div class="container popinsFont">
        <br>
        <div class="row">
            <div class="col">
                <button id="exportarExcel" type="button" class="botonDP hover botonDP_2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                    </svg>
                    Descargar
                </button>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="buscar">
                        <svg width="20" height="20" class="DocSearch-Search-Icon" viewBox="0 0 20 20"><path d="M14.386 14.386l4.0877 4.0877-4.0877-4.0877c-2.9418 2.9419-7.7115 2.9419-10.6533 0-2.9419-2.9418-2.9419-7.7115 0-10.6533 2.9418-2.9419 7.7115-2.9419 10.6533 0 2.9419 2.9418 2.9419 7.7115 0 10.6533z" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </span>
                    <input placeholder="Buscar" type="text" id="searchTerm" name="searchTerm" class="form-control" aria-describedby="buscar" oninput="searchTerm()">
                </div>
            </div>
        </div>
        <!-- tabla de licencias -->
        <div id="registrosTabla">
            <div class="row">
                <div class="col-md-2">
                    <select id="cantidad_registros" class="form-select form-select-sm" onchange="cantidad()">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <p><strong>TOTAL REGISTROS: </strong><span id="cantidad"><?php echo $cantidad; ?></span></p>
                </div>
                <div class="col-md-5">
                    <nav>
                        <ul id="pagination" class="pagination justify-content-end">
                            <li class="page-item">
                                <button id="inicio" class="page-link" onclick="inicio()">Inicio</button>
                            </li>
                            <li class="page-item"><button id="anterior" class="page-link" onclick="anterior()"><</button></li>
                            <li class="page-item"><input id="indicador" class="indicador" type="number" value="<?php echo $posicion ?>"></li>
                            <li class="page-item"><button id="siguiente" class="page-link" onclick="siguiente()">></button></li>
                            <li class="page-item" id="fin">
                                <button id="btnFin" class="page-link" value="<?php echo $totalDivicion; ?>" onclick="fin(<?php echo $totalDivicion; ?>)" ><?php echo $totalDivicion; ?></button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="table-responsive">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Id</th>
                                <th class="text-center" scope="col">Código</th>
                                <th class="text-center" scope="col">Nombre</th>
                                <th class="text-center" scope="col">Correo</th>
                            </tr>
                        </thead>
                        <tbody id='licenciasBuscadas'>
                            <?php echo $construtorHTML; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal actualizar grupos-->
<div class="modal fade" id="ModalGrupo" tabindex="-1" aria-labelledby="ModalGrupoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="actualizarGruposDocente.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="SlideModalLabel">Actualizar grupos</h1>
                    <button type="button" class="inicioClose hover" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.65 27.23"><defs><style>.btnClose-1{fill:#f7746d;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="btnClose-1" d="M7.55,13.65C5.4,9.5.52,2.05.58,1.27.58,1,7.76.11,8.39.11S13,7.93,13.32,8.5C13.59,8.09,18.2.06,18.52,0s8.18,1.05,8.13,1.31c-.42,1.36-4.41,7.92-7.14,12,2.15,4.25,6.67,12,6.67,12.69-.06.37-7.24,1.26-7.87,1.26s-4.36-7.66-5-8.76c-.73,1.16-4.87,8.6-5.14,8.6S0,26,0,25.71C.37,24.5,4.56,18,7.55,13.65Z"/></g></g></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="datosUsuario">
                        <div class="form-floating mb-3">
                            <input name="Id" type="text" class="form-control" id="IdInput" placeholder="Id" readonly>
                            <label for="IdInput">Id</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="FirstName" type="text" class="form-control" id="firstnameInput" placeholder="Primer nombre" readonly>
                            <label for="firstnameInput">Primer nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="MiddleName" type="text" class="form-control" id="middlenameInput" placeholder="Segundo nombre" readonly>
                            <label for="middlenameInput">Segundo nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="LastName" type="text" class="form-control" id="lastnameInput" placeholder="Primer nombre" readonly>
                            <label for="lastnameInput">Primer apellido</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="SecondLastName" type="text" class="form-control" id="alternatenameInput" placeholder="Segundo apellido" readonly>
                            <label for="alternatenameInput">Segundo apellido</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="Email" type="text" class="form-control" id="emailInput" placeholder="Email" readonly>
                            <label for="emailInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="userName" type="text" class="form-control" id="usernameInput" placeholder="Usuario" readonly>
                            <label for="usernameInput">Usuario</label>
                        </div>
                    </div>
                    <hr>
                    <label for="" class="form-label">Agregar Institución:</label>
                    <div class="input-group">
                        <input id="addInst" name="" type="number" min="0" max="10" class="form-control" value="0">
                        <button class="btn btn-info" type="button" onclick="editInstituto()">Agregar</button>
                    </div>
                    <br>
                    <div class="newInstituto"></div>
                    <hr>
                    <label for="" class="form-label">Agregar Cursos:</label>
                    <div class="input-group">
                        <input id="addGrup" name="" type="number" min="0" max="10" class="form-control" value="0">
                        <button class="btn btn-info" type="button" onclick="editGrupos()">Agregar</button>
                    </div>
                    <br>
                    <div class="newGrupos"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
                <option value="P" selected>Profesor</option>
            </select>
            <label for="inputRol">Rol:</label>
        </div>
        <br>
        <input id="inputIdLicencia" type="hidden" name="LicenceId">
        <input id="inputTitulo" type="hidden" name="inputTitulo">
        <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button" id="button-generar">Generar</button>
            <div class="form-floating">
                <input type="text" class="form-control monospaceFont" id="inputCodigo" placeholder="Licencia:">
                <label for="inputCodigo">Licencia:</label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="actualizarCode" type="button" class="botonDP hover botonDP_4">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>
<script src="licenciasDocentes.js"></script> 
</body>
</html>