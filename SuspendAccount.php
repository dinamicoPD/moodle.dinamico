<?php
define('__ROOT__',dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/config-ext.php');
function suspendedAccount($email){
	        //Query the UserId in moodle
try{
	mysqli_close($link);
    mysqli_close($link2);
    $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);

	// Check connection
	if($link2 === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql = $sqlQuery = "UPDATE mdl_user SET suspended = 1 WHERE Email = ?";
	if($stmt = mysqli_prepare($link2, $sql)){
	    // Bind variables to the prepared statement as parameters
	    $stmt->bind_param("s",$email);
	    // Attempt to execute the prepared statement
	    if(mysqli_stmt_execute($stmt)){
	      //Everything ok
	    }else{
	        error_log("SuspendAccount - suspendedAccount - No se pudo cambiar a suspendido la cuenta para el correo: ".$email);
	    }
	}else{
	        error_log("SuspendAccount - suspendedAccount - Error la contectar con la base de datos");
	}
	mysqli_stmt_close($stmt);
}catch(Exception $w){
	error_log("SuspendAccount - suspendedAccount - ". $w->getMessage());
}
}
function ActivateAccount($email){
	        //Query the UserId in moodle
try{
	mysqli_close($link);
    mysqli_close($link2);
    $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);

	// Check connection
	if($link2 === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql = $sqlQuery = "UPDATE mdl_user SET suspended = 0 WHERE Email = ?";
	if($stmt = mysqli_prepare($link2, $sql)){
	    // Bind variables to the prepared statement as parameters
	    $stmt->bind_param("s",$email);
	    // Attempt to execute the prepared statement
	    if(mysqli_stmt_execute($stmt)){
	      //Everything ok
	    }else{
	        error_log("SuspendAccount - ActivateAccount - No se pudo cambiar a suspendido la cuenta para el correo: ".$email);
	    }
	}else{
	        error_log("SuspendAccount - ActivateAccount - Error la contectar con la base de datos");
	}
	mysqli_stmt_close($stmt);
}catch(Exception $r){
	error_log("SuspendAccount - ActivateAccount - ". $r->getMessage());
}
} 
?>