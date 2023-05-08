<?php
include("admUserController.php");
session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Usuarios | Dinamico</title>

    <link rel="stylesheet" href="css/admiGestor.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/cateInsert.js"></script>

	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<script src="js/buttons/dataTables.buttons.min.js"></script>
	<script src="js/buttons/jszip.min.js"></script>
	<script src="js/buttons/pdfmake.min.js"></script>
	<script src="js/buttons/vfs_fonts.js"></script>
	<script src="js/buttons/buttons.html5.min.js"></script>

	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<script src="js/data.js"></script>
	<style type="text/css">
	.dt-buttons{
		float: right;
	}
	</style>

	<!-- https://sweetalert.js.org/guides/ -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- <style>
    .modal_load {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .3 ) 
                url('img/FhHRx.gif') 
                50% 50% 
                no-repeat;
    }
</style>
-->
</head>
<body>
<header>
		<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
		  <div class="container-fluid">
			<a class="navbar-brand" href="http://85.187.158.12/moodle/admin/cron.php" target="_blank"><img src="img/logo 2.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <label class="nav-link active" for="select_1">Gestor licencias</label>
				</li>
				<li class="nav-item dropdown">
				  <label class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrar usuarios</label>
				  	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><label class="dropdown-item" for="select_21">Profesores</label></li>
						<li><label class="dropdown-item" for="select_22">Estudiantes</label></li>
					</ul>
				</li>
				<!-- <li class="nav-item">
				  <label class="nav-link" aria-current="page" for="select_3">Parametrizar categorias</label>
				</li> -->
				<li class="nav-item">
				  <a class="nav-link" href="./phpMyAdmin513" target="_blank">phpMyAdmin</a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
</header>
<hr>
    <ul class="select_main">
        <li>
            <input type="radio" name="select_main" id="select_1" class="main_select_s" onchange="estadoPes()" checked>
            <div class="select_content">
                
			<div class="contenedor">
			<div class="row">
			  <div class="col">


<div class="container-fluid">
<br><br>
<h2>Gestor de Licencias</h2>	
	<div class="col-lg-12 col-md-10 col-sm-9 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-3" align="right">
					<button type="button" name="add" id="addLicence" class="btn btn-success btn-xs">Agregar Licencia</button>
				</div>
				<div class="col-md-3" align="right">
					<button type="button" name="add" id="addSeveralLicences" class="btn btn-primary btn-xs">Agregar Licencias</button>
				</div>
			</div>
		</div>
		<br><br>
		<div class="table-responsive">
		<table id="licenceList" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>				
					<th>Email</th>
					<th>Nombre de Usuario</th>				
					<th>Fecha Finalización</th>
					<th>Titulo</th>
					<th>Codigo</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th></th>
					<th></th>
					<th></th>		
					<th></th>			
				</tr>
			</thead>
		</table>
		</div>
	</div>


<div id="licenceModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="licenceForm">
    			<div class="modal-content">
    				<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit User</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="licRol" class="control-label">Rol</label>
							<select id="licRol" class="form-control" name="licRol" required>
								  <option value="Profesor">Profesor</option>
								  <option value="Estudiante">Estudiante</option>
							</select>		
						</div>
						<div class="form-group">
							<label for="code" class="control-label">Codigo Cartilla</label>							
							<input type="text" class="form-control" id="licCode" name="licCode" placeholder="Codigo" required>
							<button type="button" class="btn btn-success generate">Generar</button>
							<br><br>
						</div>	
						<div class="form-group">
							<label for="licName" class="control-label">Título Cartilla</label>							
							<input type="text" class="form-control" id="licName" name="licName" placeholder="Titulo Cartilla">							
						</div>	   	   	
						<div class="form-group">
							<label for="licExpr" class="control-label">Fecha Caducidad (dd/mm/yyyy)</label>							
							<input type="date" class="form-control"  id="licExpr" name="licExpr" placeholder="Fecha Caducidad" required>							
						</div>	 				
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="licId" id="licId" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
    <div id="groupsModalTeacher" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="groupTeacherForm">
				<div class="modal-content">
					<center>
					<div class="modal-body">
						<table id="groupListTeacher" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Curso</th>
									<th>Grupo</th>
									<th>Codigo</th>				
								</tr>
							</thead>
						</table>
					</div>
				<div class="modal-footer">
				</div>
					</center>
				</div>
    		</form>
    	</div>
    </div>
    <div id="groupsModalStudent" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="groupStudentForm">
				<div class="modal-content">
					<center>
					<div class="modal-body">
						<table id="groupListStudent" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre Curso</th>
									<th>Nombre Grupo</th>	
								</tr>
							</thead>
						</table>
					</div>
					<div class="modal-footer">
					</div>
					</center>
				</div>
    		</form>
    	</div>
    </div>
    <div id="modalMultipleLicences" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="multipleLicenceForm">
    			<div class="modal-content">
    			<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-plus"></i>Crear Licencias Masivo</h4>
    				</div>
    					<div class="modal-body">
    						<div class="form-group">
								<label for="licRolMassive" class="control-label">Rol</label>
								<select id="licRolMassive" class="form-control" name="licRolMassive" required>
									  <option value="Profesor">Profesor</option>
									  <option value="Estudiante">Estudiante</option>
								</select>		
							</div>
							<div class="form-group">
								<label for="licNameMassive" class="control-label">Título Cartilla</label>							
								<input type="text" class="form-control" id="licNameMassive" name="licNameMassive" placeholder="Titulo Cartilla">	
							</div>
							<div class="form-group">
								<lable for="licAmountMassive" class="control-label">Número de Licencias</lable>
								<input type="number" class="form-control" id="licAmountMassive" name="licAmountMassive" placeholder="Cantidad" required>
							</div>
							<div class="form-group">
								<label for="licExprMassive" class="control-label">Fecha Caducidad (dd/mm/yyyy)</label>							
								<input type="date" class="form-control"  id="licExprMassive" name="licExprMassive" placeholder="Fecha Caducidad" required>
							</div>	

    					</div>
    					<div class="modal-footer">
    						<input type="hidden" name="action" id="action" value="" />
    						<input type="submit" name="saveMassive" id="saveMassive" class="btn btn-info" value="Guardar" />
    					</div>
    			</div>
    		</form> 
    	</div>
    </div>
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>

			</div>
		</div>
	</div>			




            </div>
        </li>
        <li>
		<input type="radio" name="select_main" id="select_21" class="main_select_s" onchange="estadoPes()">
            <div class="select_content">
                <div class="contenedor">
				<div class="row">
					<div class="col">
						<p class="h2">Administrador Usuarios - Profesores</p>
					</div>
				</div>
				<div class="row">
					<div class="col-6"></div>
					<div class="col-6">
						<a class="btn btn-success" href="exportarExcel.php?perfil=2">licencias disponibles
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
								<path d="M6 12v-2h3v2H6z"/>
								<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z"/>
							</svg>
						</a>
						<button type="button" class="btn btn-danger" onclick=deletePFE()>Eliminar</button>
						<label id="slt_checktodosPFE" for="checktodosPFE" class="btn btn-warning">Seleccionar todo</label>
						<input type="checkbox" id="checktodosPFE" style="visibility:hidden;">
					</div>
					<br><br>
				</div>
                
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead class="table-dark">
								<tr>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Usuario</th>
									<th>Ciudad</th>
									<th>Licencia</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody id="pfe_recargar">
								<?php
									echo $foundUserPfe;
								?>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </li>
        <li>
            <input type="radio" name="select_main" id="select_22" class="main_select_s" onchange="estadoPes()">
            <div class="select_content">
                <div class="contenedor">
				<div class="row">
					<div class="col">
						<p class="h2">Administrador Usuarios - Estudiantes</p>
					</div>
				</div>
				<div class="row">
					<div class="col-6"></div>
					<div class="col-6">
						<a class="btn btn-success" href="exportarExcel.php?perfil=1">licencias disponibles
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
								<path d="M6 12v-2h3v2H6z"/>
								<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z"/>
							</svg>
						</a>
						<button type="button" class="btn btn-danger" onclick=deleteSTD()>Eliminar</button>
						<label id="slt_checktodosETD" for="checktodosETD" class="btn btn-warning">Seleccionar todo</label>
						<input type="checkbox" id="checktodosETD" style="visibility:hidden;">
					</div>
					<br><br>
				</div>
                
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead class="table-dark">
								<tr>
									<th>Nombre</th>
									<th>Correo</th>
									<th>usuario</th>
									<th>Instituto</th>
									<th>Licencia</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody id="std_recargar">
								<?php
									echo $foundUserStd;
								?>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </li>
        <li>
            <input type="radio" name="select_main" id="select_3" class="main_select_s" onchange="estadoPes()">
            <div class="select_content">
                <div class="contenedor">
                
					<div class="row">
						<div class="col">
							<p class="h2 text-center">Parametrizar Categorias</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editar_parametros" onclick="actualizarParametro()">Parametrizar</button>
						</div>
						<div class="col"></div>
						<div class="col">
							<button type="button" class="btn btn-danger" onclick=deletePara()>Eliminar</button>
							<label id="slt_all_para" for="check_todos_para" class="btn btn-warning">Seleccionar todo</label>
							<input type="checkbox" id="check_todos_para" style="visibility:hidden;">
						</div>
						<br><br>
					</div>
					<!-- TABLA PARAMETRIZACION -->
					<div class="row">
						<div class="col">
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead class="table-dark">
										<tr>
											<th>Id</th>
											<th>Curso</th>
											<th>Categoria</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody id="par_recargar">
										<?php 
											echo $foundParametrizacion;
										?>
									</tbody>
								</table>
							</div>
						</div>
		  			</div>

                </div>
				<hr>
				<div class="contenedor">
					<div class="row">
						<div class="col">
							<p class="h2 text-center">Tabla de categorias</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar</button>
						</div>
						<div class="col"></div>
						<div class="col">
							<button type="button" class="btn btn-danger" onclick=deleteCateg()>Eliminar</button>
							<label id="slt_all" for="check_todos" class="btn btn-warning">Seleccionar todo</label>
							<input type="checkbox" id="check_todos" style="visibility:hidden;">
						</div>
						<br><br>
					</div>
					<!-- TABLA CATEGORIA-->
					<div class="row">
						<div class="col">
							<div class="table-responsive">
									<table class="table table-bordered table-striped">
										<thead class="table-dark">
											<tr>
												<th>Id</th>
												<th>Categoria</th>
												<th>Editar</th>
												<th>Eliminar</th>
											</tr>
										</thead>
										<tbody id="cat_recargar">
										<?php 
											echo $foundCategories;
										?>
										</tbody>
									</table>
							</div>
						</div>
					</div>
				</div>		  
				<hr>
				<div class="contenedor">
					<div class="row">
						<div class="col">
							<p class="h2 text-center">Tabla de cursos</p>
						</div>
					</div>
					<!-- TABLA CURSO-->
					<div class="row">
						<div class="col">
							<div class="table-responsive">
									<table class="table table-bordered table-striped">
										<thead class="table-dark">
											<tr>
												<th>Id</th>
												<th>Curso</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											echo $foundCourse;
										?>
										</tbody>
									</table>
							</div>
						</div>
					</div>      
				</div>
            </div>
        </li>
    </ul>
 
<!-- modal categorias agregar-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
	  	<div class="input-group mb-3">
		  	<span class="input-group-text">Categoria</span>
			<input class="form-control" type="text" name="categ" id="categ">
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="categ_btn" class="btn btn-primary" onclick="enviacodigo()" data-bs-dismiss="modal">Agregar</button>
      </div>

    </div>
  </div>
</div>

<!-- modal categorias editar-->
<div class="modal fade" id="Editar_categorias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
	  	<div class="input-group mb-3">
		  	<span class="input-group-text">id</span>
			<input class="form-control" type="text" name="idcategM" id="idcategM" readonly>
		</div>
		<div class="input-group mb-3">
		  	<span class="input-group-text">Categoria</span>
			<input class="form-control" type="text" name="categM" id="categM">
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="categEd_btn" class="btn btn-primary" data-bs-dismiss="modal" onclick="cambioCateg()">Cambiar</button>
      </div>

    </div>
  </div>
</div>

<!-- modal PARAMETRICACION -->
<div class="modal fade" id="Editar_parametros" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Vincular categorias</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
	  <div class="input-group mb-3" id="actCategoria"></div>

		<div class="input-group mb-3" id="actCurso"></div>

      </div>

      <div class="modal-footer">
        <button type="submit" name="categEd_btn" class="btn btn-primary" data-bs-dismiss="modal" onclick="cambioParametro()">Vincular</button>
      </div>

    </div>
  </div>
</div>
</body>

<!--
<div class="modal_load"> 
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Lo siento!</strong> Etapa en construcción, actualice la página.
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
</div>
-->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
