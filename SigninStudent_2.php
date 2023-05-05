<?php
require_once(dirname(__FILE__).'/SigninStudentController.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incripcion | Dinámico Pedagogia y Diseño</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleFormPass.css">

	<script
      src="https://code.jquery.com/jquery-3.5.1.slim.js"
      integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
      crossorigin="anonymous"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- https://sweetalert.js.org/guides/ -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    <!--tipografia-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway&display=swap" rel="stylesheet">
    <!--particulas-->
    <link rel="stylesheet" href="css/styleParticulas.css">
	<style>
		.modal {
		display:    none;
		position:   fixed;
		z-index:    1000;
		top:        0;
		left:       0;
		height:     100%;
		width:      100%;
		background: rgba( 255, 255, 255, .8 ) 
					url('img/FhHRx.gif') 
					50% 50% 
					no-repeat;
		}
		body.loading .modal {
			overflow: hidden;   
		}
		body.loading .modal {
			display: block;
		}
	</style>
</head>
<body>
<!--particulas-->
<div id="particles-js"></div>
<div class="contenedor">
    <div class="container">
		<div class="row">
			<div class="col-12">
				<p class="text-center"><strong class="h1">¡Hola Dinamigo!</strong></p>
				<p class="text-center"><strong class="h2">Incripción Estudiante</strong></p>
			</div>
		</div> <!-- fin encabezado -->
		<br><br>
			<div class="cont_pest">		
			<ul class="select_main">
				<li>
					<input type="radio" name="select_main" id="select_1" class="main_select_s" checked>
					<div class="select_content">
						<div class="row">
							<div class="col-12">
								<p class="text-center"><small class="text-muted h5">Información de Grupo y Curso</small></p><br>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="table-responsive">
								<table class="table text-center">
									<thead class="table-light">
									<tr>
										<th scope="col">Profesor</th>
										<th scope="col">Nombre del Curso</th>
										<th scope="col">Grupo</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><?php echo $TeacherCompleteName ?></td>
										<td><?php echo $CourseName ?></td>
										<td><?php echo $GroupName ?></td>
									</tr>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<input type="radio" name="select_main" id="select_2" class="main_select_s">
					<div class="select_content">
						<div class="row">
							<div class="col-12">
								<p class="text-center"><small class="text-muted h5">Ingrese correo electrónico</small></p><br>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label class="form-label">Correo Electrónico Acudiente <span class="obligatorio"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16"><path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/></svg></span></label>
								<div class="input-group mb-2">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
											<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
										</svg>
									</span>
									<input type="email" required class="form-control" placeholder="Ej. micorreo@micorreo.com" autocomplete="off" id="Email_1" onchange="correoUno()">
								</div>
								<span class="obligatorio" id="correo_no">No pertenece a un correo electrónico</span>
							</div>
						</div>
						<div class="row">
							
								<div class="col-12">
									<label class="form-label">Repite Correo Electrónico Acudiente <span class="obligatorio"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16"><path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/></svg></span></label>
									<div class="input-group mb-2">
										<span class="input-group-text">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
												<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
											</svg>
										</span>
										<input type="email" required class="form-control" placeholder="Ej. micorreo@micorreo.com" autocomplete="off" id="Email_2" onchange="correoUno()">
									</div>
								</div>
								<span class="obligatorio" id="correo_diferente">Los correos no son iguales</span>
						</div>
					</div>
				</li>
				<li>
					<input type="radio" name="select_main" id="select_3" class="main_select_s">
					<div class="select_content">
						<div class="row">
							<div class="col-12">
								<p class="text-center"><small class="text-muted h5">Verificación de correo<br>Ingrese el codigo enviado a su correo</small></p><br>
							</div>
						</div>
						
						<div class="row">
							<div class="col"><input class="form-control" type="text" id="cod" onchange="codigos()"></div>			
						</div>

						<script>

						function enviacodigo(){
							var codigo = $("#veCod").val();
							var email = $("#Email_3").val();

							$.ajax(
								{
									url:'enviaCode.php',
									type: 'POST',
									data:{
										c:codigo,
										e:email
									},
								}
							);
						}

						</script>

						<!-- formulario envia codigo-->
							<div class="row">
								<div class="col-4"><input type="email" id="Email_3" readonly></div>
							</div>
							<div class="row">
								<div class="col-4"><input type="text" id="veCod" readonly></div>
								<div class="col-4"><input id="submit-btn" class="boton" type="submit" value="Enviar Codigo" onclick="enviacodigo()"></div>
							</div>
						<!-- fin formulario -->

							<div class="row">
								<div class="col"><p id="respa"></p></div>
							</div>

					</div>
				</li>
				<li>
					<input type="radio" name="select_main" id="select_4" class="main_select_s">
					<div class="select_content">
						<div class="row">
							<div class="col-12">
								<p class="text-center"><small class="text-muted h5">Ingrese su nombre completo</small></p><br>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<label class="form-label">Primer nombre <span class="obligatorio"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16"><path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/></svg></span></label>
								<div class="input-group mb-2">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
										</svg>
									</span>
									<input type="text" required class="form-control" placeholder="Ej. Maria" autocomplete="off" id="FirstName" onchange="valName_1()">
								</div>
								<span class="obligatorio" id="nombre_1">Error de caracteres</span>
							</div>
							<div class="col-6">
								<label class="form-label">Segundo nombre</label>
								<div class="input-group mb-2">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
										</svg>
									</span>
									<input type="text" class="form-control" placeholder="Ej. Jose" autocomplete="off" id="MiddleName" onchange="valName_2()">
								</div>
								<span class="obligatorio" id="nombre_2">Error de caracteres</span>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<label class="form-label">Primer apellido <span class="obligatorio"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16"><path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/></svg></span></label>
								<div class="input-group mb-2">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
										</svg>
									</span>
									<input type="text" required class="form-control" placeholder="Ej. Tesla" autocomplete="off" id="LastName" onchange="valName_3()">
								</div>
								<span class="obligatorio" id="apellido_1">Error de caracteres</span>
							</div>
							<div class="col-6">
								<label class="form-label">Segundo apellido</label>
								<div class="input-group mb-2">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
										</svg>
									</span>
									<input type="text" class="form-control" placeholder="Ej. Bonilla" autocomplete="off" id="SecondLastName" onchange="valName_4()">
								</div>
								<span class="obligatorio" id="apellido_2">Error de caracteres</span>
							</div>
						</div>
					</div>
				</li>
				<li>
					<input type="radio" name="select_main" id="select_5" class="main_select_s">
					<div class="select_content">
						<div class="row">
							<div class="col-12">
								<p class="text-center"><small class="text-muted h5">Ingrese sus datos de contacto</small></p><br>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label class="form-label">Teléfono Acudiente</label>
								<div class="input-group mb-2">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
											<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
										</svg>
									</span>
									<input type="text" class="form-control" placeholder="Ej. 3001234567" autocomplete="off" id="Phone" onchange="valDate()">
								</div>
								<span class="obligatorio" id="Err_telefono">Error de caracteres</span>
							</div>
						</div>		
						<div class="row">
							<div class="col-6">
								<label class="form-label">Nombre del Colegio <span class="obligatorio"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16"><path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/></svg></span></label>
									<div class="input-group mb-2">
										<span class="input-group-text">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
												<path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
											  </svg>
										</span>
										<input type="text" class="form-control" placeholder="Ej. Dinamico PD" autocomplete="off" id="Institution" onchange="valDate()">
									</div>
									<span class="obligatorio" id="Err_instituto">Error de caracteres</span>
							</div>
							<div class="col-6">
								<label class="form-label">Ciudad <span class="obligatorio"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16"><path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/></svg></span></label>
									<div class="input-group mb-2">
										<span class="input-group-text">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
												<path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
											  </svg>
										</span>
										<input type="text" class="form-control" placeholder="Ej. Tunja" autocomplete="off" id="City" onchange="valDate()">
									</div>
									<span class="obligatorio" id="Err_ciudad">Error de caracteres</span>
							</div>
						</div>
					</div>
				</li>
				<li>
					<input type="radio" name="select_main" id="select_6" class="main_select_s">
					<div class="select_content">
						<div class="row">
							<div class="col"><p class="h6 alert alert-danger"><strong>¡ALERTA! </strong>Si está seguro que su información es correcta de clic en enviar si no retroceda y cambiela recuerde que no podrá hacer cambios en un futuro
							</p></div>
						</div>
						<div class="row">
						<!-- formulario -->
						<main>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="inscripciondocenteForm">
								<div class="bg-danger text-white"><?php echo $form_err;?></div>
								<fieldset>
								   <br>
									<legend>Información personal</legend>
									<div class="input-group mb-3">
										<span class="input-group-text">Primer Nombre*</span>
										<input required type="text" placeholder="Primer Nombre*" name="FirstName" value="<?php echo $FirstName; ?>" class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">Segundo Nombre</span>
										<input type="text" placeholder="Segundo Nombre" name="MiddleName" value="<?php echo $MiddleName; ?>" class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">Primer Apellido*</span>
										<input required type="text" placeholder="Primer Apellido*" name="LastName" value="<?php echo $LastName; ?>" class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">Segundo Apellido</span>
										<input type="text" placeholder="Segundo Apellido" name="SecondLastName" value="<?php echo $SecondLastName; ?>" class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">Teléfono Acudiente</span>
										<input type="tel" placeholder="Teléfono Acudiente" name="Phone" value="<?php echo $Phone; ?>" class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">E-mail del Acudiente*</span>
										<input required type="email" placeholder="E-mail del Acudiente*" value="<?php echo $Email; ?>" name="Email" class="form-control" readonly>
									</div>
								</fieldset>
								<br>
								<fieldset>
									<legend>Informacion de Colegio</legend>
									<div class="input-group mb-3">
										<span class="input-group-text">Nombre del Colegio*</span>
										<input type="text" required placeholder="Nombre del Colegio*" name="Institution" value="<?php echo $Institution; ?>" class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">Ciudad*</span>
									<input type="text" placeholder="Ciudad*" value="<?php echo $City; ?>" name="City" required class="form-control" readonly>
									</div>
								</fieldset>
								<br>
								<input class="boton" type="submit" value="Enviar Inscripción">
            					</form>
							</main>
						</div>
					</div>
				</li>
				
			</ul>
			<div class="row flechas">
				<div class="col" style="text-align:start;" id="FlIzq">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
					</svg>
				</div>
				<div class="col" style="text-align:end;" id="FlDer">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
				  	</svg>
				</div>
			</div>

				<div class="pestana">
					<div class="select">
						<div class="row">
							<div class="col" id="se_1"><label class="btn_pest" for="select_1">Grupo y Curso</label></div>
							<div class="col" id="se_2"><label class="btn_pest" for="select_2">Correo Electrónico</label></div>
							<div class="col" id="se_3"><label  class="btn_pest" for="select_3">Verificación de Correo</label></div>
							<div class="col" id="se_4"><label  class="btn_pest" for="select_4">Nombre completo</label></div>
							<div class="col" id="se_5"><label  class="btn_pest" for="select_5">Datos personales</label></div>
							<div class="col" id="se_6"><label  class="btn_pest" for="select_6">Enviar Formulario</label></div></div>
						</div>
					</div>
				</div>

			</div>
	</div>
	
</div>

<div class="footer">
	<div class="contGridFooter">
		<div class="griRowC1_3 align-self-center"><a href="http://dinamicopd.com/"  target="_blank"><img class="logoForm" src="img/logo 2.png" alt="logo dinamico pd"></a></div>
		<div class="griRowC2_3 align-self-center">
			<table style="text-align: left; margin: auto;">
				<tr>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
							<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg>
					</td>
					<td>Cra 2E # 73 - 25</td>
				</tr>
				<tr>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
							<path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
							<path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
						</svg>
					</td>
					<td>3123000100 | 3123010101</td>
				</tr>
				<tr>
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
							<path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
						</svg>
					</td>
					<td>dinamicopdadm@gmail.com</td>
				</tr>
			</table>
		</div>
		<div class="griRowC3_3 align-self-center">
			<table style="margin: auto;">
				<tr>
					<td>
						<a class="fb" target="_blank" href="https://www.facebook.com/DinamicoColombia/">
							<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
								<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
							</svg>
						</a>
					</td>
					<td>
						<a class="yt" target="_blank" href="https://www.youtube.com/channel/UCPSLG3t9l1DO1tEu9NjdK8A">
							<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
								<path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
							</svg>
						</a>
					</td>
					<td>
						<a class="in" target="_blank" href="https://www.instagram.com/dinamicopd/">
							<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
								<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
							</svg>
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<!-- validar formulario -->
<script src="js/formularioIns.js"></script>
<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--particulas-->
<script src="js/particles.js"></script>
<script src="js/lib/stats.js"></script>
<script src="js/app.js"></script>
    
</body>
<div class="modal"><!-- Place at bottom of page --></div>
</html>