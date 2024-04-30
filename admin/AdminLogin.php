<?php
    require_once('AdminLoginController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dinámico pedagogía y diseño</title>
    <link rel="icon" href="../img/cara.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap_5_3_0_min.css">
    <link rel="stylesheet" href="../css/getbootstrap.com_docs_5.3_assets_css_docs.css">
    <script src="../js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../css/config.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="styleManager.css">

</head>
<body>
<header style="background-color: #444444;">
    <div class="p-3">
        <a class="navbar-brand logoMenu" href="../../../index.php"><img style="height: 40px;" src="../../../img/logo_blanco.png" alt="Dinámico pedagogía y diseño"></a>
    </div>
</header>
<section>
    <div class="titulo p-3">
        <h2>Ingreso Administración</h2>
        <hr>
    </div>
</section>
<section>
    <br><br>
    <div id="periodico" class="shadow-lg">
        <div class="container-md popinsFont">
            <div class="row">
                <div class="col p-5 m-5 text-bg-light rounded-3">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    
                        <div class="text-center">
                            <img class="m-3" style="width: 80%;" src="../../../img/bienvenido@3x.png" alt="">
                        </div>
                        <?php
                            if(!empty($form_err)) {
                                echo '<div class="alert alert-danger m-1">'.$form_err.'</div>';
                            }
                        ?>
                        <div class="form-floating mb-3">
                            <input type="username" name="username" id="username" class="form-control" id="floatingInput" placeholder="Nombre de Usuario" value="<?php echo $username; ?>">
                            <label for="floatingInput">Nombre de Usuario</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" id="password" value="<?php echo $password; ?>">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btnPlataforma m-3">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="../js/ajax.googleapis.com_ajax_libs_jquery_1.6.2_jquery.min.js"></script>
</body>
</html>