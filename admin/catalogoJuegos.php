<?php
include_once("catalogoJuegosController.php");
?>
<!DOCTYPE html>
<html lang="en">
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
                <li class="nav-item dropdown" id="m1">
                    <label class="nav-link dropdown-toggle menuFont hover" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</label>
                    <ul class="dropdown-menu submenu" aria-labelledby="navbarDropdownMenuLink">
                        <li id="m1-a" class="dropdown-item hover"><a class="menuFont2" href="index.php">Licencias disponibles</a></li>
                        <li id="m1-b" class="dropdown-item hover"><a class="menuFont2" href="">Inscripciones Pendientes</a></li>
                        <li id="m1-c" class="dropdown-item hover"><a class="menuFont2" href="licenciasDocentes.php">Docentes</a></li>
                        <li id="m1-d" class="dropdown-item hover"><a class="menuFont2" href="">Asesores</a></li>
                        <li id="m1-e" class="dropdown-item hover"><a class="menuFont2" href="">Soporte</a></li>
                        <li id="m1-f" class="dropdown-item hover"><a class="menuFont2" href="">Estudiantes</a></li>
                    </ul>
                </li>
                <li class="nav-item" id="m2">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Categorías</a>
                </li>
                <li class="nav-item" id="m3">
                    <a class="nav-link menuFont hover" aria-current="page" href="">QR</a>
                </li>
                <li class="nav-item" id="m4">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Periódico</a>
                </li>
                <li class="nav-item" id="m5">
                    <a class="nav-link menuFont hover" aria-current="page" href="">Códigos email</a>
                </li>
                <li class="nav-item dropdown" id="m6">
                    <label class="nav-link dropdown-toggle menuFont hover" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalogo</label>
                    <ul class="dropdown-menu submenu" aria-labelledby="navbarDropdownMenuLink">
                        <li id="m6-a" class="dropdown-item hover"><a class="menuFont2" href="catalogoJuegos.php">Juegos</a></li>
                        <li id="m6-b" class="dropdown-item hover"><a class="menuFont2" href="">Libros</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown" id="m7">
                    <label class="nav-link dropdown-toggle menuFont hover" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Masivos</label>
                    <ul class="dropdown-menu submenu" aria-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-item hover"><a class="menuFont2" href="">Estudiantes</a></li>
                        <li class="dropdown-item hover"><a class="menuFont2" href="masivoDocentes.php">Docentes</a></li>
                        <li class="dropdown-item hover"><a class="menuFont2" href="">Correos</a></li>
                    </ul>
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
    var posicionMenu = document.getElementById('m6');
    var posicionSudMenu = document.getElementById('m6-a');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>
<section id="p1">
    <div class="titulo">
        <h2>Catalogo juegos</h2>
        <hr>
        <br>
    </div>
    <div class="container popinsFont">
        <div class="row">
            <div class="col">
                <form action="EnviacatalogoJuegos.php" method="post" class="p-3" enctype="multipart/form-data">
                    <?php echo $variable1 ?>
                    <div class="mb-3">
                        <label for="InputTitulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="InputTitulo" id="InputTitulo" aria-describedby="InputTituloHelp" required>
                        <div id="InputTituloHelp" class="form-text">Ingresa el nombre del juego</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputObjetivo" class="form-label">Objetivo</label>
                        <textarea class="form-control" name="InputObjetivo" id="InputObjetivo" rows="3" aria-describedby="InputObjetivoHelp" required></textarea>
                        <div id="InputObjetivoHelp" class="form-text">Ingresa una descripción del juego</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputMaterial" class="form-label">Material</label>
                        <input type="text" name="InputMaterial" class="form-control" id="InputMaterial" aria-describedby="InputMaterialHelp">
                        <div id="InputMaterialHelp" class="form-text">cuales son sus materiales de construcción</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputMedidas" class="form-label">Medidas</label>
                        <input type="text" name="InputMedidas" class="form-control" id="InputMedidas" aria-describedby="InputMedidasHelp">
                        <div id="InputMedidasHelp" class="form-text">cuales son sus Medidas de construcción</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputEdades" class="form-label">Edades</label>
                        <input type="text" name="InputEdades" class="form-control" id="InputEdades" aria-describedby="InputEdadesHelp">
                        <div id="InputEdadesHelp" class="form-text">Comenta el rango de edades</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputValor" class="form-label">Valor</label>
                        <input type="number" name="InputValor" class="form-control" id="InputValor" aria-describedby="InputValorHelp" required>
                        <div id="InputValorHelp" class="form-text">precio de venta del producto</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label" for="inputImg">Adjunte la imagen del producto</label>
                        <input name="inputImg" class="form-control" type="file" id="inputImg" aria-describedby="inputImg" aria-label="Upload" accept=".jpg, .png" required>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input name="InputGuias" class="form-check-input" type="checkbox" role="switch" id="InputGuias" checked>
                        <label class="form-check-label" for="InputGuias">¿Contiene guías de trabajo?</label>
                    </div>
                    <br>
                    <button style="float:right" type="submit" class="btn btnPlataforma">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>
</section>
<section>
    <div class="container popinsFont">
        <div class="row">
            <div class="col">
                <?php echo $JuegosCatalogo ?>
            </div>
        </div>
    </div>
</section>
<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>
</body>
</html>