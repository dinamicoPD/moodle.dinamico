<?php
// Include config file
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');
require_once('/var/www/html/moodle/config-ext.php');


 $username = $password = $form_err = $username_err = $password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
// Check if username is empty
if(empty(trim($username))){
    $form_err = "Por favor ingrese el nombre de Usuario.";
    return;
}

if(empty(trim($password))){
    $form_err = "Por favor ingrese la Contraseña.";
    return;
}

$password_found = "";

$sql = "SELECT Password FROM User WHERE UserName = ? AND Rol = 'Admin' ";


if($stmt = mysqli_prepare($link, $sql)){
     // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $username);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1){
            $stmt->bind_result($password_found);
            $stmt->fetch();
         }else{
            $form_err="Nombre de usuario o Contraseña incorrecto.";
            return;
         }
    }else{
        $form_err="Error con la Base de Datos, contacte al administrador";
        return;
    }
}else{
        $form_err="Error con la Base de Datos, contacte al administrador";
        return;
}
mysqli_stmt_close($stmt);

if($password_found !=  md5($password)){
    $form_err = "Nombre de usuario o Contraseña incorrecto.";
    return;
}
session_start();
$_SESSION["loggedinAdmin"] = true;
header("location: index.php");
mysqli_close($link);
?>
