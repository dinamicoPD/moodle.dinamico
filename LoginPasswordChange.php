<?php
require_once('iconos.php');
require_once(dirname(__FILE__).'/LoginPasswordChangeController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso change | Dinámico Pedagogía y Diseño</title>
	<link rel="icon" href="img/cara.png" type="image/x-icon">
	<link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
	<link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
	<link rel="stylesheet" href="css/styleParticulas.css">
	<link rel="stylesheet" href="css/formSmall.css" type="text/css">
	<link rel="stylesheet" href="css/formSmall_Acceso.css" type="text/css">
</head>
<body>
<!--particulas-->
<div id="particles-js"></div>
<div class="contenedor">
	<div class="Bienvenida">
		<div class="cuerpoAll">
			<img id="cuerpo" src="img/formSmall/CuerpoProfe@3x.png" alt="dinamico">
			<img id="mano" src="img/formSmall/manoProfe@3x.png" alt="dinamico">
		</div>
	</div>
	<div class="formulario">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginForm">
			<div class="contenedorFormulario">
				<div class="userTitle"><img src="img/formSmall/LoginChange_titullo@3x.png" alt="Hola Dinamigo, ingresa usuario y contraseña"></div>
				<div class="userName">
					<div class="row">
						<div class="col-sm-12">
							<label for="emailUser" class="form-label labelRF">Nombre de usuario / e-mail*</label>
							<div class="input-group has-validation <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text spanRF" id="inputGroupemail"><?php echo $arroba ?></span>
								<input name="username" type="text" class="form-control inputRF <?php echo $username_err; ?>" id="username" aria-describedby="inputGroupemail emailUserFeedback" placeholder="Introduce el nombre de usuario" value="<?php echo $variable1; ?>" required autocomplete="off">
								<div id="emailUserFeedback" class="invalid-feedback">
									<?php echo $alerta ?> Ingresa una dirección de correo electrónico o nombre de usuario válida.
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="userEmail">
					<div class="row">
						<div class="col-sm-12">
							<label for="code" class="form-label labelRF">Contraseña*</label>
							<div class="input-group has-validation <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text spanRF" id="inputGroupcode"><?php echo $accesoPass ?></span>
								<input name="password" type="text" class="form-control inputRF <?php echo $password_err; ?>" id="password" aria-describedby="inputGroupcode E-mailFeedback" placeholder="Introduce la contraseña enviada a tu correo" required value="<?php echo $variable2; ?>" autocomplete="off">
								<div id="E-mailFeedback" class="invalid-feedback">
									<?php echo $alerta ?> Ingresa una contraseña valida.
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="userIngreso">
					<div class="row">
						<div class="col-6"><p>&nbsp;*Campo obligatorio.</p></div>
						<div class="col-6"><input type="submit" data-loading-text="Ingresando..." value="Cambiar contraseña"></div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<img id="escritorio" src="img/formSmall/escritorio@3x.png" alt="">
</div>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>
</body>
</html>