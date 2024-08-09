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
    <div class="container popinsFont">
        <div class="row">
            <div class="col py-5">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="input-group mb-3">
                        <label for="personalTotal" class="input-group-text">Personal disponible</label>
                        <span class="input-group-text" id="letraColegio">(Actual <?php echo $totalDocentes; ?>)</span>
                        <input id="personalTotal" name="personalTotal" type="number" class="form-control" placeholder="Ingrese nueva cantidad" min="0" required>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="indexController.js"></script>
<script src="../../../js/menu.js"></script>
</body>
</html>