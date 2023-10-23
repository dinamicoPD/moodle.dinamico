<?php
require_once 'iconos.php';
require_once dirname(__FILE__) . '/PasswordChangeController.php';
?>
<!DOCTYPE html>
<html>
<head>
<!--particulas-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cambio Contraseña | Dinámico Pedagogía y Diseño</title>

<link rel="icon" href="img/cara.png" type="image/x-icon">
<link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
<link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
<link rel="stylesheet" href="css/styleParticulas.css" type="text/css">
<link rel="stylesheet" href="css/formSmall.css" type="text/css">
<link rel="stylesheet" href="css/formSmall_change.css" type="text/css">
</head>
<style>
.mostrando{
	cursor: pointer;
}
</style>
<body>
<!--particulas-->
<div id="particles-js"></div>
<div class="contenedor">
	<div class="Bienvenida">
		<div class="cuerpoAll">
			<img id="cuerpo" src="img/formSmall/micoChange@3x.png" alt="Dinámico">
		</div>
	</div>
	<div class="formulario">
		<div class="contenedorFormulario">
			<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="passwordForm">
				<div class="userTitle">
					<img src="img/formSmall/userChange@3x.png" alt="Hola Dinamigo, cambio de contraseña">
					<div class="bg-danger text-white"><?php echo $password_err; ?></div>
					<div class="bg-success text-white"><?php echo $success_message; ?></div>
				</div>
				<div class="userName">
					<div class="row">
						<div class="col-sm-12">
							<label for="passUser" class="form-label labelRF">Nueva contraseña*</label>
							<div class="input-group mb-3 has-validation">
								<span class="input-group-text spanRF" id="inputGroupemail"><?php echo $accesoPass ?></span>
								<input name="password1" type="password" class="form-control inputRF" id="password1" aria-describedby="inputGroupemail passUserFeedback" placeholder="Introduce la nueva contraseña" value="<?php echo $password1; ?>" required autocomplete="off">
								<div class="input-group-append">
									<span class="input-group-text ojo">
										<input style="display:none;" id="mostar" type="checkbox" onclick="mostrarPassword()">
										<label for="mostar" class="mostrando">
											<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
												<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
												<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
											</svg>
										</label>
									</span>
								</div>
								<div id="passUserFeedback" class="invalid-feedback">
									<div class="row">
									<div id="eightchardiv" class="col-xs-12" style="display:none;">
										<span id="8char" style="color:#FF0004;"></span><?php echo $alerta ?> 8 Caracteres como mínimo
									</div>
									<div id="ucasediv" class="col-xs-12" style="display:none;">
										<span id="ucase" style="color:#FF0004;"></span><?php echo $alerta ?> Una letra en Mayúscula
									</div>
									<div id="lcasediv" class="col-xs-12" style="display:none;">
										<span id="lcase" style="color:#FF0004;"></span><?php echo $alerta ?> Una letra minúscula
									</div>
									<div id="numdiv" class="col-xs-12" style="display:none;">
										<span id="num" style="color:#FF0004;"></span><?php echo $alerta ?> Un número
									</div>
									<div id="noalfadiv" class="col-xs-12" style="display:none;">
										<span id="noalfa" style="color:#FF0004;"></span><?php echo $alerta ?> Un no alfanúmerico ej: @ # % - +
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="userName">
					<div class="row">
						<div class="col-sm-12">
							<label for="form-label" class="form-label labelRF">Repita Nueva Constraseña*</label>
							<div class="input-group mb-3 has-validation">
								<span class="input-group-text spanRF" id="inputGroupemail2"><?php echo $accesoPass ?></span>
								<input type="password" class="input-lg form-control inputRF" name="password2" id="password2" aria-describedby="inputGroupemail2 passUserFeedback2" value="<?php echo $password2; ?>" placeholder="Introduzca nuevamente la constraseña" required autocomplete="off">
								<div id="passUserFeedback2" class="invalid-feedback">
									<div class="row">
										<div id="passmissmatchdiv" class="col-xs-12">
											<span style="color:#FF0004;"></span><?php echo $alerta ?> Las contraseñas no coinciden
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="userIngreso">
					<div class="row">
						<div class="col-6"><p>&nbsp;*Campo obligatorio.</p></div>
						<div class="col-6"><input type="submit" data-loading-text="Cambiando Contraseña..." value="Cambiar contraseña" <?php echo ($lockbutton ? "disabled" : "") ?>></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script type="text/javascript" src="js/StrengthValidation.js"></script>
<script type="text/javascript" src="js/AddPassChange.js"></script>

<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>
</body>
</html>

