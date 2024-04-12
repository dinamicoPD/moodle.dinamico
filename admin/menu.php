<?php
$menu ='
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
                <li class="nav-item dropdown" id="m5">
                    <label class="nav-link dropdown-toggle menuFont hover" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bases de datos</label>
                    <ul class="dropdown-menu submenu" aria-labelledby="navbarDropdownMenuLink">
                        <li id="m5-a" class="dropdown-item hover"><a class="menuFont2" href="">Códigos email</a></li>
                        <li id="m5-b" class="dropdown-item hover"><a class="menuFont2" href="colegiosManager.php">Colegios</a></li>
                    </ul>
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
                        <li id="m7-a" class="dropdown-item hover"><a class="menuFont2" href="">Estudiantes</a></li>
                        <li id="m7-b" class="dropdown-item hover"><a class="menuFont2" href="masivoDocentes.php">Docentes</a></li>
                        <li id="m7-c" class="dropdown-item hover"><a class="menuFont2" href="">Correos</a></li>
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
';
?>