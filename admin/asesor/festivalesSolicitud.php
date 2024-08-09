<?php
    session_start();
    if(!isset($_SESSION["loggedinAsesor"]) || $_SESSION["loggedinAsesor"] != true){
        header("location: ../AdminLogin.php");
        exit;
    }

    $asesor = $_SESSION["username"];
    $UserId = $_SESSION["loggedinUserId"];
    require('componentes.php');
    include('../../cargar_departamentos.php');
    include('festivalesSolicitudController.php');
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Manager | Dinámico pedagogía y diseño</title>

		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <script src="../js/index.global.js"></script>

        <script src="../../js/sweetAlert/sweetalert.min.js"></script>
        <link rel="stylesheet" href="../../css/sweetAlert/sweetalert2.min.css">
	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
					<div class="sidebar-brand-icon rotate-n-15">
						<img style="width: 80%" src="../../../../img/logo_blanco.png" alt="Dinámico pedagogía y diseño">
					</div>
					<div class="sidebar-brand-text mx-3">DINÁMICO PEDAGOGÍA Y DISEÑO</div>
				</a>
				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="index.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				
				<?php echo $menu; ?>

				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
						<ul class="navbar-nav ml-auto">

							<li class="nav-item dropdown no-arrow d-sm-none">
								<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-search fa-fw"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
									<form class="form-inline mr-auto w-100 navbar-search">
										<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
											</div>
										</div>
									</form>
								</div>
							</li>
							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $asesor; ?></span>
									<img class="img-profile rounded-circle" src="img/undraw_profile.svg">
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>

						</ul>

					</nav>
					<!-- End of Topbar -->

					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Solicitud Asignación de Actividades</h1>
						</div>					

						<div class="col-12 mb-4">
                            <div class="card border-bottom-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="mb-0 font-weight-bold text-gray-800">
                                                <div class="font-weight-bold text-danger text-uppercase mb-1">
                                                    Recuerde diligenciar cada uno de los espacios, la información debe ser clara y precisa de forma tal que nos permita brindar un servicio óptimo. 
                                                    Para garantizar el pago de la comisión es necesario que realice las siguientes acciones:
                                                </div>
                                                
                                                <ul>
                                                    <li>Enviar listas digitalizadas en Word o Excel actualizadas una semana antes de la actividad.</li>
                                                    <li>Estar en contacto directo y constante con la institución para la ejecución de la actividad.</li>
                                                    <li>Enviar la información previa a la capacitación (videos, formatos de asignación de guardianes de estación y cronograma de la actividad).</li>
                                                    <li>Diligenciar el formato Plan Operativo de Actividad (POA) de asignación de juegos, número de bases y actividades a desarrollar.</li>
                                                    <li>Enviar fotos y evidencias del desarrollo de la actividad en tiempo real (a la hora que se este ejecutando cada una de las actividades y desde el momento en que se organiza la actividad hasta que finaliza).</li>
                                                    <li>Informar a la Institución que el pago se debe realizar según consolidado de listas.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="mb-0 font-weight-bold text-gray-800">
                                                <div class="h2 font-weight-bold text-success text-uppercase mb-1">
                                                    Formulario de solicitud 
                                                </div>
                                                
                                                <hr class="border-bottom-success">

                                                <form id="formSolicitud" action="formFestivalSolicitud.php" method="post">
                                                    <input type="hidden" name="UserId" value="<?php echo $UserId ?>"> <!-- --------------------- -->
                                                    <div class="form-group row">
                                                        <div class="col mx-3 my-1">
                                                            <label class="text-success" for="Departamento">Departamento</label>
                                                            <select name="Departamento" class="form-control form-control-user" id="Departamento"> <!-- --------------------- -->
                                                                <option selected disabled value="">Seleccionar</option>
                                                                <?php echo $departamentoFull; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col mx-3 my-1">
                                                            <label class="text-success" for="Ciudad">Ciudad</label>
                                                            <select name="Ciudad" class="form-control form-control-user" id="Ciudad" > <!-- --------------------- -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row px-3 py-1">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="text-success" for="Institucion">Institucion</label>
                                                            <select name="Institucion" class="form-control form-control-user" id="Institucion"> <!-- --------------------- -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 otraInstitucion">
                                                            <label class="text-success" for="institucionOtro">Otro</label>
                                                            <input type="text" name="institucionOtro" class="form-control form-control-user" id="institucionOtro"
                                                                placeholder="Cual?" onchange="nombreFull('#institucionOtro')"> <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <div class="col mx-3 my-1">
                                                            <label class="text-success" for="Nombrecontacto">Nombre contacto institución educativa</label>
                                                            <input type="text" name="Nombrecontacto" class="form-control form-control-user" id="Nombrecontacto"
                                                                placeholder="Nombre contacto institución educativa" onchange="nombreFull('#Nombrecontacto')" > <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col mx-3 my-1">
                                                            <label class="text-success" for="Numerocontacto">Número de teléfono contacto institución educativa</label>
                                                            <input type="number" name="Numerocontacto" class="form-control form-control-user" id="Numerocontacto"
                                                                placeholder="Número de teléfono contacto institución educativa" onchange="numeroFull('#Numerocontacto')" > <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col mx-3 my-1">
                                                            <p class="text-success">Área de la actividad</p>
                                                            <div class="form-check">
                                                                <input name="CienciasNaturales" class="form-check-input" type="checkbox" value="1" id="CienciasNaturales">
                                                                <label class="form-check-label" for="CienciasNaturales">
                                                                    Ciencias Naturales
                                                                </label>
                                                                </div>
                                                            <div class="form-check">
                                                                <input name="Lenguaje" class="form-check-input" type="checkbox" value="2" id="Lenguaje">
                                                                <label class="form-check-label" for="Lenguaje">
                                                                    Lenguaje
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input name="Matematicas" class="form-check-input" type="checkbox" value="3" id="Matematicas">
                                                                <label class="form-check-label" for="Matematicas">
                                                                    Matemáticas
                                                                </label>
                                                                </div>
                                                            <div class="form-check">
                                                                <input name="Ingles" class="form-check-input" type="checkbox" value="4" id="Ingles">
                                                                <label class="form-check-label" for="Ingles">
                                                                    Inglés
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input name="Sociales" class="form-check-input" type="checkbox" value="5" id="Sociales">
                                                                <label class="form-check-label" for="Sociales">
                                                                    Sociales
                                                                </label>
                                                                </div>
                                                            <div class="form-check">
                                                                <input name="RolFinanciero" class="form-check-input" type="checkbox" value="6" id="RolFinanciero">
                                                                <label class="form-check-label" for="RolFinanciero">
                                                                    Rol Financiero
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input name="RolEmprendimiento" class="form-check-input" type="checkbox" value="7" id="RolEmprendimiento">
                                                                <label class="form-check-label" for="RolEmprendimiento">
                                                                    Rol Emprendimiento
                                                                </label>
                                                                </div>
                                                            <div class="form-check">
                                                                <input name="RallyFinanciero" class="form-check-input" type="checkbox" value="8" id="RallyFinanciero">
                                                                <label class="form-check-label" for="RallyFinanciero">
                                                                    Rally Financiero
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col mx-3 my-1">
                                                            <p class="text-success">Actividades a realizar</p>
                                                            <div class="form-check">
                                                                <input name="Prueba" class="form-check-input" type="checkbox" value="1" id="Prueba">
                                                                <label class="form-check-label" for="Prueba">
                                                                    Prueba
                                                                </label>
                                                                </div>
                                                            <div class="form-check">
                                                                <input name="ActividadSalon" class="form-check-input" type="checkbox" value="2" id="ActividadSalon">
                                                                <label class="form-check-label" for="ActividadSalon">
                                                                    Actividad de Salón
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input name="Rally" class="form-check-input" type="checkbox" value="3" id="Rally">
                                                                <label class="form-check-label" for="Rally">
                                                                    Rally
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col mx-3 my-1">
                                                            <p class="text-success">La actividad que realizará en Preescolar, Seleccione N/A en cada grado sino se realizará, de lo contrario seleccione el número de cursos que hay por cada grado</p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Prejardín:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="PrejarNA" class="form-check-input" type="checkbox" value="PrejarNA" id="PrejarNA" checked onchange="rangoInputNA('Prejar')">
                                                            <label class="form-check-label" for="PrejarNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input style="width:100%" name="Prejar" value="0" type="range" class="form-range" id="Prejar" min="0" max="9" step="1" onchange="rangoInput('Prejar')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="PrejarSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Jardín:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="JardinNA" class="form-check-input" type="checkbox" value="JardinNA" id="JardinNA" checked onchange="rangoInputNA('Jardin')">
                                                            <label class="form-check-label" for="JardinNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input style="width:100%" name="Jardin" value="0" type="range" class="form-range" id="Jardin" min="0" max="9" step="1" onchange="rangoInput('Jardin')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="JardinSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Transición:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="TransicionNA" class="form-check-input" type="checkbox" value="TransicionNA" id="TransicionNA" checked onchange="rangoInputNA('Transicion')">
                                                            <label class="form-check-label" for="TransicionNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input style="width:100%" name="Transicion" value="0" type="range" class="form-range" id="Transicion" min="0" max="9" step="1" onchange="rangoInput('Transicion')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="TransicionSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1 mt-2">
                                                        <div class="col-12">
                                                            <label class="text-success" for="numPres">Si la actividad que realizará en Preescolar, indique el número promedio de estudiantes.</label>
                                                            <input type="number" name="numPres" class="form-control form-control-user" id="numPres" onchange="numeroFull('#numPres')" > <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col mx-3 my-1">
                                                            <p class="text-success">La actividad que realizará en Primaria, Seleccione N/A  en cada grado sino se realizará, de lo contrario seleccione el número de cursos que hay por cada grado</p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Primero:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="PrimeroNA" class="form-check-input" type="checkbox" value="PrimeroNA" id="PrimeroNA" checked onchange="rangoInputNA('Primero')">
                                                            <label class="form-check-label" for="PrimeroNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Primero" style="width:100%" value="0" type="range" class="form-range" id="Primero" min="0" max="9" step="1" onchange="rangoInput('Primero')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="PrimeroSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Segundo:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="SegundoNA" class="form-check-input" type="checkbox" value="SegundoNA" id="SegundoNA" checked onchange="rangoInputNA('Segundo')">
                                                            <label class="form-check-label" for="SegundoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Segundo" style="width:100%" value="0" type="range" class="form-range" id="Segundo" min="0" max="9" step="1" onchange="rangoInput('Segundo')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="SegundoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Tercero:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="TerceroNA" class="form-check-input" type="checkbox" value="TerceroNA" id="TerceroNA" checked onchange="rangoInputNA('Tercero')">
                                                            <label class="form-check-label" for="TerceroNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Tercero" style="width:100%" value="0" type="range" class="form-range" id="Tercero" min="0" max="9" step="1" onchange="rangoInput('Tercero')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="TerceroSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Cuarto:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="CuartoNA" class="form-check-input" type="checkbox" value="CuartoNA" id="CuartoNA" checked onchange="rangoInputNA('Cuarto')">
                                                            <label class="form-check-label" for="CuartoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Cuarto" style="width:100%" value="0" type="range" class="form-range" id="Cuarto" min="0" max="9" step="1" onchange="rangoInput('Cuarto')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="CuartoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Quinto:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="QuintoNA" class="form-check-input" type="checkbox" value="QuintoNA" id="QuintoNA" checked onchange="rangoInputNA('Quinto')">
                                                            <label class="form-check-label" for="QuintoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Quinto" style="width:100%" value="0" type="range" class="form-range" id="Quinto" min="0" max="9" step="1" onchange="rangoInput('Quinto')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="QuintoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-12">
                                                            <label class="text-success" for="numPri">Si la actividad que realizará en Primaria indique el número promedio de estudiantes. Si no aplica escriba 0.</label>
                                                            <input type="number" name="numPri" class="form-control form-control-user" id="numPri" onchange="numeroFull('#numPri')" > <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col mx-3 my-1">
                                                            <p class="text-success">La actividad que realizará en Bachillerato, Seleccione N/A en cada grado sino se realizará, de lo contrario seleccione el número de cursos que hay por cada grado.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Sexto:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="SextoNA" class="form-check-input" type="checkbox" value="SextoNA" id="SextoNA" checked onchange="rangoInputNA('Sexto')">
                                                            <label class="form-check-label" for="SextoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Sexto" style="width:100%" value="0" type="range" class="form-range" id="Sexto" min="0" max="9" step="1" onchange="rangoInput('Sexto')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="SextoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Séptimo:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="SeptimoNA" class="form-check-input" type="checkbox" value="SeptimoNA" id="SeptimoNA" checked onchange="rangoInputNA('Septimo')">
                                                            <label class="form-check-label" for="SeptimoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Septimo" style="width:100%" value="0" type="range" class="form-range" id="Septimo" min="0" max="9" step="1" onchange="rangoInput('Septimo')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="SeptimoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Octavo:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="OctavoNA" class="form-check-input" type="checkbox" value="OctavoNA" id="OctavoNA" checked onchange="rangoInputNA('Octavo')">
                                                            <label class="form-check-label" for="OctavoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Octavo" style="width:100%" value="0" type="range" class="form-range" id="Octavo" min="0" max="9" step="1" onchange="rangoInput('Octavo')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="OctavoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Noveno:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="NovenoNA" class="form-check-input" type="checkbox" value="NovenoNA" id="NovenoNA" checked onchange="rangoInputNA('Noveno')">
                                                            <label class="form-check-label" for="NovenoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Noveno" style="width:100%" value="0" type="range" class="form-range" id="Noveno" min="0" max="9" step="1" onchange="rangoInput('Noveno')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="NovenoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Décimo:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="DecimoNA" class="form-check-input" type="checkbox" value="DecimoNA" id="DecimoNA" checked onchange="rangoInputNA('Decimo')">
                                                            <label class="form-check-label" for="DecimoNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Decimo" style="width:100%" value="0" type="range" class="form-range" id="Decimo" min="0" max="9" step="1" onchange="rangoInput('Decimo')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="DecimoSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1">
                                                        <div class="col-2">
                                                            <p><strong>Once:</strong></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="OnceNA" class="form-check-input" type="checkbox" value="OnceNA" id="OnceNA" checked onchange="rangoInputNA('Once')">
                                                            <label class="form-check-label" for="OnceNA">
                                                                N/A
                                                            </label>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="Once" style="width:100%" value="0" type="range" class="form-range" id="Once" min="0" max="9" step="1" onchange="rangoInput('Once')"> <!-- --------------------- -->
                                                        </div>
                                                        <div class="col-2">
                                                            <p><strong>Cantidad:</strong> <span id="OnceSpan">0</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 py-1 mt-2">
                                                        <div class="col-12">
                                                            <label class="text-success" for="numbach">Si la actividad que realizará en Bachillerato, indique el número promedio de estudiantes. Si no aplica escriba 0.</label>
                                                            <input type="number" name="numbach" class="form-control form-control-user" id="numbach" onchange="numeroFull('#numbach')" > <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col mx-3 my-1">
                                                            <p class="text-success">Estudiantes encargados de la logística</p>
                                                            <div class="form-check">
                                                                <input name="logDecimo" class="form-check-input" type="checkbox" value="10" id="logDecimo"> <!-- --------------------- -->
                                                                <label class="form-check-label" for="logDecimo">
                                                                    Décimo
                                                                </label>
                                                                </div>
                                                            <div class="form-check">
                                                                <input name="LogUndecimo" class="form-check-input" type="checkbox" value="11" id="LogUndecimo"> <!-- --------------------- -->
                                                                <label class="form-check-label" for="LogUndecimo">
                                                                    Undécimo
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mx-3 my-1">
                                                        <div class="col-12">
                                                            <label for="LogOtro">Otro</label>
                                                            <input type="text" name="LogOtro" class="form-control form-control-user" id="LogOtro" placeholder="Cual?" onchange="nombreFull('#LogOtro')"> <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row mt-2">
                                                        <div class="col mx-3 my-1">
                                                            <label class="text-success" for="Abono">Abono (recuerde que debe hacerse desde el 10%)</label>
                                                            <input type="number" name="Abono" class="form-control form-control-user" id="Abono" onchange="numeroFull('#Abono')" > <!-- --------------------- -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card shadow mb-4">
                                                                <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold text-primary">Seleccione la fecha tentativa de la capacitación y/o del festival haciendo clic en el día correspondiente del calendario, según sus necesidades:</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                <hr>
                                                                <div class="row mt-2">
                                                                    <div class="col mx-3 my-1">
                                                                        <p class="text-success">Requiere apoyo de docentes del grupo Dinámico Pedagogía y Diseño para la capacitación</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row px-3 py-1">
                                                                    <div class="col-10">
                                                                        <input style="width:100%" value="<?php echo $valorInicial; ?>" type="range" class="form-range" id="personalCapacitacion" min="<?php echo $valorInicial; ?>" max="5" step="1" onchange="rangoInput('personalCapacitacion')">
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <p><strong>Cantidad:</strong> <span id="personalCapacitacionSpan"><?php echo $valorInicial; ?></span></p>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col mx-3 my-1">
                                                                        <p class="text-success">Requiere apoyo de docentes del grupo Dinámico Pedagogía y Diseño para la actividad</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row px-3 py-1">
                                                                    <div class="col-10">
                                                                        <input style="width:100%" value="<?php echo $valorInicial; ?>" type="range" class="form-range" id="personalActividad" min="<?php echo $valorInicial; ?>" max="5" step="1" onchange="rangoInput('personalActividad')">
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <p><strong>Cantidad:</strong> <span id="personalActividadSpan"><?php echo $valorInicial; ?></span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row px-3 py-1">
                                                                    <div class="col-md-2">
                                                                        <p><strong>Fecha capacitación:</strong></p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="date" name="fechaCapacitacion" id="fechaCapacitacion" class="form-control form-control-user inputCapacitacion" readonly >
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <p><strong>Personal capacitación:</strong></p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="number" name="PersonalCapacitacionDef" id="PersonalCapacitacionDef" class="form-control form-control-user inputCapacitacion" readonly >
                                                                    </div>
                                                                </div>
                                                                <div class="row px-3 py-1">
                                                                    <div class="col-md-2">
                                                                        <p><strong>Fecha evento:</strong></p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="date" name="fechaFestival" id="fechaFestival" class="form-control form-control-user inputEvento" readonly >
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <p><strong>Personal evento:</strong></p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="number" name="eventoCapacitacionDef" id="eventoCapacitacionDef" class="form-control form-control-user inputEvento" readonly >
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                    <div id='calendar'></div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <button id="btnSolicitud" style="float: right" type="button" class="btn btn-success btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Enviar solicitud</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Dinámico Pedagogía y diseño 2024</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
					</div>
					<div class="modal-body">Seleccione "Logout" a continuación si está listo para finalizar su sesión actual.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<form action="../logout.php" method="post">
							<button class="btn btn-primary" type="submit">Logout</button>
						</form>
					</div>
				</div>
			</div>
		</div>

        <div class="modal fade" id="enviarSolicitud" tabindex="-1" role="dialog" aria-labelledby="btntituloModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="btntituloModal"></h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
					</div>
					<div class="modal-body" id="mensajeModalSolicitud"></div>
					<div class="modal-footer" id="btnSolicitudModal"></div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages -->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins-->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>

        <!-- arreglos formulario -->
        <script src="js/departamentoCiudad.js"></script>
        <script src="js/CiudadInstituto.js"></script>
        <script src="js/otroInstituto.js"></script>
        <script src="js/caracteresValidar.js"></script>
        <script src="js/rangoInput.js"></script>
        <script src="js/calendarioEvento.js"></script>
        <script src="js/verificarSolicitud.js"></script>

	</body>

	</html>