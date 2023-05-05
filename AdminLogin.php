<?php
require_once(dirname(__FILE__).'/AdminLoginController.php');
?>
<!DOCTYPE html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title>Log in</title>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="bg-danger text-white"><?php echo $form_err;?></div>
			<div class="col-sm-12 col-sm-offset-3">
				<h1>Ingreso Administración</h1>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginAdminForm">
						<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<input type="username" class="input-lg form-control" name="username" id="username" placeholder="Nombre de Usuario" value="<?php echo $username; ?>" autocomplete="on">
							<span class="help-block"></span>
						</div>
						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<input type="password" class="input-lg form-control" name="password" id="password" placeholder="Contraseña" value="<?php echo $password; ?>" autocomplete="off">
							<span class="help-block"></span>
						</div>
						<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Ingresando..." value="Ingresar">
					</form>
				</div>

			</div>
		</div>
	</div>

</body>
</html>

