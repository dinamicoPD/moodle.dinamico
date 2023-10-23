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
					<div class="bg-danger text-white"><?php echo $form_err;?></div>
				</div>
				<div class="userName">
					<div class="row">
						<div class="col-sm-12">
							<label for="codCartilla" class="form-label labelRF">Código de la Cartilla</label>
							<div class="input-group has-validation <?php echo (!empty($codlicence_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text spanRF" id="inputGroupCartilla"><?php echo $cartilla ?></span>
								<input type="text" class="form-control inputRF" name="licencecode" id="licencecode" placeholder="Introduzca el código que viene en la portada de su cartilla" value="<?php echo $licencecode; ?>" autocomplete="off" require>
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
								<input type="text" class="form-control inputRF" name="groupcode" id="groupcode" placeholder="Introduzca el código del grupo" value="<?php echo $variable1; ?>" autocomplete="off" require>
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
<!--
<div class="contenedor">
	<div class="container">
		<div class="row">
			<div class="bg-danger text-white"><?php echo $form_err;?></div>
				<div class="col">
					<p class="h1"><strong>¡Hola Dinamigo!</strong></p>
					<p><small class="text-muted h5">Completa tus codigos para ingresar</small></p><br>
				</div>
				<br>
				<div class="row">
					<div class="col">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginCodeLicenceForm">
							<label class="form-label">Código de la Cartilla</label>
							<div class="input-group mb-3 <?php echo (!empty($codlicence_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
										<path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
									</svg>
								</span>
								<input type="username" class="form-control" name="licencecode" id="licencecode" placeholder="Introduzca el código que viene en la portada de su cartilla" value="<?php echo $licencecode; ?>" autocomplete="off">
								<span class="help-block"></span>
							</div>

							<label class="form-label">Código del Grupo</label>
							<div class="input-group mb-3 <?php echo (!empty($codgroup_err)) ? 'has-error' : ''; ?>">
								<span class="input-group-text">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
										<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
										<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
									</svg>
								</span>
								<input type="username" class="form-control" name="groupcode" id="groupcode" placeholder="Introduzca el código del grupo" value="<?php echo $variable1; ?>" autocomplete="off">
								<span class="help-block"></span>
							</div>
							<br>
							<input type="submit" class="boton" data-loading-text="Ingresando..." value="Ingresar">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
-->

<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script><script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="js/code.jquery.com_jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>
</body>
</html>