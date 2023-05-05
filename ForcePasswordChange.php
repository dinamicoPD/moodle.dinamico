<?php
define('__ROOT__',dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/config-ext.php');
function forcePasswordChange($email){
	        //Query the UserId in moodle
try{
	mysqli_close($link1);
    mysqli_close($link2);
    $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);

	// Check connection
	if($link2 === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql = "INSERT INTO mdl_user_preferences (userid, name, value) VALUES ((SELECT id FROM mdl_user WHERE Email = ?),'auth_forcepasswordchange','1')";
	if($stmt = mysqli_prepare($link2, $sql)){
	    // Bind variables to the prepared statement as parameters
	    $stmt->bind_param("s",$email);
	    // Attempt to execute the prepared statement
	    if(mysqli_stmt_execute($stmt)){
	      //Everything ok
	    }else{
	        $form_err="Error con la Base de Datos, contacte al administrador";
	        return;
	    }
	}else{
	        $form_err="Error con la Base de Datos, contacte al administrador";
	        return;
	}
	mysqli_stmt_close($stmt);
}catch(Exception $w){
	 $form_err="Error con la Base de Datos, contacte al administrador";
	        return;
}
} 
?>