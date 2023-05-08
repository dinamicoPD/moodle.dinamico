<?php
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');
require_once('../../config-ext.php');
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
			<div class="col-sm-12 col-sm-offset-3">
				<h1>Log In</h1>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginForm">
						<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<input type="username" class="input-lg form-control" name="username" id="username" placeholder="Nombre de usuario" value="<?php echo $username; ?>" autocomplete="off">
							<span class="help-block"></span>
						</div>
						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<input type="password" class="input-lg form-control" name="password" id="password" placeholder="Contraseña" value="<?php echo $password; ?>" autocomplete="off">
							<span class="help-block"></span>
						</div>
						<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Ingresando..." value="Ingresar">
						<?php
						$old_path = getcwd();
						#chdir('/var/www/html/moodle/moodle/admin/tool/uploadusercli/cli/');
						chdir('/var/www/html/moodle/moodle/auth/db/cli/');
						//shell_exec('php sync_users.php');
						echo getcwd();
						#$output=shell_exec('php uploadusercli.php --mode=update --updatemode=missingonly --file=PlantillaProfesor.csv');
						$output=shell_exec('php sync_users.php');
						
						chdir($old_path); 
						echo "<pre>$output</pre>";
						?>
					</form>
				</div>

			</div>
		</div>
	</div>

</body>
</html>

