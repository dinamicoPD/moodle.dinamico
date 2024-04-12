<?php
include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masivo docente | Dinámico pedagogía y diseño</title>
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
    var posicionMenu = document.getElementById('m7');
    var posicionSudMenu = document.getElementById('m7-b');
    posicionMenu.classList.add('menuActivo');
    posicionSudMenu.classList.add('menuActivo');
</script>


<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
<script src="../../../js/menu.js"></script>
</body>
</html>