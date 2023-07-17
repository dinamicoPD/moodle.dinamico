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
<header>

</header>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Asesor</th>
                    <th>Instituto</th>
                    <th>Curso</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo $PreinscripcionFull;
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>