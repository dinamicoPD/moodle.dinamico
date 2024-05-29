<?php
require_once('iconos.php');
require_once(dirname(__FILE__).'/LoginController.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso registro | Dinámico Pedagogía y Diseño</title>
	<link rel="icon" href="img/cara.png" type="image/x-icon">
	<link rel="stylesheet" href="css/8_0_1_normalize.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap_5_3_0_min.css">
	<link rel="stylesheet" href="css/getbootstrap.com_docs_5.3_assets_css_docs.css">
	<link rel="stylesheet" href="css/styleParticulas.css">
	<link rel="stylesheet" href="css/formSmall.css" type="text/css">
	<link rel="stylesheet" href="css/formSmall_STD.css" type="text/css">
</head>
<body>
<!--particulas-->
<div id="particles-js"></div>

<div class="contenedor">
	<div class="Bienvenida">

	</div>
	<div class="formulario">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginCodeLicenceForm">
			<div class="contenedorFormulario">
				<div class="userTitle">
					<img src="img/formSmall/Registro@3x.png" alt="Completa tus datos para REGISTRARTE">
					<div id="ErrCodigos" class="bg-danger text-white"><?php echo $form_err;?></div>
				</div>
				<div class="userName">
					<div class="row">
						<div class="col-sm-12">
							<label for="codCartilla" class="form-label labelRF">Código de la Cartilla</label>
							<div class="input-group has-validation <?php echo (!empty($codlicence_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text spanRF" id="inputGroupCartilla"><?php echo $cartilla ?></span>
								<input type="text" class="form-control inputRF letraClave" name="licencecode" id="licencecode" placeholder="Código que viene en la portada de su cartilla" value="<?php echo $licencecode; ?>" autocomplete="off" require>
							</div>
						</div>
					</div>
				</div>
				<div class="userName">
					<div class="row">
						<div class="col-sm-12">
							<label for="codGrupo" class="form-label labelRF">Código del Grupo</label>
							<div class="input-group has-validation <?php echo (!empty($codgroup_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text spanRF" id="inputGroupGrupo"><?php echo $accesoPass ?></span>
								<input type="text" class="form-control inputRF letraClave" name="groupcode" id="groupcode" placeholder="Introduzca el código del grupo" value="<?php echo $variable1; ?>" autocomplete="off" require>
							</div>
						</div>
					</div>
				</div>
				<div class="userIngreso">
					<div class="row">
						<div class="col-6"><p>&nbsp;*Campo obligatorio.</p></div>
						<div class="col-6"><input type="submit" data-loading-text="Ingresando..." value="Registrarte"></div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="fondoMar">
		<img src="img/formSmall/marMico.svg" alt="">
	</div>
	<div class="fondoMicoCool">
		<img src="img/formSmall/miquitoCool@2x.png" alt="">
	</div>
</div>

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="js/LoginSTDcodigo.js"></script>
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>
</body>
</html>