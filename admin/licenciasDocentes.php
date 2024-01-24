<?php
    include("constructorLicenciasPrf.php");
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
<header>
    <nav class="navbar navbar-expand-lg bg-transparent navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand logoMenu" href="index.php"><img src="../../../img/logo_blanco.png" alt="Dinámico pedagogía y diseño"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="linea"></div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbarNav">
                <li class="nav-item" id="m1">
                    <a class="nav-link menuFont hover" aria-current="page" href="index.php">Licencias</a>
                </li>
                <li class="nav-item dropdown" id="m2">
                    <label class="nav-link dropdown-toggle menuFont hover" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</label>
                    <ul class="dropdown-menu submenu" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-item hover" id="m2a"><a class="menuFont2" href="">Estudiantes</a></li>
                        <li class="dropdown-item hover" id="m2b"><a class="menuFont2" href="licenciasDocentes.php">Docentes</a></li>
                        <li class="dropdown-item hover" id="m2c"><a class="menuFont2" href="">Asesores</a></li>
                        <li class="dropdown-item hover" id="m2d"><a class="menuFont2" href="">Soporte</a></li>
                    </ul>
                </li>
                <li class="nav-item" id="m3">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Categorías</a>
                </li>
                <li class="nav-item" id="m4">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Inscripciones</a>
                </li>
                <li class="nav-item" id="m5">
                    <a class="nav-link menuFont hover" aria-current="page" href="">QR</a>
                </li>
                <li class="nav-item" id="m6">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Periódico</a>
                </li>
                <li class="nav-item" id="m7">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Correos</a>
                </li>
            </ul>
            <span class="navbar-text">
                <a href="../phpMyAdmin-5.2.1" class="btnPlataforma" target="_blank">phpMyAdmin</a>
            </span>
          </div>
        </div>
      </nav>
</header>
<script>
    var posicionMenu = document.getElementById('m2');
    var posicionMenu2 = document.getElementById('m2b');
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
                <button type="button" class="botonDP hover botonDP_3" onclick="buscarEliminar()">Eliminar</button>
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
                                <th class="text-center" scope="col">Eliminar</th>
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

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>
<script src="licenciasDocentes.js"></script> 
</body>
</html>