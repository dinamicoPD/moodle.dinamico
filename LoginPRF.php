<?php
require_once('iconos.php');
require_once(dirname(__FILE__).'/asesorController.php');
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
							<label for="codAsesor" class="form-label labelRF">Código del asesor*</label>
							<div class="input-group has-validation">
								<span class="input-group-text spanRF" id="inputGroupAsesor"><?php echo $accesoPass ?></span>
								<input type="text" class="form-control inputRF letraClave <?php echo $is_codAsesor_err ?>" name="licenceAsesor" id="licenceAsesor" placeholder="Código del asesor de ventas" value="<?php echo $licenceAsesor; ?>" autocomplete="off" require aria-describedby="validationAsesorFeedback" <?php echo $bloqueoAsesor?> >
								<div id="validationAsesorFeedback" class="invalid-feedback alert alert-danger">
									No se pudo verificar el código del asesor. Por favor, revisa e intenta nuevamente
								</div>
								<div class="valid-feedback alert alert-success">
									Perfecto, ahora verifica el nombre de tu asesor
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="userName" style="visibility: <?php echo ($is_nameAsesor === false) ? 'hidden' : 'visible'; ?>">
					<div class="row">
						<div class="col-sm-12">
							<label for="codNameAsesor" class="form-label labelRF">Confirma nombre del asesor*</label>
							<div class="input-group has-validation">
								<span class="input-group-text spanRF" id="inputGroupNameAsesor"><?php echo $iconoasesor ?></span>

								<select name="nombresAsesores" class="form-select inputRF <?php echo (!empty($codNameAsesor_err)) ? 'is-invalid' : ''; ?>" aria-describedby="validationNameAsesorFeedback">
									<option value="" selected>Selecciona nombre del asesor</option>
									<?php echo $NameAsesor; ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="userIngreso">
					<div class="row">
						<div class="col-6"><p>&nbsp;*Campo obligatorio.</p></div>
						<div class="col-6"><input type="submit" data-loading-text="Ingresando..." value="<?php echo $btnAsesor; ?>"></div>
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
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>
</body>
</html>