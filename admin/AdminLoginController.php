<?php

require_once('/var/www/html/moodle/config-ext.php');

$username = $password = $form_err = $username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] != "POST"){
    return;
}

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

if(empty(trim($username))){
    $form_err = "Por favor ingrese el nombre de Usuario.";
    return;
}

if(empty(trim($password))){
    $form_err = "Por favor ingrese la Contraseña.";
    return;
}

$tipoUserSQL = "SELECT Rol FROM User WHERE UserName = ?";
if($stmt = mysqli_prepare($link, $tipoUserSQL)){
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt) > 0){
            mysqli_stmt_bind_result($stmt, $rol);
            mysqli_stmt_fetch($stmt);
            
            if($rol === "Admin"){
                $form_err = identificar($link, $username, $password, $rol);
                if($form_err === ""){
                    session_start();
                    $_SESSION["loggedinAdmin"] = true;
                    $_SESSION["loggedinAsesor"] = false;
                    header("location: index.php");
                    mysqli_close($link);
                }
            } elseif($rol === "Asesor"){
                $form_err = identificar($link, $username, $password, $rol);
                if($form_err === ""){
                    session_start();
                    $_SESSION["loggedinAdmin"] = false;
                    $_SESSION["loggedinAsesor"] = true;
                    $_SESSION["username"] = $username;
                    header("location: asesor/index.php");
                    mysqli_close($link);
                }
            }
        } else {
            $form_err = "Nombre de usuario o Contraseña incorrecto.";
            return;
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $form_err = "Error al ejecutar la consulta.";
        return;
    }
} else {
    $form_err = "Error al preparar la consulta.";
    return;
}

function identificar($link, $username, $password, $rol){
    $form_err = "";
    $sql = "SELECT Password FROM User WHERE UserName = ? AND Rol = ? ";
    $stmt = mysqli_prepare($link, $sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt, "ss", $username, $rol);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $password_found);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
                if($password_found ==  md5($password)){
                    $form_err = "";
                } else {
                    $form_err = "Nombre de usuario o Contraseña incorrecto.";
                }
            } else {
                $form_err = "Nombre de usuario o Contraseña incorrecto.";
            }
        } else {
            $form_err = "Error con la Base de Datos, contacte al administrador";
        }
    } else {
        $form_err = "Error con la Base de Datos, contacte al administrador";
    }
    return $form_err;
}
?>
