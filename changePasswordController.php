<?php

define('__ROOT__',dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/config-ext.php');
include('Mailer.php');

$usuario = $_GET["luu57Sp"];
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sqlQuery = "SELECT * FROM User WHERE UserName = '$usuario'";
$result = mysqli_query($link, $sqlQuery);
$mostrar = mysqli_fetch_array($result);
$idUsuario = $mostrar['UserId'];
$miCorreo = $mostrar['Email'];
$miNombre = $mostrar['FirstName'];
$miApellido = $mostrar['LastName'];

$sqlLicence = "SELECT * FROM Licence WHERE UserId = '$idUsuario'";
$resultLicence = mysqli_query($link, $sqlLicence);
$mostrarLicence = mysqli_fetch_array($resultLicence);
$miLicence = $mostrarLicence['Code'];

$sqlCambioPass = "UPDATE User SET Password = '" . md5($mostrarLicence["Code"]) . "'
WHERE UserId = '$idUsuario'";

mysqli_query($link, $sqlCambioPass);
mysqli_close($link);

$link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);

$verificar_configuracion = mysqli_query($link2, "SELECT * FROM mdl_user_preferences WHERE userid = (SELECT id FROM mdl_user WHERE Email = '$miCorreo') AND name = 'auth_forcepasswordchange'");

//Validar que no exista el registro con el correo electronico. Luego insertar, de lo contrario se actualiza cambiando el valor de auth_forcepasswordchange = 1
if (mysqli_num_rows($verificar_configuracion) > 0) {
    $sql = "UPDATE mdl_user_preferences SET value = '1' WHERE userid = (SELECT id FROM mdl_user WHERE Email = ?) AND name = 'auth_forcepasswordchange'";
} else {
    $sql = "INSERT INTO mdl_user_preferences (userid, name, value) VALUES ((SELECT id FROM mdl_user WHERE Email = ?),'auth_forcepasswordchange','1')";
}

if ($stmt = mysqli_prepare($link2, $sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("s", $miCorreo);
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        //Everything ok
    } else {
        $password_err = "Error con la Base de Datos, contacte al administrador";
        error_log("LicenceManagerController - forcePasswordChange - " . $stmt->error);
    }
} else {
    $password_err = "Error con la Base de Datos, contacte al administrador";
    error_log("LicenceManagerController - forcePasswordChange - " . $stmt->error);
}
mysqli_stmt_close($stmt);

if (!empty($password_err)) {
    $code = 20;
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => $password_err, 'code' => $code)));
} else {
    $mailSender = new MailDispatcher();
    $mailSender->sendEmailChangePassword($miCorreo, $miLicence, $usuario);
}
