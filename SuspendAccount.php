<?php
//define('__ROOT__',dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/config-ext.php');
require_once('/var/www/html/moodle/config-ext.php');

function suspendedAccount($email){
    try{
        $link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);
        if($link2 === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "UPDATE mdl_user SET suspended = 1 WHERE Email = ?";
        if($stmt = mysqli_prepare($link2, $sql)){
            $stmt->bind_param("s", $email);
            if(mysqli_stmt_execute($stmt)){
                // Todo bien
            }else{
                error_log("SuspendAccount - suspendedAccount - No se pudo cambiar a suspendido la cuenta para el correo: ".$email);
            }
        }else{
            error_log("SuspendAccount - suspendedAccount - Error al conectar con la base de datos");
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link2);
    }catch(Exception $w){
        error_log("SuspendAccount - suspendedAccount - ". $w->getMessage());
    }
}

function ActivateAccount($email){
    try {
		$link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_MOODLE);
        $sql = "UPDATE mdl_user SET suspended = 0 WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link2, $sql)){
            $stmt->bind_param("s", $email);
            
            if(mysqli_stmt_execute($stmt)){
                // Todo correcto
            } else {
                error_log("SuspendAccount - ActivateAccount - No se pudo cambiar a suspendido la cuenta para el correo: ".$email);
            }
        } else {
            error_log("SuspendAccount - ActivateAccount - Error al conectar con la base de datos");
        }
        
        mysqli_stmt_close($stmt);
    } catch(Exception $r) {
        error_log("SuspendAccount - ActivateAccount - ". $r->getMessage());
    }
}
?>
