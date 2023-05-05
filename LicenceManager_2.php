<?php
	session_start();
    if(!isset($_SESSION["loggedinAdmin"]) || $_SESSION["loggedinAdmin"] != true){
    header("location: AdminLogin.php");
    exit;
    }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>-->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script src="js/buttons/dataTables.buttons.min.js"></script>
<script src="js/buttons/jszip.min.js"></script>
<script src="js/buttons/pdfmake.min.js"></script>
<script src="js/buttons/vfs_fonts.js"></script>
<script src="js/buttons/buttons.html5.min.js"></script>

<!--<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />-->
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script src="js/data.js"></script>
<style type="text/css">
	.dt-buttons{
		float: right;
	}
</style>	
<title>Gestor de Licencias</title>
</head>
<body>
<div class="container-fluid">
<h2>Gestor de Licencias  <br> <a href="./phpMyAdmin513" class="btn btn-success btn-xs">Gestor BD</a></h2>	
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
				<!--<div class="col-md-2" align="right">
					<button type="button" name="add" id="showRowsToExport" class="btn btn-primary btn-xs">Presentar Licencias Abiertas</button>
				</div>-->
			</div>
		</div>
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
<div id="licenceModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="licenceForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
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
							<button type="button" class="btn btn-default generate">Generar</button>	
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
    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
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
    						<button type="button" class="btn btn btn-default" data-dismiss="modal">Cerrar</button>
    					</div>
    			</div>
    		</form> 
    	</div>
    </div>
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</body>
</html>

