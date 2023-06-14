<?php
// Include config file
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');
require_once('../../config-ext.php');

session_start();
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: LoginPasswordChange.php");
    exit;
}

$lockbutton = false;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}

$lockbutton = true;

$password_err= $success_message=$password1 = $IdUser = $passwordfound = $username = $password2 ="";

$password1 = $_POST["password1"];
$password2 = $_POST["password2"];


$IdUser=$_SESSION["id"];
$username = $_SESSION["username"];

if(empty($password1) || empty($password2))
{
	$password_err = "Se deben completar ambos campos";
    $lockbutton = false;
	return;
}
if($password1 !== $password2){
	$password_err = "Las contraseñas no coinciden";
    $lockbutton = false;
	return;
}

//Verify length
if(strlen($password1)<8){
	$password_err = "La contraseña debe estár compuesta de más de 8 caracteres";
    $lockbutton = false;
	return;
}
if(!preg_match('/([0-9])/',$password1)){
	$password_err = "La contraseña debe tener un número";
    $lockbutton = false;
	return;
}
if(!preg_match('/([ña-z])/',$password1)){
	$password_err = "La contraseña debe tener una letra en Minúscula";
    $lockbutton = false;
	return;
}
if(!preg_match('/([ÑA-Z])/',$password1)){
	$password_err = "La contraseña debe tener una letra en Mayúscula";
    $lockbutton = false;
	return;
}
if(!preg_match('/([^ña-zÑA-Z0-9_])/',$password1)){
	$password_err = "La contraseña debe tener un caracter no alfanúmerico";
    $lockbutton = false;
	return;
}

$sql = "SELECT Password FROM User WHERE Username = ? AND UserId = ?";

if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sd",$username,$IdUser);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1){
            $stmt->bind_result($passwordfound);
            $stmt->fetch();
         }else if (mysqli_stmt_num_rows($stmt)>1){
            $username_err="Problemas de autenticación, contacte al administrador";
            $lockbutton = false;
            return;
         }else{
            $password_err="Verifique Nombre de Usuario y Contraseña";
            $lockbutton = false;
            return;
         }
    }else{
        $username_err="Error con la Base de Datos, contacte al administrador";
        $lockbutton = false;
        return;
    }
}else{
        $username_err="Error con la Base de Datos, contacte al administrador";
        $lockbutton = false;
        return;
}

mysqli_stmt_close($stmt);

if($passwordfound===md5($password1)){
	$password_err = "La nueva Contraseña no puede ser igual a la anterior";
    $lockbutton = false;
	return;
}


//Change Moodle's configuration to not require password renewval anymore.
$sql = "UPDATE mdl_user_preferences SET value = 0 WHERE userid = (SELECT id FROM mdl_user WHERE username = ?) AND name like 'auth_forcepasswordchange'";

if($stmt = mysqli_prepare($link2, $sql)){

	// Bind variables to the prepared statement as parameters
     mysqli_stmt_bind_param($stmt, "s", $username);
    if(mysqli_stmt_execute($stmt)){

    }else{
    	error_log("Error trying to update settings");
        $lockbutton = false;
    }
}else{
    error_log("Error trying to update settings stmt");
    $lockbutton = false;
}
mysqli_stmt_close($stmt);
mysqli_close($link2);
 
// Check connection
if($link === false){
    $lockbutton = false;
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "UPDATE User SET Password = ? WHERE UserId = ?";

if($stmt = mysqli_prepare($link, $sql)){

	// Bind variables to the prepared statement as parameters
    $stmt->bind_param("sd",md5($password1),$IdUser);
    if(mysqli_stmt_execute($stmt)){
    	$success_message ="Constraseña Actualizada Correctamente";
    	$password1="";
    	$password2="";
    	//echo "<script>setTimeout(\"location.href = 'http://192.168.0.253/';\",1500);</script>";
    	// Destroy the session.
		session_destroy();
    	header( "refresh:2; url=".HOME_ADD."moodle");
    }else{
        $lockbutton = false;
    	echo "Was not possible to execute the query";
    }
}else{
        $lockbutton = false;
        echo "Error executing preparing with statement";
}

mysqli_stmt_close($stmt);
mysqli_close($link);

?>
