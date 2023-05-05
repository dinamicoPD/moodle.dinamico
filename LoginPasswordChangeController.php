<?php
// Initialize the session
session_start();
// Include config file
define('__ROOT__',dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/config-ext.php');

$username_err = $password_err = $id = $password = $passwordfound= $usernamefound = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}

//Validate username
$username = $_POST["username"];
$password = $_POST["password"];
// Check if username is empty
if(empty(trim($username))){
    $username_err = "Por favor ingrese su E-mail o Nombre de Usuario.";
    return;
} 
// Check if password is empty
if(empty(trim($_POST["password"]))){
    $password_err = "Por favor ingrese Constraseña.";
    return;
} else{
    $password = trim($_POST["password"]);
}

$sql = "SELECT UserId, UserName , Password FROM User WHERE Email = ? AND Rol <> 'Admin'";
if (!filter_var($username, FILTER_VALIDATE_EMAIL)){
$sql = "SELECT UserId, UserName, Password FROM User WHERE UserName = ? AND Rol <> 'Admin'";
}
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $username);
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1){
            $stmt->bind_result($id,$usernamefound,$passwordfound);
            $stmt->fetch();
         }else if (mysqli_stmt_num_rows($stmt)>1){
            $username_err="Problemas de autenticación, contacte al administrador";
            return;
         }else{
            $password_err="Verifique Nombre de Usuario y Contraseña";
            return;
         }
    }else{
        $username_err="Error con la Base de Datos, contacte al administrador";
        return;
    }
}else{
        $username_err="Error con la Base de Datos, contacte al administrador";
        return;
}

if($passwordfound == md5($password)){
    //echo "Sesion iniciada</br>";
    session_start();
    //echo "Id encontrado: ". $id ."</br>";
    //echo "Password encontrado: ". $passwordfound ."</br>";
    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $usernamefound;
    // Redirect user to ChangePassword
    header("location: PasswordChange.php");
}else{
    $password_err="Verifique Nombre de Usuario y Contraseña";
}
mysqli_stmt_close($stmt);
mysqli_close($link);
?>